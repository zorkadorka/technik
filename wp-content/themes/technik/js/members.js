(function($) {


$(function() {



	/*$('.user').click(function() {

		var position = $(this).position();

		$(this).css({
			position: 'absolute',
			left: position.left
		}).animate({
			left: 0,
		}).addClass('clicked');

		// insert dummy div underneath, so other elements wont
		// end up on original place 


	});*/

	$('.ajax-description').click(function() {

		/*var nonce = $(this).attr('data-nonce'),
				userId = $(this).attr('data-user-id'),
				descPlaceholder = $(this).next('.description-placeholder');

		console.log(descPlaceholder);

		$.ajax({
			type: "post",
			dataType: 'json',
			url: membersAjax.ajaxurl,
			data: {
				action: 'demo',
				nonce: nonce,
				user_id: userId
			},
			beforeSend: function() {
				descPlaceholder.css({display: 'inline-block'}).animate({opacity: '1'});
			},
			success: function(response) {
				console.log(response.description);

				descPlaceholder.append(response.description);
			}
		});*/

	return false;

	});


	$('.user').hover(function() {
		$(this).find('.name').stop().fadeOut();
	}, function() {
		$(this).find('.name').stop().fadeIn();
	});

})

})(jQuery)