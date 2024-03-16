<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login Page
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">

    <main class="mt-0 main-content">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="mx-auto col-lg-4 col-md-8 col-12">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="p-0 mx-3 card-header position-relative mt-n4 z-index-2">
                                <div class="py-3 bg-gradient-primary shadow-primary border-radius-lg pe-1">
                                    <h4 class="mt-2 mb-0 text-center text-white font-weight-bolder">Sign in</h4>
                                    <div class="mt-3 row">
                                        <div class="text-center col-2 ms-auto">
                                            <a class="px-3 btn btn-link" href="javascript:;">
                                                <i class="text-lg text-white fa fa-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="px-1 text-center col-2">
                                            <a class="px-3 btn btn-link" href="javascript:;">
                                                <i class="text-lg text-white fa fa-github"></i>
                                            </a>
                                        </div>
                                        <div class="text-center col-2 me-auto">
                                            <a class="px-3 btn btn-link" href="javascript:;">
                                                <i class="text-lg text-white fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" role="form" class="text-start" method="POST">
                                    @csrf
                                    <div class="my-3 input-group input-group-outline">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control">
                                    </div>
                                    <div class="mb-3 input-group input-group-outline">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                    <div class="mb-3 form-check form-switch d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="mb-0 form-check-label ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="my-4 mb-2 btn bg-gradient-primary w-100">Sign
                                            in</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js') }}?v=3.1.0"></script>
</body>

</html>
