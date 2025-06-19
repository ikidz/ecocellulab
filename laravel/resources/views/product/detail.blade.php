@extends('layout.app')

@section('banners')
<div class="breadcrumb-area about-area-breadcrumb" style="background-image: url('{{ asset('assets/images/product_banner.png') }}');">
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
@endsection

@section('content')
<?php /* .single-products - Start */ ?>
<section class="single-products padding-top-125 md-pd-top-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-slider-wrapper">
                    <div class="slider-part">
                        <div class="single-thumbnail-slider">
                            <div class="slider-item">
                                <img src="{{ asset('assets/images/product_1.png') }}" alt="product-single-image">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('assets/images/product_2.png') }}" alt="product-single-image">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('assets/images/product_3.png') }}" alt="product-single-image">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('assets/images/product_4.png') }}" alt="product-single-image">
                            </div>
                        </div>
                    </div>
                    <div class="content-part">
                        <div class="description-content">
                            <h3 class="title">Aloe Vera Flesh Leaf</h3>
                            <div class="star-ratings checked">
                                <i class="flaticon-star "></i>
                                <i class="flaticon-star "></i>
                                <i class="flaticon-star "></i>
                                <i class="flaticon-star "></i>
                                <i class="flaticon-star "></i>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="price">
                                <span class="sale-price large-size">Price : ฿{{ number_format(9000, 2) }}</span>
                            </p>
                        </div>
                        <div class="description-content">
                            <p>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies
                                nisi</p>
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
                            <p><strong>SKU :</strong> 00089432</p>
                            <p><strong>Category :</strong> Medicine</p>
                            <p><strong>Tags :</strong> Cancer Medicine , Terapy</p>
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
                    <div class="single-thumbnail-item">
                        <img src="{{ asset('assets/images/product_1.png') }}" alt="thumbnail-image">
                    </div>
                    <div class="single-thumbnail-item">
                        <img src="{{ asset('assets/images/product_2.png') }}" alt="thumbnail-image">
                    </div>
                    <div class="single-thumbnail-item">
                        <img src="{{ asset('assets/images/product_3.png') }}" alt="thumbnail-image">
                    </div>
                    <div class="single-thumbnail-item">
                        <img src="{{ asset('assets/images/product_4.png') }}" alt="thumbnail-image">
                    </div>
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
                            <a class="nav-link active show" id="descr-tab" data-toggle="tab" href="#descr"
                                role="tab" aria-controls="descr" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="descr" role="tabpanel"
                            aria-labelledby="descr-tab">
                            <div class="description-tab-content">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable. There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable. There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or randomised words which don't look even slightly
                                    believable.</p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable. There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or randomised words which don't look even slightly
                                    believable.</p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable. There are many variations of passages
                                    of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or randomised words which don't look even slightly
                                    believable.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade reviews" id="reviews" role="tabpanel"
                            aria-labelledby="reviews-tab">
                            <h4 class="title">1 Review</h4>
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
                            <h5 class="title padding-top-5">Leave a Review</h5>
                            <form  class="review-form padding-top-40">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Fast Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                        <div class="star-ratings">
                                                <i class="flaticon-star "></i>
                                                <i class="flaticon-star "></i>
                                                <i class="flaticon-star "></i>
                                                <i class="flaticon-star "></i>
                                                <i class="flaticon-star "></i>
                                            </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control"  rows="4"
                                        placeholder="Your Review"></textarea>
                                </div>
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