<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Thông tin chuyến xe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- font anwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- phần header  -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="/css/trip-info.css">
    <link type="text/css" rel="stylesheet" href="/css/header_footer.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>
</head>

<body>
@include('user.partials.header')
<main>
    <section class="container">
        <div class="row py-4 d-flex">
            <h1 class="fw-bold color-4 col-lg-8 col-sm-12">
                {{ $trip->startProvince }} - {{ $trip->endProvince }} ({{ $trip->nhaXe->name }})
            </h1>
            <div class="d-inline-flex p-2 col-lg-4 justify-content-lg-end col-sm-12 justify-content-sm-center">
                <p class="p-2 mx-2 border border-dark color-3 fs-5">Số lượng ghế: {{ $trip->totalNumSeats }}</p>
                <p class="p-2 border border-dark color-3 fs-5">Loại xe: {{ $trip->loaiXe->name }}</p>
            </div>
        </div>

        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $imageJours = is_string($trip->nhaXe->imageJours) ? json_decode($trip->nhaXe->imageJours, true) : $trip->nhaXe->imageJours;
                @endphp

                @foreach($imageJours as $index => $image)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"
                        aria-current="true" aria-label="{{ $image }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" height="300" role="listbox">
                @php
                    $imageJours = is_string($trip->nhaXe->imageJours) ? json_decode($trip->nhaXe->imageJours, true) : $trip->nhaXe->imageJours;
                @endphp

                @foreach($imageJours as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset($image) }}" height="600" class="w-100 d-block" alt="{{ $image }}">
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

        <div class="row">
            <div class="col-6 text-center">
                <div class="p-3 mt-3 d-inline-flex bg-footer rounded-2 fs-4 color-3">
                    <i class="fa-solid fa-calendar-days p-1"></i>
                    <span>{{ $trip->startDate }}</span>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="p-3 mt-3 d-inline-flex bg-footer rounded-2 fs-4 color-3">
                    <i class="fa-solid fa-calendar-days p-1"></i>
                    <span>{{ $trip->endDate }}</span>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-4 text-center my-3 fs-5">
                <span>{{ $trip->startLocation }}</span>
            </div>
            <div class="col-2 text-center my-3 fs-5">
                <span>{{ \App\Helpers\Helper::totalTime($trip->startDate, $trip->endDate, $trip->startTime, $trip->endTime) }}</span>
            </div>
            <div class="col-4 text-center my-3 fs-5">
                <span>{{ $trip->endLocation }}</span>
            </div>
        </div>

        <div class="row position-relative">
            <div class="col-6 text-center my-1">
                <i class="fa-solid fa-location-dot fa-2x color-3"></i>
            </div>
            <div class="col-6 text-center my-1">
                <i class="fa-solid fa-location-dot fa-2x color-4"></i>
            </div>
            <hr class="line position-absolute top-50 start-50 translate-middle">
        </div>

        <div class="row">
            <div class="col-6 text-center my-3 fs-5">
                <span>{{ $trip->startTime }}</span>
            </div>
            <div class="col-6 text-center my-3 fs-5">
                <span>{{ $trip->endTime }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-6 text-center">
                <div class="p-3 mt-3 d-inline-flex border-color-4 rounded-2 fs-4 color-3 fw-bold">
                    <span>{{ number_format($trip->price, 0, ',', '.') }} đ</span>
                </div>
            </div>
            <div class="col-6 text-center">
                <a href="{{ url('/search-trip/' . $trip->id . '/thanh-toan/xacnhan') }}">
                    <div class="p-3 px-5 mt-3 d-inline-flex bg-color-4 rounded-2 fs-3 fw-bold text-white btn btn-dark">
                        <i class="fa-solid fa-ticket my-2 px-3"></i>
                        <span>Đặt vé</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="container my-5 px-5 py-3 bg-color-4">
        <h3 class="my-3 fw-bold text-white">Chính sách của chuyến xe</h3>
        <ul class="text-white fs-5">
            @foreach(explode("\n", str_replace('\\n', "\n", $trip->nhaXe->policy)) as $line)
                <li>{{ $line }}</li>
            @endforeach
        </ul>
    </section>
</main>

@include('user.partials.footer')

</body>
