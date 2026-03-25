<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lead_page_loads_successfully()
    {
        $response = $this->get('/lead');
        $response->assertStatus(200);
        $response->assertViewIs('lead');
    }

    public function test_lead_form_validates_required_fields()
    {
        $response = $this->post('/lead/submit', []);
        
        $response->assertSessionHasErrors([
            'first_name', 'last_name', 'email', 'phone', 
            'company', 'service_type', 'budget', 'project_description', 'consent_communications'
        ]);
    }

    public function test_lead_form_submits_and_sends_otp()
    {
        \Illuminate\Support\Facades\Mail::fake();

        $data = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
            'company' => 'Acme Corp',
            'service_type' => 'Fintech',
            'budget' => '10k-50k',
            'project_description' => 'We need a full banking software solution implemented.',
            'consent_communications' => 'on',
        ];

        $response = $this->post('/lead/submit', $data);

        $response->assertRedirect(route('lead.verify'));
        $response->assertSessionHas('otp_email', 'jane@example.com');

        $this->assertDatabaseHas('lead_otps', [
            'email' => 'jane@example.com',
            'verified' => 0,
        ]);

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\LeadOtpMail::class);
    }

    public function test_lead_otp_verification_creates_lead()
    {
        \Illuminate\Support\Facades\Mail::fake();

        $otp = '123456';
        $email = 'verify@example.com';
        
        $leadData = [
            'first_name' => 'Verify',
            'last_name' => 'User',
            'email' => $email,
            'phone' => '1112223333',
            'company' => 'Verify Inc',
            'service_type' => 'API',
            'budget' => 'under 10k',
            'project_description' => 'Description of the verification test project.',
        ];

        \App\Models\LeadOtp::create([
            'email' => $email,
            'otp' => $otp,
            'lead_data' => $leadData,
            'expires_at' => now()->addMinutes(10),
            'verified' => false,
        ]);

        $response = $this->withSession(['otp_email' => $email])
                         ->post('/lead/verify', ['otp' => $otp]);

        $response->assertRedirect(route('lead'));

        $this->assertDatabaseHas('leads', [
            'email' => $email,
            'status' => 'verified',
        ]);
        
        $this->assertDatabaseHas('lead_otps', [
            'email' => $email,
            'verified' => 1,
        ]);

        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\LeadFormMail::class, 2);
    }
}
