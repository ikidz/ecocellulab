@extends('layout.app')

@section('css')
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet">
@endsection

@section('banners')
@php $productBanner = $webSettings->where('key', 'PRODUCT_DEFAULT_BANNER')->first(); @endphp
@if( $productBanner && ( $productBanner->value != null || $productBanner->value != '' ) )
    <div class="breadcrumb-area about-area-breadcrumb" style="background-image: url('{{ $productBanner->value }}');">
        <div class="nav-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner no-bg">
                        <h2 class="page-title">Product</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@section('content')

<?php /* .breadcrumb - Start */ ?>
<div class="breadcrumb row">
    <div class="col-12 nav-container">
        <ul class="page-list">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li>Product</li>
            <li class="current">{{ $product->title }}</li>
        </ul>
    </div>
</div>
<?php /* .breadcrumb - End */ ?>

<?php /* .single-products - Start */ ?>
<section class="single-products padding-top-125 md-pd-top-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-slider-wrapper">
                    <div class="slider-part">
                        <div class="single-thumbnail-slider">
                            @if( $product->display_img != null )
                                <div class="slider-item">
                                    <img src="{{ $product->display_img }}" alt="product-single-image">
                                </div>
                            @endif
                            @if( $product->product_gallery_urls )
                                @foreach( $product->product_gallery_urls as $gallery_url )
                                    <div class="slider-item">
                                        <img src="{{ $gallery_url }}" alt="product-single-image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="content-part">
                        <div class="description-content">
                            <h3 class="title">{{ $product->title }}</h3>
                            <div class="star-ratings">
                                @for( $i=1; $i <= $product->review_rating; $i++ )
                                    <i class="flaticon-star checked"></i>
                                @endfor
                                @for( $i=1; $i <= (5-$product->review_rating); $i++ )
                                    <i class="flaticon-star "></i>
                                @endfor
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="price">
                                <span class="sale-price large-size">Price : ฿{{ number_format($product->price, 2) }}</span>
                            </p>
                        </div>
                        <div class="description-content">
                            <p>{{ $product->short_description }}</p>
                        </div>
                        <?php /*
                        <div class="cart-wrap">
                            <ul class="quantity-count">
                                <li class="decrease"> - </li>
                                <li class="quantity"><input type="text" value="1"></li>
                                <li class="increase"> + </li>
                            </ul>
                            <div class="btn-wrapper">
                                <button type="submit" class="boxed-btn" data-toggle="modal"> Add to cart</button>
                            </div>
                        </div>
                        */ ?>
                        <div class="product-meta padding-top-30">
                            <p><strong>SKU :</strong> {{ $product->sku }}</p>
                            <p><strong>Category :</strong> {{ $product->category?->title ?? '' }}</p>
                            <p>
                                <strong>Tags :</strong>
                                @if( $product->tags )
                                    @foreach( $product->tags as $tag )
                                        <span>{{ $tag->name }}</span>@if( !$loop->last ), @endif
                                    @endforeach
                                @endif
                            </p>
                            <div class="product-share">
                                <h5>Share :</h5>
                                <div class="follow-icon">
                                    <a href="#" target="_blank"><i class="flaticon-twitter"></i></a>
                                    <a href="#" target="_blank"><i class="flaticon-instagram"></i></a>
                                    <a href="#" target="_blank"><i
                                            class="flaticon-linked-in-logo-of-two-letters"></i></a>
                                    <a href="#" target="_blank"><i class="flaticon-facebook-logo"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-thumbnail-carousel padding-top-30">
                    @if( $product->display_img != null )
                        <div class="single-thumbnail-item">
                            <img src="{{ $product->display_img }}" alt="thumbnail-image">
                        </div>
                    @endif
                    @if( $product->product_gallery_urls )
                        @foreach( $product->product_gallery_urls as $gallery_url )
                            <div class="single-thumbnail-item">
                                <img src="{{ $gallery_url }}" alt="thumbnail-image">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<?php /* .single-products - End */ ?>

<?php /* .product-description-with-review - Start */ ?>
<section class="product-description-with-review padding-top-125 md-pd-top-80 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-information">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ ( $errors->any() ? '' : 'active show' ) }}" id="descr-tab" data-toggle="tab" href="#descr"
                                role="tab" aria-controls="descr" aria-selected="{{ ( $errors->any() ? 'false' : 'true' ) }}">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ( $errors->any() ? 'active show' : '' ) }}" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="{{ ( $errors->any() ? 'false' : 'true' ) }}">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ ( $errors->any() ? '' : 'active show' ) }}" id="descr" role="tabpanel"
                            aria-labelledby="descr-tab">
                            <div class="description-tab-content">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade reviews {{ ( $errors->any() ? 'active show' : '' ) }}" id="reviews" role="tabpanel"
                            aria-labelledby="reviews-tab">
                            <h4 class="title">{{ $product->total_reviews }} Review{{ ($product->total_reviews > 1 ? 's' : '' ) }}</h4>
                            @if( $product->displayedReviews && $product->displayedReviews->count() > 0 )
                                @foreach( $product->displayedReviews as $review )
                                    <div class="comment-box padding-top-30">
                                        <div class="comment-text">

                                            <div class="review-content">
                                                <div class="img-part">
                                                    <img src="{{ $review->display_img }}" alt="{{ $review->masked_name }}">
                                                </div>
                                                <div class="info-part">
                                                        <div class="star-ratings checked">
                                                            @for( $i=1; $i <= $review->rating; $i++ )
                                                                <i class="flaticon-star checked"></i>
                                                            @endfor
                                                            @for( $i=1; $i <= (5-$review->rating); $i++ )
                                                                <i class="flaticon-star "></i>
                                                            @endfor
                                                        </div>
                                                    <h5>{{ $review->masked_name }}</h5>
                                                    <span>{{ $review->masked_email }}</span>
                                                </div>
                                            </div>
                                            <div class="review-date">
                                                <span class="date">{{ $review->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <div class="review-description">
                                                <p>{{ $review->review }}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No reviews yet.</p>
                            @endif
                            <?php /*
                            <div class="comment-text">

                                <div class="review-content">
                                    <div class="img-part">
                                        <img src="assets/img/team/team1.png" alt="">
                                    </div>
                                    <div class="info-part">
                                            <div class="star-ratings checked">
                                                    <i class="flaticon-star "></i>
                                                    <i class="flaticon-star "></i>
                                                    <i class="flaticon-star "></i>
                                                    <i class="flaticon-star "></i>
                                                    <i class="flaticon-star "></i>
                                                </div>
                                        <h5>Johan</h5>
                                        <span>Front-end Developer</span>
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
                            */ ?>
                            <h5 class="title padding-top-5">Leave a Review</h5>
                            <form class="review-form padding-top-40" id="product-review-form" name="product-review-form" method="POST" action="{{ route('product.submitReview', ['slug' => $product->slug]) }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Honeypot (hidden field bots usually fill) --}}
                                <input type="text" name="website" style="display:none">

                                <div class="form-group">
                                    <input type="file" name="img" id="upload" accept="image/*" />

                                    <small class="form-text text-muted">Support image type *.jpg, *.jpeg, *.png. Image size must not exceed more than 6Mb.</small>
                                </div>
                                @error('img')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name*" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email*" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- Rating field --}}
                                <div class="form-group">
                                    <label>Your Rating*</label>
                                    <div class="star-ratings">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label for="star{{ $i }}" class="star" role="radio" aria-checked="false" tabindex="0" data-value="{{ $i }}">
                                                <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                <i class="flaticon-star"></i>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                @error('rating')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <textarea class="form-control" name="review" rows="4"
                                        placeholder="Your Review*">{{ old('review') }}</textarea>
                                </div>
                                @error('review')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- Cloudflare Turnstile --}}
                                <div class="form-group">
                                    <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                                </div>
                                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                                @error('cf-turnstile-response')
                                    <div class="form-error">
                                        <p class="text-danger small">{{ $message }}</p>
                                    </div>
                                @enderror
                                <div class="btn-wrapper">
                                    <button class="boxed-btn btn-rounded hover-active" type="submit">
                                        Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php /* .product-description-with-review - End */ ?>

<section class="py-5">
    <div class="container">
        <div class="btn-wrapper text-center">
            <a href="{{ route('home.index') }}" class="boxed-btn btn-rounded hover-active">
                <i class="flaticon-left-arrow"></i> Back to Home
            </a>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // Star rating selection
        $('.star-ratings .star').on('click keypress', function(e){
            if (e.type === 'click' || (e.type === 'keypress' && (e.key === 'Enter' || e.key === ' '))) {
                var value = $(this).data('value');
                $('input[name="rating"][value="' + value + '"]').prop('checked', true);
                $('.star-ratings .star').attr('aria-checked', 'false');
                $(this).attr('aria-checked', 'true');
                $(this).prevAll('.star').attr('aria-checked', 'true');
            }
        });
    });

    // Register plugins
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType
    );

    // Single, correct initialization
    const input = document.querySelector('#upload');
    if (input) {
        // Prevent double-init if this script runs twice
        if (!input._pond) {
            FilePond.create(input, {
                allowMultiple: false,
                acceptedFileTypes: ['image/*'],
                labelIdle: 'Drag & Drop your image or <span class="filepond--label-action">Browse</span>',
                server: null,         // no AJAX; keep classic form post
                instantUpload: false, // don't auto-upload
                storeAsFile: true,    // put the File back onto the <input>
                credits: false,
                maxFiles: 1
            });
        }
    }

    // (Optional) sanity check: log file presence on submit
    const form = document.getElementById('product-review-form');
    form?.addEventListener('submit', function() {
        const files = document.getElementById('upload')?.files;
        if (!files || !files.length) {
            console.warn('No file attached to input#upload at submit time.');
        }
    });
</script>
@endsection