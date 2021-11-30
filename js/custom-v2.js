/*!
 * JavaScript Cookie v2.1.4
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */

/*
;
(function(factory) {
    var registeredInModuleLoader = false;
    if (typeof define === 'function' && define.amd) {
        define(factory);
        registeredInModuleLoader = true;
    }
    if (typeof exports === 'object') {
        module.exports = factory();
        registeredInModuleLoader = true;
    }
    if (!registeredInModuleLoader) {
        var OldCookies = window.Cookies;
        var api = window.Cookies = factory();
        api.noConflict = function() {
            window.Cookies = OldCookies;
            return api;
        };
    }
}(function() {
    function extend() {
        var i = 0;
        var result = {};
        for (; i < arguments.length; i++) {
            var attributes = arguments[i];
            for (var key in attributes) {
                result[key] = attributes[key];
            }
        }
        return result;
    }

    function init(converter) {
        function api(key, value, attributes) {
            var result;
            if (typeof document === 'undefined') {
                return;
            }

            // Write

            if (arguments.length > 1) {
                attributes = extend({
                    path: '/'
                }, api.defaults, attributes);

                if (typeof attributes.expires === 'number') {
                    var expires = new Date();
                    expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
                    attributes.expires = expires;
                }

                // We're using "expires" because "max-age" is not supported by IE
                attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

                try {
                    result = JSON.stringify(value);
                    if (/^[\{\[]/.test(result)) {
                        value = result;
                    }
                } catch (e) {}

                if (!converter.write) {
                    value = encodeURIComponent(String(value))
                        .replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
                } else {
                    value = converter.write(value, key);
                }

                key = encodeURIComponent(String(key));
                key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
                key = key.replace(/[\(\)]/g, escape);

                var stringifiedAttributes = '';

                for (var attributeName in attributes) {
                    if (!attributes[attributeName]) {
                        continue;
                    }
                    stringifiedAttributes += '; ' + attributeName;
                    if (attributes[attributeName] === true) {
                        continue;
                    }
                    stringifiedAttributes += '=' + attributes[attributeName];
                }
                return (document.cookie = key + '=' + value + stringifiedAttributes);
            }

            // Read

            if (!key) {
                result = {};
            }

            // To prevent the for loop in the first place assign an empty array
            // in case there are no cookies at all. Also prevents odd result when
            // calling "get()"
            var cookies = document.cookie ? document.cookie.split('; ') : [];
            var rdecode = /(%[0-9A-Z]{2})+/g;
            var i = 0;

            for (; i < cookies.length; i++) {
                var parts = cookies[i].split('=');
                var cookie = parts.slice(1).join('=');

                if (cookie.charAt(0) === '"') {
                    cookie = cookie.slice(1, -1);
                }

                try {
                    var name = parts[0].replace(rdecode, decodeURIComponent);
                    cookie = converter.read ?
                        converter.read(cookie, name) : converter(cookie, name) ||
                        cookie.replace(rdecode, decodeURIComponent);

                    if (this.json) {
                        try {
                            cookie = JSON.parse(cookie);
                        } catch (e) {}
                    }

                    if (key === name) {
                        result = cookie;
                        break;
                    }

                    if (!key) {
                        result[name] = cookie;
                    }
                } catch (e) {}
            }

            return result;
        }

        api.set = api;
        api.get = function(key) {
            return api.call(api, key);
        };
        api.getJSON = function() {
            return api.apply({
                json: true
            }, [].slice.call(arguments));
        };
        api.defaults = {};

        api.remove = function(key, attributes) {
            api(key, '', extend(attributes, {
                expires: -1
            }));
        };

        api.withConverter = init;

        return api;
    }

    return init(function() {});
})); 
*/

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
    /*$('.cart_totals h2').text("Bag totals");*/

    /*var popupUkSignUp = $('.popuk-signup');
    var popupEUSignUp = $('.popeu-signup');
    var popupUSSignUp = $('.popus-signup');

    //Set up different popups depends on the GeoLocation
    if (popupUkSignUp) {
        popupUkSignUp.on('click', '.sign-up', function(e) {
            e.preventDefault();
            var redirect = $(this).attr('href');
            Cookies.set('csf-user-signed', 'true', { expires: 90 });
            popupUkSignUp.fadeOut('fast', function() {
                window.location.href = redirect;
            })
        });
        popupUkSignUp.on('click', '.sign-close', function(e) {
            e.preventDefault();
            popupUkSignUp.fadeOut(function() {
                //popupSignUp.remove();
                Cookies.set('csf-user-signed', 'true', { expires: 30 });
            });
        });
    }
    if (popupEUSignUp) {
        popupEUSignUp.on('click', '.sign-up', function(e) {
            e.preventDefault();
            var redirect = $(this).attr('href');
            Cookies.set('csf-user-signed', 'true', { expires: 90 });
            popupEUSignUp.fadeOut('fast', function() {
                window.location.href = redirect;
            })
        });
        popupEUSignUp.on('click', '.sign-close', function(e) {
            e.preventDefault();
            popupEUSignUp.fadeOut(function() {
                popupEUSignUp.remove();
                Cookies.set('csf-user-signed', 'true', { expires: 30 });
            });
        });
    }
    if (popupUSSignUp) {
        popupUSSignUp.on('click', '.sign-up', function(e) {
            e.preventDefault();
            var redirect = $(this).attr('href');
            Cookies.set('csf-user-signed', 'true', { expires: 90 });
            popupUSSignUp.fadeOut('fast', function() {
                window.location.href = redirect;
            })
        });
        popupUSSignUp.on('click', '.sign-close', function(e) {
            e.preventDefault();
            popupUSSignUp.fadeOut(function() {
                popupUSSignUp.remove();
                Cookies.set('csf-user-signed', 'true', { expires: 30 });
            });
        });
    }
    */

    $(window).on('load', function() {
        //$("nav#menu").addClass('show');
        /*$('.woocommerce-mini-cart__buttons .wc-forward:first-of-type').text("View bag");*/
        //Set up different popups depends on the GeoLocation
        /*if ($('body').hasClass('geoip-country-GB')) {
            setTimeout(function() {
                popupUkSignUp.fadeIn();
            }, 1000);
            //console.log(popupUKSignUp);
            console.log('You are from UK!');
            var body = $('body');
        } else if ($('body').hasClass('geoip-continent-EU') && !$('body').hasClass('geoip-country-GB')) {
            setTimeout(function() {
                popupEUSignUp.fadeIn();
            }, 1000);
            console.log(popupEUSignUp);
            console.log('You are from EU!');
        } else if ($('body').hasClass('geoip-country-US')) {
            setTimeout(function() {
                popupUSSignUp.fadeIn();
            }, 1000);
            //console.log('You are from US!'); 
            console.log(popupUSSignUp);
        }*/

        /*$('.free-samples-slider').on('init', function() {
            $(".free-samples").addClass('showsamples');
        });
        $('.free-samples-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
            fade: false,
            dots: false,
            arrows: true,
            autoplaySpeed: 4000,
            nextArrow: '.next_caro',
            prevArrow: '.previous_caro'
        });*/

        /*if (parseInt($('.sampletotal').text()) < 51) {
            setTimeout(function() {
                $(".free-samples").hide();
            }, 200);
        }*/
    });

    /*var popupCart = $('.popup-cart-info');
    if (popupCart) {
        popupCart.on('click', '.button.redirect', function(e) {
            e.preventDefault();
            var redirect = $(this).attr('href');
            Cookies.set('cs_cart_fragrance', '1', { expires: 1, domain: 'czechandspeake.com' });
            Cookies.set('cs_cart_bathrooms', '1', { expires: 1, domain: 'czechandspeake.com' });
            popupCart.fadeOut('fast', function() {
                window.location.href = redirect;
            })
        });
        popupCart.on('click', '.sign-close, .pop-close', function(e) {
            e.preventDefault();
            popupCart.fadeOut(function() {
                Cookies.set('cs_cart_fragrance', '1', { expires: 1, domain: 'czechandspeake.com' });
                Cookies.set('cs_cart_bathrooms', '1', { expires: 1, domain: 'czechandspeake.com' });
                popupCart.remove();
            });
        });
    }
    $(window).on('load', function() {
        if (popupCart) {
            console.log(popupCart);
            setTimeout(function() {
                popupCart.fadeIn();
            }, 1000);
        }
    });*/

    //var windowWidth = $(window).width();

    //if( windowWidth < 741){
    //$('.storefront-handheld-footer-bar').addClass( "Fixed" );
    //}

    /* Jquery Mmenu */
    //saving the manu data in a variable to send to the mmenu API
    var $menu = $("#menu").mmenu({

        //Effetcs
        extensions: ["pagedim-black", "fx-panels-zoom"],

        //Top and Bottom Tabs
        "navbars": [{
                position: "top",
                content: [
                    "<a href='#panel-fragrance'>Aromatic</a>",
                    "<a href='https://www.czechandspeake.com/bathrooms/'>Bathrooms</a>"
                ]
            },
            {
                position: "bottom",

                content: [
                    '<a href="https://www.czechandspeake.com/fragrance/about-us/" title="About">About</a>',
                    '<a href="https://www.czechandspeake.com/fragrance/contact-us/" title="About">Contact</a>',
                    '<a href="https://www.czechandspeake.com/fragrance/journal/" title="About">Journal</a>',
                ]
            }
        ]
    });

    /* Integrate hamburger css with The API */

    //the humburger to animate
    var $icon = $("#hamburger_toggle");
    var API = $menu.data("mmenu");

    $icon.on("click", function() {
        API.open();
    });

    /*API.bind("open:finish", function() {
        setTimeout(function() {
            $icon.addClass("is-active");
            $('#masthead').addClass("is-active");
            $('.header.mm-slideout').addClass("is-active");
            $('.storefront-handheld-footer-bar').addClass("is-active");
        }, 100);
    });
    API.bind("close:start", function() {
        setTimeout(function() {
            $icon.removeClass("is-active");
            $('#masthead').removeClass("is-active");
            $('.header.mm-slideout').removeClass("is-active");
            $('.storefront-handheld-footer-bar').removeClass("is-active");
        }, 100);
    });*/

});