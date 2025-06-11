<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jozicular - Bio Science HTML Template</title>
    <!-- favicon -->
    <link rel=icon href="favicon.png" sizes="20x20" type="image/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <!-- iconmoon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>

    <?php /* Pre loader - Start */ ?>
    @includeIf('layout.components.preloader')
    <?php /* Pre loader - End */ ?>

    <?php /* Navigation - Start */ ?>
    @includeIf('layout.components.navigation')
    <?php /* Navigation - End */ ?>

    <?php /* Banner - Start */ ?>
    @yield('banners')
    <?php /* Banner - End */ ?>

    <?php /* Content - Start */ ?>
    @yield('content')
    <?php /* Content - End */ ?>

    <?php /* Footer - Start */ ?>
    @includeIf('layout.components.footer')
    <?php /* Footer - End */ ?>

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <!-- wow -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- waypoint -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick-animation.js') }}"></script>
    <!-- Nice scroll -->
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <!-- counterup -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- imageloaded -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- img hotspot -->
    <script src="{{ asset('assets/js/jquery.hotspot.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('scripts')

</body>

</html>