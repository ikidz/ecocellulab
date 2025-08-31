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
                            @php
                                $companyLogo = $webSettings->where('key', 'WEBSITE_LOGO')->first();
                                $companyName = $webSettings->where('key', 'COMPANY_NAME')->first();
                                $companyAddress = $webSettings->where('key', 'COMPANY_ADDRESS')->first();
                                $companyEmail = $webSettings->where('key', 'COMPANY_EMAIL')->first();
                                $companyPhone = $webSettings->where('key', 'COMPANY_PHONE')->first();
                                $companyFacebook = $webSettings->where('key', 'COMPANY_FACEBOOK')->first();
                                $companyTwitter = $webSettings->where('key', 'COMPANY_TWITTER')->first();
                                $companyLinkedin = $webSettings->where('key', 'COMPANY_LINKEDIN')->first();
                                $companyInstagram = $webSettings->where('key', 'COMPANY_INSTAGRAM')->first();
                            @endphp
                            <h5 class="title">{{ $companyName->value }}</h5>
                            {!! $companyAddress->value !!}
                            <p><strong>Email: </strong>{{ $companyEmail->value }}</p>
                            <p><strong>Phone: </strong>{{ $companyPhone->value }}</p>
                        </div>
                    </div>
                </div>
                <div class="row padding-top-45">
                    @if( $companyLogo )
                        <div class="col-lg-4 col-sm-4">
                            <div class="img-wrap text-center text-sm-left">
                                <img src="{{ $companyLogo->value }}" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="{{ ( $companyLogo ? 'col-lg-8 col-sm-8' : 'col-lg-12 col-sm-12' ) }} mt-5 mt-sm-0">
                        <div class="footer-widget align-items-center">
                            <h5 class="widget-title">Follow Us</h5>
                            <div class="footer-icon">
                                @if( $companyFacebook )
                                    <a href="{{ $companyFacebook->value }}" target="_blank"><i class="flaticon-facebook-logo"></i></a>
                                @endif
                                @if( $companyTwitter )
                                    <a href="{{ $companyTwitter->value }}" target="_blank"><i class="iconify streamline-logos--x-twitter-logo-solid"></i></a>
                                @endif
                                @if( $companyLinkedin )
                                    <a href="{{ $companyLinkedin->value }}" target="_blank"><i class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                @endif
                                @if( $companyInstagram )
                                    <a href="{{ $companyInstagram->value }}" target="_blank"><i class="flaticon-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 border-left pt-5 pt-lg-0">
                <div class="section-title text-left margin-bottom-60 md-mr-bottom-35">
                    <h2 class="title">Send your Message</h2>
                </div>
                <form class="contact-from style-2" id="contact-form" action="{{ route('contact.submit') }}" method="post">
                    @csrf

                    {{-- Honeypot (bots usually fill this) --}}
                    <input type="text" name="website" style="display:none">

                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                    </div>
                    @error('first_name')
                        <div class="form-error">
                            <p class="text-danger small">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                    </div>
                    @error('last_name')
                        <div class="form-error">
                            <p class="text-danger small">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="form-error">
                            <p class="text-danger small">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="4" placeholder="Comment">{{ old('message') }}</textarea>
                    </div>
                    @error('message')
                        <div class="form-error">
                            <p class="text-danger small">{{ $message }}</p>
                        </div>
                    @enderror

                    {{-- Cloudflare Turnstile --}}
                    <div class="form-group">
                        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                    </div>
                    @error('cf-turnstile-response')
                        <div class="form-error">
                            <p class="text-danger small">{{ $message }}</p>
                        </div>
                    @enderror
                    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

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
@php
    $googleMapEmbed = $webSettings->where('key', 'COMPANY_MAP')->first();
@endphp
@if( $googleMapEmbed )
    <div class="map-area">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $googleMapEmbed->value }}" title="Google Map" tyle="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endif
<?php /* .map-area - End */ ?>

@endsection