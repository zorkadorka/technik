(function($) {


$(function() {



	$('.avatar-photo.delete').click(function() {

		var nonce = $(this).attr('data-nonce'),
				userId = $(this).attr('data-user-id'),
				that = this;

		$.ajax({
			type: "post",
			dataType: 'text',
			url: membersAjax.ajaxurl,
			data: {
				action: 'delete_avatar',
				nonce: nonce,
				user_id: userId
			},
			beforeSend: function() {
			
			},
			success: function(response) {
				console.log('asdfasdfasdfasdf');
				console.log(response);
				console.log($(this));
				console.log($(that).closest('.custom-avatar-line'));
				$(that).closest('.custom-avatar-line').fadeOut(500, function() {
						$(this).remove();
				});
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