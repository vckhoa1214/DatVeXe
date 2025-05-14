<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đặt vé</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f4f8;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
            margin-top: 0;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #888;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
    </style>
</head>
<body>
<div class="email-wrapper">
    <h2>Xác Nhận Đặt Vé</h2>
    <p>Chào <strong>{{ $ve->fullName }}</strong>,</p>
    <p>Bạn đã đặt vé thành công cho tuyến xe <strong>{{ $chuyenxe->startProvince }} → {{ $chuyenxe->endProvince }}</strong>.</p>
    <p>Thông tin chi tiết vé được đính kèm trong file PDF bên dưới.</p>
    <p>Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.</p>
    <div class="footer">
        Đây là email tự động. Vui lòng không trả lời lại email này.
    </div>
</div>
</body>
</html>
