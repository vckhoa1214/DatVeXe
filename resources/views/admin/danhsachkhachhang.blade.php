<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Danh sách hành khách - Chuyến xe {{ $chuyenxe->startProvince }} đến {{ $chuyenxe->endProvince }}</title>

    <style>
        :root {
            --primary-color: #007bff;
            --text-color: #333;
            --bg-color: #f9f9f9;
            --border-color: #ddd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px 50px;
            color: var(--text-color);
            background-color: var(--bg-color);
        }

        header {
            border-bottom: 3px solid var(--primary-color);
            margin-bottom: 30px;
            padding-bottom: 10px;
        }

        .title {
            font-size: 30px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 15px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            background-color: white;
        }

        thead tr {
            background-color: var(--primary-color);
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f0f4ff;
        }

        tbody tr:hover {
            background-color: #eaf3ff;
            cursor: default;
        }

        tfoot td {
            padding: 10px;
            font-style: italic;
            color: #777;
            text-align: center;
        }

        footer {
            font-size: 13px;
            color: #777;
            text-align: center;
            border-top: 1px solid #ccc;
            padding-top: 15px;
            margin-top: 40px;
            position: fixed;
            bottom: 30px;
            left: 0;
            right: 0;
            background-color: white;
        }

        @media print {
            body {
                margin: 10mm 15mm;
            }

            header, table, footer {
                page-break-inside: avoid;
            }

            footer {
                position: fixed;
                bottom: 10mm;
            }

            table {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="title">Danh sách hành khách - Chuyến xe {{ $chuyenxe->startProvince }} đến {{ $chuyenxe->endProvince }}</div>
    <div class="sub-title">
        Chuyến xe ID: <strong>#{{ $chuyenxe->id }}</strong> |
        Ngày khởi hành: <strong>{{ \Carbon\Carbon::parse($chuyenxe->departure_date)->format('d/m/Y H:i') }}</strong>
    </div>
</header>

<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Số điện thoại</th>
    </tr>
    </thead>
    <tbody>
    @forelse($veDaDats as $index => $ve)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $ve->taiKhoan->fullName ?? 'Không rõ' }}</td>
            <td>
                {{ isset($ve->taiKhoan->dob)
                    ? \Carbon\Carbon::parse($ve->taiKhoan->dob)->format('d/m/Y')
                    : 'Không rõ'
                }}
            </td>
            <td>{{ $ve->taiKhoan->phoneNum ?? 'Không rõ' }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" style="text-align:center; font-style: italic; color:#999;">
                Không có hành khách nào.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<footer>
    Hệ thống quản lý vé xe khách &nbsp;|&nbsp; In lúc: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
</footer>

<script>
    window.onload = function () {
        window.print();
    }
</script>

</body>
</html>
