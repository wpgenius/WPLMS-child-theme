<?php

/**
 * Action for theme
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 *
 * @return void
 */
function remove_wp_block_library_css()function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'bp-member-block' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-vendors-style' );
	wp_deregister_style( 'wc-block-editor' );
	wp_deregister_style( 'wc-blocks-style' );
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css' );

/**
 * Fully Disable Gutenberg editor.
 */
add_filter('use_block_editor_for_post_type', '__return_false', 10); 
