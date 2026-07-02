<!DOCTYPE html>
<html lang="id">

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>{{ $setting->app_name }} | {{ $title }}</title>
<meta content="{{ $setting->description }}" name="description">
<meta content="{{ $setting->keywords }}" name="keywords">
<meta content="Musdalifa Aulia Pratiwi" name="author">


<!-- Favicons -->
<link href="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/logo.png') }}" rel="icon">
<link href="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/logo.png') }}"
    rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('niceadmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('niceadmin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

<!-- add on -->
<link rel="stylesheet" href="{{ asset('niceadmin/vendor/dataTables/css/dataTables.bootstrap5.css') }}">
<link href="{{ asset('niceadmin/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('niceadmin/vendor/select2/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />

<!-- Template Main CSS File -->
<link href="{{ asset('niceadmin/css/style.css') }}" rel="stylesheet">

<style>
    label.required::after {
        content: " *";
        color: red;
        font-weight: bold;
    }

    table.dataTable thead th {
        background-color: #0d6efd !important;
        color: white !important;
        text-align: center !important;
    }

    #data-table td {
        text-align: center;
        vertical-align: middle;
    }

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    #main {
        flex: 1;
    }

    .footer {
        text-align: center !important;
        padding: 15px 0;
        background: #fff;
    }
</style>


<!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index') }}" class="logo d-flex align-items-center">
                <img src="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/logo.png') }}"
                    alt="">
                <span class="d-none d-lg-block">{{ $setting->app_name }}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('niceadmin/img/noprofil.png') }}"
                            alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            {{ Auth::user()->name }}
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard.show') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard.edit') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                data-bs-target="#logoutModal"> <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('setting.index') }}">
                    <i class="bx bx-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
            @if (Auth::user()->role == 'Superadmin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user.index') }}">
                        <i class='bx bx-user-pin'></i>
                        <span>User</span>
                    </a>
                </li>
            @endif

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Components</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>Alerts</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-accordion.html">
                            <i class="bi bi-circle"></i><span>Accordion</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main flex-grow-1">
        {{ $slot }}
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; {{ $setting->copyright }}
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- modal delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="" method="POST" id="form-delete">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus Data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Anda yakin ingin logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('login.logout') }}" type="button" class="btn btn-primary">Ya, Saya ingin
                        logout</a>
                </div>
            </div>
        </div>
    </div>

    @stack('modals')

    <!-- add on -->
    <script src="{{ asset('niceadmin/vendor/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/parsley/parsley.min.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/sweetalert2/sweetalert2@11') }}"></script>
    <script src="{{ asset('niceadmin/vendor/dataTables/js/dataTables.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/dataTables/js/dataTables.bootstrap5.js') }}"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('niceadmin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('niceadmin/vendor/select2/js/select2.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('niceadmin/js/main.js') }}"></script>

    <script>
        new DataTable('#data-table');

        $('.form').parsley({
            errorClass: 'is-invalid text-red',
            successClass: 'is-valid',
            errorsWrapper: '<span class="invalid-feedback"></span>',
            errorTemplate: '<span></span>',
            trigger: 'change'
        });

        $('#upload').on('change', function(event) {
            $('#preview').attr('src', URL.createObjectURL(event.target.files[0]));
        })

        $('#upload-2').on('change', function(event) {
            $('#preview-2').attr('src', URL.createObjectURL(event.target.files[0]));
        })

        $('.select2-default').select2({
            theme: 'bootstrap-5',
            width: "100%",
        })

        let flashSuccess = "{{ session('success') ?? '' }}";
        if (flashSuccess) {
            Swal.fire({
                title: "MANTAP!",
                text: flashSuccess,
                icon: "success",
                timer: 1500,
                showConfirmButton: false,
            });
        }

        let flashError = "{{ session('error') ?? '' }}";
        if (flashError) {
            Swal.fire({
                icon: "error",
                title: "Waduh...",
                text: flashError,
            });
        }
    </script>

    @stack('scripts')


</body>

</html>
