<?php

/**
 * Options for WPLMS
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

add_filter('wplms_email_settings', 'cmp_wplms_email_settings', 9999);
function cmp_wplms_email_settings($settings)
{

    $new_option = array(
        array(
            'label' => __('Reply-To "Email"', 'vibe-customtypes'),
            'name' => 'reply_to_email',
            'type' => 'text',
            'desc' => __('Email to which student should reply on recevied email.', 'vibe-customtypes')
        )
    );

    return array_merge(array_slice($settings, 0, 2), $new_option, array_slice($settings, 2));
}
