<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Thông tin tài khoản</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/infoTaiKhoan.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png"/>


</head>

<body>
@include('user.partials.header')
<main>
    <div class="bodyInfo">
        <div class="container">
            @if(isset($infoAcc))
                <div class="row">
                    <div class="col-md-12">
                        <p><a href="{{ url('/') }}">Trang chủ</a> > <a href="{{ url('/tai-khoan/thong-tin') }}">Thông
                                tin tài khoản</a></p>
                        <div class="infoAcc">
                            <img src="{{ asset($infoAcc['imageAccount']) }}" alt="AnhDaiDien" class="img-fluid"
                                 id="avatarInfoAcc">
                            <div class="infoNameAcc">
                                <div style="font-size: larger">Tài khoản của</div>
                                <h4 style="color: var(--color--secondary)">{{ $infoAcc['fullName'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bodyInfoDetail">
                    <div class="col-md-3 leftBody">
                        <div class="leftInfoAcc">
                            <a class="linkLeftInfoAcc" href="{{ url('/tai-khoan/thong-tin') }}">
                                <i class="fa-solid fa-user"></i> Thông tin tài khoản
                            </a>
                        </div>
                        <div class="leftInfoAcc">
                            <a href="{{ url('/tai-khoan/ve-cua-toi') }}" class="linkLeftInfoAcc">
                                <span class="bi bi-ticket-detailed"></span> Vé của tôi
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 rightBody">
                        <form action="{{ url('/tai-khoan/cap-nhat-mat-khau') }}" class="formRightBody mx-auto"
                              method="POST" style="max-width: 600px;">
                            @csrf
                            <h2 id="thongtincn" class="text-center">Cập nhật mật khẩu</h2>

                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Mật khẩu hiện tại</label>
                                <input type="password" name="oldPassword" id="oldPassword" class="form-control" required
                                       placeholder="Nhập mật khẩu hiện tại">
                            </div>

                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Mật khẩu mới</label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control" required
                                       placeholder="Nhập mật khẩu mới">
                            </div>

                            <div class="mb-3">
                                <label for="confirmNewPassword" class="form-label">Nhập lại mật khẩu mới</label>
                                <input type="password" name="confirmNewPassword" id="confirmNewPassword"
                                       class="form-control" required placeholder="Nhập lại mật khẩu mới">
                            </div>

                            <div class="text-center">
                                <a href="{{ url('/tai-khoan/thong-tin') }}" id="changeInfoAcc" class="d-block mb-2">Cập
                                    nhật thông tin tài khoản?</a>
                                <button type="submit" class="btn btn-dark w-100 p-2">Lưu thay đổi</button>
                            </div>

                            @if (session('message'))
                                <div class="form-group alert {{ session('type') }} mt-3">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>


@include('user.partials.footer')
</body>
