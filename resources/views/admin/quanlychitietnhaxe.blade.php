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
                <li class="nav-item active">
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
                                    <form id="updateNhaXe"
                                          action="{{ route('dashboard.capnhatnhaxe', ['id' => $chitietnhaxe->id]) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <h1 class="text-center fw-bold mb-5">Nhà xe {{ $chitietnhaxe->name }}</h1>

                                            {{-- Tên nhà xe và Tài khoản quản lý --}}
                                            <div class="form-group">
                                                <h5 class="fw-semibold">Tên nhà xe và Tài khoản quản lý</h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="name">Tên nhà xe</label>
                                                        <input type="text" class="form-control" name="name"
                                                               id="inputTenNhaXe"
                                                               value="{{ $chitietnhaxe->name }}"
                                                               placeholder="Nhập tên nhà xe" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="managerId">Tài khoản nhà xe</label>
                                                        <select class="form-select form-control" name="managerId" required>
                                                            <option value="">Chọn tài khoản</option>
                                                            @foreach ($carCompanyAccounts as $account)
                                                                <option value="{{ $account->id }}"
                                                                    {{ $chitietnhaxe->managerId == $account->id ? 'selected' : '' }}>
                                                                    {{ $account->fullName }} - {{ $account->email }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Hình ảnh --}}
                                            <h5 class="fw-semibold">Hình ảnh</h5>
                                            <div class="form-group">
                                                <div class="row">
                                                    {{-- Ảnh đại diện --}}
                                                    <div class="col-md-4">
                                                        <div class="col-sm-10">
                                                            <label class="form-label">Ảnh đại diện nhà xe</label>
                                                            <input type="file" id="avatar" name="files[]" hidden>
                                                            <input type="text" name="checkavt" id="checkavt" value=""
                                                                   hidden>
                                                            {{-- Kiểm tra và hiển thị ảnh đại diện --}}
                                                            @if ($chitietnhaxe->imageCarCom)
                                                                <img src="{{ asset($chitietnhaxe->imageCarCom) }}"
                                                                     alt="ảnh đại diện" class="img-avt">
                                                            @endif
                                                            <label for="avatar" class="form-label upload">Tải ảnh
                                                                lên</label>
                                                        </div>
                                                    </div>

                                                    {{-- Hình ảnh chi tiết --}}
                                                    <div class="col-md-8">
                                                        <label class="form-label">Hình ảnh chi tiết chuyến xe</label>
                                                        <input type="file" id="anhchitiet" name="files[]" multiple>
                                                        <input type="text" name="checkjours" id="checkjours" value=""
                                                               hidden>
                                                        <div class="col-sm-12 d-flex flex-row justify-content-start">
                                                            <div class="image-detail">

                                                                {{-- Hiển thị ảnh chi tiết --}}
                                                                @foreach ($chitietnhaxe->imageJours as $image)
                                                                    <img src="{{ asset($image) }}" alt="Ảnh chi tiết"
                                                                         class="img-detail img-fluid">
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                        <label for="anhchitiet" class="form-label upload-detail ms-3">Tải
                                                            ảnh lên</label>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Phòng vé --}}
                                            <h5 class="fw-semibold">Phòng vé</h5>
                                            <div class="form-group" id="phongve">
                                                @foreach ($phongves as $phongve)
                                                    <div class="row mb-2">
                                                        <div class="col-md-4">
                                                            <div class="col-sm-10">
                                                                <label for="phoneNo">Số điện thoại</label>
                                                                <input type="text" class="form-control" name="phoneNo[]"
                                                                       value="{{ $phongve['phoneNo'] }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="col-sm-11">
                                                                <label for="address">Địa chỉ</label>
                                                                <input type="text" class="form-control" name="address[]"
                                                                       value="{{ $phongve['address'] }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="col-sm-10">
                                                                <label class="form-label">Tỉnh:</label>
                                                                <select class="form-select" name="mainRoute[]" required>
                                                                    <option value="{{ $phongve['mainRoute'] }}"
                                                                            selected>{{ $phongve['mainRoute'] }}</option>
                                                                    @foreach ($phongve['chontinh'] as $tinh)
                                                                        <option
                                                                            value="{{ $tinh['name'] }}">{{ $tinh['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            {{-- Mô tả & chính sách --}}
                                            <div class="form-group">
                                                <h5 class="fw-semibold">Giới thiệu nhà xe</h5>
                                                <textarea class="form-control" name="description" rows="5"
                                                          required>{{ $chitietnhaxe->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="fw-semibold">Chính sách nhà xe</h5>
                                                <textarea class="form-control" name="policy" rows="5"
                                                          required>{{ $chitietnhaxe->policy }}</textarea>
                                            </div>

                                            {{-- Nút --}}
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                                                <a class="btn btn-light" href="{{ url('/dashboard/quanlynhaxe/') }}">Trở
                                                    về</a>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- JS cho checkavt / checkjours --}}
                                    <script>
                                        document.getElementById('avatar').addEventListener('change', function () {
                                            document.getElementById('checkavt').value = 'avt';
                                        });

                                        document.getElementById('anhchitiet').addEventListener('change', function () {
                                            document.getElementById('checkjours').value = 'jour';
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                            ©
                            2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash.
                            All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted
                            &
                            made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>
        </div>

        <!-- partial -->
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

<script>
    function sendDataToServer() {
        if (confirm("Bạn có muốn thay đổi nhà xe này không?")) {
            document.getElementById("updateNhaXe").submit();
        }
    }

    const checkavt = document.querySelector("#checkavt");
    const checkjours = document.querySelector("#checkjours");
    const avatar = document.querySelector("#avatar");
    const imgAvt = document.querySelector(".img-avt");

    avatar.addEventListener("change", function () {
        checkavt.value = "avt";
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                imgAvt.src = reader.result;
                imgAvt.style.width = "197.8px";
                imgAvt.style.height = "197.8px";
                imgAvt.style.objectFit = "cover";
            };
            reader.readAsDataURL(file);
        }
    });

    const inputDetail = document.querySelector("#anhchitiet");
    const imageDetailContainer = document.querySelector(".image-detail");

    inputDetail.addEventListener("change", function () {
        checkjours.value = "jour";
        imageDetailContainer.innerHTML = "";

        Array.from(this.files).forEach((file) => {
            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    const img = document.createElement("img");
                    img.src = reader.result;
                    img.alt = "preview";
                    img.className = "img-detail img-fluid";
                    img.style.width = "197.8px";
                    img.style.height = "197.8px";
                    img.style.objectFit = "cover";
                    imageDetailContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

