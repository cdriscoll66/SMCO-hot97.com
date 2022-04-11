<?php


namespace ColabCustomRestEndpoints;

/**
 * Class Settings
 *
 * @package ColabCustomRestEndpoints
 */
class Settings {
    /**
     * Action Hook callback to initialize an options page.
     *
     * Note: all fields for the options page will be configured via ACF interface.
     */
    public static function acf_init() {
        // Check function exists.
        if ( function_exists( 'acf_add_options_page' ) ) {
            // Register options page.
            acf_add_options_sub_page( [
                'page_title' 	=> 'App Configuration',
                'menu_title'	=> 'App Configuration',
                'parent_slug'	=> 'global-settings',
                'menu_slug'     => 'app-config'
            ] );
        }

        // Add support for shortcodes within ACF text, textarea fields
        add_filter( 'acf/format_value/type=text', 'do_shortcode' );
        add_filter( 'acf/format_value/type=textarea', 'do_shortcode' );
    }
}
