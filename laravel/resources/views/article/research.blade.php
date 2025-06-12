@extends('layout.app')

@section('banners')

<?php /* breadcrumb-area - Start */ ?>
<div class="breadcrumb-area research-area-breadcrumb" style="background-image: url('{{ asset('assets/images/research_banner.jpg') }}');">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner dark-blue">
                    <h2 class="page-title">Research & Development</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* breadcrumb-area - End */ ?>

@endsection

@section('content')

<?php /* .breadcrumb - Start */ ?>
<div class="breadcrumb row">
    <div class="col-12 nav-container">
        <ul class="page-list">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li class="current">Research &amp; Development</li>
        </ul>
    </div>
</div>
<?php /* .breadcrumb - End */ ?>

<?php /* .research-diasease-area - Start */ ?>
<section class="research-diasease-area padding-top-125 md-pd-top-80 padding-bottom-100 md-pd-bottom-60">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="research-diasease">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/img/research-development/1.png') }}" alt="">
                    </div>
                    <div class="content-wrap padding-top-50">
                        <h2 class="title">Research Disease Areas</h2>
                        <p>
                            We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            collaborate across scientific disciplines and organizations in support of our mission to
                            improve and extend peoples’ lives.Being a top us private facility for any kind of
                            scientific research, we are proud of the overall amount of work we`ve done so far.
                            Excepteur sint occaecat cupidatat non dolore magna aliqua. <br> <br> Our delivery
                            platform is our research and development (R&D) cornerstone — a robust and scalable
                            engine for delivering therapeutic agents that activate and direct immune responses in a
                            controlled, impactful way. Our R&D teams are able to leverage the unique mechanism of
                            action of our platform to impact the way we harness the immune system in the fight
                            against cancer and other serious diseases.
                        </p>
                        <h2 class="title padding-top-40">Innovative approaches</h2>
                        <h5 class="sub-title">To unlock tomorrow’s science to develop the latest treatments,
                            Sanofi’s R&D community
                            is:</h5>
                        <ul>
                            <li>Vestibulum iaculis lacinia est. Proin dicm elementum velit. Fusce euismod consequat
                                ante.</li>
                            <li>Vestibulum iaculis lacinia est. Proin dicm elementum velit. Fusce euismod consequat
                                ante.</li>
                            <li>Vestibulum iaculis lacinia est. Proin dicm elementum velit. Fusce euismod consequat
                                ante.</li>
                            <li>Vestibulum iaculis lacinia est. Proin dicm elementum velit. Fusce euismod consequat
                                ante.</li>
                        </ul>

                        <div class="animated-item style-2">
                            <div class="animate-img">
                                <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                            </div>

                        </div>
                        <div class="animated-item style-2 item-2">
                            <div class="animate-img small-size">
                                <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                            </div>

                        </div>
                        <div class="animated-item style-2 item-3">
                            <div class="animate-img ">
                                <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /* .research-diasease-area - End */ ?>

<?php /* .research-area - Start */ ?>
<section class="research-area padding-top-115 md-pd-top-75 padding-bottom-60 md-pd-bottom-20 ">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title margin-bottom-50 md-mr-bottom-45">
                    <h2 class="title">Research areas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/2.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Immunology & Inflam -mation</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/3.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Immuno-oncology & Cardiovas</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/4.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Diabetes & Cardiovas- cular (DCV)</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/2.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Immuno-oncology & mation</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/5.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Rare and Neurologic Diseases</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="research-item">
                    <div class="img-wrap">
                        <img class="border-right-top-35" src="{{ asset('assets/img/research-development/6.png') }}" alt="">
                    </div>
                    <div class="content-part">
                        <p><strong>Published :</strong> 20 September 2019</p>
                        <h3 class="title">Rare Blood Disorders Diseases</h3>
                        <p>We focus on discovering and advancing new treatments for serious patient needs. From the
                            inception of a therapeutic through early clinical development, our disease area teams
                            organizations in support of our mission to and extend peoples’ lives. Our delivery
                            platform is our research and development (R&D) ...</p>
                        <div class="btn-wrapper">
                            <button class="boxed-btn" type="button">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php /* .research-area - End */ ?>

<?php /* .join-us-area - Start */ ?>
<section class="join-us-area style-2 black-effect research-join-us-area padding-top-125 md-pd-top-80 padding-bottom-125 md-pd-bottom-80">
    <div class="nav-container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="join-us-content" style="background-image: url('{{ asset('assets/images/newsletter_banner.jpg') }}');">
                    <div class="left-bg-2 text-center">
                        <h2 class="title">Subscribe Our Newsletter</h2>
                        <p>To receive email releases, simply provide us with your email address below.</p>

                    </div>
                    <div class="subscribe-part">
                        <form class="subscribe-form">
                            <div class="from-group">
                                <input class="from-control" name="subscribe" type="text"
                                    placeholder="Your Email Address">
                            </div>
                            <div class="btn-wrapper btn-submit">
                                    <button class="boxed-btn" type="submit">Subscribe</button>
                                </div>
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<?php /* .join-us-area - End */ ?>



@endsection