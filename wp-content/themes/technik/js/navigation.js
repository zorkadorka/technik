(function($) {

// document ready
// unreadable as it can be, because we can
// write once, never read again!
$(function() {

	$('.menu-item-has-children').mouseenter(function() {
		var self = $(this),
			submenu = self.find('.sub-menu');//,
			prevSubmenu = $('.current_page_item .sub-menu, .current_page_ancestor .sub-menu');


		// na detaile stranky, kde current page item je polozka zo
		// submenu ma top level polozka triedu current_page_ancestor
		if (self.hasClass('current_page_item') || self.hasClass('current_page_ancestor')) 
			return;

		submenu.stop().fadeIn();

		prevSubmenu.stop().fadeOut();

 	});


	//
	// zobrazovanie submenu pri prechode myskou cez polozku v menu
	// v mobilnej verzii toto samozrejme nebude fungovat, pravdepodobne to vyriesime
	// zobrazenim submenu po tuknuti na polozku (beztak nemame co zobrazit ako top level page) 
	//
	$('.menu-item-has-children').mouseleave(function() {
		
		var self = $(this),
				submenu = self.find('.sub-menu'),
				prevSubmenu = $('.current-page-ancestor .sub-menu');

		if (self.hasClass('current_page_ancestor'))
			return;

		submenu.stop().fadeOut();
		prevSubmenu.stop().fadeIn();
	}
	);
})
})(jQuery)