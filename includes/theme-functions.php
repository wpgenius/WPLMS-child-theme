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

/**
 * Set headers to forcefully download csv file.
 *
 * @param [string] $filename
 * @return void
 */
function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}