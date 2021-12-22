<?php

/**
 * Shortcodes for WPLMS
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

$shortcodes = array(
    // 'shortcode file name',
);

foreach ($shortcodes as $file) {
    if (file_exists(dirname(__FILE__) . '/' . $file . '.php')) {
        include dirname(__FILE__) . '/' . $file . '.php';
    }
}
