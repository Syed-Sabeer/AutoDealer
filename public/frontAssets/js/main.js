/*=====================================================
Template Name   : Motex
Description     : Car Dealer And Automotive HTML5 Template
Author          : Themesland
Version         : 1.0
=======================================================*/


(function ($) {
    
    "use strict";

    // multi level dropdown menu
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass('show');
        });
        return false;
    });


    // data-background    
    $(document).on('ready', function () {
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
        });
    });


    // navbar search 
    $('.search-btn').on('click', function() {
        $('.search-area').toggleClass('open');
    });


    // sidebar popup 
    $('.sidebar-btn').on('click', function() {
        $('.sidebar-popup').addClass('open');
        $('.sidebar-wrapper').addClass('open');
    });
    $('.close-sidebar-popup, .sidebar-popup').on('click', function() {
        $('.sidebar-popup').removeClass('open');
        $('.sidebar-wrapper').removeClass('open');
    });


    // wow init
    new WOW().init();


    // hero slider
    $('.hero-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 0,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        items: 1,
        navText: [
            "<i class='far fa-long-arrow-left'></i>",
            "<i class='far fa-long-arrow-right'></i>"
        ],

        onInitialized: function(event) {
        var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
        doAnimations($firstAnimatingElements);
        },

        onChanged: function(event){
        var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
        doAnimations($firstAnimatingElements);
        }
    });

    //hero slider do animations
    function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationDuration = $this.data('duration');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay,
                'animation-duration': $animationDuration,
                '-webkit-animation-duration': $animationDuration,
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}


    // testimonial-slider
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    // preloader
    $(window).on('load', function () {
        $(".preloader").fadeOut("slow");
    });


    // fun fact counter
    $('.counter').countTo();
    $('.counter-box').appear(function () {
        $('.counter').countTo();
    }, {
        accY: -100
    });


    // magnific popup init
    $(".popup-gallery").magnificPopup({
        delegate: '.popup-img',
        type: 'image',
        gallery: {
            enabled: true
        },
    });

    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    // scroll to top
    $(window).scroll(function () {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $("#scroll-top").addClass('active');
        } else {
            $("#scroll-top").removeClass('active');
        }
    });

    $("#scroll-top").on('click', function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);
        return false;
    });


    // navbar fixed top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass("fixed-top");
        } else {
            $('.navbar').removeClass("fixed-top");
        }
    });


    // countdown
    if ($('#countdown').length) {
        $('#countdown').countdown('2028/01/30', function (event) {
            $(this).html(event.strftime('' + '<div class="row">' + '<div class="col countdown-single">' + '<h2 class="mb-0">%-D</h2>' + '<h5 class="mb-0">Day%!d</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%H</h2>' + '<h5 class="mb-0">Hours</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%M</h2>' + '<h5 class="mb-0">Minutes</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%S</h2>' + '<h5 class="mb-0">Seconds</h5>' + '</div>' + '</div>'));
        });
    }


    // copywrite date
    let date = new Date().getFullYear();
    $("#date").html(date);


    // nice select
    $('.select').niceSelect();


    // price range slider
	if($(".price-range").length){
        $( ".price-range" ).slider({
            range: true,
            min: 0,
            max: 999,
            values: [ 100, 500 ],
            slide: function( event, ui ){$( "#price-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );}
        });
        $( "#price-amount" ).val( "$" + $( ".price-range" ).slider( "values", 0 ) + " - $" + $( ".price-range" ).slider( "values", 1 ) );
    }


    //cart quantity
    $(".plus-btn").on("click", function () {
        var i = $(this).closest(".cart-qty").children(".quantity").get(0).value++,
            c = $(this).closest(".cart-qty").children(".minus-btn");
        i > 0 && c.removeAttr("disabled");
    }),
    $(".minus-btn").on("click", function () {
        2 == $(this).closest(".cart-qty").children(".quantity").get(0).value-- && $(this).attr("disabled", "disabled");
    })


    // flexslider
    if ($('.flexslider-thumbnails').length) {
        $('.flexslider-thumbnails').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
        });
    }


    // bootstrap tooltip enable
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })


    // profile image btn
    $(".profile-img-btn").on('click', function () {
        $(".profile-img-file").click(); 
    });


    // list images upload
    $(".list-img-upload").on('click', function () {
        $(".list-img-file").click();
    });


    // store images upload
    $(".store-upload").on('click', function (e) {
        $(e.target).closest(".form-group").find('.store-file').click();
    });


    // message bottom scroll
    if ($('.message-content-info').length) {
        $(function () {
            var chatbox = $('.message-content-info');
            var chatheight = chatbox[0].scrollHeight;
            chatbox.scrollTop(chatheight);
        });
    }


})(jQuery);










