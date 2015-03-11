<form id="your-profile" action="<?php echo esc_url( self_admin_url( IS_PROFILE_PAGE ? 'profile.php' : 'user-edit.php' ) ); ?>" method="post" novalidate="novalidate">

<h3><?php _e('Meno') ?></h3>

<table class="form-table">
	<tr class="user-user-login-wrap">
		<th><label for="user_login"><?php _e('Používateľské meno'); ?></label></th>
		<td><input type="text" name="user_login" id="user_login" value="<?php echo esc_attr($profileuser->user_login); ?>" disabled="disabled" class="regular-text" /> 
			<br />
			<span class="description">
				<?php _e('Používa sa na prihlasovanie. Nie je možné meniť.'); ?>
			</span>
		</td>
	</tr>
<?php 
if(get_user_role() == 'administrator'):
	if ( !IS_PROFILE_PAGE && !is_network_admin() ) : ?>
	<tr class="user-role-wrap"><th><label for="role"><?php _e('Rola') ?></label></th>
	<td><select name="role" id="role">
	<?php
	// Compare user role against currently editable roles
	$user_roles = array_intersect( array_values( $profileuser->roles ), array_keys( get_editable_roles() ) );
	$user_role  = array_shift( $user_roles );

	// print the full list of roles with the primary one selected.
	wp_dropdown_roles($user_role);

	// print the 'no role' option. Make it selected if the user has no role yet.
	if ( $user_role )
		echo '<option value="">' . __('&mdash; No role for this site &mdash;') . '</option>';
	else
		echo '<option value="" selected="selected">' . __('&mdash; No role for this site &mdash;') . '</option>';
	?>
	</select></td></tr>
	<?php endif; //!IS_PROFILE_PAGE
endif;	//$profileuser->user_role == 'Administrator'

if ( is_multisite() && is_network_admin() && ! IS_PROFILE_PAGE && current_user_can( 'manage_network_options' ) && !isset($super_admins) ) { ?>
<tr class="user-super-admin-wrap"><th><?php _e('Super Admin'); ?></th>
<td>
<?php if ( $profileuser->user_email != get_site_option( 'admin_email' ) || ! is_super_admin( $profileuser->ID ) ) : ?>
<p><label><input type="checkbox" id="super_admin" name="super_admin"<?php checked( is_super_admin( $profileuser->ID ) ); ?> /> <?php _e( 'Grant this user super admin privileges for the Network.' ); ?></label></p>
<?php else : ?>
<p><?php _e( 'Super admin privileges cannot be removed because this user has the network admin email.' ); ?></p>
<?php endif; ?>
</td></tr>
<?php } ?>

<tr class="user-first-name-wrap">
	<th><label for="first_name"><?php _e('Meno') ?></label></th>
	<td><input type="text" name="first_name" id="first_name" value="<?php echo esc_attr($profileuser->first_name) ?>" class="regular-text" /></td>
</tr>

<tr class="user-last-name-wrap">
	<th><label for="last_name"><?php _e('Priezvisko') ?></label></th>
	<td><input type="text" name="last_name" id="last_name" value="<?php echo esc_attr($profileuser->last_name) ?>" class="regular-text" /></td>
</tr>
</table>

<h3><?php _e('Kontakt') ?> <i>(povinné)</i></h3>

<table class="form-table">
<tr class="user-email-wrap">
	<th><label for="email"><?php _e('E-mail *'); ?> <span class="description"><?php/* _e('(required)'); */?></span></label></th>
	<td><input type="email" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ) ?>" class="regular-text ltr" />
	<?php
	$new_email = get_option( $current_user->ID . '_new_email' );
	if ( $new_email && $new_email['newemail'] != $current_user->user_email && $profileuser->ID == $current_user->ID ) : ?>
	<div class="updated inline">
	<p><?php printf( __('There is a pending change of your e-mail to <code>%1$s</code>. <a href="%2$s">Cancel</a>'), $new_email['newemail'], esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) ) ); ?></p>
	</div>
	<?php endif; ?>
	</td>
</tr>

<tr class="user-telephone-wrap">
	<th><label for="telephone"><?php _e('Telefónne číslo *') ?></label></th>
	<td><input type="telephone" name="telephone" id="telephone" value="<?php echo esc_attr( get_user_meta($profileuser->ID,'telephone', true) ); ?>" class="regular-text code" /></td>
</tr>
</table>

<?php
	if ( IS_PROFILE_PAGE ) {
		/**
		 * Fires after the 'About Yourself' settings table on the 'Your Profile' editing screen.
		 *
		 * The action only fires if the current user is editing their own profile.
		 *
		 * @since 2.0.0
		 *
		 * @param WP_User $profileuser The current WP_User object.
		 */
		do_action( 'show_user_profile', $profileuser );
	} else {
		/**
		 * Fires after the 'About the User' settings table on the 'Edit User' screen.
		 *
		 * @since 2.0.0
		 *
		 * @param WP_User $profileuser The current WP_User object.
		 */
		do_action( 'edit_user_profile', $profileuser );
	}
?>

<?php
/**
 * Filter whether to display additional capabilities for the user.
 *
 * The 'Additional Capabilities' section will only be enabled if
 * the number of the user's capabilities exceeds their number of
 * of roles.
 *
 * @since 2.8.0
 *
 * @param bool    $enable      Whether to display the capabilities. Default true.
 * @param WP_User $profileuser The current WP_User object.
 */
if ( count( $profileuser->caps ) > count( $profileuser->roles )
	&& apply_filters( 'additional_capabilities_display', true, $profileuser )
) : ?>
	<h3><?php _e( 'Additional Capabilities' ); ?></h3>
	<table class="form-table">
	<tr class="user-capabilities-wrap">
		<th scope="row"><?php _e( 'Capabilities' ); ?></th>
		<td>
	<?php
		$output = '';
		foreach ( $profileuser->caps as $cap => $value ) {
			if ( ! $wp_roles->is_role( $cap ) ) {
				if ( '' != $output )
					$output .= ', ';
				$output .= $value ? $cap : sprintf( __( 'Denied: %s' ), $cap );
			}
		}
		echo $output;
	?>
		</td>
	</tr>
	</table>
<?php endif; ?>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr($user_id); ?>" />

<?php submit_button( IS_PROFILE_PAGE ? __('Aktualizuj') : __('Aktualizuj používateľa') ); ?>

</form>
</div>
<?php
break;
//}
?>
<script type="text/javascript">
	if (window.location.hash == '#password') {
		document.getElementById('pass1').focus();
	}
</script>

