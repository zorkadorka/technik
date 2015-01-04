(function($) {

function getMaxScroll() {
	return $(window).height() - $(document).height();
}

function getScrollRatio() {
	var img = new Image;
	img.src = $('.js-parallax').css('background-image').replace(/url\(|\)$/ig, "");

	var winH = $(window).height(),
		winW = $(window).width(),
		docH = $(document).height(),
		aspectRatio = winW/img.width,
		imgH = img.height * aspectRatio,
		diff = imgH - winH,
		maxScroll = docH - winH,
		scrollRatio = diff/maxScroll;
	return scrollRatio;
}

var scrollRatio;

$(window).resize(function() {
	scrollRatio = getScrollRatio();
});

$(window).load(function(){  
	var bgEl = document.getElementsByClassName('js-parallax')[0];
	var maxScroll = getMaxScroll();

	scrollRatio = getScrollRatio();

	$(document).scroll(function(e) {
		var scrollTop = -$(this).scrollTop();
		bgEl.setAttribute('style', 'background-position-y: ' + (scrollTop * scrollRatio) + 'px');
		
	});
});

})(jQuery)
