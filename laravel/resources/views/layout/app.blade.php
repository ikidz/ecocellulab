<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ECOCELLULAB - Official Website</title>
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
    <!-- Sweet Alert -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/sweetalert2/sweetalert2.min.css') }}" />
    <!-- Main Stylesheet -->
    @if (app()->environment('local'))
        <script type="module" src="http://localhost:5173/resources/sass/style.scss"></script>
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=1.3') }}">
    @endif
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css?v=1.1') }}">

    @yield('css')

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
    <script type="text/javascript" src="{{ asset('assets/lib/sweetalert2/sweetalert2.min.js') }}"></script>

    <?php /* Alert message - Start */ ?>
	@if( session('message-warning') )
		<script type="text/javascript">swalMessage('message-warning', '{{ session("message-warning") }}');</script>
	@endif
	@if( session('message-success') )
		<script type="text/javascript">swalMessage('message-success', '{{ session("message-success") }}');</script>
	@endif
	@if( session('message-error') )
		<script type="text/javascript">swalMessage('message-error', '{{ session("message-error") }}');</script>
	@endif
	@if( session('message-info') )
		<script type="text/javascript">swalMessage('message-info', '{{ session("message-info") }}');</script>
	@endif
	<?php /* Alert message - End */ ?>

    @yield('scripts')

</body>

</html>