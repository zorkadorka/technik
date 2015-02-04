

(function($) {

// document ready
// unreadable as it can be, because we can
// write once, never read again!
$(function() {

	var login_form = $('#loginform');

	$('.login-form-toggle').click(function() {
		if (login_form.is(':visible'))
			login_form.slideUp();
		else
			login_form.slideDown();

		return false;
 	});

})
})(jQuery)