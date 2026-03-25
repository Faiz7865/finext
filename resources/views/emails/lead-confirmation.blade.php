{{-- resources/views/emails/lead-confirmation.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You</title>
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
            padding: 40px;
        }
        .header {
            background: #104cba;
            color: white;
            padding: 30px;
            border-radius: 12px 12px 0 0;
            margin: -40px -40px 30px -40px;
            text-align: center;
        }
        .content {
            line-height: 1.8;
            color: #1d2c38;
        }
        .next-steps {
            background: #e5eef6;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .next-steps li {
            margin-bottom: 10px;
            color: #1d2c38;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You, {{ $first_name }}!</h1>
        </div>
        
        <div class="content">
            <p>We have received your project inquiry and our team will review your requirements shortly.</p>
            
            <div class="next-steps">
                <h3 style="color: #104cba; margin-top: 0;">What happens next?</h3>
                <ul>
                    <li>Our team will analyze your project requirements</li>
                    <li>We'll prepare a customized proposal</li>
                    <li>You'll hear from us within 24 hours</li>
                </ul>
            </div>
            
            <p>If you have any urgent questions, feel free to reply to this email.</p>
        </div>
    </div>
</body>
</html>