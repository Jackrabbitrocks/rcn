jQuery(document).ready(function($) {
	"use strict";

	/* window */
	var window_width, window_height, scroll_top;

	/* admin bar */
	var adminbar = $('#wpadminbar');
	var adminbar_height = 0;

	/* header menu */
	var header = $('#cshero-header');
	var header_top = 0;

	/* scroll status */
	var scroll_status = '';

	/**
	 * window load event.
	 * 
	 * Bind an event handler to the "load" JavaScript event.
	 * @author Fox
	 */
	$(window).on('load', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();

		/** current window width */
		window_width = $(window).width();

		/** current window height */
		window_height = $(window).height();

		/* get admin bar height */
		adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0 ;

		/* get top header menu */
		header_top = header.length > 0 ? header.offset().top - adminbar_height : 0 ;

		/* check sticky menu. */
		cms_stiky_menu();

		cms_add_class();

		cms_enscroll();

		/* page loading */
		cms_page_loading();

		cms_padding_section();

		enormous_quick_view();

		cms_back_to_top();
	});

	/**
	 * reload event.
	 * 
	 * Bind an event handler to the "navigate".
	 */
	window.onbeforeunload = function(){ cms_page_loading(1); }
	/**
	 * resize event.
	 * 
	 * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	$(window).on('resize', function(event, ui) {
		/** current window width */
		window_width = $(event.target).width();

		/** current window height */
		window_height = $(window).height();

		/** current scroll */
		scroll_top = $(window).scrollTop();

		/* check sticky menu. */
		cms_stiky_menu();

		cms_add_class();

		cms_enscroll();

		cms_padding_section();

	});
	
	/**
	 * scroll event.
	 * 
	 * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
	 * @author Fox
	 */
	$(window).on('scroll', function() {
		/** current scroll */
		scroll_top = $(window).scrollTop();

		/* check sticky menu. */
		cms_stiky_menu();

		cms_back_to_top();
	});

	/**
	 * Stiky menu
	 *
	 * Show or hide sticky menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	function cms_stiky_menu() {
		if ( $('#cshero-header-inner').hasClass('header-top') && $('#cshero-header').hasClass('sticky-desktop') && scroll_top > 50 && window_width > 991) {
			header.addClass('header-fixed');
			$('body').addClass('hd-fixed');
		} else if ( $('#cshero-header-inner').hasClass('no-header-top') && $('#cshero-header').hasClass('sticky-desktop') && scroll_top > 0 && window_width > 991) {
			header.addClass('header-fixed');
			$('body').addClass('hd-fixed');
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('hd-fixed');
		}
	}

	/**
	 * Mobile menu
	 * 
	 * Show or hide mobile menu.
	 * @author Fox
	 * @since 1.0.0
	 */
	
	$('body').on('click', '#cshero-menu-mobile .cms-icon-menu', function(){
		var navigation = $(this).parents().find('#cshero-header-navigation');
		if(!navigation.hasClass('collapse')){
			navigation.addClass('collapse');
		} else {
			navigation.removeClass('collapse');
		}
	});
	/**
	 * Enscroll
	 * 
	 * 
	 * @author Fox
	 */
	function cms_enscroll() {
		$('header #cshero-header-inner.header-22 #menu-main-menu').enscroll();      
		$('header #cshero-header-inner.header-23 #menu-main-menu').enscroll();   
		$('#cshero-header .widget_shopping_cart').enscroll();   
		$('body.hidden-sidebar-active .cshero-hidden-sidebar').enscroll();   
		$('#navigation-left .main-navigation').enscroll();    
	}       

	/**
	 * Page Loading.
	 */
	function cms_page_loading($load) {
		switch ($load) {
		case 1:
			$('#cms-loadding').css('display','block')
			break;
		default:
			$('#cms-loadding').css('display','none')
			break;
		}
	}

	/**
	 * Back to top
	 */
	$('body').on('click', '.ef3-back-to-top', function () {
		$('body,html').animate({scrollTop:0}, '1000');
	});

	/* Show or Hide Buttom  */
	function cms_back_to_top(){
		/* Back To Top */
        if (scroll_top < window_height) {
        	$('.ef3-back-to-top').addClass('off').removeClass('on');
        } else {
        	$('.ef3-back-to-top').removeClass('off').addClass('on');
        }
	}

	/* Replae placeholder input mail newsletter */

	$('body').on('click', '.search',function(){
		setTimeout(function(){$('.cshero-search-inner .searchform input#s').focus()}, 500);
	});
	
	$('.cshero-popup-search #searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Type Words Then Enter");
	    }    
	});
	$('.widget_search .searchform').find("input[type='text']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Type and hit enter ...");               
	    }    
	});

	$('.widget_newsletterwidget .tnp-widget form').find("input[type='email']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Email:");               
	    }    
	});

	$('footer .widget_newsletterwidget .tnp-widget form').find("input[type='email']").each(function(ev) {
	    if(!$(this).val()) { 
	        $(this).attr("placeholder", "Subscribe Our Newsletter");               
	    }    
	});
	/* Hide search form + Menu Popup*/
	$(document).on('click',function(e){

		if(e.target.className == 'cshero-popup-menu open')
			$('.cshero-popup-menu').removeClass('open'); 

	});
	/* Menu Popup */
	$(".menu-popup").on('click',function(){
		$('.cshero-popup-menu').toggleClass('open');
	})
	$(".menu-popup-close").on('click',function(){
		$('.cshero-popup-menu').removeClass('open');
	})

	/* Video Light Box */
	$('.cms-video-popup').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false   
	});

	/* CMS Gallery Popup */
    $('.cms-gallery-item').magnificPopup({
	  delegate: 'a.p-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade'
	});

	/* CMS Image Popup */
    $('.cms-images-zoom').magnificPopup({
	  delegate: 'a.z-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade',
	  // other options
	});

	$('.cms-image-zoom').magnificPopup({
	  delegate: 'a.z-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: false
	  },
	  mainClass: 'mfp-fade',
	  // other options
	});
	
	/**
	 * Add Class
	 * 
	 * 
	 * @author Fox
	 */
	function cms_add_class() {
	    $(".nav-button-icon .fa-search").click(function(){
			$('.cshero-popup-search').toggleClass('open');
	    })

	    $("#cshero-header .hidden-sidebar").click(function(){
			$('.cshero-hidden-sidebar').toggleClass('open');
			$('body').toggleClass('hidden-sidebar-active');
	    })

	    $('.cshero-menu-mobile i').click(function(){
			$('#page').find('#cshero-header-inner').toggleClass('open');       
		})   

		$(".nav-button-icon .fa-search").on('click',function(){
			$('.widget-search-header').toggleClass('open');
			$('.widget_shopping_cart').removeClass('open');
	    })
	    $(".nav-button-icon .shopping-cart-wrapper").on('click',function(){
			$('.widget_shopping_cart').toggleClass('open');
			$('.widget-search-header').removeClass('open'); 
	    }) 

	    var h_w_height = $(window).height();
	    var h_f_height = $(window).height() - 80;
	    if($(window).width() > 1024) {
			$('.cms-footer5').parents('#cms-theme').find('.site-content').css('margin-bottom', h_w_height+'px');
			$('.cms-footer5').parents('#cms-theme').find('.site-content').css('background-color', '#fff');
			$('#cshero-footer.cms-footer5').css('height', h_f_height+'px');
		}
	}

	$(".cms-fancybox-item").hover(function(){
	  if(!$(this).hasClass("hover")){
	   $(this).addClass("hover")
	  }
	 },function(){
	  if($(this).hasClass("hover")){
	   $(this).removeClass("hover")
	  }
	 })

	/* Remove Search Popup & Hidden Sidebar */
	$('.sidebar-close').click(function(){
    	$('.cshero-hidden-sidebar').removeClass('open');
    	$('body').removeClass('hidden-sidebar-active');
    });

    /* CMS Modal Popup */
	$('.popup-modal').magnificPopup({    
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

	/**
	 * One page
	 *
	 * @author Fox
	 */
	if(typeof(one_page_options) != "undefined"){
		one_page_options.speed = parseInt(one_page_options.speed);
		$('#site-navigation').singlePageNav(one_page_options);
	}

	$('.cms-counter-canvas').each(function () {
		var _couter = $(this).data('process');
		var canvas = $(this).get(0);
		var ctx = canvas.getContext("2d");
		ctx.beginPath();
		ctx.lineWidth = 5;  
		ctx.strokeStyle = 'rgba(0,0,0,0.2)';
		ctx.arc(66,66,62,0*Math.PI,parseFloat(_couter)*Math.PI);
		ctx.stroke();
	})

	/* CMS Gallery Popup */
    $('.cms-grid-item').magnificPopup({
	  delegate: 'a.p-view', // child items selector, by clicking on it popup will open
	  type: 'image',
	  gallery: {
	     enabled: true
	  },
	  mainClass: 'mfp-fade'
	});

	/* Woo - Add class */
    $('.plus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepUp();
    });
    $('.minus').on('click', function(){
    	$(this).parent().find('input[type="number"]').get(0).stepDown();
    });

    /* Padding Section */
    function cms_padding_section() {
    	if($(window).width() > 1024) {
			var w_desktop = $(window).width();
			var w_padding = (w_desktop - 1140)/2;
			$('.bg-full-color-left > .vc_column_container:first-child').css('padding-left',w_padding+'px');
			$('.bg-full-color-right > .vc_column_container:last-child').css('padding-right',w_padding+'px');

			$('.row-container').css('padding-left',w_padding+'px');
			$('.row-container').css('padding-right',w_padding+'px');
		}
	}

	function enormous_quick_view(){
		$('.product-quick-view').each(function(){
			$(this).click(function(){
				$('.product-quick-view-loadding').show();
				$('.product-quick-view-loadding-inner').show();
				var $product_id=$(this).data('product');
				$.post(ajaxurl, {
					'action' : 'quick_view',
					'product_id' : $product_id
				}, function(response) {
					$('.modal-product-item').remove();
					$('body').append(response);
					$('.modal-product-'+$product_id).modal('show');
					enormous_product_quantity();
					$('.product-quick-view-loadding-inner').hide();
					$('.product-quick-view-loadding').hide();
				})
			})
		})
	}
	function enormous_product_quantity() {
		$('.compucare-product-quantity').click(function(e){
			e.preventDefault();
			var new_quantity,multi=$(this).data('multi'),product=$(this).data('product');
			var old_quantity=$('.quantity-'+product).val();
			var min=$('.quantity-'+product).data('min');
			var max=$('.quantity-'+product).data('max');
			var add_to_cart=$('.add_to_cart_'+product);
			if(multi=='-1'){
				new_quantity=parseInt(old_quantity) - 1;
				if(new_quantity < parseInt(min) ){
					new_quantity = min;
				}
				$('.quantity-'+product).val(new_quantity) ;
				$('.quantity-'+product).attr('value',new_quantity) ;
				add_to_cart.attr('data-quantity',new_quantity);
			}else if(multi=='1'){

				new_quantity=parseInt(old_quantity) + 1;
				if(new_quantity > parseInt(max) ){
					new_quantity = max;
				}
				$('.quantity-'+product).val(new_quantity) ;
				$('.quantity-'+product).attr('value',new_quantity) ;
				add_to_cart.attr('data-quantity',new_quantity);
			}

		})
		$('.compucare-quantity-input').change(function(){    

			var product=$(this).data('product');
			var quantity=$(this).val();
			var min=$(this).data('min');
			var max=$(this).data('max');
			if(parseInt(quantity) > parseInt(max)){
				quantity=parseInt(max);
			}else if(parseInt(quantity) < parseInt(min)){
				quantity=parseInt(min);
			}
			$(this).val(quantity);
			$(this).attr('value',quantity);
			$('.add_to_cart_'+product).attr('data-quantity',quantity);
		})
	}
	/* Add Class Input Contact Form */

    $(".wpcf7-form-control").focus(function(){
        $('.wpcf7-row-two').removeClass('input-filled-active');
        $(this).parents('.wpcf7-row-two').addClass('input-filled-active');
    })
    $(".wpcf7-form-control").focusout(function(){
        $(this).parents('.wpcf7-row-two').removeClass('input-filled-active');
    });
    var filled = $(".wpcf7-form-control").val();    
    if(filled == '') {
        $('.wpcf7-form-control').parents('.wpcf7-row-two').removeClass('input-filled-hold');
    }
    $(".wpcf7-form-control").change(function(){ 
        $(this).parents('.wpcf7-row-two').addClass('input-filled-hold');
    });

    /* Hide search form. */
	$(document).on('click',function(e){
		
		if(e.target.className == 'cshero-popup-search open')
		
		$('.cshero-popup-search').removeClass('open');
    });

    /* Cart */
	var h_cart_list = $('#cshero-header .product_list_widget').height();
	if( h_cart_list > 210 ) {
		$('#cshero-header .product_list_widget').css('height', 269+'px');
		$('#cshero-header .product_list_widget').enscroll();
	}

	/* Footer v.6 */
	var h_footer_inner = ($('.bd-footer6 .cshero-footer6 .footer-top-item-inner').height() + 90)/2;
	if($(window).width() > 1024) {
		$('.bd-footer6 .cshero-footer6 .footer-top-item-inner').css('margin-top', -h_footer_inner+'px');
	}
	
	/* Row Background Image Slider */
	$('.row-bg-slider').append( "<div class='row-bg-slider-inner'></div>" );

	$(".btn-buy-close").on('click',function(){
		$('#cms-buy-button-fixed').toggleClass('hide');
    })
});       