<?php /* .info-popup - Start */ ?>
<div class="info-popup"></div>
<div class="info-popup-wrapper">
    <div class="info-popup-content">
        <button type="button" class="info-popup-content_close"><i class="flaticon-close"></i></button>
        <div class="row no-gutters">
            <div class="col-lg-7">
                @php $websiteLogo = $webSettings->where('key', 'WEBSITE_LOGO')->first(); @endphp
                @if( $websiteLogo && $websiteLogo->value != null )
                    <div class="info-popup-content__img info-popup-content__img--one">
                        <img src="{{ $websiteLogo->value }}" alt="">
                    </div>
                @endif
            </div>
            <div class="col-lg-5">
                <div class="info-popup-content__text">
                    @php
                        $companyName = $webSettings->where('key', 'COMPANY_NAME')->first();
                        $companyEmail = $webSettings->where('key', 'COMPANY_EMAIL')->first();
                        $companyPhone = $webSettings->where('key', 'COMPANY_PHONE')->first();
                        $companyAddress = $webSettings->where('key', 'COMPANY_ADDRESS')->first();
                    @endphp
                    @if( $companyName && $companyName->value != null )
                        <div class="info-popup-content__text-header">
                            <h5 class="info-popup-content__title">{{ $companyName->value }}</h5>
                        </div>
                    @endif
                    @if( $companyAddress && $companyAddress->value != null )
                        <div class="info-popup-content__text-body">
                            <div class="info-popup-content__text-is px-3">{!! $companyAddress->value !!}</div>
                        </div>
                    @endif
                    <div class="info-popup-content__text-footer">
                        @if( $companyPhone && $companyPhone->value != null )
                            <p class="info-popup-content__text-is">{{ $companyPhone->value }}</p>
                        @endif
                        @if( $companyEmail && $companyEmail->value != null )
                            <p class="info-popup-content__text-is">{{ $companyEmail->value }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* .info-popup - End */ ?>

<?php /* .location-popup - Start */ ?>
<div class="location-popup"></div>
<div class="location-popup-wrapper">
    <div class="location-popup-content">
        <button type="button" class="location-popup-content_close"><i class="flaticon-close"></i></button>
        <div class="row no-gutters">
            <div class="col-lg-7">
                @php $companyMap = $webSettings->where('key', 'COMPANY_MAP')->first(); @endphp
                @if( $companyMap && $companyMap->value != null )
                    <div id="map-two">
                        <iframe
                            src="{{ $companyMap->value }}" style="border:0;"
                            allowfullscreen=""></iframe>
                    </div>
                @endif
            </div>
            <div class="col-lg-5">
                <div class="location-popup-content__text">
                    @if( $websiteLogo && $websiteLogo->value != null )
                        <div class="location-popup-content__img">
                            <img src="{{ $websiteLogo->value }}" alt="">
                        </div>
                    @endif
                    @if( $companyName && $companyName->value != null )
                        <div class="location-popup-content__text-header">
                            <h5 class="location-popup-content__title">{{ $companyName->value }}</h5>
                        </div>
                    @endif
                    @if( $companyAddress && $companyAddress->value != null )
                        <div class="location-popup-content__text-is px-3">
                            {!! $companyAddress->value !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* .location-popup - End */ ?>

<?php /* .message-popup - Start */ ?>
<div class="message-popup"></div>
<div class="message-popup-wrapper">
    <div class="message-popup-content">
        <button type="button" class="message-popup-content_close"><i class="flaticon-close"></i></button>
        <div class="row no-gutters">
            <div class="col-lg-7">
                @if( $websiteLogo && $websiteLogo->value != null )
                    <div class="message-popup-content__img message-popup-content__img--one">
                        <img src="{{ $websiteLogo->value }}" alt="">
                    </div>
                @endif
            </div>
            <div class="col-lg-5 col-12">
                <div class="message-popup-content__text">
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
<?php /* .message-popup - End */ ?>