<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/xacnhan.css">
    <link rel="stylesheet" href="/css/thongtinkhachhang.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="/images/favicon_user.png"/>
</head>

<body>
@include('user.partials.header')

<main>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="steps my-4">
                <progress id="progress" value="50" max="100"></progress>
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
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3
                    </button>
                    <div class="step-title">Thanh toán</div>
                </div>
            </div>

            <div id="collapseTwo" class="collapse show form1" aria-labelledby="headingTwo"
                 data-parent="#accordionExample">
                <div class="card bg-form mx-auto" style="width: 50%;">
                    <div class="card-body">
                        <form action="{{ url('/search-trip/' . $id . '/thanh-toan/thanhtoan') }}" method="GET">
                            <div class="h3 text-center">Thông tin khách hàng</div>

                            <div class="mb-3 form-group">
                                <label for="InputName" class="form-label">Họ và tên khách hàng <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Họ và tên" class="form-control" id="InputName"
                                       name="name" required value="{{ $taikhoan->fullName }}">
                            </div>

                            <div class="mb-3">
                                <label for="InputPhone" class="form-label">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập số điện thoại" class="form-control"
                                       id="InputPhone" name="phone" required value="{{ $taikhoan->phoneNum }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" placeholder="Nhập Email" class="form-control"
                                       id="exampleInputEmail1" name="email" required value="{{ $taikhoan->email }}">
                            </div>

                            <div class="mb-3 ticket">
                                <label for="exampleInputTicket" class="form-label">Số lượng vé <span
                                        class="text-danger">*</span></label>
                                <div class="wrapper">
                                    <input type="number" class="numSeat" value="{{ $chuyenxe->numSeats }}" hidden>
                                    <span class="minus"><i class="bi bi-dash"></i></span>
                                    <input type="number" class="ticket" value="1" min="1" name="ticket" readonly/>
                                    <span class="plus"><i class="bi bi-plus"></i></span>
                                </div>
                            </div>

                            <div class="mb-3 col-6">
                                <span>Phương thức thanh toán</span>
                                <div class="d-flex align-items-center">
                                    <input type="radio" id="paypal" name="card" value="Paypal" class="me-2" required>
                                    <label for="paypal" class="mt-2">
                                        <i class="bi bi-paypal"></i>
                                        <span>Paypal</span>
                                    </label>
                                </div>
                                <div class="d-flex align-items-center">
                                    <input type="radio" id="live" name="card" value="trực tiếp" required>
                                    <label for="live" class="ms-2 mt-2">
                                        <i class="bi bi-bus-front-fill text-primary"></i>
                                        <span>Thanh toán trực tiếp</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">Chấp nhận
                                    <a class="text-danger" href="#dieukhoan">điều khoản đặt vé </a> của Ticket4T</label>
                            </div>

                            <div class="button d-flex justify-content-around my-4">
                                <a href="{{ url('/search-trip/' . $id . '/thanh-toan/xacnhan') }}">
                                    <div class="btn btn-lg px-md-5 px-3 back">&lt Quay lại</div>
                                </a>
                                <button class="btn btn-lg px-md-5 px-3 continue" type="submit">Tiếp tục &gt;</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4 mx-auto mb-3 col-6" id="dieukhoan">
                    <div class="h3 text-center mt-3">Điều khoản và lưu ý</div>
                    <div class="card-body">
                        <p><span class="text-danger">(*)</span> Quý khách vui lòng mang email có chứa mã vé đến văn
                            phòng để đổi vé lên xe trước giờ xuất bến ít nhất 60 phút để chúng tôi trung chuyển.</p>
                        <p><span class="text-danger">(*)</span> Thông tin hành khách phải chính xác, nếu không sẽ không
                            thể lên xe hoặc hủy/đổi vé.</p>
                        <p><span class="text-danger">(*)</span> Quý khách không được đổi/trả vé vào các ngày Lễ Tết
                            (ngày thường quý khách được quyền chuyển đổi hoặc hủy vé một lần duy nhất trước giờ xe chạy
                            24 giờ), phí hủy vé 10%.</p>
                        <p><span class="text-danger">(*)</span> Nếu quý khách có nhu cầu trung chuyển, vui lòng liên hệ
                            số điện thoại 034 567 890 trước khi đặt vé. Chúng tôi không đón/trung chuyển tại những điểm
                            xe trung chuyển không thể tới được.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let inc = document.querySelector(".plus");
    let dec = document.querySelector(".minus");
    let ticket = document.querySelector("input.ticket");
    let num = document.querySelector(".numSeat");
    inc.addEventListener("click", function () {
        if (parseInt(num.value) > parseInt(ticket.value)) {
            ticket.value = parseInt(ticket.value) + 1;
        }
    })
    dec.addEventListener("click", function () {
        if (parseInt(ticket.value) > 1) {
            ticket.value = parseInt(ticket.value) - 1;
        }

    })

</script>

@include('user.partials.footer')
</body>
