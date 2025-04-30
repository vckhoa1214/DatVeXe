<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/xacnhan.css">
    <link rel="stylesheet" href="/css/thanhtoan.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>
</head>

<body>
@include('user.partials.header')

<main>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="steps my-4">
                <progress id="progress" value=100 max=100></progress>
                <div class="step-item">
                    <button class="step-button text-center" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1
                    </button>
                    <div class="step-title">Xác nhận</div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        2
                    </button>
                    <div class="step-title">Thông tin khách hàng</div>
                </div>
                <div class="step-item">
                    <button class="step-button text-center collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        3
                    </button>
                    <div class="step-title">Thanh toán</div>
                </div>
            </div>

            <div id="collapseThree" class="collapse show mb-4" aria-labelledby="headingThree"
                 data-parent="#accordionExample">
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="h3 text-center">Thông tin vé</div>
                                    <div class="d-block mx-5 fs-5">
                                        <hr>

                                        @if ($payment && strtolower($type) === 'paypal')
                                            <form action="{{ route('paypal.payment', ['id' => $chuyenxe->id]) }}"
                                                  method="POST">
                                                @elseif ($payment && strtolower($type) === 'cod')
                                                    <form action="{{ route('cod.payment', ['id' => $chuyenxe->id]) }}"
                                                          method="POST">
                                                        @else
                                                            {{-- fallback nếu không xác định được --}}
                                                            <form
                                                                action="{{ route('thanhtoan.post', ['id' => $chuyenxe->id]) }}"
                                                                method="POST">
                                                                @endif
                                                                @csrf
                                                                <div
                                                                    class="name d-flex justify-content-between align-items-center">
                                                                    <span>Họ và tên: </span>
                                                                    <input type="text" name="name" value="{{ $name }}"
                                                                           class="fw-bolder" readonly/>
                                                                </div>

                                                                <div
                                                                    class="phone d-flex justify-content-between align-items-center mt-2">
                                                                    <span>Số điện thoại: </span>
                                                                    <input type="text" name="phone" value="{{ $phone }}"
                                                                           class="fw-bolder" readonly/>
                                                                </div>

                                                                <div
                                                                    class="email d-flex justify-content-between align-items-center mt-2">
                                                                    <span>Email: </span>
                                                                    <input type="text" name="email" value="{{ $email }}"
                                                                           class="fw-bolder" readonly/>
                                                                </div>
                                                                <br>

                                                                @if ($chuyenxe)
                                                                    <div
                                                                        class="brand d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Hãng xe: </span>
                                                                        <input type="text" name="nhaxe"
                                                                               value="{{ $chuyenxe->NhaXe->name ?? '' }}"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="route d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Tuyến đường: </span>
                                                                        <input type="text" name="tuyenduong"
                                                                               value="{{ $chuyenxe->startProvince }} - {{ $chuyenxe->endProvince }}"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="departure d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Điểm đi: </span>
                                                                        <input type="text" name="batdau"
                                                                               value="{{ $chuyenxe->startLocation }}"
                                                                               class="fw-bolder"/>
                                                                    </div>

                                                                    <div
                                                                        class="time d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Thời gian: </span>
                                                                        <input type="text" name="time"
                                                                               value="{{ $chuyenxe->startTime }}"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="price d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Giá vé: </span>
                                                                        <input type="text" name="price"
                                                                               value="{{ number_format($chuyenxe->price) }} VNĐ"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="quantity d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Số lượng vé: </span>
                                                                        <input type="text" name="ticket"
                                                                               value="{{ $ticket }}" class="fw-bolder"
                                                                               readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="quantity d-flex justify-content-between align-items-center mt-2">
                                                                        <span>Hình thức thanh toán: </span>
                                                                        <input type="text" name="payment"
                                                                               value="Thanh toán {{ $type }}"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>

                                                                    <div
                                                                        class="total d-flex justify-content-between align-items-center h3 mt-4 fw-bolder">
                                                                        <span>Tổng tiền: </span>
                                                                        <input type="text" name="totalprice"
                                                                               value="{{ number_format($chuyenxe->price * $ticket) }} VNĐ"
                                                                               class="fw-bolder" readonly/>
                                                                    </div>
                                                                @endif

                                                                <div class="button d-flex justify-content-around my-4">
                                                                    <a href="{{ url('/search-trip/' . $chuyenxe->id . '/thanh-toan/thongtinkhachhang') }}">
                                                                        <div class="btn btn-lg px-5 back">&lt Quay lại
                                                                        </div>
                                                                    </a>
                                                                    @if ($payment)
                                                                        <button type="submit"
                                                                                class="btn btn-success btn-lg px-5 continue">
                                                                            Thanh toán
                                                                        </button>
                                                                    @else
                                                                        <button type="submit"
                                                                                class="btn btn-success btn-lg px-5 continue">
                                                                            Đặt vé
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </form>
                                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>

@include('user.partials.footer')
</body>
