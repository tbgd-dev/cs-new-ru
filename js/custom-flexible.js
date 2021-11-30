// jQuery wrapper
(function($) {

    var mobviewportheight = $(window).height() - 50;
    $("body.home .home-slide").css("height", mobviewportheight + "px");

    jQuery(document).ready(function($) {
        $('.language').css('z-index', '1000');
        $('.cs-store').click(function() {
            $('.language').css('top', '0px');
        });
        $('.close-lan').click(function() {
            $('.language').css('top', '-120px');
        });
        $('.message-close').click(function() {
            $('.message-wrap-holder').addClass('message-wrap-holder-hide');
        });

        $('.widget_shopping_cart_content').before('<div class="cart-intro">AROMATICS & GROOMING</div>');

        $('.cart-contents').attr('title', 'View your bag');

        $(".maxmega-next").click(function() {
            //$('body').addClass('menu-open');
            $(this).next(".mega.animate").addClass("active");
            $(".maxmega-allclose").addClass("active");
            $("body").addClass("megalevel2");
            return false;
        });
        $(".maxmega-close, .maxmega-allclose").click(function() {
            //$('body').removeClass('menu-open');
            //$(this).closest(".mega").removeClass("active");
            $(".mega").removeClass("active");
            $(".maxmega-allclose").removeClass("active");
            $("body").removeClass("megalevel2");
            return false;
        });
        $("#hamburger_toggle").click(function() {
            $('body').toggleClass('menu-open');
            $(this).toggleClass('is-active');
            $("#megamenu-wrapper").toggleClass("active");
            return false;
        });

        $(".catlisttoggle").click(function() {
            $(this).toggleClass('is-active');
            $(".catlistwrap").slideToggle('fast');
            return false;
        });

        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 5) {
                $("body").addClass("darkHeader");
            } else {
                $("body").removeClass("darkHeader");
            }
        });

        //Set filters sticky height
        var viewportheight = $(window).height();
        var heroheight = $(".home-hero").height() - 170;

        $(".zoomdown").click(function() {
            $('html, body').animate({ scrollTop: $(".home-hero").offset().top + heroheight }, 1200);
        });

        //$(window).load(function() {
        //var heroheightwhole = $('.home-hero').height();
        //$(".home .col-full-home").css("margin-top", heroheightwhole + "px");

        if ($(".home-hero-alt").length) {
            $('.home-hero-alt').flexslider({
                animation: "slide",
                selector: ".slides > div",
                slideshow: true,
                slideshowSpeed: 4000,
                animationSpeed: 600,
                pauseOnAction: true,
                pauseOnHover: false,
                controlNav: false,
                prevText: "PREV",
                nextText: "NEXT",
            });
        }
        if ($(".products-alt-slide").length) {
            var $window = $(window),
                flexslider = { vars: {} };

            function getGridSize() {
                return (window.innerWidth < 600) ? 2 :
                    (window.innerWidth < 900) ? 3 : 4;
            }
            $('.products-alt-slide').flexslider({
                animation: "slide",
                selector: ".slides > div",
                slideshow: false,
                slideshowSpeed: 4000,
                animationSpeed: 600,
                pauseOnAction: true,
                pauseOnHover: false,
                controlNav: true,
                prevText: "PREV",
                nextText: "NEXT",
                animationLoop: true,
                itemWidth: 210,
                itemMargin: 0,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize() // use function to pull in initial value
            });
        }
        if ($(".products-alt-journal").length) {
            $('.products-alt-journal').flexslider({
                animation: "slide",
                selector: ".slides > div",
                slideshow: false,
                slideshowSpeed: 4000,
                animationSpeed: 600,
                pauseOnAction: true,
                pauseOnHover: false,
                controlNav: true,
                prevText: "PREV",
                nextText: "NEXT",
                animationLoop: true,
                itemWidth: 454,
                itemMargin: 0,
                minItems: 2, // use function to pull in initial value
                maxItems: 2 // use function to pull in initial value
            });
        }
        //});


    });

    // end jQuery wrapper
})(jQuery);