<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>
</head>

<body>
@include('user.partials.header')
<main>
    <div id="anhBgLogin">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-center">
                    <div id="formLogin">
                        <div id="bodyForm" style="display: flex; justify-content: center; flex-direction: column;">
                            <div id="topForm">
                                <a href="{{ route('login') }}">
                                    <h4>Đăng nhập</h4>
                                </a>
                                <a href="{{ route('register') }}">
                                    <h4>Đăng ký</h4>
                                </a>
                            </div>
                            <form action="{{ route('login.post') }}" id="login-form" method="POST">
                                @csrf
                                @if ($errors->has('message'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('message'))
                                    <div class="alert {{ session('type', 'alert-danger') }}">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="email" style="float: left">Địa chỉ Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Nhập Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="password" style="float: left">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Nhập mật khẩu" required>
                                </div>
                                <a id="forgotPassword" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                <br>
                                <button type="submit" class="btn btn-dark submit-button">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-4 d-none d-md-block text-center">
                    <div id="sloganLogin">
                        <p>BusTicket</p>
                        <p>Hân hạnh tài trợ</p>
                        <p>chuyến đi của bạn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('user.partials.footer')

</body>
