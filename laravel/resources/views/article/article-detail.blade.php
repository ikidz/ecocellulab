@extends('layout.app')

@section('banners')

<?php /* breadcrumb-area - Start */ ?>
@php $researchBanner = $webSettings->where('key', 'RESEARCH_DEFAULT_BANNER')->first(); @endphp
@if( $researchBanner && ( $researchBanner->value != null || $researchBanner->value != '' ) )
    <div class="breadcrumb-area research-area-breadcrumb" style="background-image: url('{{ $researchBanner->value }}');">
        <div class="nav-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner no-bg">
                        <h2 class="page-title">Research</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<?php /* breadcrumb-area - End */ ?>

@endsection

@section('content')

<?php /* .breadcrumb - Start */ ?>
<div class="breadcrumb row">
    <div class="col-12 nav-container">
        <ul class="page-list">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li class="current">Article</li>
            <li class="current">{{ $article->title }}</li>
        </ul>
    </div>
</div>
<?php /* .breadcrumb - End */ ?>

<?php /* .research-diasease-area - Start */ ?>
<section class="research-diasease-area padding-top-125 md-pd-top-80 padding-bottom-100 md-pd-bottom-60">
    <div class="nav-container">
        <div class="row">
            @php $firstItem = $article; @endphp
            @if( $firstItem )
                <div class="col-lg-12">
                    <div class="research-diasease">
                        @if( $firstItem->display_img )
                            <div class="img-wrap">
                                <img src="{{ $firstItem->display_img }}" alt="">
                            </div>
                        @endif
                        <div class="content-wrap padding-top-50">
                            <h2 class="title">{{ $firstItem->title }}</h2>
                            {!! $firstItem->description !!}

                            <?php /*
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
                            */ ?>
                        </div>
                    </div>
                </div>
            @endif
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
                    <h2 class="title">Article areas</h2>
                </div>
            </div>
        </div>
        <div class="row">
            
            @if( $articles->count() > 1 )
                @foreach( $articles as $item )
                    <div class="col-lg-6">
                        <div class="research-item">
                            @if( $item->display_thumb )
                                <div class="img-wrap">
                                    <img class="border-right-top-35" src="{{ $item->display_thumb }}" alt="">
                                </div>
                            @endif
                            <div class="content-part">
                                <p><strong>Published :</strong> {{ $item->display_post_date }}</p>
                                <h3 class="title">{{ $item->title }}</h3>
                                <p>{!! \Str::limit($item->caption, 200, '...') !!}</p>
                                <div class="btn-wrapper">
                                    <a href="{{ route('article.detail', ['slug' => $item->slug]) }}" class="boxed-btn" type="button">Read More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</section>
<?php /* .research-area - End */ ?>

@includeIf('article.components.subscribe', ['page' => 'article', 'contentId' => $article->id ?? 0])

@endsection