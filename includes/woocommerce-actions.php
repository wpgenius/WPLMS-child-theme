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

