<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 40px;
            background-color: #ffffff;
        }

        .ticket-container {
            border: 2px dashed #4CAF50;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 700px;
            margin: auto;
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 28px;
            color: #4CAF50;
        }

        .ticket-details {
            margin-top: 20px;
        }

        .ticket-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .ticket-details th,
        .ticket-details td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .ticket-details th {
            background-color: #f0f0f0;
            width: 30%;
        }

        .note {
            margin-top: 25px;
            font-style: italic;
            font-size: 13px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="ticket-container">
    <div class="ticket-header">
        <h1>VÉ XE KHÁCH</h1>
        <p>{{ $chuyenxe->startProvince }} → {{ $chuyenxe->endProvince }}</p>
    </div>

    <div class="ticket-details">
        <table>
            <tr>
                <th>Họ Tên</th>
                <td>{{ $ve->fullName }}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $ve->phoneNum }}</td>
            </tr>
            <tr>
                <th>Vị trí ghế</th>
                <td>{{ implode(', ', $seatCodes) }}</td>
            </tr>
            <tr>
                <th>Ngày khởi hành</th>
                <td>{{ \Carbon\Carbon::parse($chuyenxe->departureTime)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Giờ khởi hành</th>
                <td>{{ \Carbon\Carbon::parse($chuyenxe->departureTime)->format('H:i') }}</td>
            </tr>
            <tr>
                <th>Tổng tiền</th>
                <td>{{ number_format($chuyenxe->price * $ve->numSeats, 0, ',', '.') }} VND</td>
            </tr>
            <tr>
                <th>Tình trạng</th>
                <td>
                    @if($ve->statusTicket === 'Đã thanh toán')
                        Đã thanh toán
                    @else
                        Chưa thanh toán
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="note">
        Quý khách vui lòng xuất trình vé này khi lên xe. Chúc quý khách có một chuyến đi an toàn và thoải mái!
    </div>
</div>

</body>
</html>
