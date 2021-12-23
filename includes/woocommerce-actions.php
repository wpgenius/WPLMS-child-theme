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

