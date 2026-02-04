<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Lead Received</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="padding:30px 15px;">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

    <!-- Header -->
    <tr>
        <td style="background:#0d6efd;color:#ffffff;padding:20px;text-align:center;">
            <h2 style="margin:0;">🚀 New Project Lead</h2>
        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:25px;color:#333;">

            <p><strong>New lead received from website:</strong></p>

            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                    <td style="font-weight:bold;width:160px;">First Name</td>
                    <td>{{ $first_name }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Last Name</td>
                    <td>{{ $last_name }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Email</td>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Phone</td>
                    <td>{{ $phone }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Company</td>
                    <td>{{ $company }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Service Type</td>
                    <td>{{ $service_type }}</td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Budget</td>
                    <td>{{ $budget }}</td>
                </tr>
            </table>

            <hr style="margin:20px 0;">

            <p style="font-weight:bold;">Project Description</p>
            <p style="background:#f8f9fa;padding:15px;border-radius:5px;">
                {{ $project_description }}
            </p>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#f1f1f1;padding:15px;text-align:center;font-size:13px;color:#666;">
            © {{ date('Y') }} Finext Solution | Lead Notification
        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>
