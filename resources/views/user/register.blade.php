<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Đăng ký</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/register.css">
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

    <div id="anhBgRegister">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-5 text-center">
                    <div id="formRegister">
                        <div id="bodyForm" style="display: flex; justify-content: center; flex-direction: column;">
                            <div id="topForm">
                                <a href="{{ route('login') }}">
                                    <h4>Đăng nhập</h4>
                                </a>
                                <a href="{{ route('register') }}">
                                    <h4>Đăng ký</h4>
                                </a>
                            </div>

                            @if (session('message'))
                                <div class="form-group alert alert-success">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname" style="float: left">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                           placeholder="Nhập họ và tên" required value="{{ old('fullname') }}">
                                    @error('fullname')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" style="float: left">Địa chỉ Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Nhập Email" required value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Thêm trường Số điện thoại -->
                                <div class="form-group">
                                    <label for="phoneNum" style="float: left">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phoneNum" name="phoneNum"
                                           placeholder="Nhập số điện thoại" required value="{{ old('phoneNum') }}">
                                    @error('phoneNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Thêm trường Ngày sinh -->
                                <div class="form-group">
                                    <label for="dob" style="float: left">Ngày sinh</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                           required value="{{ old('dob') }}">
                                    @error('dob')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" style="float: left">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Nhập mật khẩu" required>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" style="float: left">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                </div>

                                <button type="submit" class="btn btn-dark submit-button">
                                    <i class="bi bi-person-plus"></i>
                                    Đăng ký
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-5 d-none d-md-block text-center">
                    <div id="sloganRegister">
                        <p>BusTicket</p>
                        <p>Hân hạnh tài trợ</p>
                        <p>chuyến đi của bạn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const preloader = document.querySelector("#preloader");

        form.addEventListener("submit", function () {
            preloader.style.display = "flex"; // Hiển thị preloader khi submit form
        });
    });

</script>
@include('user.partials.footer')
</body>
