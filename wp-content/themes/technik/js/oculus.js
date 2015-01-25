(function($) {

// document ready
// unreadable as it can be, because we can
// write once, never read again!
$(function() {

	var oculus = $('.oculus');

	$('header').mousemove(function(e) {

		var x = e.clientX,
				y = e.clientY;

		oculus.fadeIn().css({
			left: x - 125,
			top: y - 125
		});

	});

	$('header').mouseleave(function() {
		oculus.fadeOut();
	});



})
})(jQuery)