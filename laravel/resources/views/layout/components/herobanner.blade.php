@if( $banners->isNotEmpty() )
<section class="showcase3-area">
    <div class="showcase3-overlay"></div>
    <div class="showcase3-main">
        <?php /* <div class="nav-container"> */ ?>
            <div class="row align-items-center h-100">
                <div class="col-12 col-lg-6 mx-0 mx-lg-3 px-0 text-center text-lg-left">
                    <div class="content-part">
                        <div class="showcase3-slider">

                            @foreach( $banners as $banner )
                                <?php /* .showcase3-slider-item - Start */ ?>
                                <div class="showcase3-slider-item">
                                    <div class="slider-content-wrap px-3">
                                        @if( $banner->display_title_img != null && $banner->display_title_img != '' )
                                            <div class="img-wrapper col-12 col-md-3 col-lg-4 px-0 mx-auto mx-lg-0">
                                                <img src="{{ $banner->display_title_img }}" alt="{{ $banner->title }}">
                                            </div>
                                        @endif
                                        <h2 class="title px-3">{{ $banner->title }}</h2>
                                        <div class="px-3 text-center text-lg-left">{!! $banner->subtitle !!}</div>
                                        @if( $banner->link_type == 'researches' )
                                            <div class="btn-wrapper">
                                                <a href="{{ route('researches.detail', ['id' => $banner->content_id]) }}" class="boxed-btn">Read More</a>
                                            </div>
                                        @elseif( $banner->link_type == 'external' && ( $banner->url != null || $banner->url != '' ) )
                                            <div class="btn-wrapper">
                                                <a href="{{ $banner->url }}" target="_blank" class="boxed-btn">Find out More</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <?php /* .showcase3-slider-item - End */ ?>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="showcase3-nav px-0 text-center cus-pd">

                    @foreach( $banners as $banner )
                        <?php /* .showcase3-nav-item - Start */ ?>
                        <div class="showcase3-nav-item">
                            <div class="hotspot-part mobile-none tab-none">

                                @if( $banner->hotspot_youtube_id != null && $banner->hotspot_youtube_id != '' )
                                    <?php /* .video-part - Start */ ?>
                                    <div class="video-part">
                                        <div class="pulse-icon">
                                            <a href="https://www.youtube.com/watch?v={{ $banner->hotspot_youtube_id }}" class="video-popup mfp-iframe"
                                                tabindex="0">
                                                <i class="flaticon-play-arrow"></i></a>
                                        </div>
                                    </div>
                                    <?php /* .video-part - End */ ?>
                                @endif

                                @if( $banner->hotspots->isNotEmpty() )
                                    <?php /* #hotspotImg - Start */ ?>
                                    <div id="hotspotImg" class="responsive-hotspot-wrap row">
                                        @foreach( $banner->hotspots as $key => $hotspot )
                                            <?php /* .hot-spot - Start */ ?>
                                            <div class="hot-spot {{ ( $key > 0 ? 'item-'.$key+1 : '' ) }}">
                                                <div class="tooltip">
                                                    @if( $hotspot->display_img != null )
                                                        <div class="text-with-img">
                                                            <img src="{{ $hotspot->display_img }}" alt="">
                                                            <p>{{ $hotspot->text }}</p>
                                                        </div>
                                                    @else
                                                        <div class="text-row">
                                                            <p>{{ $hotspot->text }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <?php /* .hot-spot - End */ ?>
                                        @endforeach

                                    </div>
                                    <?php /* #hotspotImg - End */ ?>
                                @endif

                            </div>

                            @if( $banner->type == 'video' && $banner->display_media != null )
                                <div class="nav-img">
                                    <?php /* HTML 5 Video Background - Start */ ?>
                                    <div class="video-background">
                                        <video autoplay muted loop>
                                            <source src="{{ $banner->display_media }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <?php /* HTML 5 Video Background - End */ ?>
                                </div>
                            @elseif( $banner->type == 'image' && $banner->display_media != null )
                                <div class="nav-img" style="background-image: url('{{ $banner->display_media }}');">
                                    &nbsp;
                                </div>
                            @else
                                <div class="nav-img" style="background-image: url('{{ asset('assets/images/herobanner.jpg') }}');">
                                    &nbsp;
                                </div>
                            @endif
                        </div>
                        <?php /* .showcase3-nav-item - End */ ?>
                    @endforeach
                        
                </div>
            </div>
        <?php /* </div> */ ?>

    </div>

    <div class="showcase-slider-controls">

    </div>
    <div class="showcase-slider-dot-controls">

    </div>

    <div class="showcase-follow-icon right-align">
        <a href="#" target="_blank"><i class="iconify streamline-logos--x-twitter-logo-solid"></i></a>
        <a href="#" target="_blank"><i class="flaticon-instagram"></i></a>
        <a href="#" target="_blank"><i
                class="flaticon-linked-in-logo-of-two-letters"></i></a>
        <a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a>
    </div>

</section>
@endif