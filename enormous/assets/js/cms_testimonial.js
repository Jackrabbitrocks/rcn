(function($) {
    "use strict";
    $(document).ready(function () {
        $('.cms-slick-wrap').find('.layout-testimonial1').each(function() {
            $('.cms-testimonial-wrap', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: false,
                autoplay: false,
                asNavFor: $('.cms-testimonial-nav', $(this))
            });
            $('.cms-testimonial-nav', $(this)).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: $('.cms-testimonial-wrap', $(this)),
                dots: false,
                arrows: true,
                centerMode: true,
                focusOnSelect: true,
                centerPadding: '0px',
                autoplay: false,
                responsive: [
                    {
                      breakpoint: 992,
                      settings: {
                        slidesToShow: 3,     
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 481,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1   
                      }
                    }
                ]
            });
        });
    });
    $(document).ready(function () {
        $('.cms-slick-wrap').find('.layout-team3').each(function() {
            $('.cms-team-wrap', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: false,
                autoplay: false,
                asNavFor: $('.cms-team-nav', $(this))
            });
            $('.cms-team-nav', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,   
                rows: 2,   
                slidesPerRow: 2,   
                asNavFor: $('.cms-team-wrap', $(this)),
                dots: false,
                arrows: true,
                centerMode: true,
                focusOnSelect: true,
                centerPadding: '0px',
                autoplay: false,
                responsive: [
                    {
                      breakpoint: 992,
                      settings: {
                        slidesToShow: 3,     
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 481,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1   
                      }
                    }
                ]
            });
        });
    });
    $(document).ready(function () {
        $('.cms-slick-wrap').find('.layout-testimonial2').each(function() {
            $('.cms-testimonial-wrap', $(this)).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: true,
                autoplay: false,
                asNavFor: $('.cms-testimonial-nav', $(this))
            });
            $('.cms-testimonial-nav', $(this)).slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: $('.cms-testimonial-wrap', $(this)),
                dots: false,
                arrows: false,
                centerMode: true,
                focusOnSelect: true,
                centerPadding: '0px',
                autoplay: false,
            });
        });
    });

}(jQuery));