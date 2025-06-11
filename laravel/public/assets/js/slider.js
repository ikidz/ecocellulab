$(document).ready(function () {

    /***************************
    Showcase area slider start
    ***************************/
    if ($('.showcase1-slider').length > 0) {
        $('.showcase1-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: false,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-chevron"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-chevron-1"></i></button>',
            appendArrows: $('.showcase-slider-controls'),
        });
    }




    /***************************
     Showcase area slider end
     ***************************/



    /***************************
   Meet team  area slider start
   ***************************/

    if ($('.team-slider').length > 0) {
        $('.team-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
            dots: true,
            // autoplay: true,
            // autoPlayTimeout: 500,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            appendArrows: $('.meet-team-slider-controls'),
            responsive: [
                {
                    breakpoint: 920,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,

                    }
                }
            ]
        });
    }
    if ($('.team-slider-2').length > 0) {
        $('.team-slider-2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: false,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            appendArrows: $('.meet-team-slider-controls'),
            responsive: [
                {
                    breakpoint: 920,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,

                    }
                }
            ]
        });
    }

    /***************************
  Meet team  area slider end
  ***************************/
    if ($('.review-slider').length > 0) {
        $('.review-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: false,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            appendArrows: $('.review-slider-controls'),
            responsive: [
                {
                    breakpoint: 920,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,

                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,

                    }
                }
            ]
        });
    }
    /***************************
  review  area slider start
  ***************************/

    /***************************
  review  area slider End
  ***************************/

    /***************************
  News  area slider start
  ***************************/

    if ($('.news-slider').length > 0) {
        $('.news-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
            dots: true,
            autoPlayTimeout: 500,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',

            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,

                    }
                }
            ]

        });
    }

    if ($('.news-slider-2').length > 0) {
        $('.news-slider-2').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            responsive: [
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]

        });
    }




    /***************************
 news area slider end
  ***************************/



    //////////////////////  Home 2 ////////////////////

    /***************************
    Showcase area slider start
    ***************************/

    if ($('.showcase2-slider').length > 0) {
        $('.showcase2-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: false,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            appendArrows: $('.showcase-slider-controls'),
            appendDots: $('.showcase-slider-dot-controls'),
        });
    }




    /***************************
     Showcase area slider end
     ***************************/



    //////////////////////  Home 3 ////////////////////

    /***************************
    Showcase area slider start
    ***************************/
    if ($('.showcase3-slider').length > 0) {
        $('.showcase3-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: true,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            appendArrows: $('.showcase-slider-controls'),
            appendDots: $('.showcase-slider-dot-controls'),
        });
    }




    /***************************
     Showcase area slider end
     ***************************/


    //////////////////////  Home 4 ////////////////////

    /***************************
    Showcase area slider start
    ***************************/
    if ($('.showcase4-slider').length > 0) {
        $('.showcase4-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
            dots: true,
            fade: true,
            appendDots: $('.showcase-slider-dot-controls'),
        });
    }


    /***************************
     Showcase area slider end
     ***************************/


    /***************************
    client slider start
    ***************************/
    if ($('.client-slider').length > 0) {
        $('.client-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow"></i></button>',
            responsive: [
                {
                    breakpoint: 1366,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    /***************************
     client slider end
     ***************************/






    /*************************** product page ***************************/

    /***************************
     product slider start
     ***************************/
    if ($('.single-thumbnail-slider').length > 0) {
        $('.single-thumbnail-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoPlayTimeout: 50
        });
    }
    if ($('.product-thumbnail-carousel').length > 0) {
        $(".product-thumbnail-carousel").slick({
            slidesToShow: 5,
            asNavFor: '.single-thumbnail-slider',
            focusOnSelect: true,
            infinite: true

        });
    }
    $('.single-thumbnail-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $('.product-thumbnail-carousel .single-thumbnail-item[data-slick-index=' + nextSlide + ']').addClass('nav-active').siblings().removeClass('nav-active');
    });
    $('.product-thumbnail-carousel .single-thumbnail-item[data-slick-index=0]').addClass('nav-active').siblings().removeClass('nav-active');

    /***************************
     product slider end
     ***************************/



});
