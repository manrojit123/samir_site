$( document ).ready(function() {
    console.log( "ready!" );
    "use strict";

    /*--------------------------
        SCROLLSPY ACTIVE
    ---------------------------*/
    $('body').scrollspy({
        target: '.bs-example-js-navbar-scrollspy',
        offset: 50
    });

    
   if (typeof Cookies.get('lang') === 'undefined'){
        Cookies.set('lang', 'np', { expires: 1 });
        var current_languae= Cookies.get('lang');
        $('#'+current_languae).addClass('current');
    } else {
        var current_languae= Cookies.get('lang');
        $('#'+current_languae).addClass('current');
    }
    $('.language button.current').on('click',function(){
        var lang=$(this).attr("data-lang");
        console.log(lang);
        Cookies.remove('lang');
        Cookies.set('lang', lang, { expires: 1 });
        location.reload();

    });
    /*--------------------------
        STICKY MAINMENU
    ---------------------------*/
    $("#mainmenu-area").sticky({
        topSpacing: 0
    });

    $('#date').datePicker();

    /*-----------------------------
        SLIDER ACTIVE
    ------------------------------*/
    var mySlider = $('.pogoSlider').pogoSlider({
        pauseOnHover: false
    }).data('plugin_pogoSlider');


    /*----------------------------
        OPEN SEARCH FORM
    ----------------------------*/
    var $searchForm = $('.search-form');
    var $searchFormTrigger = $('.search-form-trigger');
    var $formOverlay = $('.search-form-overlay');
    $searchFormTrigger.on('click', function (event) {
        event.preventDefault();
        toggleSearch();
    });

    function toggleSearch(type) {
        if (type === "close") {
            //close serach 
            $searchForm.removeClass('is-visible');
            $searchFormTrigger.removeClass('search-is-visible');
        } else {
            //toggle search visibility
            $searchForm.toggleClass('is-visible');
            $searchFormTrigger.toggleClass('search-is-visible');
            if ($searchForm.hasClass('is-visible')) $searchForm.find('input[type="search"]').focus();
            $searchForm.hasClass('is-visible') ? $formOverlay.addClass('is-visible') : $formOverlay.removeClass('is-visible');
        }
    }


    /*------------------------------
        TIME PICKER ACTIVE
    -------------------------------*/
    var input = $('#time').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });


    /*--------------------------
       HOME PARALLAX BACKGROUND
    ----------------------------*/
    $(window).stellar({
        responsive: true,
        positionProperty: 'position',
        horizontalScrolling: false
    });


    /*------------------------------
        VIDEO BLOG POPUP
    --------------------------------*/
    $('.blog-video-button').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 320,
        preloader: false
    });


    /*---------------------------
        SMOOTH SCROLL
    -----------------------------*/
    $('a.scrolltotop, .slider-area h3 a, .navbar-header a, ul#nav a,a.reservation_box').on('click', function (event) {
        var id = $(this).attr("href");
        var offset = 40;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 1500, "easeInOutExpo");
        event.preventDefault();
    });


    /*----------------------------
        SCROLL TO TOP
    ------------------------------*/
    $(window).on("scroll", function () {
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


    /*---------------------------
        MENU LIST MIXITUP FILTERING
    ----------------------------*/
    // $('.MixItUp2').mixItUp({
    //     selectors: {
    //         control: '[data-mixitup-control]'
    //         filter: '.lun_menu',
    //     },
    //     load:{
    //         filter : '.mon'
    //     }
    // });
    // $('.MixItUp3').mixItUp({
    //     selectors: {
    //         control: '[data-mixitup-control]'
    //         filter: '.ala_menu',
    //     },
    //     load:{
    //         filter : '.starter'
    //     }
    // });
    
// $('#source').quicksand( $('#destination li') );

    var selectedClass = "mon";
    $("#portfolio .tile").css("display","none");
    $("." + selectedClass).css("display","block");
    $(".fil-cat").click(function() {
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(100, 0.1);
        $("#portfolio div").not("." + selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("." + selectedClass).fadeIn().addClass('scale-anm');
            $("#portfolio").fadeTo(300, 1);
        }, 300);

    });

    var selectedClass_ala = "starter";
    $("#portfolio-new .tile").css("display","none");
    $("." + selectedClass_ala).css("display","block");
    $(".fil-cat-new").click(function() {
        selectedClass_ala = $(this).attr("data-rel");
        $("#portfolio-new").fadeTo(100, 0.1);
        $("#portfolio-new div").not("." + selectedClass_ala).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("." + selectedClass_ala).fadeIn().addClass('scale-anm');
            $("#portfolio-new").fadeTo(300, 1);
        }, 300);

    });
    $('.toolbar .btn').click(function(){
        $('.toolbar .btn').removeClass('active');
        $(this).addClass('active');
    })
    /*---------------------------
        MENU DISCOUNT SLIDER
    -----------------------------*/
    $('.menu-discount-offer').owlCarousel({
        merge: true,
        video: true,
        items: 1,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: false,
        autoplayTimeout: 2000,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    /*---------------------------
        TEAM SLIDER
    -----------------------------*/
    $('.team-slider').owlCarousel({
        merge: true,
        video: true,
        items: 1,
        smartSpeed: 1000,
        loop: true,
        nav: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: false,
        autoplayTimeout: 2000,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });


    /*---------------------------
        BLOG POST SLIDER
    -----------------------------*/
    $('.post-slider').owlCarousel({
        merge: true,
        video: true,
        items: 1,
        smartSpeed: 2000,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: true,
        autoplayTimeout: 3000,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });


    /*---------------------------
        BLOG POST IMAGE SLIDER
    -----------------------------*/
    $('.blog-image-sldie').owlCarousel({
        merge: true,
        video: true,
        items: 1,
        smartSpeed: 1000,
        loop: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: false,
        autoplayTimeout: 2000,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    
    /*----------------------------
        INSTAGRAM FEED ACTIVE
    -----------------------------*/
    // var feed = new Instafeed({
    //     get: 'user',
    //     userId: 3287251940,
    //     accessToken: '3287251940.4ac71b3.d88be01ca9c94e2e8a2d923fe0a5169e',
    //     target: 'instagram',
    //     limit: 10, //max 60 images..
    //     resolution: 'standard_resolution',
    //     after: function () {
    //         var el = document.getElementById('instagram');
    //         if (el.classList)
    //             el.classList.add('show');
    //         else
    //             el.className += ' ' + 'show';
    //     }
    // });
    // feed.run();
    
    
    /*--------------------------
        ACTIVE WOW JS
    ----------------------------*/
    new WOW().init();

    $('.main_type button').click(function(){
        $('.main_type button').removeClass('active');
        $(this).addClass('active');
        $('.main_type_box').removeClass('active');
        var to_be_id = $(this).data('type');
        console.log(to_be_id);

        $('.'+to_be_id).addClass('active');
    })
});




$(window).on('load', function () {
    /*--------------------------
        PRE LOADER
    ----------------------------*/
    $(".preeloader").fadeOut(1000);
});