(function($) {

$(function() {

	var pressed = false;
	var initX = 0;
	var initY = 0;

	$('.logo').mousedown(function(e) {
		pressed = true;
		initX = e.clientX;
	});


	$('.logo').mousemove(function(e) {
		if (!pressed) return false;

		var diff = e.clientX - initX;

		if (initX < e.clientX) { // right
			$(this).css({ 
				position: 'relative',
				left: -diff + 'px'
				});
		}
		else if (initX > e.clientX) { // left
			
			$(this).css({ 
				position: 'relative',
				left: diff + 'px'
				});
		}
	});

	$(document).mouseup(function() {
		pressed = false;
	});

	$('.logo').on('dragstart', function(e, test) {
		return false;
	});


	})
})(jQuery)