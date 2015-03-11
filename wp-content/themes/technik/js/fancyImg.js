/**
* skript pre fancy box vlastny, ale neviem ci to pojde
*/

$(document).ready(function() {

	
	$(".posts > a").fancybox();
	
	$(".posts > a").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	
});