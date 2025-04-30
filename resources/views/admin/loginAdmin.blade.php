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
    <link rel="shortcut icon" href="/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="/images/logo.svg" alt="logo">
                        </div>
                        <!-- Form start -->
                        <form class="pt-3 text-center" method="POST" action="{{ url('/dashboard/login') }}">
                            @csrf
                            @if(session('message'))
                                <br>
                                <div class="form-group alert {{ session('type') }}">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                       placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                       name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg"
                                       id="exampleInputPassword1" placeholder="Password" name="password" required>
                            </div>
                            <input type="hidden" name="returnURL" value="{{ session('returnURL', url('/dashboard')) }}">
                            <button class="mt-3 btn btn-success"
                                    style="background-color:rgb(63, 114, 175); border-color:rgb(63, 114, 175); width:150px">
                                Login
                            </button>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="/vendors/js/vendor.bundle.base.js"></script>
<script src="/javascript/off-canvas.js"></script>
<script src="/javascript/hoverable-collapse.js"></script>
<script src="/javascript/template.js"></script>
<script src="/javascript/settings.js"></script>
<script src="/javascript/todolist.js"></script>
</body>
