<?php

/**
 * Admin/dashboard only actions for website
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

/**
 * CSS to print admin/dashboard
 * - Hide posts selection page option
 * - Hide unwanted options from dashbords
 * 
 * @return void
 */
function cmp_admin_css(){
	?>
    <style type="text/css">
		#front-static-pages .screen-reader-text + p , /* Hide posts selection page option */
		tr.show-admin-bar, .user-rich-editing-wrap, .user-admin-color-wrap, .yoast.yoast-settings, #fieldset-billing + h2, #fieldset-shipping { display: none !important;	}
	</style>
    <?php
}
add_action( 'admin_print_styles', 'cmp_admin_css' );