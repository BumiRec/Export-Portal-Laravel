<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Reset Request</title>
    <style>
        *{
            color: #000000;
        }
    </style>
</head>
<body>
    <p>Hello,</p>
    <p>We received a request to reset your password. To proceed with the password reset, click on the link below:</p>
    <p><a href="{{ $resetLink }}">Reset Password</a></p>
    <p>If you did not initiate this request, please ignore this email.</p>
    <br>
    <p>Regards,</p>
    <p>Team Nova</p>
</body>
</html>
