<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Catholic University of Ghana's Application Portal. Apply for admission, manage your application, and access important university services seamlessly.">
    <meta name="keywords" content="Catholic University of Ghana, CUG, Ghana University, Apply Online, Admission Portal, Application, University in Ghana, Tertiary Education, Sunyani, Priority Solutions Agency">
    <meta name="author" content="Catholic University of Ghana, Priority Solutions Agency">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Catholic University of Ghana - Application Portal">
    <meta property="og:description" content="Apply for admission, manage your application, and track your status online.">
    <meta property="og:image" content="{{ asset('assets/logos/school-logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Catholic University of Ghana">

    <title>Catholic University of Ghana | Application Portal</title>

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Dashboard CSS -->
    <link id="pagestyle" href="{{asset('admin/assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('user.components.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('user.components.navbar')

        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb" class="ms-3 mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Application Portal</li>
            </ol>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            @include('user.components.application')
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2025, made with <i class="fa fa-heart"></i> by
<a href="https://cug.prioritysolutionsagency.com" class="font-weight-bold" target="_blank">Priority Admissions Office</a> under the Priority Solutions Agency contract at Catholic University of Ghana
                            for a better education.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://cug.prioritysolutionsagency.com/#about" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://cug.prioritysolutionsagency.com/#contact" class="nav-link text-muted" target="_blank">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- Core JS Files -->
    <script src="{{asset('user/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>

    <!-- Custom JS for Scrollbar -->
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
        }
    </script>

    <!-- Control Center for Material Dashboard -->
    <script src="{{asset('admin/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>
