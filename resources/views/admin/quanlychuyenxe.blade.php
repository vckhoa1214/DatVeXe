<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý chuyến xe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png"/>
    <link rel="stylesheet" href="/css/quanlyve.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
                @endif
                <!-- Menu của nhà xe -->
                @if($infoAcc->isCarCompany)
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/quanlyve">
                            <i class="fa-solid fa-ticket menu-icon"></i>
                            <span class="menu-title">Quản lý vé đặt</span>
                        </a>
                    </li>
                    <li class="nav-item active">
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
                    <div class="col grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Quản lý chuyến xe</h4>

                                <form method="GET" action="{{ route('dashboard.quanlychuyenxe') }}" class="form-inline mb-4">
                                    <div class="input-group w-50">
                                        <input
                                            type="text"
                                            name="searchTerm"
                                            class="form-control"
                                            placeholder="Tìm kiếm chuyến xe theo nhà xe, loại xe, nơi đi, nơi đến hoặc ngày khởi hành..."
                                            value="{{ old('searchTerm', $searchTerm ?? '') }}"
                                            aria-label="Tìm kiếm chuyến xe"
                                        >
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i> Tìm kiếm
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <a href="{{ route('dashboard.themchuyenxe') }}" class="bi bi-plus-square btn bg-primary" style="color: white;">
                                    Thêm chuyến xe
                                </a>

                                <div class="table-responsive mt-3">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tuyến đường</th>
                                            <th>Ngày</th>
                                            <th>Thời gian</th>
                                            <th>Tổng số ghế</th>
                                            <th>Loại ghế</th>
                                            <th>Nhà xe</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($quanly_chuyenxe as $chuyen)
                                            <tr>
                                                <td>{{ $chuyen->id }}</td>
                                                <td>{{ $chuyen->startProvince }} <i class="bi bi-arrow-right"></i> {{ $chuyen->endProvince }}</td>
                                                <td>{{ \Carbon\Carbon::parse($chuyen->startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($chuyen->endDate)->format('d/m/Y') }}</td>
                                                <td>{{ $chuyen->startTime }} - {{ $chuyen->endTime }}</td>
                                                <td>{{ $chuyen->totalNumSeats }}</td>
                                                <td>{{ $chuyen->LoaiXe->name }}</td>
                                                <td>{{ $chuyen->NhaXe->name }}</td>
                                                <td class="d-flex pt-3 px-0">
                                                    <div class="d-flex align-items-center">
                                                        <button class="bi bi-pencil-square text-primary border-0 bg-transparent"
                                                                onclick="window.location.href='{{ route('dashboard.suachuyenxe', ['id' => $chuyen->id]) }}'">
                                                        </button>
                                                        <form action="{{ route('dashboard.featureChuyenxe') }}" method="POST" onsubmit="return submitForm(this);" class="m-0">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $chuyen->id }},-">
                                                            <button type="submit" class="bi bi-trash text-danger mx-2 border-0 bg-transparent"></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Phân trang -->
                                <nav aria-label="Page navigation" class="d-flex justify-content-center mt-3">
                                    <ul class="pagination">
                                        @for ($i = 1; $i <= $totalPage; $i++)
                                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                <a
                                                    class="page-link"
                                                    href="{{ route('dashboard.quanlychuyenxe', array_merge(request()->except('page'), ['page' => $i])) }}"
                                                >
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                Copyright © 2021. Premium
                <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.
            </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i>
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

<script>
    function redirectTo(id) {
        window.location.href = "/dashboard/quanlychuyenxe/chinhsua/" + id;
    }


    function redirectToEditMulti(id) {
        window.location.href = "/dashboard/quanlychuyenxe/editMultiplyChuyenXe/" + id;
    }

    function submitForm(form) {
        swal({
            title: "Bạn có chắc chắn muốn xóa chuyến này không ?",
            text: "Bạn sẽ không thể khôi phục lại chuyến xe này !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();

                }
            });
        return false;
    }

    function multiByID(form) {
        swal({
            title: "Chỉnh sửa chi tiết chuyến xe nhân bản?",
            icon: "warning",
            buttons: true,
        })
            .then((isOk) => {
                if (!isOk) {
                    swal({
                        title: "Thêm chuyến xe thành công",
                        icon: "success",
                        buttons: "Xác nhận",
                    })
                        .then((formSubmitted) => {
                            form.submit();
                        })
                } else if (isOk) {
                    let tempID = form.id.value.split(",")[0];
                    redirectToEditMulti(tempID);
                }
            })
        return false;
    }
</script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>
