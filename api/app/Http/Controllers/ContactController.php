<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Repositories\ContactRepositoryInterface;
use App\Services\EmailServiceInterface;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $emailService;

    public function __construct(ContactRepositoryInterface $contactRepository, EmailServiceInterface $emailService)
    {
        $this->contactRepository = $contactRepository;
        $this->emailService = $emailService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $htmlMessage = "Name: " . $validated['name'] . "<br>Email: " . $validated['email'] . "<br>Subject: " . $validated['subject'] . "<br>Message: " . $validated['message'];
        $emailResult =  $this->emailService->send('pr@example.com', 'New contact email received.', $htmlMessage);
        if ($emailResult) {
            $insertResult = $this->contactRepository->insert($validated);
        }
        return response()->json($insertResult, 201);
    }
}
