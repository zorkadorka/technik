jQuery(document).ready( function($) {

	/********uprava user profile v dashboarde ****************/
	$("#your-profile > h3").remove();
	var table_ids = ['#color-picker',]; 
	var rows_ids = ['#nickname',
					'#display_name',
					'#url',
					]; 
	for (var i = 0; i < table_ids.length; i++) {
	$(table_ids[i]).closest('table').remove();
	}

	for (var i = 0; i < rows_ids.length; i++) {
	$(rows_ids[i]).closest('tr').remove();
	}

	var role = $("#hidden_user_role > h1").text();
	if(role != 'administrator'){
		$("#role").closest('tr').remove();
	}else{
		$(".user-role-wrap > th").text("Rola");
	
	}
	$("#hidden_user_role").remove();

	$(".user-user-login-wrap > th > label").text("Používateľské meno");
	$(".user-user-login-wrap > td > span").before("<br />");
	$(".user-user-login-wrap > td > span").text("Používateľské meno sa nemení, používa sa na prihlasovanie.");
	
	$(".user-first-name-wrap > th > label").text("Meno");
	$(".user-last-name-wrap > th > label").text("Priezvisko");
	$(".user-email-wrap > th > label").text("Email");
	$("#password > th > label").text("Nové heslo");
	$("#password > td > p").text("Zadaj nové heslo.");
	
	$(".user-pass2-wrap > th > label").text("Opakuj heslo");
	$(".user-pass2-wrap > td > p").text("Opakuje nové heslo.");
	$(".user-pass2-wrap > td > .indicator-hint").remove();


	$('#your-profile > table:first > tbody > tr:last').after($('#prezyvka_tr').html());
	$('.user-email-wrap').after($('#telephone_tr').html());
	$('#custom_fields_profile').remove();

	

});
