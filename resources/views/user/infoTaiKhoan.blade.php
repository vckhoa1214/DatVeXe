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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                        <p><a href="/">Trang chủ </a> > <a href="{{ route('tai-khoan.show-info') }}">Thông tin tài
                                khoản</a></p>
                        <div class="infoAcc">
                            <img src="{{ asset($infoAcc->imageAccount) }}" alt="AnhDaiDien" class="img-fluid"
                                 id="avatarInfoAcc">
                            <div class="infoNameAcc">
                                <div style="font-size:larger">Tài khoản của</div>
                                <h4 style="color: var(--color--secondary)">{{ $infoAcc->fullName }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bodyInfoDetail">
                    <div class="col-md-3 leftBody">
                        <div class="leftInfoAcc">
                            <a class="linkLeftInfoAcc" href="{{ route('tai-khoan.show-info') }}">
                                <i class="fa-solid fa-user"></i> Thông tin tài khoản
                            </a>
                        </div>
                        <div class="leftInfoAcc">
                            <a href="{{ route('tai-khoan.ve-cua-toi') }}" class="linkLeftInfoAcc">
                                <span class="bi bi-ticket-detailed"></span> Vé của tôi
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 rightBody">
                        <form action="{{ route('tai-khoan.update-info') }}" method="POST" enctype="multipart/form-data"
                              class="formRightBody">
                            @csrf
                            <h2 id="thongtincn">Thông tin cá nhân</h2>
                            <div class="topRightBody">
                                <div class="leftOfTopRightBody">
                                    <img src="{{ asset($infoAcc->imageAccount ?? 'images/avatar/default-avatar.png') }}"
                                         alt="AnhDaiDien" class="img-fluid" id="avatarInfo">
                                    <div class="changeAvatar">
                                        <label for="avatar"><i class="bi bi-camera-fill"></i></label>
                                        <input type="file" name="image" id="avatar" style="display: none"
                                               accept="image/*">
                                    </div>
                                </div>
                                <div class="rightOfTopRightBody">
                                    <div class="form-group">
                                        <label for="fullName">Họ và tên</label>
                                        <input type="text" name="fullName" id="fullName"
                                               value="{{ $infoAcc->fullName }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ $infoAcc->email }}"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNum">Số điện thoại</label>
                                        <input type="text" name="phoneNum" id="phoneNum"
                                               value="{{ $infoAcc->phoneNum }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="botRightBody">
                                <div class="form-group">
                                    <label for="dob">Ngày Sinh</label>
                                    <input type="date" name="dob" id="date-picker" value="{{ $infoAcc->dob }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Giới tính</label>
                                    <div class="rightGioiTinhForm">
                                        <div class="radioNam">
                                            <input type="radio" name="sex" id="Nam"
                                                   value="Nam" {{ $infoAcc->isMale ? 'checked' : '' }}>
                                            <label for="Nam">Nam</label>
                                        </div>
                                        <div class="radioNu">
                                            <input type="radio" name="sex" id="Nu"
                                                   value="Nữ" {{ !$infoAcc->isMale ? 'checked' : '' }}>
                                            <label for="Nu">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('tai-khoan.show-update-password') }}" id="changePassword">Thay đổi mật
                                    khẩu?</a>
                            </div>
                            @if(session('message'))
                                <div class="form-group alert {{ session('type') }}">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <button class="btn btn-dark fw-bold mt-3">Lưu thay đổi</button>
                        </form>

                    </div>
                </div>
            @endif
        </div>
    </div>
</main>

<script>
    document.getElementById("avatar").addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("avatarInfo").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@include('user.partials.footer')
</body>
