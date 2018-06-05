(function ($) {
    "use strict";
    $('#fullpage').fullpage({
    	navigation: true,
		navigationPosition: 'right',
		responsiveWidth: 1200
	});
	/* Get data Progress Bar */
	$('.cms-progress .progress-bar').each(function(){
		var w_progress = $(this).data('valuetransitiongoal');
		$(this).css('width', w_progress+'%');
	});
})(jQuery);