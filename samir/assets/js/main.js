$(document).ready(function() {
            "use strict";

            /*--------------------------
                SCROLLSPY ACTIVE
            ---------------------------*/
            $('body').scrollspy({
                target: '.bs-example-js-navbar-scrollspy',
                offset: 50
            });

            /*--------------------------
        STICKY MAINMENU
    ---------------------------*/
            $("#mainmenu-area").sticky({
                topSpacing: 0
            });

            /*-----------------------------
                SLIDER ACTIVE
            ------------------------------*/
                  var mySlider = $('.pogoSlider').pogoSlider({
        pauseOnHover: false
    }).data('plugin_pogoSlider');




            /*---------------------------
                SMOOTH SCROLL
            -----------------------------*/
            // $('a.scrolltotop, .slider-area h3 a, .navbar-header a, ul#nav a,a.reservation_box').on('click', function(event) {
            //     var id = $(this).attr("href");
            //     var offset = 40;
            //     var target = $(id).offset().top - offset;
            //     $('html, body').animate({
            //         scrollTop: target
            //     }, 1500, "easeInOutExpo");
            //     event.preventDefault();
            // });
                    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

            /*----------------------------
                SCROLL TO TOP
            ------------------------------*/
            $(window).on("scroll", function() {
                var $totalHeight = $(window).scrollTop();
                var $scrollToTop = $(".scrolltotop");
                if ($totalHeight > 300) {
                    $scrollToTop.fadeIn();
                } else {
                    $scrollToTop.fadeOut();
                }
                if ($totalHeight + $(window).height() === $(document).height()) {
                    $scrollToTop.css("bottom", "90px");
                } else {
                    $scrollToTop.css("bottom", "20px");
                }
            });


            /*--------------------------
                ACTIVE WOW JS
            ----------------------------*/
            new WOW().init();





            $(window).on('load', function() {
                $(".preeloader").fadeOut(1000);
            });




            /*---------------------------------
                Filter Gallery
            ----------------------------------*/


});

