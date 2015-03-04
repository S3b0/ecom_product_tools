(function($){
	$('.panel-title').each(function(index) {
		if ( index > 0 ) {
			$(this).addClass('collapsed');
		}
	});
	$('.collapse.in').each(function(index) {
		if ( index > 0 ) {
			$(this).removeClass('in');
		}
	});
})(jQuery);