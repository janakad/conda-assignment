<?php

namespace App\Services;

use App\Services\EmailServiceInterface;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class EmailService implements EmailServiceInterface
{
    public function send(string $to, string $subject, string $htmlMessage): SentMessage | null | TransportException
    {
        try {
            return Mail::html($htmlMessage, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });

            return $result;
        } catch (TransportException $exception) {
            dd($exception);
            throw $exception;
        }
    }
}
