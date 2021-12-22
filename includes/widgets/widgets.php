<?php

/**
 * Current events widget
 *
 * @author      Makarand Mane
 * @category    Admin
 * @package     Initialization
 * @version     1.0
 */

$widgets = array(
    // 'widgets file name',
);

foreach ($widgets as $file) {
    if (file_exists(dirname(__FILE__) . '/' . $file . '.php')) {
        include dirname(__FILE__) . '/' . $file . '.php';
    }
}

// add_action('widgets_init', function () {
//     register_widget('CMP_Taxonomy_Widget');
// });
