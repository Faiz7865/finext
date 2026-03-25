<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_loads_successfully()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertViewIs('contact');
    }

    public function test_contact_form_validates_required_fields()
    {
        $response = $this->post('/contact/submit', []);
        
        $response->assertSessionHasErrors(['name', 'email', 'phone', 'subject', 'message', 'consent_communications']);
    }

    public function test_contact_form_submits_successfully()
    {
        \Illuminate\Support\Facades\Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'subject' => 'Test Subject',
            'message' => 'This is a test message that is long enough.',
            'consent_communications' => 'on',
        ];

        $response = $this->post('/contact/submit', $data);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\ContactFormMail::class, 2);
    }
}
