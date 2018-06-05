jQuery(document).ready(function($) {
    "use strict";

    $('.cms-menu-carousel-1col').owlCarousel({
        loop: true,
        nav:false,
        items : 100,
        center: false,
        dots : true,
        margin: 30,
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:1,
            },
            992:{
                items:1,
            },
            1200:{
                items:1,
            }
        }
    });

    $('.cms-menu-carousel-2col').owlCarousel({
        loop: true,
        nav:false,
        items : 100,
        center: false,
        dots : true,
        margin: 60,
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:1,
            },
            992:{
                items:2,
            },
            1200:{
                items:2,
            }
        }
    });

})