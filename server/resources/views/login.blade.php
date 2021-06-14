<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('storage/assets/css/shared/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('storage/assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">

                            @if(isset($error))
                            <div class="btn btn-danger">
                                {{$error}}
                            </div>
                            @endif

                            <form action="./login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="label">Tên tài khoản</label>
                                    <div class="input-group">
                                        <input type="text" name="user_name" class="form-control" placeholder="Nhập tên tài khoản">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Mật khẩu</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Đăng nhập</button>
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-block btn-warning submit-btn">Quên mật khẩu</a>
                                </div>

                            </form>
                        </div>
                        <ul class="auth-footer">
                            <li>
                                <a href="#">Conditions</a>
                            </li>
                            <li>
                                <a href="#">Hỗ trợ</a>
                            </li>
                            <li>
                                <a href="#">Điều khoản</a>
                            </li>
                        </ul>
                        <p class="footer-text text-center">Copyright © 2020 Bootstrapdash. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('storage/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('storage/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('storage/assets/js/shared/off-canvas.js')}}"></script>
    <!-- endinject -->
    <script src="{{asset('storage/assets/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>
</body>

</html>
