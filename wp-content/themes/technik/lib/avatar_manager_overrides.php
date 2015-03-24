<?php


class AvatarManagerOverrides {

	public static function avatar_manager_delete_avatar($user_id) {
		if ( !wp_verify_nonce( $_REQUEST['nonce'], "update-user_".$user_id)) {
			exit("No naughty business please");
		}


		// Retrieves user meta field based on user ID.
		$attachment_id = get_user_meta( $user_id, 'avatar_manager_custom_avatar', true );

		if ( empty( $attachment_id ) )
			return false;

		// Determines whether Multisite support is enabled.
		if ( is_multisite() ) {
			// Switches the current blog to a different blog.
			switch_to_blog( get_user_meta( $user_id, 'avatar_manager_blog_id', true ) );
		}

		// Retrieves attachment meta field based on attachment ID.
		$custom_avatar = get_post_meta( $attachment_id, '_avatar_manager_custom_avatar', true );

		if ( is_array( $custom_avatar ) ) {
			foreach ( $custom_avatar as $size => $skip ) {
				if ( ! $skip ) {
					// Generates a file path of an avatar image based on attachment
					// ID and size.
					$file = avatar_manager_generate_avatar_path( $attachment_id, $size );

					@unlink( $file );
				}
			}
		}

		// Deletes attachment meta fields based on attachment ID.
		delete_post_meta( $attachment_id, '_avatar_manager_custom_avatar' );
		delete_post_meta( $attachment_id, '_avatar_manager_custom_avatar_rating' );
		delete_post_meta( $attachment_id, '_avatar_manager_is_custom_avatar' );

		// Determines whether Multisite support is enabled.
		if ( is_multisite() ) {
			// Restores the current blog.
			restore_current_blog();
		}

		// Deletes user meta fields based on user ID.
		delete_user_meta( $user_id, 'avatar_manager_avatar_type' );
		delete_user_meta( $user_id, 'avatar_manager_custom_avatar' );

		// Determines whether Multisite support is enabled.
		if ( is_multisite() )
			delete_user_meta( $user_id, 'avatar_manager_blog_id' );

		//do_action('admin_post_update_user');
	}

	public static function avatar_manager_edit_user_profile_update($user_id, $post_request, $files, $get_request)
	{
		// Retrieves plugin options.
	$options = avatar_manager_get_options();

	// Sanitizes the string from user input.
	$avatar_type = isset( $post_request['avatar_manager_avatar_type'] ) ? sanitize_text_field( $post_request['avatar_manager_avatar_type'] ) : 'gravatar';

	// Updates user meta field based on user ID.
	update_user_meta( $user_id, 'avatar_manager_avatar_type', $avatar_type );

	// Retrieves user meta field based on user ID.
	$attachment_id = get_user_meta( $user_id, 'avatar_manager_custom_avatar', true );

	if ( ! empty( $attachment_id ) ) {
		// Sanitizes the string from user input.
		$custom_avatar_rating = isset( $post_request['avatar_manager_custom_avatar_rating'] ) ? sanitize_text_field( $post_request['avatar_manager_custom_avatar_rating'] ) : 'G';

		// Updates attachment meta field based on attachment ID.
		update_post_meta( $attachment_id, '_avatar_manager_custom_avatar_rating', $custom_avatar_rating );
	}

	if ( isset( $post_request['avatar-manager-upload-avatar'] ) && $post_request['avatar-manager-upload-avatar'] ) {
		echo 'isset avatar manager upload avatar';
		if ( ! function_exists( 'wp_handle_upload' ) )
			require_once( ABSPATH . 'wp-admin/includes/file.php' );

		if ( ! function_exists( 'wp_generate_attachment_metadata' ) )
			require_once( ABSPATH . 'wp-admin/includes/image.php' );

		// An associative array with allowed MIME types.
		$mimes = array(
			'bmp'  => 'image/bmp',
			'gif'  => 'image/gif',
			'jpe'  => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg'  => 'image/jpeg',
			'png'  => 'image/png',
			'tif'  => 'image/tiff',
			'tiff' => 'image/tiff'
		);

		// An associative array to override default variables.
		$overrides = array(
			'mimes'     => $mimes,
			'test_form' => false
		);

		// Handles PHP uploads in WordPress.
		$file_attr = wp_handle_upload( $files['avatar_manager_import'], $overrides );

		if ( isset( $file_attr['error'] ) ) {
			// Kills WordPress execution and displays HTML error message.
			wp_die( $file_attr['error'],  __( 'Image Upload Error', 'avatar-manager' ) );
		}

		echo 'tesne pred prvym deletom ----';
		if ( ! empty( $attachment_id ) ) {
			echo 'v prvom delete ----';
			// Deletes user's old avatar image.
			avatar_manager_delete_avatar( $user_id );
		}

		// An associative array about the attachment.
		$attachment = array(
			'guid'           => $file_attr['url'],
			'post_content'   => $file_attr['url'],
			'post_mime_type' => $file_attr['type'],
			'post_title'     => basename( $file_attr['file'] )
		);

		// Inserts the attachment into the media library.
		$attachment_id = wp_insert_attachment( $attachment, $file_attr['file'] );

		// Generates metadata for the attachment.
		$attachment_metadata = wp_generate_attachment_metadata( $attachment_id, $file_attr['file'] );

		// Updates metadata for the attachment.
		wp_update_attachment_metadata( $attachment_id, $attachment_metadata );

		// Generates a resized copy of the avatar image.
		$custom_avatar[ $options['default_size'] ] = avatar_manager_resize_avatar( $attachment_id, $options['default_size'] );

		// Updates attachment meta fields based on attachment ID.
		update_post_meta( $attachment_id, '_avatar_manager_custom_avatar', $custom_avatar );
		update_post_meta( $attachment_id, '_avatar_manager_custom_avatar_rating', 'G' );
		update_post_meta( $attachment_id, '_avatar_manager_is_custom_avatar', true );

		// Updates user meta fields based on user ID.
		update_user_meta( $user_id, 'avatar_manager_avatar_type', 'custom' );
		update_user_meta( $user_id, 'avatar_manager_custom_avatar', $attachment_id );

		// Determines whether Multisite support is enabled.
		if ( is_multisite() ) {
			// Retrieves the current blog id.
			update_user_meta( $user_id, 'avatar_manager_blog_id', get_current_blog_id() );
		}
	}

	if ( isset( $get_request['avatar_manager_action'] ) && $get_request['avatar_manager_action'] ) {

		$action = $get_request['avatar_manager_action'];

		switch ( $action ) {
			case 'remove-avatar':
				// Deletes avatar image based on user ID.
				avatar_manager_delete_avatar( $get_request['user_id'] );

				break;
		}

	}
	}

}