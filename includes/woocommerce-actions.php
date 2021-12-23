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

/**
 * Removes Order Notes Title - Additional Information & Notes Field
 */ 
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

/**
 * Remove Order Notes Field
 *
 * @param [array] $fields
 * @return array
 */
function remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

/**
 * Remove permalink & thumbnail of product from cart, mini cart & order item in WooCommerce
 */
add_filter( 'woocommerce_cart_item_permalink',  '__return_empty_string' );
add_filter( 'woocommerce_cart_item_thumbnail',  '__return_empty_string' );
add_filter( 'woocommerce_order_item_permalink', '__return_empty_string');

/**
 * Auto Complete all WooCommerce orders.
 * 
 * If product is virtual & downloadable then order marked as complete. 
 * In below code I have returned false to order_item_needs_processing? & every order goes to complete status.
 * If need to check for virual only orders then need to write a function to check product is virtual or not? $_product->is_virtual()
 */
add_filter( 'woocommerce_order_item_needs_processing', '__return_false' );

/**
 * Remove order again button from thank you page
 *
 * @return void
 */
remove_action( 'woocommerce_order_details_after_order_table', 'woocommerce_order_again_button' );