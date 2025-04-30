<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Vé của tôi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/myTicket.css">
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
                        <p><a href="/">Trang chủ </a> > <a href="/tai-khoan/ve-cua-toi/">Vé của tôi</a></p>
                        <div class="infoAcc">
                            <img src="{{ asset($infoAcc->imageAccount) }}" alt="AnhDaiDien" class="img-fluid" id="avatarInfoAcc">
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

                    <div class="col-md-9 rightBody">
                        <div class="topRightBody">
                            <a href="/tai-khoan/ve-cua-toi"
                               class="{{ empty(request('statusTicket')) ? 'active' : '' }}">Tất cả</a>
                            <a href="/tai-khoan/ve-cua-toi?statusTicket=Vừa đặt"
                               class="{{ isset($statusVuaDat) && $statusVuaDat ? 'active' : '' }}">Vừa đặt</a>
                            <a href="/tai-khoan/ve-cua-toi?statusTicket=Đã thanh toán"
                               class="{{ isset($statusThanhToan) && $statusThanhToan ? 'active' : '' }}">Đã thanh toán</a>
                            <a href="/tai-khoan/ve-cua-toi?statusTicket=Đã hủy"
                               class="{{ (!isset($statusVuaDat) && !isset($statusThanhToan) && isset($statusDaHuy) && $statusDaHuy) ? 'active' : '' }}">Đã hủy</a>
                        </div>

                        <div class="bodyRightBody">
                            @if($veDaDat->isNotEmpty())
                                @foreach($veDaDat as $ve)
                                    <div class="infoTicket shadow-sm">
                                        <div class="maDonHang shadow-sm fontSizeLarger">
                                            Mã đơn hàng: <span class="idDonHang">T{{ $ve->id }}</span>
                                        </div>
                                        <div class="infoDetailTicket shadow-sm d-flex justify-content-between">
                                            <div class="leftInfoDetail">
                                                <img src="{{ asset($ve->chuyenXe->locationImage) }}"
                                                     alt="{{ $ve->chuyenXe->endProvince }}"/>
                                                <div class="infoChuyenDi">
                                                    <p>{{ $ve->chuyenXe->startProvince }} <i
                                                            class="fa-solid fa-arrow-right"></i> {{ $ve->chuyenXe->endProvince }}
                                                    </p>
                                                    <p>Nhà xe {{ $ve->chuyenXe->nhaXe->name }}</p>
                                                    <p><span class="bi bi-ticket-detailed"></span> {{ $ve->numSeats }}
                                                        vé</p>
                                                </div>
                                            </div>
                                            <div class="rightInFoDetail">
                                                <div class="ngayDiChuyenDi"><i
                                                        class="fa-solid fa-calendar-days"></i> {{ date('d/m/Y', strtotime($ve->chuyenXe->startDate)) }}
                                                </div>
                                                <a href="{{ route('tai-khoan.ve-chi-tiet', ['id' => $ve->id]) }}"
                                                   class="btn btn-dark">Xem chi tiết</a>
                                            </div>
                                        </div>
                                        <div class="tongSoTien fontSizeLarger">
                                            Tổng số tiền: <span class="soTien">{{ \App\Helpers\Helper::TotalPrice($ve->ChuyenXe->price, $ve->numSeats) }}đ</span>
                                        </div>
                                        {{-- Form đánh giá nhà xe --}}
                                        @php
                                            $carId = $ve->chuyenXe->nhaXe->id;
                                            $accId = auth()->user()->id;
                                            $veId = $ve->id; // ID của vé cụ thể
                                            $review = \App\Models\Review::where('carId', $carId)
                                                                         ->where('accId', $accId)
                                                                         ->where('veId', $veId) // Kiểm tra đánh giá cho vé cụ thể
                                                                         ->first();
                                        @endphp

                                        @if ($ve->statusTicket === 'Đã thanh toán')
                                            <div class="formDanhGia mt-3 p-3 border rounded">
                                                @if ($review)
                                                    <div class="mb-2">Bạn đã đánh giá nhà xe {{ $ve->chuyenXe->nhaXe->name }}:</div>

                                                    {{-- Hiển thị số sao đã đánh giá --}}
                                                    <div class="rating text-warning fs-4 mb-2 readOnly" data-ve-id="{{ $veId }}">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fa-solid fa-star star {{ $i <= $review->stars ? 'text-warning' : 'text-secondary' }}" data-value="{{ $i }}"></i>
                                                        @endfor
                                                    </div>

                                                    <button class="btn btn-outline-primary btn-edit-rating" data-ve-id="{{ $veId }}">Sửa đánh giá</button>

                                                    {{-- Form sửa đánh giá - ban đầu ẩn --}}
                                                    <form action="{{ route('danhgia.store') }}" method="POST" class="edit-form mt-3 d-none" id="form-{{ $veId }}">
                                                        @csrf
                                                        <input type="hidden" name="carId" value="{{ $carId }}">
                                                        <input type="hidden" name="accId" value="{{ $accId }}">
                                                        <input type="hidden" name="veId" value="{{ $veId }}">
                                                        <input type="hidden" name="stars" value="{{ $review->stars }}" id="rating-{{ $veId }}">

                                                        <div class="rating text-warning fs-4 mb-2 editable" data-ve-id="{{ $veId }}">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fa-solid fa-star star {{ $i <= $review->stars ? 'text-warning' : 'text-secondary' }}" data-value="{{ $i }}"></i>
                                                            @endfor
                                                        </div>

                                                        <textarea name="comment" class="form-control mb-2" placeholder="Cập nhật nhận xét..." rows="3">{{ $review->comment }}</textarea>
                                                        <button type="submit" class="btn btn-primary">Cập nhật đánh giá</button>
                                                    </form>
                                                @else
                                                    {{-- Nếu chưa đánh giá --}}
                                                    <form action="{{ route('danhgia.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="carId" value="{{ $carId }}">
                                                        <input type="hidden" name="accId" value="{{ $accId }}">
                                                        <input type="hidden" name="veId" value="{{ $veId }}"> {{-- Thêm veId vào form --}}
                                                        <input type="hidden" name="stars" value="" id="rating-{{ $veId }}">

                                                        <div class="mb-2">Đánh giá nhà xe {{ $ve->chuyenXe->nhaXe->name }}:</div>

                                                        <div class="rating text-warning fs-4 mb-2 editable" data-ve-id="{{ $veId }}">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fa-solid fa-star star" data-value="{{ $i }}"></i>
                                                            @endfor
                                                        </div>

                                                        <textarea name="comment" class="form-control mb-2" placeholder="Viết nhận xét của bạn..." rows="3"></textarea>
                                                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('/images/image-15.png') }}" alt="KhongVe" class="img-fluid"
                                             style="max-width: 200px;">
                                        <h3>Bạn chưa có chuyến nào</h3>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Phân trang --}}
                        <nav aria-label="..." style="display: flex; justify-content: center">
                            <ul class="pagination">
                                @for ($i = 1; $i <= $totalPage; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="?page={{ $i }}{{ $statusTicket ? '&statusTicket=' . $statusTicket : '' }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </nav>

                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
@include('user.partials.footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gán sự kiện click sao cho tất cả form có class 'editable'
        document.querySelectorAll('.formDanhGia .editable .star').forEach(function (star) {
            star.addEventListener('click', function () {
                const rating = parseInt(this.getAttribute('data-value'));
                const form = this.closest('form');
                const veId = this.closest('.rating').getAttribute('data-ve-id');

                // Cập nhật hiển thị sao
                const stars = form.querySelectorAll('.star');
                stars.forEach(function (s) {
                    if (parseInt(s.getAttribute('data-value')) <= rating) {
                        s.classList.add('text-warning');
                        s.classList.remove('text-secondary');
                    } else {
                        s.classList.add('text-secondary');
                        s.classList.remove('text-warning');
                    }
                });

                // Cập nhật input hidden
                form.querySelector('input[name="stars"]').value = rating;
            });
        });

        // Gán sự kiện hiển thị form sửa đánh giá
        document.querySelectorAll('.btn-edit-rating').forEach(function (button) {
            button.addEventListener('click', function () {
                const veId = button.getAttribute('data-ve-id');
                const form = document.getElementById('form-' + veId);
                form.classList.toggle('d-none');
            });
        });
    });
</script>



</body>
</html>
