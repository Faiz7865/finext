<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verification Code</title>
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: 800;
            color: #104cba;
        }
        .otp-box {
            background: #e5eef6;
            border: 2px solid #104cba;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
        }
        .otp-code {
            font-size: 42px;
            font-weight: 800;
            color: #104cba;
            letter-spacing: 12px;
        }
        .footer {
            text-align: center;
            color: #74787c;
            font-size: 14px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Finext Solution</div>
        </div>
        
        <h2 style="color: #1d2c38; text-align: center;">Hello {{ $firstName }},</h2>
        
        <p style="color: #74787c; text-align: center; line-height: 1.6;">
            Thank you for your interest in our services. To verify your email address, please use the following verification code:
        </p>
        
        <div class="otp-box">
            <div class="otp-code">{{ $otp }}</div>
        </div>
        
        <p style="text-align: center; color: #1d2c38;">
            This code will expire in <strong>10 minutes</strong>.
        </p>
        
        <p style="text-align: center; color: #74787c; font-size: 14px;">
            If you didn't request this code, please ignore this email.
        </p>
        
        <div class="footer">
            <p>Finext Solution<br>
            Transforming Fintech Ideas into Reality</p>
        </div>
    </div>
</body>
</html>