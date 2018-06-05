function showMulti(num){
		var next= num+1;
		$('.rem_flight'+num).hide();
		$('.add_flight'+num).hide();
		$('.air_flight_'+next).slideDown();
	}
	function hideMulti(num){
		var prev= num-1;
		$('.air_flight_'+num).slideUp();
		$('.rem_flight'+prev).show();
		$('.add_flight'+prev).show();
	}
	$(document).ready(function() {	
		var $rs_box = $( document.getElementById( 'rs_box' ));
		$('#rs_search_multi').searchbox({
			refid:8396,
			environment: "prod",
			hotel:{
				elements:{
					form:".rs_hotel_form",
					chk_in:".rs_chk_in, .rs_chk_in_calendar, .rs_date_chk_in",
					chk_out:".rs_chk_out, .rs_chk_out_calendar, .rs_date_chk_out",
					chk_in_display:".rs_date_chk_in",
					chk_out_display:".rs_date_chk_out"
				},
				calendar:{
					today: true,
					output_format:"<div class='rs_mobi_chk_day'>[d]</div><div class='rs_mobi_chk_month'>[F]</div>"
				},
				select_name:true
			},
			car:{
				elements:{
					form:".rs_car_form",
					chk_in:".rs_chk_in, .rs_chk_in_calendar, .rs_date_chk_in",
					chk_out:".rs_chk_out, .rs_chk_out_calendar, .rs_date_chk_out",
					chk_in_display:".rs_date_chk_in",
					chk_out_display:".rs_date_chk_out",
				},
				calendar:{
					today: true,
					output_format:"<div class='rs_mobi_chk_day'>[d]</div><div class='rs_mobi_chk_month'>[F]</div>",
				}		
			},
			air: {
				elements: {
					form: ".rs_air_form",			
					chk_in:".rs_chk_in, .rs_chk_in_calendar, .rs_date_chk_in",
					chk_out:".rs_chk_out, .rs_chk_out_calendar, .rs_date_chk_out",
					chk_in_display: '.rs_mobiin',
					chk_in1_display: '.rs_mobi1',
					chk_in2_display: '.rs_mobi2',
					chk_in3_display: '.rs_mobi3',
					chk_in4_display: '.rs_mobi4',
					chk_in5_display: '.rs_mobi5',
					chk_out_display: '.rs_mobiout',
				},
				calendar: {
					today: true,
					output_format: '<div class="rs_mobi_chk_day">[d]</div><div class="rs_mobi_chk_month">[F]</div>'
				},
				select_name:true
			},
			vp:{
				elements: { 
					form:".rs_vp_form",
					chk_in:".rs_chk_in, .rs_chk_in_calendar, .rs_date_chk_in",
					chk_out:".rs_chk_out, .rs_chk_out_calendar, .rs_date_chk_out",
					chk_in_display:".rs_date_chk_in",
					chk_out_display:".rs_date_chk_out",	
				},
				calendar: { 
					today: true,
					output_format: '<div class="rs_mobi_chk_day">[d]</div><div class="rs_mobi_chk_month">[F]</div>',
				},
				select_name:true
			}
		});
		//advanced toggle
            $('.rs_adv_toggle').on('click',function(){
                var $this = $(this);
                if($this.data('adv')==='off'){
                    $this.html("<span class='rs_x'>X</span> Advanced Search").parents('.rs_box_pad').siblings('.rs_adv').slideDown(222);
                    $this.data('adv','on');
                }else{
                    $this.html("<i class='rs_icon'>f</i> Advanced Search").parents('.rs_box_pad').siblings('.rs_adv').slideUp(222);
                    $this.data('adv','off');
                }
            });
            $('#rs_switcher').on('change',function(){
                $('.js-rs_search').children('js-rs-multitab__text').text('Search');
                rs_global.rs_switch_tab($(this));
            });
            $('.js-rs-multitab').on('click',function(){
                $('#rs_switcher').val($(this).data('product')).trigger('change');
            });
            $('.js-city-input').on('click',function(){
                $(this).val('');
            });
            $('.js-hotel-remove').on('click',function(){
                var $this = $(this);
                rs_global.recentlyViewed.removeViewedHotel($this.data('hotelid'),'my_viewed_hotels');
                $this.closest('li').slideUp(99,function(){
                    $this.closest('li').remove();
                    if(!$('.rs_recentdata__item--hotels').length){
                        $('.js-viewed-hotels-container').remove();
                    }
                });
            });
            $('.js-search-remove').on('click',function(){
                var $this = $(this);
                rs_global.recentlyViewed.removeRecentSearch($this.data('search_hash'));
                $this.closest('li').slideUp(99,function(){
                    $this.closest('li').remove();
                    if(!$('.rs_recentdata__item--search').length){
                        $('.js-recent-search-container').remove();
                    }
                });
            });
            $('#js_sam_loc,#js_diff_loc').on('click',function(){
                var $returnDiffInput = $('#rs_return_diff'),
                    returnDiffCurrentValue =  $returnDiffInput.prop('checked'),
                    $this = $(this),
                    thisId = $this.attr('id');
                if(thisId === 'js_sam_loc' && returnDiffCurrentValue===true){
                    $returnDiffInput.prop('checked',false);
                    $returnDiffInput.trigger('change');
                    $this.addClass('rs_button_swap_active');
                    $('#js_diff_loc').removeClass('rs_button_swap_active');
                }else if(thisId === 'js_diff_loc' && returnDiffCurrentValue===false){
                    $returnDiffInput.prop('checked',true);
                    $returnDiffInput.trigger('change');
                    $this.addClass('rs_button_swap_active');
                    $('#js_sam_loc').removeClass('rs_button_swap_active');
                }
                return false;
            });
            $('#rs_return_diff').on('change',function(){
                var $this = $('#rs_return_diff'),
                    $rowToShow = $('.rs_return_diff_input');
                if($this.prop('checked')){
                    $('.rs_return_diff_input').slideDown(222);
                    $('.rs_multi_car').addClass('rs_return_diff_on');
                    $('#car_return').css({'display':'block','clear':'left'});
                }else{
                    
                    $('.rs_return_diff_input').hide(0, function(){
                        $('#car_return').css({'display':'inline','clear':'none'});
                    });
                    $('.rs_multi_car').removeClass('rs_return_diff_on');

                }
            });
            $('.js-travellers-trigger').on('click',function(){
                $(this).siblings('.rs_travellers').toggleClass('rs_travellers_on');
            });
            $('#js-travellers-roundtrip, #js-travellers-oneway,#js-travellers-multidest').on('change',function(){
                var $this = $(this),
                    $adults = $('.js-travellers-adults',$this),
                    $children = $('.js-travellers-children',$this),
                    $display = $this.siblings('.js-travellers-trigger').children('.js-travellers-display');
                travellersDropdown($adults,$children,$display);
            });
            $(document).on('click', function(e) {
                var target = e.target;
                if (!$(target).is('.rs_travellers') && !$(target).parents().is('.rs_travellers') && !$(target).is('.js-travellers-trigger') && !$(target).parents().is('.js-travellers-trigger') || $(target).is('.rs_travellers__closerow')) {
                    $('.rs_travellers').removeClass('rs_travellers_on');
                }
            });

            $('.js-advanced-car-toggle').on('click',function(){
                $('.js-advanced-car-search').slideToggle();
                $rs_box.toggleClass('rs_advanced_car_search_on');
                if ($('i', this).hasClass('rs_icon fas fa-caret-down') ){
                    $('i', this).removeClass('rs_icon fas fa-caret-down');
                    $('i', this).addClass('rs_icon fas fa-caret-right');
                    $('#rs_regSearch').show();
                } else {
                    $('i', this).removeClass('rs_icon fas fa-caret-right');
                    $('i', this).addClass('rs_icon fas fa-caret-down');
                    $('#rs_regSearch').hide();
                }
                $('.rs_search_row').not('.rs_advanced_search .rs_search_row').fadeToggle();
            });
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			$("<link/>", {
			   rel: "stylesheet",
			   type: "text/css",
			   href: "css/mobile_search.css"
			}).appendTo("head");	
		}
		$('.same-location').click(function(){
			 $(".rs_droppff_div").hide();
			 $('.rs_pickup_div').removeClass('rs_half_width');
			 $('#different_return').attr('checked', false);
		});
		$('.diff-location').click(function(){
			 $(".rs_droppff_div").show();
			 $('.rs_pickup_div').addClass('rs_half_width');
			 $('#different_return').attr('checked', true);
		});
		$('.round-trip').click(function(){
			$('#air_round_trip').show();
			$('#air_one_way').hide();
			$('#air_multi_dest').hide();
		});
		$('.one-way').click(function(){
			$('#air_round_trip').hide();
			$('#air_one_way').show();
			$('#air_multi_dest').hide();
		});
		$('.multi-city').click(function(){
			$('#air_round_trip').hide();
			$('#air_one_way').hide();
			$('#air_multi_dest').show();
		});	
		var $icons = $('.rs_tabs');
	    	$icons.click(function(){
	       $icons.removeClass('highlight_tab');
	       $(this).addClass('highlight_tab');
	    });
		var $air_options = $('.rs_air_option');
	    	$air_options.click(function(){
	       $air_options.removeClass('air_highlight');
	       $(this).addClass('air_highlight');
	    });
	    var $car_options = $('.rs_car_option');
	    	$car_options.click(function(){
	       $car_options.removeClass('car_highlight');
	       $(this).addClass('car_highlight');
	    });
		$(".rs_tabs").on("click", function(){
			var futureTab = $(this).data("tab"),
				$selectedForm = $("."+futureTab);
			if ($selectedForm.hasClass("rs_searchbox_hide")) {
				$selectedForm.removeClass('rs_searchbox_hide').siblings(".rs_search_form").addClass("rs_searchbox_hide");
			}
		});
		$('.rs_product_select').on('change',function(){
   			var $option = $('.rs_product_select').val();
   			$('.rs_search_form').addClass('rs_searchbox_hide');
   			$('.rs_'+$option+'_form').removeClass('rs_searchbox_hide');
   			$('.rs_tabs').removeClass('highlight_tab');
   			$('#rs_'+$option+'_tab').addClass('highlight_tab');
		});
	});