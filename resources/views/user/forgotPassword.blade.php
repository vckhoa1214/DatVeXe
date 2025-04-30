<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Quên mật khẩu</title>
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

<body>
@include('user.partials.header')
<main>
    <!-- Preloader -->
    <div id="preloader" style="display: none;">
        <div class="loading-animation">
            <img src="{{ asset('images/loading/bus.gif') }}" alt="Loading..." width="100">
            <p>Đang xử lý, vui lòng chờ...</p>
        </div>
    </div>

    <div id="anhBgForgotPassword">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-auto text-center">
                    <div id="formForgotPassword">

                        <div id="botForm">
                            <div id="topForm">
                                <h2>Quên Mật Khẩu</h2>
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                @if (session('message'))
                                    <div class="col-md-12 form-group alert alert-success" style="font-size: larger">
                                        Chúng tôi đã gửi tới <b>{{ session('email') }}</b> một liên kết để reset lại mật
                                        khẩu
                                    </div>
                                @else
                                    @if ($errors->any())
                                        <div class="col-md-12 form-group alert alert-danger">
                                            <div id="middleForm">
                                                <p>{{ $errors->first() }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="email" style="float: left">Địa chỉ Email</label>
                                        <input type="email" class="form-control" id="email"
                                               aria-describedby="emailHelp" placeholder="Nhập Email"
                                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="email"
                                               value="{{ old('email') }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary submit-button">
                                        <i class="bi bi-arrow-repeat"></i> Reset mật khẩu
                                    </button><br>
                                @endif

                                <a href="{{ route('login') }}">
                                    <small><i class="fa-solid fa-arrow-left"></i> Quay lại trang đăng nhập</small>
                                </a>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('user.partials.footer')
</body>
