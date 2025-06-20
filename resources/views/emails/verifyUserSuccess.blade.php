<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Xác nhận thành công</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/forgotPassword.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>

</head>

@include('user.partials.header')
<main>
    <div id="anhBgForgotPassword">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-auto text-center">
                    <div id="formForgotPassword">
                        <div id="botForm">
                            <div id="topForm">
                                <h2>Xác nhận tài khoản</h2>
                            </div>
                            <div class="col-md-12 form-group alert alert-success">
                                <strong>Xác nhận tài khoản <b>{{ $email }}</b> thành công</strong>
                            </div>

                            <a href="{{ route('login') }}">
                                <small><i class="fa-solid fa-arrow-left"></i> Quay lại trang đăng nhập</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('user.partials.footer')
