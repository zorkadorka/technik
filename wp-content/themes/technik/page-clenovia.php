<?php
/*
Template Name: Clenovia
*/

get_header(); ?>

<section class="members-list">

	<?php
 		$nonce = wp_create_nonce("my_user_vote_nonce");
  	$link = admin_url('admin-ajax.php?action=demo&nonce='.$nonce);
?>

	<a id="ajax_test" href="<?= $link ?>" data-nonce="<?= $nonce ?>">AJAX test</a>


	<h1>Členovia</h1>


	
	<?php 
		$users = get_my_users('Vedenie');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user ajax-description" data-user-id="<?= $user->ID ?>" data-nonce="<?= $nonce ?>">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= $user->display_name ?></span>
		</div>
 	<?php endforeach; ?>
	</div>

	<h2>Tanec</h2>
	<?php 
	$users = get_my_users('Tanec');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= $user->display_name ?></span>
		</div>
 	<?php endforeach; ?>
	</div>

	<h2>Spev</h2>
	<?php 
	$users = get_my_users('Spev');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= $user->display_name ?></span>
		</div>
 	<?php endforeach; ?>
	</div>

	<h2>Hudba</h2>
	<?php 
	$users = get_my_users('Hudba');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= $user->display_name ?></span>
		</div>
 	<?php endforeach; ?>
	</div>
	
</section>

<section class="description-placeholder">
</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>