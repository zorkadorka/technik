( function( $ ) {

	$( document ).ready( function() {
		$('.user.ajax-description').click(function () {
			console.log("kliky klik");
			//$('.user.ajax-description .description-placeholder').css('display','none');
			//$('.user.ajax-description .description-placeholder').css('opacity','0');
			var yes = true;
			if($(this).hasClass('clicked')){
				yes = false;
			}
			$('.clicked').removeClass('clicked');
			if(yes){
				$("section.description-placeholder").css("display","block");
				$(this).addClass('clicked')
				var description = $(this).first('.description-placeholder');				
			}

		});

		$('section.description-placeholder').click(function () {
			$(this).css('display','none');
			$('.clicked').removeClass('clicked');
		});
		
	} );
} )( jQuery );