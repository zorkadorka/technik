(function($) {

$(function() {

	$('.ajax-description').click(function() {

		var nonce = $(this).attr('data-nonce'),
				userId = $(this).attr('data-user-id');

		$.ajax({
			type: "post",
			dataType: 'json',
			url: membersAjax.ajaxurl,
			data: {
				action: 'demo',
				nonce: nonce,
				user_id: userId
			},
			success: function(response) {
				console.log(response.description);
			}
		});

	return false;

	});


	$('.user').hover(function() {
		$(this).find('.name').stop().fadeOut();
	}, function() {
		$(this).find('.name').stop().fadeIn();
	});

})

})(jQuery)