<?php
/*
Template Name: Editacia profilu
*/

get_header(); 

// ziskame si objekt reprezentujuci aktualneho pouzivatela

if (!is_user_logged_in()) {
	die();
}

// dobra vec je, ze toto nam under the hood fetchne aj metadata, aj
// ked sa vo vypise nezobrazia, su tam
$user = wp_get_current_user();
$link = admin_url('admin-post.php?action=update_user');
?>

<?php
// ano viem ze by to tu nemalo byt
// ano viem ze som za to kazdemu nadavam
// but for the love of god, lets just make this work
?>
<script>
( function( $ ) {

	$( document ).ready( function() {

		$( '#your-profile' ).attr( 'enctype', 'multipart/form-data' );

		// Disables upload buttons until files are selected.
		( function() {
			var button, input, avatarManager = $( '#avatar-manager' );

			if ( ! avatarManager.length )
				return;

			button = avatarManager.find( 'input[type="submit"]' );
			input  = avatarManager.find( 'input[type="file"]' );

			function toggleUploadButton() {
				console.log('fungujem');
				button.prop( 'disabled', '' === input.map( function() {
					return $( this ).val();
				} ).get().join( '' ) );
			}

			toggleUploadButton();

			input.on( 'change', toggleUploadButton );
			
		} )();
	} );
} )( jQuery );
</script>

<section class="user-edit">


<form method="POST" action="<?= $link ?>" enctype="multipart/form-data">
	<input type="hidden" name="action" value="update_user">

	<h2>Basic infooo</h2>
	<div class='user_edit-form_row'>
		<label for="first_name">Meno: </label>
		<input type="text" name="first_name" value="<?= $user->first_name ?>">
	</div>

	<div class='user_edit-form_row'>
		<label for="last_name">Priezvisko: </label>
		<input type="text" name="last_name" value="<?= $user->last_name ?>">	
	</div>

	<div class='user_edit-form_row edit-opis'>		
		<label for="description">Opis: </label>
		<textarea name="description"><?= $user->description ?></textarea>
	</div>

	<div class='user_edit-form_row'>
		<label for="user_email">Email: </label>
		<input type="text" name="user_email" value="<?= $user->user_email ?>">
	</div>

	<div class='user_edit-form_row'>
		<label for="nickname">Prezývka: </label>
		<!--<input type="text" name="nickname" value="<?= $user->nickname ?>">-->
		<input type="text" name="prezyvka" id="prezyvka" value="<?php echo get_user_prezyvka( $user->ID); ?>" class="regular-text" />
	</div>
	<div class='user_edit-form_row'>
		<label for="phone1">Telefón: </label>
		<input type="text" name="phone1" value="<?= $user->phone1 ?>">
	</div>

	<h2>Zmena hesla</h2>

	<div class='user_edit-form_row edit-password'>
		<label for="old_pass">Staré heslo: </label>
		<input type="password" name="old_pass">
	</div>

	<div class='user_edit-form_row edit-password'>
		<label for="new_pass">Nové heslo: </label>
		<input type="password" name="new_pass">
	</div>

	<input type="submit" value="Aktualizuj profil">

<?php
	avatar_manager_init();
	avatar_manager_edit_user_profile($user);
?>
</form>


</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>