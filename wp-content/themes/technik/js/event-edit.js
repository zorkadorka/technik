jQuery(document).ready( function($) {
/************uprava post.php pre eventy**********************/
	
	var ids = ['#event_venue',
					'#event_organizer',
					'#event_url',
					'#event_cost',
					'#envira-gallery',
					'#postcustom',
					'#commentstatusdiv',
					'#commentsdiv',
					'#authordiv',
					'#footer-left'
					]; 
	
	$('#authordiv').after($('#publish'));
	for (var i = 0; i < ids.length; i++) {
	$(ids[i]).remove();
	}
	$("#postexcerpt > .inside > p").text("Zhrnutie predstavuje text a podrobnosti o udalosti, ktore budu zobrazene verejnosti");
});