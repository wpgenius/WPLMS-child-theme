<?php

/**
 * Include only post-types here
 *
 * @author      Makarand Mane
 * @category    post-type
 * @package     Initialization
 * @version     1.0
 */

//Post types

$postTypes = array(
    'course',
    'assignments',
    'testimonials'
);

foreach ($postTypes as $file) {
    if (file_exists(dirname(__FILE__) . '/' . $file . '.php')) {
        include dirname(__FILE__) . '/' . $file . '.php';
    }
}
