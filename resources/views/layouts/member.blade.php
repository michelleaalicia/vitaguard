<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>

        @yield('title') | VitaGuard

    </title>
    <meta name="description" content="VitaGuard Online Healthcare Platform">

    <meta name="keywords" content="Healthcare, Consultation, Doctor, Booking, VitaGuard">

    <!-- Favicons -->
    <link href="{{ asset('medilab/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('medilab/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('medilab/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('medilab/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('medilab/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('medilab/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('medilab/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('medilab/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('member.dashboard') }}" class="logo d-flex align-items-center me-auto">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="{{ asset('medilab/assets/img/logo.png') }}" alt=""> -->
                    <h1 class="sitename">VitaGuard</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>

                        <li>
                            <a href="{{ route('member.dashboard') }}"
                                class="{{ request()->routeIs('member.dashboard') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('member.doctors.index') }}"
                                class="{{ request()->routeIs('member.doctors.index') ? 'active' : '' }}">
                                Doctors
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('member.articles.index') }}"
                                class="{{ request()->routeIs('member.articles.index') ? 'active' : '' }}">
                                Articles
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('member.bookings.index') }}"
                                class="{{ request()->routeIs('member.bookings.index') ? 'active' : '' }}">
                                My Booking
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('member.consultations.index') }}"
                                class="{{ request()->routeIs('member.consultations.index') ? 'active' : '' }}">
                                Consultation
                            </a>
                        </li>

                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="btn btn-outline-danger ms-2">
                        Logout
                    </button>
                </form>

                <span class="me-3">

                    Hi, {{ Auth::user()->name }}

                </span>
            </div>

        </div>

    </header>

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container text-center py-4">

            <h4>VitaGuard</h4>

            <p>
                Online Healthcare Consultation Platform
            </p>

            <hr>

            <p class="mb-0">

                © {{ date('Y') }} VitaGuard. All Rights Reserved.

            </p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('medilab/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('medilab/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('medilab/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('medilab/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('medilab/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('medilab/assets/js/main.js') }}"></script>

</body>

</html>