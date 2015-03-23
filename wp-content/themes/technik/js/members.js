(function($) {

$(function() {

	$('.user').hover(function() {
		$(this).find('.name').stop().fadeOut();
	}, function() {
		$(this).find('.name').stop().fadeIn();
	});

})

})(jQuery)