<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png"/>
    <link rel="stylesheet" href="/css/dashboard.css">


<body>
<div class="container-scroller">
    @include('admin.partials.headerDashboard')
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
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
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
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
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
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
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <!-- Các mục menu chung -->
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- Menu của admin -->
                @if($infoAcc->isAdmin)
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
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/quanlytaikhoan">
                            <i class="fa-solid fa-users menu-icon"></i>
                            <span class="menu-title">Quản lý tài khoản</span>
                        </a>
                    </li>
                @endif
                <!-- Menu của nhà xe -->
                @if($infoAcc->isCarCompany)
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/quanlyve">
                            <i class="fa-solid fa-ticket menu-icon"></i>
                            <span class="menu-title">Quản lý vé đặt</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/quanlychuyenxe">
                            <i class="fa-solid fa-bus menu-icon"></i>
                            <span class="menu-title">Quản lý chuyến xe</span>
                        </a>
                    </li>

                @endif
            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <!-- Bên trái: Hình ảnh -->
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-people mt-auto">
                                <img src="{{ asset('images/dashboard/people.svg') }}" alt="people" style="width: 100%; height: auto;">
                            </div>
                        </div>
                    </div>

                    <!-- Bên phải: Thống kê -->
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- Thống kê cho nhà xe và admin -->
                            @if($infoAcc->isAdmin)
                                <!-- Tổng vé -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số lượng vé</p>
                                            <p class="fs-30">{{ isset($vedadat) ? count($vedadat) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tổng chuyến xe -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số lượng chuyến xe</p>
                                            <p class="fs-30">{{ isset($chuyenxe) ? count($chuyenxe) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tổng nhà xe -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số lượng nhà xe</p>
                                            <p class="fs-30">{{ isset($nhaxe) ? count($nhaxe) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tổng tài khoản -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-light-green">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số lượng tài khoản</p>
                                            <p class="fs-30">{{ isset($taikhoan) ? count($taikhoan) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($infoAcc->isCarCompany)
                                <!-- Tổng doanh thu cho nhà xe -->
                                <div class="col-12 mb-4">
                                    <div class="card card-light-green">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng doanh thu</p>
                                            <p class="fs-30">{{ isset($tongDoanhThu) ? number_format($tongDoanhThu, 0, ',', '.') : '0' }} đ</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tổng số vé của nhà xe -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số vé đã bán</p>
                                            <p class="fs-30">{{ isset($tongVe) ? $tongVe : 0 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tổng số chuyến xe của nhà xe -->
                                <div class="col-md-6 mb-4">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Tổng số chuyến xe</p>
                                            <p class="fs-30">{{ isset($chuyenxe) ? count($chuyenxe) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash.
                            All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                </div>
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                                href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="javascript/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="javascript/off-canvas.js"></script>
<script src="javascript/hoverable-collapse.js"></script>
<script src="javascript/template.js"></script>
<script src="javascript/settings.js"></script>
<script src="javascript/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="javascript/dashboard.js"></script>
<script src="javascript/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>
