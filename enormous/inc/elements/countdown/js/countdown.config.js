jQuery( document ).ready(function($) {

	$('.cms-countdown-wraper').each(function(){
		
		var count_down = $(this).find('> div').data("count-down");

 		$(this).countdown(count_down, function(event) {
	   		var $this = $(this).html(event.strftime(''
	     	+ '<div class="col-xs-12"><div class="countdown-item-container"><span class="countdown-amount">%m</span><span class="countdown-period">Months</span></div></div>'
	     	+ '<div class="col-xs-12"><div class="countdown-item-container"><span class="countdown-amount">%d</span><span class="countdown-period">Days</span></div></div>'
	     	+ '<div class="col-xs-12"><div class="countdown-item-container"><span class="countdown-amount">%H</span><span class="countdown-period">Hours</span></div></div>'
	     	+ '<div class="col-xs-12"><div class="countdown-item-container"><span class="countdown-amount">%M</span><span class="countdown-period">Minutes</span></div></div>'
	     	+ '<div class="col-xs-12"><div class="countdown-item-container"><span class="countdown-amount">%S</span><span class="countdown-period">Seconds</span></div></div>'
	     	));
 		});
	});
});