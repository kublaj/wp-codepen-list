<?php

 /**
 * Plugin Name:       Pine CodePen List
 * Plugin URI:        https://github.com/thepinecode/wp-codepen-list
 * Description:       A simple way to inegrate your pens or posts with WordPress.
 * Version:           1.0.0
 * Author:            Gergő D. Nagy
 * Author URI:        http://pineco.de
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       pine-codepen-list
 * Domain Path:       /languages/
 */

if (! defined('WPINC')) {
    wp_die();
}

// Check if the function exists and declare it if it
// has not been declared. It returns the path to
// the given file.
if (! function_exists('pine_base_path')) {
    function pine_base_path($file = '')
    {
        return sprintf('%s%s', plugin_dir_path(__FILE__), $file);
    }
}

// Check if the function exists and declare it if it
// has not been declared. It returns the URL to the
// given file.
if (! function_exists('pine_base_url')) {
    function pine_base_url($file = '')
    {
        return sprintf('%s%s', plugin_dir_url(__FILE__), $file);
    }
}

// Pull in the autoloader
require_once pine_base_path('includes/misc/autoloader.php');

// Boot up the servicies
Pine\CodePenList\CodePenList::boot();

// Register the activation and the deactivation hook
register_activation_hook(__FILE__, [Pine\CodePenList\CodePenList::class, 'activate']);
register_deactivation_hook(__FILE__, [Pine\CodePenList\CodePenList::class, 'deactivate']);
