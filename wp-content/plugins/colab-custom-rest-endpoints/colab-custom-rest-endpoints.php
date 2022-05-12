<?php
/*
Plugin Name: Colab Custom REST Endpoints
Plugin URI: https://github.com/teamcolab/Demo-WordPress-Plugin-Base
Description: A plugin for exposing custom ACF endpoints to REST.
Version: 1.0
Author: Dustin Ginther
Author URI: https://www.teamcolab.com
License: GPL2
*/

/*
Copyright 2022  Dustin Ginther  (email : dustin.ginther@teamcolab.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Define the namespace for our plugin.
namespace ColabCustomRestEndpoints;

/***********************************
 * Initialize Auto-loaders
 ***********************************/

// Handle auto-loading classes for this plugin.
spl_autoload_register( function ($class_name) {
    if ( FALSE !== strpos( $class_name, __NAMESPACE__ )) {
        $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $class_file = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
        require_once( $classes_dir . $class_file );
    }
});

// Load Composer's auto-loader.
if (file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once( __DIR__ . '/vendor/autoload.php' );
}
else {
    // If the composer autoloader doesn't exist, the plugin will fail so output a message and return.
    Plugin::composer_notice();
    return;
}

// Includes.
use ColabCustomRestEndpoints\Api\AppRestController;
use ColabCustomRestEndpoints\Api\CorePostRestAdditions;

/***********************************
 * Initialize plugin.
 ***********************************/

// Plugin install/uninstall hooks.
register_activation_hook( __FILE__, [ Plugin::class, 'register_activation_hook' ] );
register_deactivation_hook( __FILE__, [ Plugin::class, 'register_deactivation_hook' ] );


/***********************************
 * Filter Hooks.
 ***********************************/


/***********************************
 * Action Hooks.
 ***********************************/

// Register Rest Routes
add_action( 'rest_api_init', [ AppRestController::class, 'rest_api_init' ] );
add_action( 'rest_api_init', [ CorePostRestAdditions::class, 'rest_api_init' ] );

// Initialize the Settings Page once ACF is loaded.
add_action( 'acf/init', [ Settings::class, 'acf_init' ], 20 );


/***********************************
 * Shortcodes Hooks.
 ***********************************/