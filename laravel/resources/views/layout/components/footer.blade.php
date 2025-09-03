<?php /* .footer-area - Start */ ?>
<footer class="footer-area">
    <div class="footer-top style-3  padding-top-20 padding-bottom-20">
        <div class="nav-container">
            <div class="footer-widget-content-wrapper">
                <div class="footer-widget-content">
                    <div class="footer-widget widget">
                        @php $footerLogo = $webSettings->where('key', 'FOOTER_LOGO')->first(); @endphp
                        @if( $footerLogo && $footerLogo->value != null && $footerLogo->value != '' )
                            <div class="about_us_widget padding-bottom-10">
                                <a href="{{ route('home.index') }}" class="footer-logo">
                                    <img src="{{ $footerLogo->value }}" alt="footer logo">
                                </a>
                            </div>
                        @endif
                        <div class="footer-widget widget widget_nav_menu ">
                            <ul class="footer-link">
                                <li><a href="{{ route('article.aboutus') }}">About</a></li>
                                <li><a href="{{ route('product.detail') }}">Product</a></li>
                                <li><a href="{{ route('article.research') }}">Research</a></li>
                                <li><a href="{{ route('contact.index') }}">Contact</a></li>
                            </ul>
                        </div>
                        @php
                            $companyName = $webSettings->where('key', 'COMPANY_NAME')->first();
                            $companyFacebook = $webSettings->where('key', 'COMPANY_FACEBOOK')->first();
                            $companyTwitter = $webSettings->where('key', 'COMPANY_TWITTER')->first();
                            $companyLinkedin = $webSettings->where('key', 'COMPANY_LINKEDIN')->first();
                            $companyInstagram = $webSettings->where('key', 'COMPANY_INSTAGRAM')->first();
                        @endphp
                        <div class="copyright-area-inner">
                            <div class="qry-copy">
                                © {{ $companyName->value }} <span class="current-year"></span> All right reserved.
                            </div>
                        </div>
                        <div class="footer-widget widget white-effect">
                            <div class="footer-icon margin-top-25">
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
        </div>
    </div>
</footer>
<?php /* .footer-area - End */ ?>

<?php /* .back-to-top - Start */ ?>
<div class="back-to-top">
    <span class="back-top"><i class="flaticon-chevron"></i></span>
</div>
<?php /* .back-to-top - End */ ?>