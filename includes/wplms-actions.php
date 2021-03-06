<?php

/**
 * Action for WPLMS
 *
 * @author      Makarand Mane
 * @category    WPLMS
 * @package     Initialization
 * @version     1.0
 */

 /**
  * Add reply to email address in BuddyPress emails.
  *
  * @param [string] $reply_to
  * @return string
  */
function cmp_reply_to_email($reply_to){
    if (class_exists('WPLMS_tips')) {
        $wplms_settings = WPLMS_tips::init();
        $settings = $wplms_settings->lms_settings;
    } else {
        $settings = get_option('lms_settings');
    }

    if (!empty($settings['email_settings']) && !empty($settings['email_settings']['reply_to_email'])) {
        return new BP_Email_Recipient($settings['email_settings']['reply_to_email']);
    }

    return $reply_to;
}
add_filter('bp_email_set_reply_to', 'cmp_reply_to_email', 999);
