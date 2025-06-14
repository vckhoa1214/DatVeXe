<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận vé</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link type="text/css" rel="stylesheet" href="/css/header_footer.css">
    <link type="text/css" rel="stylesheet" href="/css/xacnhan.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png"/>

</head>

<body>
@include('user.partials.header')
<main>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="steps my-4">
                <progress id="progress" value="0" max="100"></progress>
                <div class="step-item">
                    <button class="step-button text-center" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1
                    </button>
                    <div class="step-title">
                        Xác nhận
                    </div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2
                    </button>
                    <div class="step-title">
                        Thông tin khách hàng
                    </div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3
                    </button>
                    <div class="step-title">
                        Thanh toán
                    </div>
                </div>
            </div>
            @if(isset($chuyenxe))
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordionExample">
                    <div class="card">
                        <div class="card-body">
                            <div class="h3 text-center">Xác nhận vé</div>

                            <div class="row">
                                <div class="col-6 text-center">
                                    <div class="p-2 mt-3 d-inline-flex bg-footer rounded-2 color-3">
                                        <i class="fa-solid fa-calendar-days p-1"></i>
                                        <span>{{ \Carbon\Carbon::parse($chuyenxe->startDate)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="p-2 mt-3 d-inline-flex bg-footer rounded-2 color-3">
                                        <i class="fa-solid fa-calendar-days p-1"></i>
                                        <span>{{ \Carbon\Carbon::parse($chuyenxe->endDate)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-4 text-center my-3 fs-5">
                                    <span>{{ $chuyenxe->startLocation }}</span>
                                </div>
                                <div class="col-2 text-center my-3 fs-5">
                                    <span>{{ \App\Helpers\Helper::totalTime($chuyenxe->startDate, $chuyenxe->endDate, $chuyenxe->startTime, $chuyenxe->endTime) }}</span>
                                </div>
                                <div class="col-4 text-center my-3 fs-5">
                                    <span>{{ $chuyenxe->endLocation }}</span>
                                </div>
                            </div>

                            <div class="row position-relative">
                                <div class="col-6 text-center my-1 ">
                                    <i class="fa-solid fa-location-dot fa-2x color-3"></i>
                                </div>
                                <div class="col-6 text-center my-1 ">
                                    <i class="fa-solid fa-location-dot fa-2x color-4"></i>
                                </div>
                                <div class="line position-absolute top-50 start-50 translate-middle"></div>
                            </div>

                            <div class="row">
                                <div class="col-6 text-center my-3 fs-5 ">
                                    <span>{{ $chuyenxe->startTime }}</span>
                                </div>
                                <div class="col-6 text-center my-3 fs-5">
                                    <span>{{ $chuyenxe->endTime }}</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <span>Vé chặng thuộc chuyến {{ $chuyenxe->startTime }}
                                    {{ $chuyenxe->startProvince }} - {{ $chuyenxe->endProvince }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
<div class="button d-flex justify-content-around my-4">
    <a href="{{ url('/trip-info/' . $chuyenxe->id) }}">
        <div class="btn btn-lg px-5 back">&lt Quay lại</div>
    </a>
    <a href="{{ url('/search-trip/' . $chuyenxe->id . '/thanh-toan/thongtinkhachhang') }}">
        <div class="btn btn-lg px-5 continue">Tiếp tục &gt;</div>
    </a>
</div>
@include('user.partials.footer')
</body>
