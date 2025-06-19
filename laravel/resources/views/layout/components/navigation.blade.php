<div class="total-content">
    <div class="header-section">

        <?php /*
        <!-- Mobile Search -->
        <div class="click-mobile-search">
            <form action="{{ route('home.index') }}" class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Type something to search">
                </div>
            </form>
        </div>
        <!-- Sing iN Popup -->

        <!-- search Popup -->
        <div class="body-overlay" id="body-overlay"></div>
        <div class="search-popup" id="search-popup">
            <form action="{{ route('home.index') }}" class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search.....">
                </div>
                <button class="submit-btn border-none"><i class=" flaticon-search"></i></button>
            </form>
        </div>
        <!-- Popup Section -->
        */ ?>

        <!--info-popup start-->
        <div class="info-popup"></div>
        <div class="info-popup-wrapper">
            <div class="info-popup-content">
                <button type="button" class="info-popup-content_close"><i class="flaticon-close"></i></button>
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <div class="info-popup-content__img info-popup-content__img--one">
                            <img src="{{ asset('assets/img/popup/2.png') }}" alt="">

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info-popup-content__text">
                            <div class="info-popup-content__img">
                                <img src="{{ asset('assets/img/popup/3.png') }}" alt="">
                            </div>
                            <div class="info-popup-content__text-header">
                                <h5 class="info-popup-content__title">Opening Hours</h5>
                            </div>
                            <div class="info-popup-content__text-body">
                                <p class="info-popup-content__text-is">moday - sunday</p>
                                <p class="info-popup-content__text-is">8.00 am - 9.00 pm</p>
                            </div>
                            <div class="info-popup-content__text-footer">
                                <p class="info-popup-content__text-is">+(66) 81 659 9949</p>
                                <p class="info-popup-content__text-is">pc.ceo@ecocellulab.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--location-popup start-->
        <div class="location-popup"></div>
        <div class="location-popup-wrapper">
            <div class="location-popup-content">
                <button type="button" class="location-popup-content_close"><i class="flaticon-close"></i></button>
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <div id="map-two">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14608.271103099609!2d90.36059233036049!3d23.74496240347118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle%20map!5e0!3m2!1sen!2sbd!4v1571636420588!5m2!1sen!2sbd" style="border:0;"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="location-popup-content__text">
                            <div class="location-popup-content__img">
                                <img src="{{ asset('assets/img/popup/1.png') }}" alt="">
                            </div>
                            <div class="location-popup-content__text-header">
                                <h5 class="location-popup-content__title">Address</h5>
                            </div>
                            <div class="location-popup-content__text-body">
                                <span class="location-popup-content__text-is">
                                    20 / 295 Country Park 2 Village Moo 2, Liang Nong Mon Road, Huaikapi, Mueang Chonburi, Chonburi 20000
                                </span>
                            </div>
                            <div class="btn-wrapper">
                                <button class="boxed-btn" type="button">Open
                                    Map</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--message-popup start-->
        <div class="message-popup"></div>
        <div class="message-popup-wrapper">
            <div class="message-popup-content">
                <button type="button" class="message-popup-content_close"><i class="flaticon-close"></i></button>
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <div class="message-popup-content__img message-popup-content__img--one">
                            <img src="{{ asset('assets/img/popup/4.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="message-popup-content__text">
                            <div class="info-popup-content__img">
                                <img src="{{ asset('assets/img/popup/5.png') }}" alt="">
                            </div>
                            <div class="message-popup-content__text-header">
                                <h5 class="message-popup-content__title mb-3">
                                    You have a question for us?
                                </h5>
                            </div>
                            <div class="message-popup-content__text-body">
                                <form class="popup-form" action="{{ route('home.index') }}">
                                    <div class="form-group">
                                        <input id="email-two-popup" type="text" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="1"
                                            placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="btn-wrapper padding-top-20">
                                        <button class="boxed-btn" type="button">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- navbar -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="{{ route('home.index') }}" class="logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <?php /*
                    <div class="logo-wrapper d-block d-lg-none">
                        <a href="{{ route('home.index') }}" class="logo">
                            <img src="{{ asset('assets/img/logo/logo2.png') }}" alt="logo">
                        </a>
                    </div>

                    <div class="mobile-toggler">
                        <a data-toggle="modal" data-target="#login-modal" href=""><i class="flaticon-user-1"></i></a>
                    </div>
                    */ ?>
                    <button class="navbar-toggler cross-menu" type="button" data-toggle="collapse"
                        data-target="#lifeomic_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="cross-menu-wrapper">
                            <span class="bar1"></span>
                            <span class="bar2"></span>
                            <span class="bar3"></span>
                        </span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="lifeomic_main_menu">
                    <ul class="navbar-nav">
                        <li class="{{ ( request()->routeIs('home.index') === true ? 'current-menu-item' : '' ) }}"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="{{ ( request()->routeIs('article.aboutus') === true ? 'current-menu-item' : '' ) }}"><a href="{{ route('article.aboutus') }}">About us</a></li>
                        <li class="{{ ( request()->routeIs('product.detail') === true ? 'current-menu-item' : '' ) }}"><a href="{{ route('product.detail') }}">Product</a></li>
                        <li class="{{ ( request()->routeIs('article.research') === true ? 'current-menu-item' : '' ) }}"><a href="{{ route('article.research') }}">Research</a></li>
                        <?php /*
                        <li class="menu-item-has-children"><a href="shop.html">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">News</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Masonry</a>
                                    <ul class="sub-menu">
                                        <li><a href="news.html">Style one</a></li>
                                        <li><a href="news-1.html">Style two</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="news-2.html">Without Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="news-2.html">Style one</a></li>
                                        <li><a href="news-3.html">Style two</a></li>
                                    </ul>


                                </li>
                                <li class="menu-item-has-children"><a href="news-4.html">Default Layout</a>
                                    <ul class="sub-menu">
                                        <li><a href="news-4.html">Style one</a></li>
                                        <li><a href="news-5.html">Style two</a></li>
                                    </ul>
                                </li>
                                <li><a href="news-details.html">News Details</a></li>
                            </ul>
                        </li>
                        */ ?>
                        <li class="{{ ( request()->routeIs('contact.index') === true ? 'current-menu-item' : '' ) }}"><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </div>
                <?php /*
                <div class="nav-right-content">
                    <ul>
                        <li class="login">
                            <a data-toggle="modal" data-target="#login-modal" href="">Log In /</a>
                        </li>
                        <li class="singup"><a data-toggle="modal" data-target="#singup-modal" href="">Sign Up</a>
                        </li>
                        <li class="search" id="search">
                            <i class="flaticon-search"></i>
                        </li>
                    </ul>
                </div>
                */ ?>
            </div>
        </nav>
    </div>

    <?php /* 
    @includeIf('layout.components.modals')
    */ ?>
    
</div>