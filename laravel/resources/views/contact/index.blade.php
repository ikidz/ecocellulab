@extends('layout.app')

@section('banners')
<div class="breadcrumb-area about-area-breadcrumb" style="background-image: url('{{ asset('assets/images/contact_banner.jpg') }}');">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner no-bg">
                    <h2 class="page-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<?php /* .breadcrumb - Start */ ?>
<div class="breadcrumb row">
    <div class="col-12 nav-container">
        <ul class="page-list">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li class="current">Contact us</li>
        </ul>
    </div>
</div>
<?php /* .breadcrumb - End */ ?>

<?php /* .contact-info-area - Start */ ?>
<section class="contact-info-area padding-top-120 md-pd-top-70 margin-bottom-125 md-mr-bottom-80">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left margin-bottom-40 md-mr-bottom-20">
                            <h2 class="title">Get in Touch</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="contact-info-box">
                            <h5 class="title">Ecocellulab Co., Ltd.</h5>
                            <p>20 / 295 Country Park 2 Village Moo 2, Liang Nong Mon Road, Huaikapi, Mueang Chonburi, Chonburi 20000</p>
                            <p><strong>Email: </strong>pc.ceo@ecocellulab.com</p>
                            <p><strong>Phone: </strong>+(66) 81 659 9949</p>
                        </div>
                    </div>
                </div>
                <div class="row padding-top-45">
                    <div class="col-lg-4 col-sm-4">
                        <div class="img-wrap text-center text-sm-left">
                            <img src="{{ asset('assets/images/logo_v.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-8 mt-5 mt-sm-0">
                        <div class="footer-widget align-items-center">
                            <h5 class="widget-title">Follow Us</h5>
                            <div class="footer-icon">
                                <a href="#" target="_blank"><i
                                        class="flaticon-facebook-logo"></i></a>
                                <a href="#" target="_blank"><i
                                        class="iconify streamline-logos--x-twitter-logo-solid"></i></a>
                                <a href="#" target="_blank"><i
                                        class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                <a href="#" target="_blank"><i
                                        class="flaticon-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 border-left pt-5 pt-lg-0">
                <div class="section-title text-left margin-bottom-60 md-mr-bottom-35">
                    <h2 class="title">Send your Message</h2>
                </div>
                <form class="contact-from style-2" id="contact-form" action="mail.php" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Fast Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="4" placeholder="Comment"></textarea>
                    </div>
                    <div class="btn-wrapper">
                        <button type="submit" class="submit-btn boxed-btn"><span>Send Message</span></button>
                    </div>
                    <p class="form-messege mb-0"></p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /* .contact-info-area - End */ ?>

<?php /* .map-area - Start */ ?>
<div class="map-area">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1941.5026860084836!2d100.94545428246835!3d13.287604743767245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b5b23a0092bd%3A0xd0de3adb32127142!2zMjAg4LiE4Lix4LiZ4LiX4Lij4Li14Lib4Liy4Lij4LmM4LiEIDLguYDguJ_guKogMg!5e0!3m2!1sen!2sth!4v1749657430310!5m2!1sen!2sth" title="Google Map" tyle="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?php /* .map-area - End */ ?>

@endsection