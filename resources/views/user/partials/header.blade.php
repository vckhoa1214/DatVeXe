<header>
    <!-- place navbar here -->
    <div id="preloader"></div>
    <nav class="navbar navbar-expand-md bg-header navbar-dark py-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="" width="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item text-white">
                        <a class="nav-link text-center px-4" href="{{ url('/nha-xe') }}">
                            <i class="bi bi-truck icon d-inline"></i>
                            Nhà xe
                        </a>
                    </li>
                    <li class="nav-item text-white">
                        <a class="nav-link text-center ml-2" href="{{ url('/about') }}">
                            <i class="bi bi-telephone icon"></i>
                            Về chúng tôi
                        </a>
                    </li>

                    @auth
                        <!-- Nếu đã đăng nhập -->
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link text-center" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                                <div class="taikhoan">
                                    {{ Auth::user()->fullName }}
                                    <i class="bi bi-caret-down-fill"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/tai-khoan/thong-tin') }}"><i class="bi bi-person-circle"></i>
                                        Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="{{ url('/tai-khoan/ve-cua-toi') }}"><i
                                            class="bi bi-ticket-perforated"></i>
                                        Vé của tôi</a></li>
                                <li>
                                    <form action="{{ url('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="bi bi-box-arrow-left"></i> Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-items text-center text-white hamburger">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed mx-auto" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        <div class="user">
                                            <i class="bi bi-person"></i>
                                            <div class="taikhoan text-center">
                                                {{ Auth::user()->fullName }}
                                                <i class="bi bi-caret-down-fill"></i>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse mt-3" aria-labelledby="headingThree"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="drop">
                                            <div class="item"><a class="" href="{{ url('/tai-khoan/thong-tin') }}"><i
                                                        class="bi bi-person-circle"></i> Thông tin tài khoản</a>
                                            </div>
                                            <div class="item"><a class="mt-3" href="{{ url('/tai-khoan/ve-cua-toi') }}"><i
                                                        class="bi bi-ticket-perforated"></i> Vé của tôi</a>
                                            </div>
                                            <div class="item">
                                                <form action="{{ url('logout') }}" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item text-danger mt-3 mb-3" type="submit">
                                                        <i class="bi bi-box-arrow-left"></i> Đăng xuất
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endauth

                    @guest
                        <!-- Nếu chưa đăng nhập -->
                        <li class="nav-item text-white">
                            <a class="nav-link text-center mx-2" href="{{ route('login') }}">
                                <i class="bi bi-person icon"></i>
                                Đăng nhập
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <style>
        #preloader {
            height: 100vh;
            width: 100vw;
            background: #fff url("{{ asset('images/loading/bus.gif') }}") no-repeat center center;
            position: fixed;
            z-index: 100;
        }
    </style>
    <script>
        window.addEventListener('load', function () {
            const preloader = document.querySelector('#preloader');
            preloader.style.display = 'none';
        })
    </script>
</header>
