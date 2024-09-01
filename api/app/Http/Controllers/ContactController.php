<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $insertResult = $this->contactRepository->insert($validated);
        return response()->json($insertResult, 201);
    }
}
