<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/thanhcong.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png"/>

</head>

<body>
@include('user.partials.header')
<main>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <div class="payment_header">
                        <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    </div>

                    <div class="content">
                        @if (isset($book))
                            <h1>Đặt vé thành công !</h1>
                        @else
                            <h1>Thanh toán thành công !</h1>
                        @endif

                        <p>Ticket4T Hân hạnh tài trợ chuyến đi của bạn</p>
                        <a href="{{ url('/') }}">Trở về trang chủ</a>
                        <a href="{{ url('/tai-khoan/ve-cua-toi') }}">Vé của tôi</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@include('user.partials.footer')
</body>

