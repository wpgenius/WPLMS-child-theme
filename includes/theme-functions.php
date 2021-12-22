<?php

/**
 * Funtions for theme
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

 /**
 * Checks whether current user is from WPGenius
 *
 * @return boolean
 */
function is_wpg_user(){
	$user = wp_get_current_user();
    return $user && isset($user->user_login) && ($user->user_login == 'makarand' || preg_match('/^\w+@wpgenius\.in$/i', $user->user_email ) > 0 );	
}