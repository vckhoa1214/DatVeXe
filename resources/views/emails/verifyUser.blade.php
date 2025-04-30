<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận tài khoản</title>
</head>
<body>
<p>Xin chào <strong>{{ $user->fullName }}</strong>,</p>
<p>Bạn đã đăng ký tài khoản trên hệ thống của chúng tôi. Vui lòng nhấn vào link dưới đây để xác thực tài khoản:</p>

<p>
    <a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
        Xác nhận tài khoản
    </a>
</p>

<p>Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.</p>

<p>Trân trọng,<br><strong>Bus Ticket Team</strong></p>
</body>
</html>
