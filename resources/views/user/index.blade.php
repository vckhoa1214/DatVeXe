<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font anwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- phần header  -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/header_footer.css">

    <!-- flatpickr -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/vn.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png"/>
</head>
<body>
@include('user.partials.header')

<main>
    <!-- banner  -->
    <section id="banner" class="container-fluid position-relative">
        <div class="container text-white text-start position-absolute top-50 start-50 translate-middle-x">
            <h1 class="fw-bold">
                BusTicket <br> Hân hạnh tài trợ chuyến đi của bạn
            </h1>
        </div>

        <div id="search-banner-trip" class="container position-absolute bottom-0 start-50 translate-middle-x rounded-4">
            <form action="/search-trip" method="get">
                <div class="row">
                    <div class="col-lg-4 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <input class="form-control mx-2 fs-4 p-0 select-search" name="start"
                                   style="background: #dbe2ef;" list="datalistOptions1" id="start" placeholder="Điểm đi"
                                   required>
                            <datalist id="datalistOptions1">
                                @foreach($searchStart as $start)
                                    <option value="{{ $start->startProvince }}">
                                @endforeach
                            </datalist>
                        </div>
                        <hr style="margin-right:10px;">
                    </div>

                    <div class="col-lg-4 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <input class="form-control mx-2 fs-4 p-0 select-search" name="end"
                                   style="background: #dbe2ef;" list="datalistOptions" id="end" placeholder="Điểm đến"
                                   required>
                            <datalist id="datalistOptions">
                                @foreach($searchEnd as $end)
                                    <option value="{{ $end->endProvince }}">
                                @endforeach
                            </datalist>
                        </div>
                        <hr style="margin-right:10px;">
                    </div>

                    <div class="col-lg-3 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fa-solid fa-calendar-days fa-2x"></i>
                            <input type="date" name="date" class="form-control mx-2 fs-4 p-0 select-search datetime"
                                   style="background: #dbe2ef;" id="datetimepicker" placeholder="Ngày đi" required>
                        </div>
                        <hr style="margin-right:10px;">
                    </div>

                    <div class="col-lg-1">
                        <div class="mt-3">
                            <button id="btn-search" type="submit" value="submit"
                                    class="col-12 btn btn-lg px-lg-4 px-md-5 my-sm-3 mt-md-0">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- popular trip  -->
    <section id="popular-trip" class="container my-3">
        <div id="title" class="py-4">
            <h1 class="text-4">
                Tuyến đường phổ biến
            </h1>
        </div>

        <div id="popular-trip-content">
            <div class="row gx-5">
                @foreach($chuyenxes as $chuyenxe)
                    <div class="col-lg-6">
                        <div class="card mb-3 popular-trip-item">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="/search-trip?start={{ $chuyenxe->startProvince }}&end={{ $chuyenxe->endProvince }}&date=all">
                                        <img src="/images/phobien/{{ $loop->index }}.jpg" class="img-fluid rounded-2"
                                             style="object-fit: cover; height: 9rem; width: 36rem;"
                                             alt="Tuyến đường phổ biến">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body pb-0 d-flex flex-column justify-content-between">
                                        <a href="/search-trip?start={{ $chuyenxe->startProvince }}&end={{ $chuyenxe->endProvince }}&date=all">
                                            <h3 class="card-title py-2 text-3">{{ $chuyenxe->startProvince }}
                                                - {{ $chuyenxe->endProvince }}</h3>
                                        </a>
                                        <div
                                            class="d-flex flex-row justify-content-between align-items-end mt-3 trip-info">
                                            <p class="card-text fs-5">
                                                {{\App\Helpers\Helper::checkMinMaxPrice($chuyenxe->min_price, $chuyenxe->max_price) }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- nhà xe  -->
    <section id="nha-xe" class="container my-3">
        <div id="title" class="py-4">
            <h1 class="text-4">
                Nhà xe
            </h1>
        </div>

        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($nhaxes as $index => $nhaxe)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}"
                        class="{{ $loop->first ? 'active' : '' }}"
                        aria-current="true"
                        aria-label="{{ isset($nhaxe->imageJours[0]) ? $nhaxe->imageJours[0] : 'No image' }}">
                    </li>
                @endforeach

            </ol>
            <div class="carousel-inner">
                @foreach ($nhaxes as $nhaxe)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <a href="{{ url('/nha-xe/' . $nhaxe->id) }}">
                            <img
                                src="{{ isset($nhaxe->imageJours[0]) ? asset($nhaxe->imageJours[0]) : asset('default-image.jpg') }}"
                                class="w-100 d-block"
                                alt="{{ isset($nhaxe->imageJours[0]) ? $nhaxe->imageJours[0] : 'No image' }}"
                                style="object-fit:cover; height: 550px">
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="fw-bold">Nhà xe {{ $nhaxe->name }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- bến xe khách  -->
    <section id="ben-xe" class="container my-3">
        <div id="title" class="py-4">
            <h1 class="text-4">
                Bến xe khách
            </h1>
        </div>

        <div class="row g-3">
            <div class="col-lg-3 col-md-6 my-md-2 my-sm-2">
                <div class="card" style="height: 18rem;">
                    <img src="/images/ben-xe-khach/ben-xe-mien-dong.jpg" class="img-fluid rounded"
                         style="max-width:auto; height:100%;" alt="Bến xe Miền Đông">
                    <div class="card-title card-img-overlay">
                        <h3 class="position-absolute bottom-0 start-50 translate-middle-x fw-bold text-white">Bến xe
                            Miền Đông</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 my-md-2 my-sm-2">
                <div class="card" style="height: 18rem;">
                    <img src="/images/ben-xe-khach/ben-xe-lien-tinh-da-lat.jpg" class="img-fluid rounded"
                         style="max-width:auto; height:100%;" alt="bến xe liên tỉnh đà lạt">
                    <div class="card-title card-img-overlay">
                        <h3 class="position-absolute bottom-0 start-50 translate-middle-x fw-bold text-white">Bến xe
                            liên tỉnh Đà Lạt</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 my-md-2 my-sm-2">
                <div class="card" style="height: 18rem;">
                    <img src="/images/ben-xe-khach/ben-xe-my-dinh.jpg" class="img-fluid rounded"
                         style="max-width:auto; height:100%;" alt="Bến xe Mỹ Đình">
                    <div class="card-title card-img-overlay">
                        <h3 class="position-absolute bottom-0 start-50 translate-middle-x fw-bold text-white">Bến xe Mỹ
                            Đình</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 my-md-2 my-sm-2">
                <div class="card" style="height: 18rem;">
                    <img src="/images/ben-xe-khach/ben-xe-mien-tay.jpg" class="img-fluid rounded"
                         style="max-width:auto; height:100%;" alt="Bến xe Miền Tây">
                    <div class="card-title card-img-overlay">
                        <h3 class="position-absolute bottom-0 start-50 translate-middle-x fw-bold text-white">Bến xe
                            Miền Tây</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nền tảng kết nối người dùng và nhà xe  -->
    <section id="nen-tang-ket-noi" class="container card my-4">
        <div id="title" class="py-4">
            <h1 class="text-center text-white fw-bold pt-4">
                Nền tảng kết nối người dùng và nhà xe
            </h1>
        </div>

        <div class="row g-3 my-2">
            <div class="col-lg-3 px-4">
                <img src="/images/nen-tang-ket-noi/FreeWifi.png" style="height: 15rem; width: auto;"
                     class="img-fluid rounded-2 mx-auto d-block" alt="">
                <h2 class="text-white pt-3 fw-bold fs-3 ps-3">5 nhà xe chất lượng cao</h2>
                <hr>
                <p class="text-white">10+ tuyến đường trên toàn quốc, chủ động và đa dạng lựa chọn.</p>
            </div>

            <div class="col-lg-3 px-4">
                <img src="/images/nen-tang-ket-noi/Cổng sạc đt.png" style="height: 15rem; width: auto;"
                     class="img-fluid rounded-2 mx-auto d-block" alt="">
                <h2 class="text-white pt-3 fw-bold fs-3 ps-3">Đặt vé dễ dàng </h2>
                <br>
                <hr>
                <p class="text-white">Đặt vé chỉ với 60s. Chọn xe yêu thích cực nhanh và thuận tiện.</p>
            </div>

            <div class="col-lg-3 px-4">
                <img src="/images/nen-tang-ket-noi/Giải trí.png" style="height: 15rem; width: auto;"
                     class="img-fluid rounded-2 mx-auto d-block" alt="">
                <h2 class="text-white pt-3 fw-bold fs-3 ps-3">Đảm bảo có vé </h2>
                <br>
                <hr>
                <p class="text-white">Hoàn ngay 150% nếu không có vé, mang đến hành trình trọn vẹn.</p>
            </div>

            <div class="col-lg-3 px-4">
                <img src="/images/nen-tang-ket-noi/Chất lượng.png" style="height: 15rem; width: auto;"
                     class="img-fluid rounded-2 mx-auto d-block" alt="">
                <h2 class="text-white pt-3 fw-bold fs-3 ps-3">Nhiều ưu đãi</h2>
                <br>
                <hr>
                <p class="text-white">Hàng ngàn ưu đãi cực chất độc quyền tại BusTicket.</p>
            </div>
        </div>
    </section>

    <!-- nhận xét của khách hàng  -->
    <section id="nhan-xet-kh" class="container my-3">
        <div id="title" class="py-4">
            <h1 class="text-4">
                Nhận xét của khách hàng
            </h1>
        </div>

        <div class="row justify-content-between">
            @foreach($comments as $comment)
                <div class="col-lg-4 my-3">
                    <div class="card p-3 card-nhan-xet text-white" style="height: 20rem;">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ $comment->TaiKhoan->imageAccount }}"
                                     style="height: 7rem; width: 7rem; object-fit: cover;"
                                     class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col-8 p-3">
                                <h3 class="fw-bold pt-2">{{ $comment->TaiKhoan->fullName }}</h3>
                            </div>
                        </div>
                        <p class="text-center" id="cmt">{{ $comment->comment }}</p>
                        <div
                            class="icon-start position-absolute bottom-0 start-50 translate-middle-x text-warning pb-2">
                            {!! \App\Helpers\Helper::generateStarList($comment->stars) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>

@include('user.partials.footer', ['nhaxes' => $nhaxes])

<script>
    flatpickr("#datetimepicker", {
        dateFormat: "d-m-Y",
        locale: "vn",
        disableMobile: "true",
        defaultDate: new Date(),
        minDate: new Date(),
    });
</script>
</body>
</html>
