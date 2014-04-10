<?php
/*
Plugin Name: Auto Login
Plugin URI: http://hbt.io/
Description: Create convenient auto-login links to quickly login to generic accounts. Configure source code to make changes.
Version: 1.0.0
Author: Harri Bell-Thomas
Author URI: http://hbt.io/
*/

// Declare global var's
global $login_parameter, $accounts;

// THE PARAMETER TO CHECK FOR
// eg. http://exmaple.com/wp-login.php?param_name=account
$login_parameter = "autologin";

// ACCOUNT CODE BLOCK
$accounts[] = array(
				"user" => "demo",
				"pass" => "demo",
				"location" => "wp-admin",
			  );
// END ACCOUNT CODE BLOCK

// EDIT AND REPEAT CODE BLOCK FOR AS MANY ACCOUNTS AS NEEDED

// Another example iteration
$accounts[] = array(
				"user" => "tcwp",
				"pass" => "demo",
				"location" => "wp-admin/?tcwp-sent-me",
			  );


// SEE PREVIOUS EXAMPLE FOR DETAILS ABOUT THIS FUNCTION
function autologin() {
	global $login_parameter, $accounts;
	foreach ($accounts as $account) {
		if ($_GET[$login_parameter] == $account['user']) {
			$creds['user_login'] = $account['user'];
			$creds['user_password'] = $account['pass'];
			$creds['remember'] = true;
			$autologin_user = wp_signon( $creds, false );
			if ( !is_wp_error($autologin_user) ) 
				header('Location: ' . $account['location']); 
		}
	}
}
add_action( 'after_setup_theme', 'autologin' );
