/*
Theme Name: Goru
Theme URI: http://tf.wpcashcow.com/goru/
Author: wpsmasher
Author URI: http://wpcashcow.com/
Description: Goru - Ecommerce HTML5 Responsive Template
Version: 1.0
License:
License URI:
*/
/*=======================================================================
 [Table of contents]
 =========================================================================
 1. Revolution Slider 01
 2. Revolution Slider 02
 3. All Carousel
 4. Popup Search
 5. Count Down
 6. Fixed Header
 7. Mobile Menu
 8. Video Popup
 9. Qty
 10. Payment Accordian
 11. popUp Menu
 12. Back To Top
 13. Slider Range
 14. Contact Form Submission
 */

(function ($) {
    'use strict';

    /* Init Vars */
    var trending_slider = $('.trending-slider'),
        popular_tab_slider = $('.popular-tab-slider'),
        related_slider = $('.related-slider'),
        client_logo = $('.client-logo'),
        countdown = $('#countdown-coupone'),
        popular_tab_slider_two = $('.popular-tab-slider-two'),
        popup_video = $('.popup-video'),
        slider_range = $("#slider-range");

    /*--------------------------------------------------------
     / 1. Revolution Slider 01
     /----------------------------------------------------------*/
     var revapi = jQuery('#rev_slider_1').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: 'uranus',
                hide_onmobile: false,
                hide_onleave: false,
                left: {
                    h_align: "right",
                    v_align: "bottom",
                    h_offset: 208,
                    v_offset: 100
                },
                right: {
                    h_align: "right",
                    v_align: "bottom",
                    h_offset: 130,
                    v_offset: 100
                }
            }
        }
    });
    revapi.one('revolution.slide.onloaded', function () {
        var currentSlide = parseInt(revapi.revcurrentslide(), 10) + 1;
        currentSlide = (currentSlide < 10 ? '0'+currentSlide : currentSlide);
        var totalSlides = revapi.revmaxslide();
        totalSlides = (totalSlides < 10 ? '0'+totalSlides : totalSlides);
        $('.slider-counter .total-item').html(totalSlides);
        $('.slider-counter .current-item').html(currentSlide);
    });
    revapi.on('revolution.slide.onafterswap', function (event, data) {

        var currentSlide = revapi.revcurrentslide();
        currentSlide = (currentSlide < 10 ? '0'+currentSlide : currentSlide);
        $('.slider-counter .current-item').html(currentSlide);
    });
 
    /*--------------------------------------------------------
     / 2. Revolution Slider 02
     /----------------------------------------------------------*/
    var revapi2 = jQuery('#rev_slider_2').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: 'uranus',
                hide_onmobile: false,
                hide_onleave: false,
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 90,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 90,
                    v_offset: 0
                }
            }
        }
    });
    revapi2.one('revolution.slide.onloaded', function () {
        var currentSlide = parseInt(revapi2.revcurrentslide(), 10) + 1;
        currentSlide = (currentSlide < 10 ? '0'+currentSlide : currentSlide);
        var totalSlides = revapi2.revmaxslide();
        totalSlides = (totalSlides < 10 ? '0'+totalSlides : totalSlides);
        $('.slider-counter .total-item').html(totalSlides);
        $('.slider-counter .current-item').html(currentSlide);
    });
    revapi2.on('revolution.slide.onafterswap', function (event, data) {

        var currentSlide = revapi2.revcurrentslide();
        currentSlide = (currentSlide < 10 ? '0'+currentSlide : currentSlide);
        $('.slider-counter .current-item').html(currentSlide);
    });
    /*--------------------------------------------------------
     / 3. All Carousel
     /----------------------------------------------------------*/

    /*----- 3.1 Trending Slider -----*/
    trending_slider.owlCarousel({
        loop: false,
        margin: 0,
        responsiveClass: true,
        dots: false,
        smartSpeed: 700,
        animateIn: 'slideInRight',
        animateOut: 'slideOutRight',
        nav: true,
        navText: ['<i class="twi-long-arrow-alt-left1"></i>', '<i class="twi-long-arrow-alt-right1"></i>'],
        items: 1,
    });
    /*----- 3.2 Popular Product Slider -----*/
    popular_tab_slider.owlCarousel({
        loop: false,
        margin: 30,
        responsiveClass: true,
        dots: false,
        smartSpeed: 700,
        animateIn: 'slideInRight',
        animateOut: 'slideOutRight',
        nav: true,
        navText: ['<i class="twi-long-arrow-alt-left1"></i>', '<i class="twi-long-arrow-alt-right1"></i>'],
        items: 3,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
    /*----- 3.3 Popular Product Slider 02 -----*/
    popular_tab_slider_two.owlCarousel({
        loop: false,
        margin: 40,
        responsiveClass: true,
        dots: false,
        smartSpeed: 700,
        animateIn: 'slideInLeft',
        animateOut: 'slideOutRight',
        nav: true,
        navText: ['<i class="twi-long-arrow-alt-left1"></i>', '<i class="twi-long-arrow-alt-right1"></i>'],
        items: 4,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2,
                margin: 30
            },
            992: {
                items: 3,
                margin: 30
            },
            1200: {
                items: 4
            }
        }
    });

    /*----- 3.4 Related Product Slider -----*/
    related_slider.owlCarousel({
        loop: false,
        margin: 30,
        responsiveClass: true,
        dots: false,
        smartSpeed: 700,
        autoplay: true,
        autoplayTimeout: 3000,
        animateIn: 'slideInLeft',
        animateOut: 'slideOutRight',
        nav: false,
        items: 3,
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    /*----- 3.5 Related Product Slider -----*/
    client_logo.owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        dots: false,
        smartSpeed: 700,
        autoplay: false,
        autoplayTimeout: 3000,
        animateIn: 'slideInLeft',
        animateOut: 'slideOutRight',
        nav: false,
        items: 5,
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 2
            },
            700: {
                items: 3
            },
            992: {
                items: 5
            }
        }
    });
    /*--------------------------------------------------------
    / 4. Popup Search and Scroll Off
    /----------------------------------------------------------*/   
   $('.search-toggles').on('click', function (e) {
        e.preventDefault();
        $('.popup-search-sec').toggleClass('active');
    });
    $('.search-closer').on('click', function () {
        $('.popup-search-sec').removeClass('active');
    });

    $('.scroll-down a').on('click', function () {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 68}, 1000);
        return false;
    });
    $('.colse-popup').on('click', function (e) {
        e.preventDefault();
        $('.newsletter-popup').fadeOut('medium');
    });

    /*--------------------------------------------------------
     / 5. Count Down
     /----------------------------------------------------------*/
    if (countdown.length > 0) {
        var d = countdown.attr('data-day');
        var m = countdown.attr('data-month');
        var y = countdown.attr('data-year');
        countdown.countdown({
            until: new Date(y, m - 1, d),
            format: 'DHMS'
        });
    }

    /*--------------------------------------------------------
     / 6. Fixed Header
     /--------------------------------------------------------*/
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 40)
        {
            $(".fix-header").addClass('sticky animated fadeIn');
        } else
        {
            $(".fix-header").removeClass('sticky animated fadeIn');
        }
    });


    /*--------------------------------------------------------
    / 7. Mobile Menu
    /---------------------------------------------------------*/
    $(window).on("load resize", function (e) {
        if ($(window).width() < 991) {
            $('.mobile-btn a').on('click', function (e) {
                e.preventDefault();
                $('.mobile-menu > ul').stop(true, true).slideToggle();
            });
            $('.mobile-menu ul li.menu-item-has-children').each(function () {
                var $this = $(this);
                $this.append('<span class="submenu-toggler"><i class="twi-caret-down"></i></span>');
            });
            $('.mobile-menu ul li.menu-item-has-children > span.submenu-toggler').on('click', function () {
                var $this = $(this);

                if ($(this).hasClass('active-span')) {
                    $('i', $this).removeClass('twi-caret-up').addClass('twi-caret-down');
                } else {
                    $('i', $this).addClass('twi-caret-up').removeClass('twi-caret-down');
                }

                $(this).prev('ul.sub-menu').slideToggle();
                $(this).toggleClass('active-span');
            });
        };
    });
    /*--------------------------------------------------------
    / 8. Video Popup
    /---------------------------------------------------------*/
    popup_video.lightcase({
        transition: 'elastic',
        showSequenceInfo: false,
        slideshow: false,
        swipe: true,
        showTitle: false,
        controls: true
    });

    /*--------------------------------------------------------
    / 9. Qty
    /----------------------------------------------------------*/
    if ($(".qtyBtn").length > 0)
    {
        $(".btnMinus").on('click', function () {
            var vals = parseInt($(this).next(".carqty").val(), 10);

            if (vals > 1)
            {
                vals -= 1;
                $(this).next(".carqty").val(vals);
            } else
            {
                $(this).next(".carqty").val(vals);
            }
            return false;
        });
        $(".btnPlus").on('click', function () {
            var vals = parseInt($(this).prev(".carqty").val(), 10);
            vals += 1;
            $(this).prev(".carqty").val(vals);
            return false;
        });
    }

    /*--------------------------------------------------------
     / 10. Payment Accordian
     /---------------------------------------------------------*/
     if($(".wc_payment_methods").length > 0)
    {
        $(".wc_payment_methods li").each(function(){
            $('input[type="radio"]', this).on('click', function(e){
                var ids = $(this).attr('id');
                if($('div.' + ids).hasClass('visibales'))
                {

                }else
                {
                    $(".payment_box").removeClass('visibales');
                    $(".payment_box").slideUp('fast');
                    $('div.' + ids).slideDown('fast').addClass('visibales');
                }
            });
        });
    }
    /*--------------------------------------------------------
    / 11. popUp Menu
    /---------------------------------------------------------*/
    $('#hamburger').on('click', function (e) {
        e.preventDefault();
        $('.popup_menu').addClass('active').fadeIn();
        setTimeout(function () {
            if ($('.popup_menu').hasClass('active')) {
                var tlMenu = new TimelineLite();
                tlMenu.set($(".animated_menu"), {y: 80, opacity: 0});
                $(".animated_menu").each(function (index, element) {
                    tlMenu.to(element, 0.5, {y: 0, opacity: 1, delay: 0.4, ease: Power2.easeOut}, index * 0.1)
                });
            } else {
                var tlMenu = new TimelineLite();
                $(".animated_menu").each(function (index, element) {
                    tlMenu.to(element, 0.25, {y: -80, opacity: 0, ease: Power2.easeIn}, index * 0.05)
                });
            }

        }, 20)
    });
     if ($(".menu_popup").length > 0)
    {
        $(".menu_popup ul li.menu-item-has-children > a").on('click', function (e) {
            e.preventDefault();
            if ($(this).parent('li').hasClass('active'))
            {
                $(this).parent('li').removeClass('active');
                $(this).next('ul.sub-menu').slideUp('slow');
            } else
            {
                $(".menu-item-has-children ul.sub-menu").slideUp('slow');
                $(".menu-item-has-children.active").removeClass("active");
                $(this).parent().toggleClass('active');
                $(this).next('ul.sub-menu').slideToggle('slow');
            }
        });
    }
    $('#close_menu').on('click', function () {
        var tlMenu = new TimelineLite();
        $(".animated_menu").each(function (index, element) {
            tlMenu.to(element, 0.25, {y: -80, opacity: 0, ease: Power2.easeIn}, index * 0.05)
        });
        $(".popup_menu ul.sub-menu").slideUp('slow', function () {
            $(".menu-item-has-children.active").removeClass("active");
            $('.popup_menu').removeClass('active');
        });
        setTimeout(function () {
            $('.popup_menu').fadeOut()
        }, 500)
    });
    /*--------------------------------------------------------
    / 12. Back To Top And Loader
    /---------------------------------------------------------*/
    var back = $("#backtotop"),
            body = $("body, html");
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > $(window).height())
        {
            back.css({bottom: '50px', opacity: '1', visibility: 'visible'});
        } else
        {
            back.css({bottom: '-50px', opacity: '0', visibility: 'hidden'});
        }

    });
    body.on("click", "#backtotop", function (e) {
        e.preventDefault();
        body.animate({scrollTop: 0}, 800);
        return false;
    });
    $(window).on('load', function (event) {
        $('#preloader').delay(800).fadeOut(500);
    });
    /*--------------------------------------------------------
    / 13. Slider Range
    /--------------------------------------------------------*/
    if (slider_range.length > 0) {
        slider_range.slider({
            range: true,
            min: 0,
            max: 999,
            values: [0, 999],
            slide: function (event, ui) {
                $("#slider-range span.ui-slider-handle").eq(0).html("<span>" +"$" + ui.values[ 0 ] + "</span>");
                $("#slider-range span.ui-slider-handle").eq(1).html("<span>" +"$" + ui.values[ 1 ] + "</span>");
            }
        });
        $("#slider-range span.ui-slider-handle").eq(0).html("<span>" +"$" + $("#slider-range").slider("values", 0) + "</span>");
        $("#slider-range span.ui-slider-handle").eq(1).html("<span>" +"$" + $("#slider-range").slider("values", 1) + "</span>");
    }
    
    /*--------------------------------------------------------
    / 14. Contact Form Submission
    /--------------------------------------------------------*/
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();
        var $this = $(this);

        $('button[type="submit"]', this).attr('disabled', 'disabled');
        $('.goru_loader', this).fadeIn();

        var form_data = $this.serialize();

        var required = 0;
        $(".required", this).each(function () {
            if ($(this).val() === '')
            {
                $(this).addClass('reqError');
                required += 1;
            } else
            {
                if ($(this).hasClass('reqError'))
                {
                    $(this).removeClass('reqError');
                    if (required > 0)
                    {
                        required -= 1;
                    }
                }
            }
        });

        if (required === 0) {
            $.ajax({
                type: 'POST',
                url: 'assets/ajax/mail.php',
                data: {form_data: form_data},
                success: function (data) {
                    $('button[type="submit"]', $this).removeAttr('disabled');
                    $('.goru_loader', $this).fadeOut();

                    $this.remove('.goru_con_message');
                    $('.goru_con_message', $this).fadeIn().html('Congratulation! Message successfully sent.');
                    setTimeout(function () {
                        $('.goru_con_message', $this).fadeOut().html('');
                    }, 5000);
                }
            });
        } else {
            $('button[type="submit"]', $this).removeAttr('disabled');
            $('.goru_loader', $this).fadeOut();
            $('.goru_con_message', $this).fadeOut().html('');
        }

    });
    $(".required").on('keyup', function () {
        $(this).removeClass('reqError');
    });


})(jQuery);