<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png"/>
    <link rel="stylesheet" href="/css/quanlyve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/xemChiTietVe.css">
    <link rel="stylesheet" href="/css/themnhaxe.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="path-to/node_modules/dropify/dist/css/dropify.min.css">


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
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/quanlychuyenxe">
                        <i class="fa-solid fa-bus menu-icon"></i>
                        <span class="menu-title">Quản lý chuyến xe</span>
                    </a>
                </li>
                <li class="nav-item active">
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12 rightBody p-5">
                                    <form id="updateTaiKhoan"
                                          action="{{ route('dashboard.capnhattaikhoan', ['id' => $taiKhoan->id]) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <h1 class="text-center fw-bold mb-5">Tài khoản {{ $taiKhoan->fullName }}</h1>

                                        <div class="row">
                                            {{-- Họ tên --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Họ và tên</h5>
                                                <input type="text" class="form-control" name="fullName"
                                                       value="{{ $taiKhoan->fullName }}" placeholder="Nhập họ tên" required>
                                            </div>

                                            {{-- Email --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Email</h5>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ $taiKhoan->email }}" placeholder="Nhập email" required>
                                            </div>

                                            {{-- Số điện thoại --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Số điện thoại</h5>
                                                <input type="text" class="form-control" name="phoneNum"
                                                       value="{{ $taiKhoan->phoneNum }}" placeholder="Nhập số điện thoại">
                                            </div>

                                            {{-- Ngày sinh --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Ngày sinh</h5>
                                                <input type="date" class="form-control" name="dob"
                                                       value="{{ $taiKhoan->dob }}">
                                            </div>

                                            {{-- Giới tính --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Giới tính</h5>
                                                <select name="isMale" class="form-select">
                                                    <option value="1" {{ $taiKhoan->isMale == 1 ? 'selected' : '' }}>Nam</option>
                                                    <option value="0" {{ $taiKhoan->isMale == 0 ? 'selected' : '' }}>Nữ</option>
                                                </select>
                                            </div>

                                            {{-- Vai trò --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Phân quyền</h5>
                                                <select name="isAdmin" class="form-select">
                                                    <option value="1" {{ $taiKhoan->isAdmin == 1 ? 'selected' : '' }}>Quản trị</option>
                                                    <option value="0" {{ $taiKhoan->isAdmin == 0 ? 'selected' : '' }}>Người dùng</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Loại tài khoản</h5>
                                                <select name="isCarCompany" class="form-select">
                                                    <option value="1" {{ $taiKhoan->isCarCompany == 1 ? 'selected' : '' }}>Nhà xe</option>
                                                    <option value="0" {{ $taiKhoan->isCarCompany == 0 ? 'selected' : '' }}>Khách hàng</option>
                                                </select>
                                            </div>

                                            {{-- Trạng thái xác thực --}}
                                            <div class="form-group col-md-6">
                                                <h5 class="fw-semibold">Trạng thái xác thực</h5>
                                                <select name="isVerified" class="form-select">
                                                    <option value="1" {{ $taiKhoan->isVerified == 1 ? 'selected' : '' }}>Đã xác thực</option>
                                                    <option value="0" {{ $taiKhoan->isVerified == 0 ? 'selected' : '' }}>Chưa xác thực</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Nút --}}
                                        <div class="d-flex justify-content-center mt-4">
                                            <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                                            <a class="btn btn-light" href="{{ url('/dashboard/quanlytaikhoan') }}">Trở về</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                © 2021 Bootstrap admin template by BootstrapDash.
            </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Made with <i class="ti-heart text-danger ml-1"></i>
            </span>
                </div>
            </footer>
        </div>

        <!-- partial -->
    <!-- main-panel ends -->
    </div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/js/off-canvas.js"></script>
<script src="/js/hoverable-collapse.js"></script>
<script src="/js/template.js"></script>
<script src="/js/settings.js"></script>
<script src="/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
<script src="path-to/node_modules/dropify/dist/js/dropify.min.js"></script>


</body>


