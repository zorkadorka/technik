<?php
/*
Template Name: Clenovia
*/

get_header(); ?>

<section class="members-list">

	<h1>Členovia</h1>
	
	<?php 
		$users = get_my_users('Vedenie');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user">
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