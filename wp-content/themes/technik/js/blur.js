// !Modernizr.svgfilters returns a false positive in IE11
// As a result, we need to also try to sniff out Firefox via InstallTrigger
// See: http://jsfiddle.net/9zxvE/383/
// See also: http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
(function($) {
if( 
!Modernizr.cssfilters && // Not a browser with CSS filter support
!( $('html').hasClass('lt-ie9') ) && // Not an old version of IE (which support MS filters)
!(typeof InstallTrigger !== 'undefined') // Not Firefox (which supports SVG filters)
){
	var blur = new Blur({ 
		el : document.querySelector('.blur'), 
		path : 'images/meatloaf.jpg', 
		radius : 5, 
		fullscreen : true 
		});
}   
})(jQuery)