<?php

/**
 * Action for WooCommerce
 *
 * @author      Makarand Mane
 * @category    WooCommerce
 * @package     Initialization
 * @version     1.0
 */

/**
 * Hide virtual and downloadable option and set virtual type by default.
 *
 * @return void
 */
function wplms_hide_and_enable_virtual_by_default(){
    ?>
    <style>
        label[for="_virtual"], label[for="_downloadable"]{ opacity: 0; pointer-events: none; }
    </style>
    <?php
    ## JQUERY SCRIPT ##
    // Here we set as selected the 'virtual' checkboxes by default
    ?>
    <script>
        (function($){
            $('input[name=_virtual]').prop('checked', true);
            $('input[name=_downloadable]').prop('checked', false);
        })(jQuery);
    </script>
    <?php
}
add_action( 'woocommerce_product_options_general_product_data', 'wplms_hide_and_enable_virtual_by_default' );

/**
 * Force WooCommerce products to be sold individually
 */
add_filter( 'woocommerce_is_sold_individually', '__return_true' );

/**
 * Replace ex. VAT with ex. GST
 *
 * @param [string] $label
 * @return string
 */
function wplms_tax_label( $label ) {
    return 'ex. GST';
}
add_filter( 'woocommerce_countries_ex_tax_or_vat', 'wplms_tax_label', 20 );

/**
 * Replace words in WooCommerce and WPLMS
 * -need to #remove this in future
 *
 * @param [string] $translated
 * @return string
 */
function wplms_replace_words( $translated ) {

    if( is_admin(  ) )
        return $translated;

    $text = array(
        'Product' => 'Course',
        'product' => 'course',
        'Browse products' => 'Browse Courses'
    );
    $translated = str_ireplace(  array_keys($text),  $text,  $translated );
    return $translated;
}
add_filter( 'gettext', 'wplms_replace_words', 20 );

/**
 * Change label of return to shop button
 *
 * @return void
 */
function wplms_return_to_shop_text(){
    return __( 'Browse All courses', 'woocommerce' );
} 
add_filter( 'woocommerce_return_to_shop_text', 'wplms_return_to_shop_text' );

/**
 * change return to shop link to all course page
 *
 * @param [string] $url
 * @return string
 */
function wplms_all_course_page_link( $url ) {
	return get_permalink( vibe_get_bp_page_id( 'course' ) );
}
add_filter( 'woocommerce_return_to_shop_redirect' , 'wplms_all_course_page_link' );

/**
 * shop page redirect to all courses page
 *
 * @return void
 */
function wplms_shop_page_redirect() {
    if( is_shop() ){
		$bp_pages = get_option('bp-pages');
		$courses_page_id = $bp_pages['course'];
        wp_redirect( get_permalink( $courses_page_id ) );
        exit();
    }
}
add_action( 'template_redirect', 'wplms_shop_page_redirect' );

