<!-- Header start  -->
<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col header-top-res d-lg-none">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <a href="#" class="ec-header-btn ec-header-user">
                            Gemina
                        </a>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <i class="ecicon eci-bars"></i>
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->

    <!-- Ekka Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="{{route('main::product::index')}}">Product</a></li>
                    <li><a href="{{route('main::faq')}}">Speaker</a></li>
                    <li><a href="{{route('main::faq')}}">FAQ</a></li>
                    <li><a href="{{route('main::faq')}}">Contact</a></li>
                    <li class="dropdown drop-list">
                        <a href="javascript:void(0)" class="dropdown-arrow">Pages<i class="ecicon eci-angle-right"></i></a>
                        <ul class="sub-menu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="track-order.html">Track Order</a></li>
                            <li><a href="terms-condition.html">Terms Condition</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">

                </div>
{{--                <!-- Social Start -->--}}
{{--                <div class="header-res-social">--}}
{{--                    <div class="header-top-social">--}}
{{--                        <ul class="mb-0">--}}
{{--                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-facebook"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-twitter"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-instagram"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-linkedin"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Social End -->--}}
            </div>
        </div>
    </div>
    <!-- Ekka Menu End -->
    <!-- Ec Header Button End -->
    <div class="ec-header-cat d-none d-lg-block">
        <div class="container position-relative">
            <div class="row ">
                <div class="col ec-category-block">
                    <div class="ec-category-menu">
                        <div class="ec-category-toggle">
                            <span class="ec-category-title d-1199">Gemina</span>
                        </div>
                    </div>
                </div>

                <!-- EC Main Menu Start -->
                <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
                    <div class="position-relative nav-desk">
                        <div class="row">
                            <div class="col-md-12 align-self-center">
                                <div class="ec-main-menu">
                                    <ul>
                                        <li class="non-drop"><a href="/">Home</a></li>
                                        <li class="non-drop"><a href="{{route('main::product::index')}}">Product</a></li>
                                        <li class="non-drop"><a href="{{route('main::faq')}}">Speaker</a></li>
                                        <li class="non-drop"><a href="{{route('main::faq')}}">FAQ</a></li>
                                        <li class="non-drop"><a href="{{route('main::faq')}}">Contact</a></li>
                                        <li class="dropdown drop-list">
                                            <a class="dropdown-arrow">Account<i class="ecicon eci-angle-right"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="about-us.html">Dashboard</a></li>
                                                <li><a href="about-us.html">Dashboard</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ec Main Menu End -->
            </div>
        </div>
    </div>
</header>
<!-- Header End  -->
