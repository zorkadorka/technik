(function($) {

// document ready
// unreadable as it can be, because we can
// write once, never read again!
$(function() {

	var bgEl = $('.header-background'),
			pressed = true,
			initialPos = 0,
			dir = 0, // 0 left, 1 right
			clientX = 0;

	$('header').mousedown(function(e) {
		clientX = e.clientX;
		//pressed = true;
	});

	$('header').mouseup(function() {
		//pressed = false;
	});

	$('header').mousemove(function(e) {
		if (!pressed) return;

		if (clientX < e.clientX) { // right
			initialPos += 2;
			bgEl.css({ backgroundPositionX: initialPos});
		}
		else if (clientX > e.clientX) { // left
			initialPos -= 2;
			bgEl.css({ backgroundPositionX: initialPos});
		} 

		clientX = e.clientX;
	});


	})
})(jQuery)