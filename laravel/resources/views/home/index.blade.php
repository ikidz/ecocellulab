@extends('layout.app')

@section('banners')
    <?php /* Banner - Start */ ?>
    @includeIf('layout.components.herobanner')
    <?php /* Banner - End */ ?>
@endsection

@section('content')
<div class="position-relative">
    
    @includeIf('layout.components.floating-icon')
    
    @if( $aboutusContent )
        <?php /* .about-us-area - Start */ ?>
        <div class="about-us-area no-bg-style  padding-top-110 md-pd-top-80">
            <div class="nav-container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        @if( $aboutusContent->display_home_section_img )
                            <div class="img-wrap">
                                <img src="{{ $aboutusContent->display_home_section_img }}" alt="">
                            </div>
                        @else
                            <div class="img-wrap text-center">
                                <img src="{{ asset('assets/images/aboutus.jpg') }}" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 md-pd-top-45 text-center text-lg-left">
                        <div class="content-wrapper">
                            <div class="text-wrapper">
                                <div class="section-title text-center text-lg-left margin-bottom-40 md-mr-bottom-20">
                                    <h2 class="title">{{ $aboutusContent->home_section_title }}</h2>
                                </div>
                                {!! $aboutusContent->home_section_content !!}
                            </div>
                            <?php /*
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Read More</a>
                            </div>
                            */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php /* .about-us-area - End */ ?>
    @endif

    <?php /* .therapy-box-area - Start */ ?>
    <?php /*
    <section class="therapy-box-area padding-top-110 md-pd-top-65">
        <div class="nav-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title margin-bottom-60 md-mr-bottom-35">
                        <h2 class="title">Benefits</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="therapy-box">
                        <div class="icon-wrap">
                            <i class="icon-intellectual"></i>
                        </div>
                        <div class="content-wrap">
                            <h5>Delivers Actives</h5>
                            <p>Nanoporous structyure enhances ingredient delivery.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="therapy-box">
                        <div class="icon-wrap">
                            <i class="icon-ultrasound"></i>
                        </div>
                        <div class="content-wrap">
                            <h5>Soothes &amp; Reduces irritation</h5>
                            <p>Calms the skin.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="therapy-box">
                        <div class="icon-wrap">
                            <i class="icon-microscope-1"></i>
                        </div>
                        <div class="content-wrap">
                            <h5>Protects Skin</h5>
                            <p>Forms a thin firm, retains moisture.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="therapy-box">
                        <div class="icon-wrap">
                            <i class="icon-dna-structure"></i>
                        </div>
                        <div class="content-wrap">
                            <h5>Reduces Inflammation</h5>
                            <p>Creates an optimal environment for skin recovery</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    */ ?>
    <?php /* .therapy-box-area - End */ ?>

    @if( $coreProductContent )
        <?php /* .Technologies-area - Start */ ?>
        <section class="Technologies-area with-bg padding-top-75 md-pd-top-35">
            <div class="nav-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center text-lg-left">
                        <div class="content-wrapper">
                            <div class="text-wrapper">
                                <div class="section-title text-center text-lg-left margin-bottom-55 md-mr-bottom-30">
                                    <h2 class="title">{{ $coreProductContent->title }}</h2>
                                </div>
                                {!! $coreProductContent->description !!}
                            </div>
                            @if( $coreProductContent->link_url != null )
                                <div class="btn-wrapper">
                                    <a href="{{ $coreProductContent->link_url }}" class="boxed-btn">Read More</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 md-pd-top-15">
                        <div class="animated-image-area text-center text-lg-left">
                            <div class="main-img">
                                <img src="{{ asset('assets/img/technology/main-bg.png') }}" alt="">
                            </div>
                            @if( $coreProductContent->core_product_gallery_urls )
                                @foreach( $coreProductContent->core_product_gallery_urls as $key => $galleryUrl )
                                    <div class="animated-img-box {{ ( $key > 0 ? 'item-'.$key+1 : '' ) }}">
                                        <div class="img-wrap">
                                            <img src="{{ $galleryUrl }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php /* .Technologies-area - End */ ?>
    @endif

    <?php /* .pipeline-area - Start */ ?>
    <?php /*
    <section class="pipeline-area style-3 padding-top-115 md-pd-top-20 sm-pd-top-5">
        <div class="nav-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/img/pipeline/main4.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 md-pd-top-50 text-center text-lg-left">
                    <div class="content-wrapper">
                        <div class="text-wrapper">
                            <div class="section-title text-center text-lg-left margin-bottom-55 md-mr-bottom-30">
                                <h2 class="title">Our Pipeline</h2>
                            </div>
                            <p>Jozicular Oncology’s scientific founders published an important discovery in
                                immuno-oncology: in patients with solid tumors who respond to checkpoint inhibitors,
                                mutations in the tumor’s DNA produce critical new targets. These targets, called
                                tumor-specific neoantigens, are unique to tumor cells and can be recognized and targeted
                                for destruction by the patient’s own immune system.
                            </p>
                            <p>Esse repellat quasi tempore saepe? Mollitia temporibus quisquam expedita adipisci iste. At dolorum possimus et? Sequi a provident est officiis quaerat, autem esse quos praesentium quae totam vero fuga iure nostrum nobis. Odio in at corrupti nisi neque commodi veritatis corporis quia saepe ex nostrum perspiciatis unde nesciunt voluptatem esse dolores fugit architecto pariatur ea necessitatibus, nulla quasi quas suscipit! Deserunt minus deleniti quae soluta illum, dolore cumque iusto tempore animi vel exercitationem?</p>
                            <p>Consectetur adipisicing elit. Rem optio, rerum saepe suscipit et illum quibusdam a quidem debitis? In harum, quia ex iure aperiam repellendus iste rem assumenda nobis! Itaque totam odit repudiandae optio dolore! Quos, nesciunt, rem possimus culpa maxime nostrum itaque, ducimus repellendus alias quas aliquam et.</p>
                        </div>
                        <div class="btn-wrapper">
                            <a href="#" class="boxed-btn">Read More</a>
                        </div>
                        <div class="animated-item">
                            <div class="animate-img">
                                <img src="{{ asset('assets/img/pipeline/animate.png') }}" alt="">
                            </div>

                        </div>
                        <div class="animated-item item-2">
                            <div class="animate-img">
                                <img src="{{ asset('assets/img/pipeline/animate.png') }}" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    */ ?>
    <?php /* .pipeline-area - End */ ?>

    <?php /* .review-area - Start */ ?>
    <section class="review-area product-description-with-review padding-top-110 md-pd-top-65 margin-bottom-55 position-relative">
        <div class="nav-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title margin-bottom-60 md-mr-bottom-35">
                        <h2 class="title">What People Say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="review-slider reviews">

                        @for($index = 0; $index < 6; $index++)
                            <div class="comment-text col-12">

                                <div class="review-content row">
                                    <div class="img-part-2 col-4 pl-0">
                                        <img src="assets/img/team/team1.png" alt="" class="rounded-circle">
                                    </div>
                                    <div class="info-part col-8 px-0">
                                        <div class="star-ratings checked">
                                            <i class="flaticon-star "></i>
                                            <i class="flaticon-star "></i>
                                            <i class="flaticon-star "></i>
                                            <i class="flaticon-star "></i>
                                            <i class="flaticon-star "></i>
                                        </div>
                                        <h5>Karin Jooss, Ph.D.</h5>
                                        <span>Executive Vice President and Chief Business Officer</span>
                                    </div>
                                </div>
                                <div class="review-date">
                                    <span class="date">Sep 22, 2019</span>
                                </div>
                                <div class="review-description">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable. There are many
                                        variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration.</p>
                                </div>

                            </div>
                        @endfor
                        
                    </div>
                </div>
            </div>
            <div class="review-slider-controls"></div>
        </div>
    </section>
    <?php /* .review-area - End */ ?>

    <?php /* .news-area - Start */ ?>
    <section class="news-area padding-top-110 md-pd-top-45  margin-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title margin-bottom-50 md-mr-bottom-25">
                        <h2 class="title">The Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="news-slider-2 row">
                <div class="col-4">
                    <div class="news-item style-3">
                        <div class="img-warpper ">
                            <img src="{{ asset('assets/img/news-and-media/7.png') }}" alt="">
                            <div class="overlay">
                                <div class="icon-wrap">
                                    <a href="{{ asset('assets/img/news-and-media/7.png') }}" class="image-popup"> <i
                                            class="flaticon-full-screen"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrap">
                            <div class="date-with-writter">
                                <p class="published-date"><strong>Published : </strong> 5 September 2019
                                </p>
                                <p><strong>By </strong> kalapian moi</p>
                            </div>

                            <ul class="post-meta">
                                <li><a href="#"><i class="flaticon-black-bubble-speech"></i> Comment</a>
                                </li>
                                <li><a href="#"><i class="flaticon-eye"></i> 230 View</a></li>
                            </ul>
                            <h5 class="title">
                                Jozicular Oncology to Present at Needham Healthcare Conference
                            </h5>
                            <p>Jozicular Oncology (Nasdaq: GRTS), a clinical-stage biotechnology company,
                                is developing the next generation of cancer immunotherapies to fight
                                multiple cancer types. Gritstone develops its products by leveraging two
                                key pillars—first, a proprietary machine learning-based platform,....
                            </p>
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Read More</a>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="news-item style-3">
                        <div class="img-warpper ">
                            <img src="{{ asset('assets/img/news-and-media/8.png') }}" alt="">
                            <div class="overlay">
                                <div class="icon-wrap">
                                    <a href="{{ asset('assets/img/news-and-media/8.png') }}" class="image-popup"> <i
                                            class="flaticon-full-screen"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrap">
                            <div class="date-with-writter">
                                <p class="published-date"><strong>Published : </strong> 5 September 2019
                                </p>
                                <p><strong>By </strong> kalapian moi</p>
                            </div>

                            <ul class="post-meta">
                                <li><a href="#"><i class="flaticon-black-bubble-speech"></i> Comment</a>
                                </li>
                                <li><a href="#"><i class="flaticon-eye"></i> 230 View</a></li>
                            </ul>
                            <h5 class="title">
                                bluebird bio and Jozicular Oncology Announce Strategic .
                            </h5>
                            <p>Jozicular Oncology (Nasdaq: GRTS), a clinical-stage biotechnology company,
                                is developing the next generation of cancer immunotherapies to fight
                                multiple cancer types. Gritstone develops its products by leveraging two
                                key pillars—first, a proprietary machine learning-based platform,....
                            </p>
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Read More</a>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="news-item style-3">
                        <div class="img-warpper ">
                            <img src="{{ asset('assets/img/news-and-media/9.png') }}" alt="">
                            <div class="overlay">
                                <div class="icon-wrap">
                                    <a href="{{ asset('assets/img/news-and-media/9.png') }}" class="image-popup"> <i
                                            class="flaticon-full-screen"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrap">
                            <div class="date-with-writter">
                                <p class="published-date"><strong>Published : </strong> 5 September 2019
                                </p>
                                <p><strong>By </strong> kalapian moi</p>
                            </div>

                            <ul class="post-meta">
                                <li><a href="#"><i class="flaticon-black-bubble-speech"></i> Comment</a>
                                </li>
                                <li><a href="#"><i class="flaticon-eye"></i> 230 View</a></li>
                            </ul>
                            <h5 class="title">
                                Jozicular Biosciences Appoints Jeffrey F. Eisenberg as Chief Executive Officer
                            </h5>
                            <p>Jozicular Oncology (Nasdaq: GRTS), a clinical-stage biotechnology company,
                                is developing the next generation of cancer immunotherapies to fight
                                multiple cancer types. Gritstone develops its products by leveraging two
                                key pillars—first, a proprietary machine learning-based platform,....
                            </p>
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn">Read More</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="animated-item style-2">
                <div class="animate-img">
                    <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                </div>

            </div>
            <div class="animated-item style-2 item-2">
                <div class="animate-img">
                    <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                </div>

            </div>
        </div>

    </section>
    <?php /* .news-area - End */ ?>

    <?php /* .meet-team-area - Start */ ?>
    <?php /*
    <section class="meet-team-area style-2 padding-top-110 md-pd-top-65 margin-bottom-55">
        <div class="nav-container rel-cls">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title margin-bottom-60 md-mr-bottom-35">
                        <h2 class="title">Meet Our Leadership</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-slider-2 row">
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team1.png') }}" alt="" class="border-left-top">
                                <div class="overlay border-left-top">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">Karin Jooss, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team2.png') }}" alt="" class="border-left-bottom">
                                <div class="overlay border-left-bottom">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">Lusian, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team3.png') }}" alt="" class="border-right-top">
                                <div class="overlay border-right-top">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">Riban, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team4.png') }}" alt="" class="border-left-bottom">
                                <div class="overlay border-left-bottom">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">Riban, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team5.png') }}" alt="" class="border-right-bottom">
                                <div class="overlay border-right-bottom">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">jein Jery, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        <div class="team-item col-12">
                            <div class="img-warpper ">
                                <img src="{{ asset('assets/img/team/team6.png') }}" alt="" class="border-left-bottom">
                                <div class="overlay border-left-bottom">
                                    <div class="icon-wrap">
                                        <a href="#" target="_blank"><i
                                                class="flaticon-facebook-logo"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-twitter"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                        <a href="#" target="_blank"><i
                                                class="flaticon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="title">kury ayen, Ph.D.</h5>
                            <p>Executive Vice President and Chief Business Officer</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="meet-team-slider-controls"></div>
        </div>
    </section>
    */ ?>
    <?php /* .meet-team-area - End */ ?>

    <?php /* .contact-area-2 - Start */ ?>
    <section class="contact-area-2  padding-top-110 md-pd-top-50 padding-bottom-125 md-pd-bottom-80">
        <div class="nav-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title margin-bottom-50 md-mr-bottom-25">
                        <h2 class="title">Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php /*
                <div class="col-lg-12">
                    <div class="content-wrapper">
                        <div class="text-wrapper col-12 col-md-8">
                            <form class="contact-from mx-auto">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Fast Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="Comment"></textarea>
                                </div>
                                <div class="btn-wrapper">
                                    <button type="submit" class="submit-btn boxed-btn"><span>Send
                                            Message</span></button>

                                </div>

                            </form>

                        </div>

                        <div class="col-12 col-md-4 address-wrap row">
                            <div class="col-12 info-box white-effect">
                                <div class="pulse-icon">
                                    <i class="flaticon-pin"></i>
                                </div>
                                <p>Collins Street West 8007, <br> San Fransico, United States.</p>
                            </div>
                            <div class="col-12 info-box white-effect">
                                <div class="pulse-icon">
                                    <i class="flaticon-black-back-closed-envelope-shape"></i>
                                </div>

                                <p>Jozicular@gmail.com <br> Jozicular@gmail.com</p>
                            </div>
                            <div class="col-12 info-box white-effect">
                                <div class="pulse-icon">
                                    <i class="flaticon-telephone-handle-silhouette"></i>
                                </div>
                                <p>+098 769 023 <br> +098 769 024</p>
                            </div>

                        </div>
                    </div>
                </div>
                */ ?>

                <div class="col-12 mt-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1941.5026860084836!2d100.94545428246835!3d13.287604743767245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b5b23a0092bd%3A0xd0de3adb32127142!2zMjAg4LiE4Lix4LiZ4LiX4Lij4Li14Lib4Liy4Lij4LmM4LiEIDLguYDguJ_guKogMg!5e0!3m2!1sen!2sth!4v1749657430310!5m2!1sen!2sth" title="Google Map" tyle="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /* .contact-area-2 - End */ ?>

</div>
@endsection