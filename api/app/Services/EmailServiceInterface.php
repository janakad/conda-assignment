<?php

namespace App\Services;

use Illuminate\Mail\SentMessage;
use Symfony\Component\Mailer\Exception\TransportException;

interface EmailServiceInterface
{
    public function send(string $to, string $subject, string $htmlMessage): SentMessage | null | TransportException;
}
