{{-- resources/views/emails/lead-form.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Lead</title>
    <style>
        body { 
            font-family: 'Nunito', Arial, sans-serif; 
            background: #f3f4f6; 
            padding: 20px; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: white; 
            border-radius: 12px; 
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .header { 
            background: #104cba; 
            color: white; 
            padding: 30px; 
        }
        .header h2 { margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .field { 
            margin-bottom: 20px; 
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        .field:last-child { border-bottom: none; }
        .label { 
            font-weight: 700; 
            color: #104cba; 
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        .value { 
            color: #1d2c38; 
            font-size: 16px;
            font-weight: 600;
        }
        .description {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Lead Submission</h2>
            <p style="margin: 8px 0 0 0; opacity: 0.9;">Received on {{ now()->format('F d, Y at h:i A') }}</p>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">Full Name</div>
                <div class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email Address</div>
                <div class="value">{{ $data['email'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Phone Number</div>
                <div class="value">{{ $data['phone'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Company</div>
                <div class="value">{{ $data['company'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Service Type</div>
                <div class="value">{{ str_replace('-', ' ', ucfirst($data['service_type'])) }}</div>
            </div>
            
            <div class="field">
                <div class="label">Budget Range</div>
                <div class="value">{{ $data['budget'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Project Description</div>
                <div class="description">{{ $data['project_description'] }}</div>
            </div>
        </div>
    </div>
</body>
</html>