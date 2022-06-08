<?php


namespace EnvironmentSpecificOverrides;


/**
 * Class Settings
 *
 * @package EnvironmentSpecificOverrides
 */
class Settings {
    /**
     * Action Hook callback to initialize an options page.
     *
     * Note: all fields for the options page will be configured via ACF interface.
     */
    public static function acf_init() {
        // Check function exists.
        if ( function_exists('acf_add_options_page') ) {
            // Register options page.
            acf_add_options_page( [
                'page_title'    => __( 'Environment Specific Option Overrides' ),
                'menu_title'    => __( 'Environment Specific Overrides' ),
                'menu_slug'     => 'env-specific-overrides',
                'capability'    => 'edit_posts',
                'redirect'      => FALSE
            ] );
        }
    }

    /**
     * Filter hook to add an additional ACF JSON read directory
     *
     * @param $paths
     * @return mixed
     */
    public static function load_json( $paths ) {
        // prepend path
        $path = PLUGIN_DIR . 'acf-json';
        array_unshift($paths, $path);

        // return
        return $paths;

    }
}
