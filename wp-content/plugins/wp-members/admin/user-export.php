<?php
/**
 * WP-Members Export Functions
 *
 * Mananges exporting users to a CSV file.
 * 
 * This file is part of the WP-Members plugin by Chad Butler
 * You can find out more about this plugin at http://rocketgeek.com
 * Copyright (c) 2006-2014  Chad Butler
 * WP-Members(tm) is a trademark of butlerblog.com
 *
 * @package WordPress
 * @subpackage WP-Members
 * @author Chad Butler
 * @copyright 2006-2014
 */


/**
 * New export function to export all or selected users
 *
 * @since 2.9.7
 *
 * @param array $args
 * @param array $users
 */
function wpmem_export_users( $args, $users = null )
{
	$today = date( "m-d-y" ); 

	/** Setup defaults **/
	$defaults = array(
		'export'        => 'all',
		'filename'      => 'wp-members-user-export-' . $today . '.csv',
		'export_fields' => array()
	);

	/** merge $args with defaults and extract **/
	/**
	 * Filter the default export arguments.
	 *
	 * @since 2.9.7
	 *
	 * @param array $args An array of arguments to merge with defaults. Default null.
 	 */
	extract( wp_parse_args( apply_filters( 'wpmem_export_args', $args ), $defaults ) );

	/** Output needs to be buffered, start the buffer */
	ob_start();
	
	/** If exporting all, get all of the users */
	$users = ( $export == 'all' ) ? get_users( array( 'fields' => 'ID' ) ) : $users;

	/** Generate headers and a filename based on date of export */
	header( "Content-Description: File Transfer" );
	header( "Content-type: application/octet-stream" );
	header( "Content-Disposition: attachment; filename=" . $filename );
	header( "Content-Type: text/csv; charset=" . get_option( 'blog_charset' ), true );
	echo "\xEF\xBB\xBF"; // UTF-8 BOM

	/** get the fields */
	$wpmem_fields = get_option( 'wpmembers_fields' );

	/** do the header row */
	$hrow = "User ID,Username,";

	foreach( $wpmem_fields as $meta ) {
		$hrow.= $meta[1] . ",";
	}

	$hrow.= ( WPMEM_MOD_REG == 1 ) ? __( 'Activated?', 'wp-members' ) . "," : '';
	$hrow.= ( WPMEM_USE_EXP == 1 ) ? __( 'Subscription', 'wp-members' ) . "," . __( 'Expires', 'wp-members' ) . "," : '';

	$hrow.= __( 'Registered', 'wp-members' ) . ",";
	$hrow.= __( 'IP', 'wp-members' );
	$data = $hrow . "\r\n";

	/**
	 * we used the fields array once,
	 * rewind so we can use it again
	 */
	reset( $wpmem_fields );

	/**
	 * Loop through the array of users,
	 * build the data, delimit by commas, wrap fields with double quotes, 
	 * use \n switch for new line
	 */
	foreach( $users as $user ) {

		$user_info = get_userdata( $user );

		$data.= '"' . $user_info->ID . '","' . $user_info->user_login . '",';
		
		$wp_user_fields = array( 'user_email', 'user_nicename', 'user_url', 'display_name' );
		foreach( $wpmem_fields as $meta ) {
			if( in_array( $meta[2], $wp_user_fields ) ){
				$data.= '"' . $user_info->$meta[2] . '",';	
			} else {
				$data.= '"' . get_user_meta( $user, $meta[2], true ) . '",';
			}
		}
		
		$data.= ( WPMEM_MOD_REG == 1 ) ? '"' . ( get_user_meta( $user, 'active', 1 ) ) ? __( 'Yes' ) : __( 'No' ) . '",' : '';
		$data.= ( WPMEM_USE_EXP == 1 ) ? '"' . get_user_meta( $user, "exp_type", true ) . '",' : '';
		$data.= ( WPMEM_USE_EXP == 1 ) ? '"' . get_user_meta( $user, "expires", true  ) . '",' : '';
		
		$data.= '"' . $user_info->user_registered . '",';
		$data.= '"' . get_user_meta( $user, "wpmem_reg_ip", true ). '"';
		$data.= "\r\n";
		
		/** update the user record as being exported */
		if( $export != 'all' ){
			update_user_meta( $user, 'exported', 1 );
		}
	}

	/** We are done, output the CSV */
	echo $data; 

	/** Clear the buffer */
	ob_flush();

	exit();
}

/** End of File **/