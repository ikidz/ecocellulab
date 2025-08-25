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

        @includeIf('layout.components.popups')

        <!-- navbar -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
            <div class="container nav-container d-flex flex-wrap justify-content-around align-items-center my-0 px-0 h-100">
                <div class="responsive-mobile-menu col-12 col-md-3 col-lg-2 h-100 align-items-center px-0">
                    <div class="logo-wrapper">
                        <a href="{{ route('home.index') }}" class="logo">
                            <img src="{{ asset('assets/images/logo_h.svg') }}" alt="logo">
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