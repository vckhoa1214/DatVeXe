<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Yêu cầu đặt lại mật khẩu</h2>
    <p>Chào bạn,</p>
    <p>Bạn vừa yêu cầu đặt lại mật khẩu cho tài khoản của mình. Nhấn vào nút bên dưới để thực hiện:</p>
    <p style="text-align: center;">
        <a href="{{ $resetLink }}" class="btn">Đặt lại mật khẩu</a>
    </p>
    <p>Nếu bạn không yêu cầu điều này, vui lòng bỏ qua email này.</p>
    <p class="footer">Cảm ơn, <br> Hệ thống đặt vé xe khách</p>
</div>
</body>
</html>
