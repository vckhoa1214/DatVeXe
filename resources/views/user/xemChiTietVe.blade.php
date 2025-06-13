<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Vé của tôi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/xemChiTietVe.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <p><a href="/">Trang chủ</a> > <a href="/tai-khoan/ve-cua-toi/">Vé của tôi</a></p>
                        <div class="infoAcc">
                            <img src="{{ asset($infoAcc->imageAccount) }}" alt="AnhDaiDien" class="img-fluid"
                                 id="avatarInfoAcc">
                            <div class="infoNameAcc">
                                <div style="font-size: larger">Tài khoản của</div>
                                <h4 style="color: var(--color--secondary)">{{ $infoAcc->fullName }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bodyInfoDetail">
                    <div class="col-md-3 leftBody">
                        <div class="leftInfoAcc">
                            <a class="linkLeftInfoAcc" href="/tai-khoan/thong-tin">
                                <i class="fa-solid fa-user"></i> Thông tin tài khoản
                            </a>
                        </div>
                        <div class="leftInfoAcc">
                            <a href="/tai-khoan/ve-cua-toi" class="linkLeftInfoAcc">
                                <span class="bi bi-ticket-detailed"></span> Vé của tôi
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 rightBody p-5">
                        @if(!empty($veDaDat))
                            <div class="ttLienLac">
                                <div class="leftTTLienLac col-5">
                                    <div id="maVe">Mã vé #<span>T{{ $veDaDat->id ?? 'N/A' }}</span></div>
                                    <br>
                                    <div class="ttNguoiDung">
                                        <div class="fontSizeLarger"><i class="fa-solid fa-circle-info"></i> Thông tin
                                            liên lạc
                                        </div>
                                        <ul>
                                            <li>Họ tên: <span>{{ $veDaDat->fullName ?? 'Không xác định' }}</span></li>
                                            <li>Số điện thoại: <span>{{ $veDaDat->phoneNum ?? 'Không có' }}</span></li>
                                            <li>Email: <span>{{ $veDaDat->email ?? 'Không có' }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-4">
                                    <img src="{{ $veDaDat->chuyenXe->locationImage ? asset($veDaDat->chuyenXe->locationImage) : asset('default-image.png') }}"
                                         alt="{{ $veDaDat->ChuyenXe->endProvince ?? 'Chưa xác định' }}"
                                         class="img-fluid" style="height: 100%;">
                                </div>
                            </div>
                            <hr>
                            <div class="tinhTrangVe">
                                <span class="fontSizeLarger"><i
                                        class="bi bi-ticket-perforated"></i> Tình trạng vé</span>
                                <ul>
                                    <li id="liTinhTrangVe">{{ $veDaDat->statusTicket ?? 'Không rõ' }}</li>
                                </ul>
                            </div>
                            <hr>
                            @if(($veDaDat->statusTicket ?? '') !== 'Đã hủy')
                                <div class="formDelete">
                                    <form id="cancelForm-{{ $veDaDat->id }}" action="{{ route('tai-khoan.huy-ve') }}"
                                          method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $veDaDat->id ?? '' }}" name="id">
                                        <button type="button" class="btn btn-danger" style="width: 150px;"
                                                onclick="confirmCancel({{ $veDaDat->id }})">Hủy vé
                                        </button>
                                    </form>
                                </div>
                                <hr>
                            @endif

                            <div class="ttChuyenDi">
                                <span class="fontSizeLarger"><i class="fa-solid fa-location-dot"></i> Thông tin chuyến đi</span>
                                <ul>
                                    <li>Tên chuyến đi:
                                        <span>{{ $veDaDat->ChuyenXe->startProvince ?? 'Không xác định' }}
                                            <i class="fa-solid fa-arrow-right"></i>
                                            {{ $veDaDat->ChuyenXe->endProvince ?? 'Không xác định' }}
                                            </span>
                                    </li>
                                    <li>Tên nhà xe:
                                        <span>{{ $veDaDat->ChuyenXe->NhaXe->name ?? 'Không xác định' }}</span></li>
                                    <li>Ngày đặt vé:
                                        <span>{{ isset($veDaDat->createdAt) ? date('d/m/Y', strtotime($veDaDat->createdAt)) : 'Không có' }}</span>
                                    </li>
                                    <li>Ngày khởi hành:
                                        <span>{{ isset($veDaDat->ChuyenXe->startDate) ? date('d/m/Y', strtotime($veDaDat->ChuyenXe->startDate)) : 'Chưa xác định' }}</span>
                                    </li>
                                    <li>Giờ khởi hành: <span>{{ $veDaDat->ChuyenXe->startTime ?? '--:--' }}</span></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="ttDonGia">
                                <span class="fontSizeLarger"><i class="bi bi-cash"></i> Thông tin đơn giá</span>
                                <ul>
                                    <li>Giá vé:
                                        <span>{{ number_format($veDaDat->ChuyenXe->price ?? 0, 0, ',', '.') }}đ</span>
                                    </li>
                                    <li id="soVeDat">Số vé đặt: <span>{{ $veDaDat->numSeats ?? 0 }}</span></li>
                                    <hr id="horiSoTien">
                                    <li>Tổng số tiền:
                                        <span style="color:var(--color--secondary)">
                                                {{ \App\Helpers\Helper::totalPrice($veDaDat->ChuyenXe->price ?? 0, $veDaDat->numSeats ?? 0) }}đ
                                            </span>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <p class="text-danger">Không tìm thấy thông tin vé.</p>
                        @endif
                    </div>
                    @endif
                </div>
        </div>
    </div>
</main>

<!-- Highlight tình trạng vé -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let statusTicket = document.querySelector("#liTinhTrangVe");

        if (statusTicket.innerText === "Đã thanh toán") {
            statusTicket.style.color = "#00CC00";
        } else if (statusTicket.innerText === "Đã hủy") {
            statusTicket.style.color = "red";
        }

        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Thành công!",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "Lỗi!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2500
        });
        @endif
    });

    function confirmCancel(ticketId) {
        Swal.fire({
            title: "Bạn có chắc chắn muốn hủy vé?",
            text: "Sau khi hủy, bạn sẽ không thể khôi phục vé này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Có, hủy vé",
            cancelButtonText: "Không"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`cancelForm-${ticketId}`).submit();
            }
        });
    }
</script>
@include('user.partials.footer')
</body>
