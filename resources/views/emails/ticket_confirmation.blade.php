 <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <link rel="stylesheet" href="/css/ticket_confirmation.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
        }
        .content .bold {
            font-weight: bold;
        }
        .content .ticket-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .ticket-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .ticket-info table th, .ticket-info table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .ticket-info table th {
            background-color: #f1f1f1;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }
        .footer p {
            margin: 0;
        }

    </style>

</head>
<body>

<div class="email-container">
    <div class="header">
        <h1>Xác Nhận Đặt Vé <br> {{ $chuyenxe->startProvince }} → {{ $chuyenxe->endProvince }}</h1>
    </div>

    <div class="content">
        <p><span class="bold">Chào {{ $ve->fullName }},</span></p>
        <p>Cảm ơn bạn đã đặt vé xe khách với chúng tôi. Dưới đây là các thông tin chi tiết về vé của bạn:</p>

        <div class="ticket-info">
            <table>
                <tr>
                    <th>Họ Tên</th>
                    <td>{{ $ve->fullName }}</td>
                </tr>
                <tr>
                    <th>Số Điện Thoại</th>
                    <td>{{ $ve->phoneNum }}</td>
                </tr>
                <tr>
                    <th>Vị trí Ghế</th>
                    <td>{{ implode(', ', $seatCodes) }}</td>
                </tr>
                <tr>
                    <th>Ngày Khởi Hành</th>
                    <td>{{ \Carbon\Carbon::parse($chuyenxe->departureTime)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Giờ Khởi Hành</th>
                    <td>{{ \Carbon\Carbon::parse($chuyenxe->departureTime)->format('H:i') }}</td>
                </tr>
            </table>
        </div>

        <p>Chúng tôi rất mong được phục vụ bạn trong chuyến đi này!</p>
    </div>

    <div class="footer">
        <p>Đây là email xác nhận tự động. Vui lòng không trả lời.</p>
    </div>
</div>

</body>
</html>
