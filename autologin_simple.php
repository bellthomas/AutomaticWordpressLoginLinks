<?php
/*
Plugin Name: Auto Login
Plugin URI: http://hbt.io/
Description: Create convenient auto-login links to quickly login to generic accounts. Configure source code to make changes.
Version: 1.0.0
Author: Harri Bell-Thomas
Author URI: http://hbt.io/
*/

function autologin() {
	// PARAMETER TO CHECK FOR
	if ($_GET['autologin'] == 'demo') {
		
		// ACCOUNT USERNAME TO LOGIN TO
		$creds['user_login'] = 'demo';
		
		// ACCOUNT PASSWORD TO USE
		$creds['user_password'] = 'demo';
		
		$creds['remember'] = true;
		$autologin_user = wp_signon( $creds, false );
		
		if ( !is_wp_error($autologin_user) ) 
			header('Location: wp-admin'); // LOCATION TO REDIRECT TO
	}
}
// ADD CODE JUST BEFORE HEADERS AND COOKIES ARE SENT
add_action( 'after_setup_theme', 'autologin' );