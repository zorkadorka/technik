( function( $ ) {

	$( document ).ready( function() {
		$('.user.ajax-description').click(function () {
			
			var yes = true;
			if($(this).hasClass('clicked'))
			{
				yes = false;
			}
			$('.clicked').removeClass('clicked');
			if(yes)
			{
				$("section.description-placeholder").css("display","block");
				$(this).addClass('clicked')
				//var html = $(this).html();
				//$('.user.ajax-description.clicked + .description-placeholder').children('span').before(html);
			}

		});

		$('section.description-placeholder').click(function () {
			$(this).css('display','none');
			$('.clicked').removeClass('clicked');
		});
		
	} );
} )( jQuery );