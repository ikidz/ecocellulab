@extends('layout.app')

@section('banners')

<?php /* .breadcrumb-area - Start */ ?>
<div class="breadcrumb-area about-area-breadcrumb" style="background-image: url('{{ asset('assets/images/aboutus_banner.jpg') }}');">
    <div class="nav-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner no-bg">
                    <h2 class="page-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* Breadcrumb - End */ ?>

@endsection

@section('content')

<?php /* .breadcrumb - Start */ ?>
<div class="breadcrumb row">
    <div class="col-12 nav-container">
        <ul class="page-list">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li class="current">About Us</li>
        </ul>
    </div>
</div>
<?php /* .breadcrumb - End */ ?>

<div class="about-us-area style-3 padding-top-110  md-pd-top-80">
    <div class="nav-container">

        <?php /* Story - Start */ ?>
        <div class="row align-items-center">
            @if( $about->display_story_img )
                <div class="col-lg-6 text-center">
                    <div class="img-wrap" style="background-image: url('{{ $about->display_story_img }}');">
                        <img src="{{ $about->display_story_img  }}" alt="">
                        <?php /*
                        <div class="video-part">
                            <div class="pulse-icon">
                                <a href="https://www.youtube.com/watch?v=D8BN2YSyYkg" class="video-popup mfp-iframe"
                                    tabindex="0">
                                    <i class="flaticon-play-arrow"></i></a>
                            </div>
                        </div>
                        */ ?>
                    </div>
                </div>
            @endif
            <div class="col-lg-6 md-pd-top-45 text-center text-lg-left">
                <div class="content-wrapper">
                    <div class="text-wrapper">
                        <div class="section-title text-center text-lg-left margin-bottom-55 md-mr-bottom-30">
                            <h2 class="title">Our Story</h2>
                        </div>
                        {!! $about->story_content !!}
                    </div>
                    <?php /*
                    <div class="btn-wrapper">
                        <a href="#" class="boxed-btn">Read More</a>
                    </div>
                    */ ?>
                </div>
            </div>
        </div>
        <?php /* Story - End */ ?>

        <?php /* .counterup-area - Start */ ?>
        <?php /*
        <section class="counterup-area padding-top-125 md-pd-top-80">
            <div class="nav-container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-counter-item">
                            <div class="count-icon"><i class="icon-doctor-1"></i></div>
                            <p class="count-num plus">100,000</p>
                            <h5 class="title">Employees in 100 country
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-counter-item">
                            <div class="count-icon  "><i class="icon-investor-1"></i></div>
                            <p class="count-num">5,894</p>
                            <h5 class="title">Invested In R&D in 2018
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-counter-item">
                            <div class="count-icon"><i class="icon-progress-report "></i></div>
                            <p class="count-num">84</p>
                            <h5 class="title">Project in clinical development
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single-counter-item">
                            <div class="count-icon"><i class="icon-Group-604"></i></div>
                            <p class="count-num">33</p>
                            <h5 class="title">Industrial site in countries
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        */ ?>
        <?php /* .counterup-area - End */ ?>

        <?php /* .meet-team-area - Start */ ?>
        <section class="meet-team-area style-2 padding-top-75 md-pd-top-35 md-pd-bottom-80 padding-bottom-110">
            <div class="nav-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title margin-bottom-60  md-mr-bottom-35">
                            <h2 class="title">Meet Our Leadership</h2>
                        </div>
                    </div>
                </div>
                @if( $teams->count() > 0 )
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-slider row">

                                @foreach( $teams as $key => $team )
                                    @php
                                        $borderClass = '';
                                        if( $key % 4 == 0 ){
                                            $borderClass = 'border-left-top';
                                        }elseif( $key % 4 == 1 ){
                                            $borderClass = 'border-left-bottom';
                                        }elseif( $key % 4 == 2 ){
                                            $borderClass = 'border-right-top';
                                        }elseif( $key % 4 == 3 ){
                                            $borderClass = 'border-left-bottom';
                                        }
                                    @endphp
                                    <div class="team-item col-12">
                                        <div class="img-warpper ">
                                            @if( $team->display_avatar )
                                                <img src="{{ $team->display_avatar }}" alt="" class="{{ $borderClass }}">
                                            @else
                                                <img src="{{ asset('assets/images/logo_v.svg') }}" alt="" class="{{ $borderClass }}">
                                            @endif
                                            <div class="overlay border-left-top">
                                                @if( $team->socials->count() > 0 )
                                                    <div class="icon-wrap">
                                                        @foreach( $team->socials as $item )
                                                            @switch( strtolower($item->platform) )
                                                                @case('facebook')
                                                                    <a href="{{ $item->url }}" target="_blank"><i class="flaticon-facebook-logo"></i></a>
                                                                    @break
                                                                @case('twitter')
                                                                    <a href="{{ $item->url }}" target="_blank"><i class="iconify streamline-logos--x-twitter-logo-solid"></i></a>
                                                                    @break
                                                                @case('linkedin')
                                                                    <a href="{{ $item->url }}" target="_blank"><i class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                                                    @break
                                                                @case('instagram')
                                                                    <a href="{{ $item->url }}" target="_blank"><i class="flaticon-instagram"></i></a>
                                                                    @break
                                                                @default
                                                                    <a href="{{ $item->url }}" target="_blank"><i class="flaticon-globe"></i></a>
                                                            @endswitch
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <h5 class="title">{{ $team->name }}</h5>
                                        <p>{{ $team->position }}</p>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </section>
        <?php /* .meet-team-area - End */ ?>

        <?php /* .vision-area - Start */ ?>
        <?php /*
        <section class="vision-area text-center text-lg-left padding-top-110 md-pd-top-75">
            <div class="nav-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title margin-bottom-50 md-mr-bottom-25">
                            <h2 class="title">Our Vision</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 ">
                        <div class="img-part">
                            <img src="{{ asset('assets/img/about/main-3.png') }}" alt="" class="border-left-top">
                            <div class="animated-item style-2">
                                <div class="animate-img">
                                    <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                                </div>

                            </div>
                            <!-- <div class="animated-item style-2 item-2">
                                <div class="animate-img">
                                    <img src="assets/img/news/animate.svg" alt="">
                                </div>

                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 md-mr-top-60">
                        <div class="content-part">
                            <div class="vision-item">
                                <h5 class="title">Jozicular strives to be a "Game Changer"</h5>
                                <p>Various versions have evolved over  reader will be distracted by the readable content
                                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters</p>
                            </div>
                            <div class="vision-item">
                                <h5 class="title">Jozicularis a science driven company</h5>
                                <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                                    It is a long established fact that a reader will be distracted by the readable content
                                    of a page when looking at its layout.</p>
                            </div>
                            <div class="vision-item">
                                <h5 class="title">Jozicular strives to be</h5>
                                <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                                    It is a long established The point of using normal distribution of letters</p>
                            </div>

                            <div class="animated-item style-2">
                                <div class="animate-img small-size">
                                    <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                                </div>

                            </div>
                            <div class="animated-item style-2 item-2">
                                <div class="animate-img small-size-2">
                                    <img src="{{ asset('assets/img/news/animate.svg') }}" alt="">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        */ ?>
        <?php /* .vision-area - End */ ?>

        <?php /* .join-us-area - Start */ ?>
        <?php /*
        <section class="join-us-area style-2 padding-top-115 md-pd-top-70 padding-bottom-125 md-pd-bottom-80">
            <div class="nav-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title margin-bottom-50 md-mr-bottom-25">
                            <h2 class="title">Join Our Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="join-us-content about-area-join" style="background-image: url('{{ asset('assets/images/joinus_banner.jpg') }}');">
                            <div class="left-bg-2">
                                <h3 class="title">We are looking for passionate, <br> innovative people to join us</h3>

                            </div>
                            <div class="btn-wrapper">
                                <button class="boxed-btn">Join us</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </section>
        */ ?>
        <?php /* .join-us-area - End */ ?>

    </div>
</div>
@endsection