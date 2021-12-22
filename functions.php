<?php

if (!defined('VIBE_URL'))
    define('VIBE_URL', get_template_directory_uri());

//Theme actions
require get_stylesheet_directory() . '/includes/theme-functions.php';
require get_stylesheet_directory() . '/includes/theme-actions.php';
//WPLMS
require get_stylesheet_directory() . '/includes/wplms-functions.php';
require get_stylesheet_directory() . '/includes/wplms-actions.php';
require get_stylesheet_directory() . '/includes/user-actions.php';
//SEO
require get_stylesheet_directory() . '/includes/seo-actions.php';
//AJAX
require get_stylesheet_directory() . '/includes/ajax-actions.php';
//Woo actions
require get_stylesheet_directory() . '/includes/woocommerce-actions.php';
//Admin actions
require get_stylesheet_directory() . '/includes/admin-actions.php';
//Settings panel
require get_stylesheet_directory() . '/includes/options.php';
//Some security work
require get_stylesheet_directory() . '/includes/security-actions.php';
// post-types 
require get_stylesheet_directory() . '/includes/post-types/post-type.php';
// widgets 
require get_stylesheet_directory() . '/includes/widgets/widgets.php';
// shortcodes 
require get_stylesheet_directory() . '/includes/shortcodes/shortcodes.php';
