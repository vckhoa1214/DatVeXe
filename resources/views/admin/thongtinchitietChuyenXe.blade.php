<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa chuyến xe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png"/>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- flatpickr -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/vn.js"></script>
</head>

<body>
<div class="container-scroller">
    <!-- partial:/partials/_navbar.html -->
    @include('admin.partials.headerDashboard')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:/partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>
                    Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                       aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                       aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                     aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small
                            class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                            All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="/images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="/images/faces/face2.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="/images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="/images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="/images/faces/face5.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="/images/faces/face6.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:/partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/quanlyve">
                        <i class="fa-solid fa-ticket menu-icon"></i>
                        <span class="menu-title">Quản lý vé đặt</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/quanlynhaxe">
                        <i class="fa-solid fa-car menu-icon"></i>
                        <span class="menu-title">Quản lý nhà xe</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard/quanlychuyenxe">
                        <i class="fa-solid fa-bus menu-icon"></i>
                        <span class="menu-title">Quản lý chuyến xe</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/quanlytaikhoan">
                        <i class="fa-solid fa-users menu-icon"></i>
                        <span class="menu-title">Quản lý tài khoản</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chỉnh sửa chuyến xe</h4>
                                <form id="updateChuyenXe"
                                      action="{{ route('dashboard.capnhatchuyenxe', $details->id) }}" method="POST"
                                      class="form-sample d-flex justify-content-center flex-column">
                                    @csrf
                                    {{-- Tuyến đường --}}
                                    <p class="card-description font-weight-bold"><i class="fa-solid fa-road"></i> Tuyến
                                        đường</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-signs-post"></i> Tỉnh bắt đầu</label>
                                                    <select name="startProvince" class="form-control">
                                                        <option selected>{{ $details->startProvince }}</option>
                                                        @foreach($startProvinceList as $prov)
                                                            <option>{{ $prov['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-map-location-dot"></i> Điểm đón</label>
                                                    <input type="text" name="startLocation" class="form-control"
                                                           value="{{ $details->startLocation }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Tỉnh kết thúc --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-signs-post"></i> Tỉnh kết thúc</label>
                                                    <select name="endProvince" class="form-control">
                                                        <option selected>{{ $details->endProvince }}</option>
                                                        @foreach($endProvinceList as $prov)
                                                            <option>{{ $prov['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-map-location-dot"></i> Điểm trả
                                                        khách</label>
                                                    <input type="text" name="endLocation" class="form-control"
                                                           value="{{ $details->endLocation }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Thời gian --}}
                                    <hr>
                                    <p class="card-description font-weight-bold"><i class="fa-solid fa-clock"></i> Thời
                                        gian</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-calendar-check"></i> Ngày bắt
                                                        đầu</label>
                                                    <input type="date" id="startDate" name="startDate"
                                                           class="form-control" value="{{ $details->startDate }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-hourglass-start"></i> Thời gian bắt đầu</label>
                                                    <input type="time" name="startTime" class="form-control"
                                                           value="{{ $details->startTime }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-calendar-xmark"></i> Ngày kết
                                                        thúc</label>
                                                    <input type="date" id="endDate" name="endDate" class="form-control"
                                                           value="{{ $details->endDate }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-9">
                                                    <label><i class="fa-solid fa-hourglass-end"></i> Thời gian kết thúc</label>
                                                    <input type="time" name="endTime" class="form-control"
                                                           value="{{ $details->endTime }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Nhà xe và Loại xe --}}
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-10">
                                                    <label><i class="fa-solid fa-bus"></i> Nhà xe</label>
                                                    <select name="nhaxe" class="form-control">
                                                        <option selected>{{ $details->nhaxe->name }}</option>
                                                        @foreach($danhsachNhaXe as $nhaxe)
                                                            <option>{{ $nhaxe->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-10">
                                                    <label><i class="fa-solid fa-van-shuttle"></i> Loại xe</label>
                                                    <select name="loaixe" class="form-control">
                                                        <option selected>{{ $details->loaixe->name }}</option>
                                                        @foreach($danhsachLoaiXe as $lx)
                                                            <option>{{ $lx->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Số ghế và giá vé --}}
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-10">
                                                    <label><i class="fas fa-chair"></i> Số ghế ngồi</label>
                                                    <input type="text" name="totalNumSeats" class="form-control"
                                                           value="{{ $details->totalNumSeats }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-10">
                                                    <label><i class="fa-solid fa-dollar-sign"></i> Giá vé</label>
                                                    <input type="text" name="price" class="form-control"
                                                           value="{{ $details->price }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center p-3">
                                        <button type="button" onclick="sendDataToServer()" class="btn btn-success mx-2">
                                            Xác nhận
                                        </button>
                                        <a href="{{ route('dashboard.quanlychuyenxe') }}" class="btn btn-danger mx-2">Trở
                                            về</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash.
                            All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="/vendors/select2/select2.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/js/off-canvas.js"></script>
<script src="/js/hoverable-collapse.js"></script>
<script src="/js/template.js"></script>
<script src="/js/settings.js"></script>
<script src="/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="/js/file-upload.js"></script>
<script src="/js/typeahead.js"></script>
<script src="/js/select2.js"></script>
<script>
    function checkValidStartEndDate() {
        let start = Date.parse(document.getElementById("startDate").value);
        let end = Date.parse(document.getElementById("endDate").value);

        if (start > end) {
            Swal.fire({
                icon: 'warning',
                title: 'Ngày không hợp lệ!',
                text: 'Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc',
            });
            return false;
        }
        return true;
    }

    function sendDataToServer() {
        if (!checkValidStartEndDate()) return;

        Swal.fire({
            title: 'Xác nhận thay đổi?',
            text: "Bạn có chắc chắn muốn cập nhật chuyến xe này?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("updateChuyenXe").submit();
            }
        });
    }

    function redirectTo() {
        window.location.href = "/dashboard/quanlychuyenxe/";
    }
</script>

<script>
    flatpickr("#datetimepicker", {
        dateFormat: "d-m-Y",
        locale: "vn",
        disableMobile: "true",
        // set today date
        defaultDate: new Date()

    });

</script>
<!-- End custom js for this page-->
</body>
