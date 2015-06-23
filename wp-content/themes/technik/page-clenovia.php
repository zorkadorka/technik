<?php
/*
Template Name: Clenovia
*/

get_header(); ?>

<section class="members-list">

	<?php
 		$nonce = wp_create_nonce("some_random_text");
  	$link = admin_url('admin-ajax.php?action=demo&nonce='.$nonce);
?>

	
	<h1>Členovia</h1>


	<h2>Vedenie</h2>
	<?php 
		$users = Helper::get_users_by_role('Vedenie');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user ajax-description" data-user-id="<?= $user->ID ?>" data-nonce="<?= $nonce ?>">  
			<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
			<span class="name"><?= Helper::get_user_name($user) ?></span>
		</div>
		
		 <?php if ( is_user_logged_in() ) : ?> 
		 	<div class="description-placeholder logged">
			<span class="photo_des"><?= get_avatar($user->ID, 150) ?></span>
			<div class = "div_des">
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></h3>	
				<table>
				<tr>
					<td>
						<b style="padding:0 10px"> Telefón: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= get_user_meta( $user->ID, 'phone1', true ) ?></span>
					</td>

				</tr>
				<tr>
					<td>
						<b style="padding:0 10px"> Email: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= $user->user_email ?></span>
					</td>
				</tr>
				</table>	
			</div>
		</div>
		<?php else: ?>
			<div class="description-placeholder">
				<span class="photo_des"><?= get_avatar($user->ID, 150) ?></span>
				<div class = "div_des">
					<h3 class="name_des"><?= Helper::get_user_name($user) ?></h3>	
					<span class="description"><?= get_user_meta( $user->ID, 'description', true ) ?></span>
				</div>
			</div>
		<?php endif ;
		 endforeach; ?>
	</div>

	<h2>Hudba</h2>
	<?php 
		$users = Helper::get_users_by_role('Hudba');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user ajax-description">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= Helper::get_user_name($user) ?></span>
		</div>
		<?php if ( is_user_logged_in() ) : ?> 
		 <div class="description-placeholder logged">
			<span class="photo_des"><?= get_avatar($user->ID, 150) ?></span>
			<div class = "div_des">
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></h3>	
				<table>
				<tr>
					<td>
						<b style="padding:0 10px"> Telefón: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= get_user_meta( $user->ID, 'phone1', true ) ?></span>
					</td>

				</tr>
				<tr>
					<td>
						<b style="padding:0 10px"> Email: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= $user->user_email ?></span>
					</td>
				</tr>
				</table>	
			</div>
		</div>
		<?php else: ?>
			<div class="description-placeholder logout">
				<span class="photo_des"><?= get_avatar($user->ID, 256) ?></span>
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></span>				
			</div>
		<?php endif ;
 	endforeach; ?>
	</div>

	<h2>Spev</h2>
	<?php 
		$users = Helper::get_users_by_role('Spev');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user ajax-description">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= Helper::get_user_name($user) ?></span>
		</div>
		<?php if ( is_user_logged_in() ) : ?> 
		 	<div class="description-placeholder logged">
			<span class="photo_des"><?= get_avatar($user->ID, 150) ?></span>
			<div class = "div_des">
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></h3>	
				<table>
				<tr>
					<td>
						<b style="padding:0 10px"> Telefón: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= get_user_meta( $user->ID, 'phone1', true ) ?></span>
					</td>

				</tr>
				<tr>
					<td>
						<b style="padding:0 10px"> Email: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= $user->user_email ?></span>
					</td>
				</tr>
				</table>	
			</div>
		</div>
		<?php else: ?>
			<div class="description-placeholder logout">
				<span class="photo_des"><?= get_avatar($user->ID, 256) ?></span>
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></span>				
			</div>
		<?php endif ;
 	 endforeach; ?>
	</div>

	<h2>Tanec</h2>
	<?php 
		$users = Helper::get_users_by_role('Tanec');
	?>
	<div class="users">
	<?php foreach ($users as $user): ?>
		<div class="user ajax-description">
				<span class="photo"><?= get_avatar($user->ID, 150) ?></span>
				<span class="name"><?= Helper::get_user_name($user) ?></span>
		</div>
		<?php if ( is_user_logged_in() ) : ?> 
		 <div class="description-placeholder logged">
			<span class="photo_des"><?= get_avatar($user->ID, 150) ?></span>
			<div class = "div_des">
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></h3>	
				<table>
				<tr>
					<td>
						<b style="padding:0 10px"> Telefón: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= get_user_meta( $user->ID, 'phone1', true ) ?></span>
					</td>

				</tr>
				<tr>
					<td>
						<b style="padding:0 10px"> Email: </b>
					</td>
					<td>
						<span style="padding:0 10px"><?= $user->user_email ?></span>
					</td>
				</tr>
				</table>				
			</div>
		</div>
		<?php else: ?>
			<div class="description-placeholder logout">
				<span class="photo_des"><?= get_avatar($user->ID, 256) ?></span>
				<h3 class="name_des"><?= Helper::get_user_name($user) ?></span>				
			</div>
		<?php endif ;
 	 endforeach; ?>
	</div>
	
</section>

<section class="description-placeholder">
</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<script type="text/javascript" src = "<?= get_template_directory_uri() .'/js/user-description.js';?>" > 
</script>

<?php get_footer(); ?>