<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactStoreE2ETest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_endpoint_exists_and_required_validation(): void
    {
        $response = $this->postJson('/api/contacts');

        $response->assertStatus(422)->assertExactJsonStructure(['errors' => ['name', 'email', 'subject', 'message'], 'message']);
    }

    public function test_email_validation(): void
    {
        $response = $this->postJson('/api/contacts', [
            'name' => 'John Doe',
            'subject' => 'First message',
            'email' => 'john@example.ll', //test whether email has valid dns
            'message' => 'This is the first message'
        ]);

        $response->assertStatus(422)->assertExactJsonStructure(['errors' => ['email'], 'message']);
    }

    public function test_length_validation(): void
    {
        $response = $this->postJson('/api/contacts', [
            'name' => 'John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe John Doe ',
            'subject' => 'First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message First message ',
            'email' => 'john@google.com john@google.com john@google.com john@google.com john@google.com john@google.com john@google.com john@google.com ',
            'message' => 'This is the first message'
        ]);

        $response->assertStatus(422)->assertExactJsonStructure(['errors' => ['name', 'email', 'subject'], 'message']);
    }


    public function test_store(): void
    {
        $response = $this->postJson('/api/contacts', [
            'name' => 'John Doe',
            'subject' => 'First message',
            'email' => 'john@google.com',
            'message' => 'This is the first message'
        ]);

        $response->assertStatus(201)->assertExactJsonStructure(['id', 'name', 'email', 'subject', 'message', 'updated_at', 'created_at']);
    }
}
