<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Quên mật khẩu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/forgotPassword.css">
    <link rel="shortcut icon" href="/images/favicon_user.png">
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
            <div class="row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <div id="formForgotPassword">
                        <div id="botForm">
                            <div id="topForm">
                                <h2>Lấy lại mật khẩu</h2>
                            </div>
                            <form method="POST" action="{{ route('password.updated') }}">
                                @csrf

                                @if(session('message'))
                                    <div class="alert {{ session('type', 'alert-danger') }}">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <input type="hidden" name="email" value="{{ request('email') }}">
                                <input type="hidden" name="token" value="{{ request('token') }}">

                                <div class="form-group">
                                    <label for="password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Nhập mật khẩu" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                </div>

                                <button type="submit" class="btn btn-primary submit-button">
                                    <i class="bi bi-arrow-repeat"></i> Đặt lại mật khẩu
                                </button>

                                <br>
                                <a href="{{ route('login') }}">
                                    <small><i class="fa-solid fa-arrow-left"></i> Quay lại trang đăng nhập</small>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

@include('user.partials.footer')
</body>
