; (function ($) {
    "use strict";

    $(document).ready(function () {


        /*----------------------
            Light Case
        -----------------------*/
        $('a[data-rel^=lightcase]').lightcase({
            transition: 'scrollHorizontal',
            swipe: true,
            maxWidth: 1170,
            maxHeight: 600,
            slideshow: true
        });

        /**-----------------------------
         * Background Image -***
         * ---------------------------*/  
        var $backgroundImage = $('.bg-image');
        $backgroundImage.each(function () {
            var $this = $(this),
                $bgImage = $this.data('bg');
            $this.css('background-image', 'url(' + $bgImage + ')');
        });

        /*-------------------------
           magnific popup activation
       -------------------------*/

        if ($('.video-popup').length > 0) {

            $('.video-popup').magnificPopup({
                type: 'iframe'
            });
        }
        if ($('.image-popup').length > 0) {

            $('.image-popup').magnificPopup({
                type: 'image'
            });
        }
        
        /* ---------------------------------------------------------
            Current Year Copyright area
        --------------------------------------------------------- */
        $(".current-year").text((new Date).getFullYear())

        /*-------------------------
        image hotspot activation
               -------------------------*/

        if ($('#hotspotImg').length > 0) {
            $('#hotspotImg').hotSpot({

                // default selectors
                mainselector: '#hotspotImg',
                selector: '.hot-spot',
                imageselector: '.img-responsive',
                tooltipselector: '.tooltip',

                // or 'click'
                bindselector: 'click'

            });
        }

        /**-----------------------------
                       *  Popup
               * ---------------------------*/
        $('.info-popup').on('click', function () {
            $(this).removeClass('active');
            $('.info-popup-content').removeClass('active');
        })
        $('.location-popup').on('click', function () {
            $(this).removeClass('active');
            $('.location-popup-content').removeClass('active');
        })
        $('.message-popup').on('click', function () {
            $(this).removeClass('active');
            $('.message-popup-content').removeClass('active');
        })



        $(".floating-icon-info").on("click", function () {
            $(".info-popup").toggleClass("active");
            $(".info-popup-content").toggleClass("active");
            $(".location-popup-content").removeClass("active");
            $(".message-popup-content").removeClass("active");
            $(".location-popup").removeClass("active");
            $(".message-popup").removeClass("active");
        });
        $(".info-popup-content_close").on("click", function () {
            $(this)
                .parent()
                .removeClass("active");
            $('.info-popup').removeClass('active')
        });

        $(".floating-icon-location").on("click", function () {
            $(".location-popup").toggleClass("active");
            $(".location-popup-content").toggleClass("active");
            $(".info-popup-content").removeClass("active");
            $(".message-popup-content").removeClass("active");
            $(".message-popup").removeClass("active");
            $(".info-popup").removeClass("active");
        });
        $(".location-popup-content_close").on("click", function () {
            $(this)
                .parent()
                .removeClass("active");
            $('.location-popup').removeClass('active')
        });

        $(".floating-icon-message").on("click", function () {
            $(".message-popup").toggleClass("active");
            $(".message-popup-content").toggleClass("active");
            $(".location-popup-content").removeClass("active");
            $(".info-popup-content").removeClass("active");
            $(".info-popup").removeClass("active");
            $(".location-popup").removeClass("active");
        });
        $(".message-popup-content_close").on("click", function () {
            $(this)
                .parent()
                .removeClass("active");
            $('.message-popup').removeClass('active');
        });


        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })



        /*---------------------------
             Mobile Cross Menu
       -----------------------------*/
        $(document).on('click', '.cross-menu', function (e) {
            e.preventDefault();
            $(this).toggleClass("change");
        })


        /*----------------------------------------
                    product quantity count
        ------------------------------------------*/

        $(document).on('click', ".increase", function () {
            var el = $(this);
            var value = el.prev('.quantity').children('input').val();

            el.prev('.quantity').children('input').val(++value);



        });
        $(document).on('click', ".decrease", function () {
            var el = $(this);

            var value = el.next('.quantity').children('input').val();
            // console.log("isclicked !",value );
            if (value > 1) {
                el.next('.quantity').children('input').val(--value);
            }
        })

        /*--------------------
           wow js init
       ---------------------*/
        new WOW().init();




        // Image Thumb

        $(".single-thumbnail-item img").on('click', function () {
            $(".slider-item img").attr("src", $(this).attr("src").replace());
        });

        if ($(window).width() < 769) {
            var scrollPos = 0;

            window.addEventListener("scroll", function () {
                if (document.body.getBoundingClientRect().top > scrollPos) {
                    $(".floating-icon").removeClass("show-up-form-icons");
                } else {
                    $(".floating-icon").addClass("show-up-form-icons");
                }
                scrollPos = document.body.getBoundingClientRect().top;
            });
        }

        /*----------------------
                Search Popup
            -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');

        $(document).on('click', '#body-overlay', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '.border-none', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '#search', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });


        /*----------------------
         nice-select
       -----------------------*/

        if ($('select').length > 0) {
            $('select').niceSelect();
        }


        /*------------------
                          back to top
                      ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

        /*------------------------------
                   counter section activation
        -------------------------------*/
        var counternumber = $('.count-num');
        counternumber.counterUp({
            delay: 20,
            time: 3000
        });


    });


    $(window).on('scroll', function () {



        //back to top show/hide
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }




        /*--------------------------
         sticky menu activation
        -------------------------*/

        if ($(window).scrollTop() >= 1) {
            $('.navbar-area').addClass('navbar-area-fixed');
        }
        else {
            $('.navbar-area').removeClass('navbar-area-fixed');
        }

    });





    $(window).on('load', function () {

        /*-----------------
           back to top
       ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });

        /*-------------------------
        news filter activation
        -------------------------*/

        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
        });
        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function () {
                var number = $(this).find('.number').text();
                return parseInt(number, 10) > 50;
            },
            // show if name ends with -ium
            ium: function () {
                var name = $(this).find('.name').text();
                return name.match(/ium$/);
            }
        };
        // bind filter button click
        $('.filters-button-group').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });




    });



})(jQuery); 