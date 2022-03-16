<?php

namespace ColabCustomRestEndpoints;

/**
 * Class Plugin
 *
 * @package ColabCustomRestEndpoints
 */
class Plugin {
    // For I18N.
    const TEXT_DOMAIN = 'colab-custom-rest-endpoints';

    /**
     * Activation Hook
     */
    public static function register_activation_hook() {
        // Do Something.
    }

    /**
     * Deactivation hook.
     */
    public static function register_deactivation_hook() {
        // Do Something.
    }

    /**
     * Provide a general notice that vendor requirements provided by composer are missing.
     */
    public static function composer_notice() {
        // Add an admin notice that the required vendor packages are not installed.
        add_action( 'admin_notices', function () {
            echo sprintf(
                '<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
                __( 'My Plugin has an issue. Composer requirements are not installed. Please run `composer install` from the colab-custom-rest-endpoints directory.', self::TEXT_DOMAIN )
            );
        } );
    }
}
