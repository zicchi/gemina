<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>@yield('title')</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="muhamadzidane">

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('main/assets/images/favicon/favicon-6.png" sizes="32x32')}}" />
    <link rel="apple-touch-icon" href="{{asset('main/assets/images/favicon/favicon-6.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('main/assets/images/favicon/favicon-6.png')}}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{asset('main/assets/css/vendor/ecicons.min.css')}}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main/assets/css/plugins/bootstrap.css')}}" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('main/assets/css/demo6.css')}}" />
    @stack('top')


</head>
@livewireStyles
<body>
<div id="ec-overlay"><span class="loader_img"></span></div>

@include('includes.main.navbar')

<!-- Main Slider Start -->
@if(request()->is('/'))
    @include('includes.main.slider')
@endif
<!-- Main Slider End -->

<!-- Product tab Area Start -->
<section class="section ec-product-tab">
    @yield('content')
</section>
<!-- ec Product tab Area End -->

<!-- ec Banner Section Start -->
<!-- ec Banner Section End -->

<!--  Day of deal & service Section Start -->
<!--  End Day of deal & service Section Start -->

<!-- Testimonial & Ec new product section -->
<!-- End Testimonial & new product section -->

<!-- Ec Instagram Start -->
<!-- Ec Instagram End -->

<!-- Footer Start -->
@include('includes.main.footer')
<!-- Footer Area End -->

<!-- Modal -->
@yield('modal')
<!-- Modal end -->

<!-- Click To Call -->
<!-- Click To Call end -->

<!-- Newsletter Modal Start -->
<!-- Newsletter Modal end -->

<!-- Footer navigation panel for responsive display -->

<!-- Footer navigation panel for responsive display end -->

<!-- Vendor JS -->

@livewireScripts
<script src="{{asset('main/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('main/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('main/assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('main/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('main/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

<!--Plugins JS-->
<script src="{{asset('main/assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/countdownTimer.min.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/jquery.zoom.min.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/slick.min.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/infiniteslidev2.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/click-to-call.js')}}"></script>
<script src="{{asset('main/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('main/assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
<!-- Main Js -->

<script src="{{asset('main/assets/js/vendor/index.js')}}"></script>
<script src="{{asset('main/assets/js/main.js')}}"></script>
{{--<script src="{{asset('main/assets/js/demo-6.js')}}"></script>--}}

</body>

</html>
