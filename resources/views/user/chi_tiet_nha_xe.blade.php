<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà xe Hà My</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/chi_tiet_nha_xe.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png" />

</head>

@extends('layouts.app')

@section('title', 'Nhà xe ' . $chiTietNhaXe->name)

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-xl" style="overflow: auto;">
                <div class="thumbnail">
                    <div class="page-header container">
                        <h1 class="page-title primary-title-50">Nhà xe {{ $chiTietNhaXe->name }}</h1>
                    </div>
                    <img src="{{ asset($chiTietNhaXe->imageCarCom) }}" alt="Nhà xe {{ $chiTietNhaXe->name }}"
                         class="img-fluid rounded-top-bottom-1" style="width: 100%; height: 85.9vh;">
                </div>

                <div class="accordion details" id="nhaxe-accordion">
                    <div class="accordion-item intro">
                        <div class="accordion-header intro-title" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                    style="background-color: var(--color--quaternary);">
                                <h3>Giới thiệu chi tiết về nhà xe {{ $chiTietNhaXe->name }}</h3>
                            </button>
                        </div>
                        @php
                            $desc = preg_replace('/\\\\n/', "\n", $chiTietNhaXe->description);
                        @endphp

                        <div id="collapseOne" class="accordion-collapse collapse intro-details"
                             data-bs-parent="#nhaxe-accordion">
                            <div class="accordion-body">
                                <p>{!! nl2br(e($desc)) !!}</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item chi-nhanh">
                        <div class="accordion-header chi-nhanh-title">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                    style="background-color: var(--color--quaternary);">
                                <h3>Địa chỉ và thông tin liên hệ đặt vé xe</h3>
                            </button>
                        </div>
                        <div id="collapseThree" class="accordion-collapse collapse chi-nhanh-details"
                             data-bs-parent="#nhaxe-accordion">
                            <div class="accordion-body">
                                @foreach($chiTietNhaXe->mainRoute as $index => $route)
                                    <div>
                                        <h3>Chi nhánh {{ $route }}</h3>
                                        <p>Văn phòng bán vé {{ $route }}: {{ $chiTietNhaXe->address[$index] ?? 'Không có dữ liệu' }}</p>
                                        <div class="sdt-container">
                                            <p>Số điện thoại liên hệ đặt vé/gửi hàng:</p>
                                            <p class="bold-secondary">{{ $chiTietNhaXe->phoneNo[$index] ?? 'Không có dữ liệu' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
