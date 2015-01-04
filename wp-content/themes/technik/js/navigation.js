(function($) {

// document ready
// unreadable as it can be, because we can
// write once, never read again!
$(function() {

	$('.menu-item-has-children').mouseenter(function() {
		var self = $(this),
			submenu = self.find('.sub-menu'),
			prevSubmenu = $('.current_page_item .sub-menu, .current_page_ancestor .sub-menu'),
			prevA = prevSubmenu.siblings('a');

		// na detaile stranky, kde current page item je polozka zo
		// submenu ma top level polozka triedu current_page_ancestor
		if (self.hasClass('current_page_item') || self.hasClass('current_page_ancestor')) 
			return;

		submenu.stop().fadeIn();

		prevSubmenu.stop().fadeOut();
		
		self.find('>a').stop().css('visibility','hidden');

		prevA.stop().css('visibility','visible');

 	});


	//
	// zobrazovanie submenu pri prechode myskou cez polozku v menu
	// v mobilnej verzii toto samozrejme nebude fungovat, pravdepodobne to vyriesime
	// zobrazenim submenu po tuknuti na polozku (beztak nemame co zobrazit ako top level page) 
	//
	$('.sub-menu').mouseleave(function() {
		
		var self = $(this),
			parentLi = self.closest('.menu-item-has-children'),
			parentAnchor = self.siblings('a'),
			prevSubmenu = $('.current_page_item .sub-menu, .current_page_ancestor .sub-menu'),
			prevA = prevSubmenu.siblings('a');

		// see above
		if (parentLi.hasClass('current_page_item') || parentLi.hasClass('current_page_ancestor'))
			return;

		prevSubmenu.stop().fadeIn();
		self.stop().fadeOut();

		if (prevSubmenu.length > 0) {
			prevSubmenu.stop().fadeIn();
			prevA.stop().css('visibility','hidden');
		}
		parentAnchor.stop().css('visibility','visible');
	}
	);
})

})(jQuery)