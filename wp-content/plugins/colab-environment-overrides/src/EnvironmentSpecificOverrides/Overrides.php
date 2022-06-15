<?php
namespace EnvironmentSpecificOverrides;

/**
 * Class Overrides
 * Filter Hook callback to pre_option configuration options
 *
 * @package EnvironmentSpecificOverrides
 */
class Overrides {

    /**
     * This function syncs any values saved into MiniOrange fields into the respective
     * override ACF group BEFORE update to make sure that any calls to get_option are not being
     * overwritten by the pre_option hooks.
     *
     * @param $option_name
     * @param $old_value
     * @param $value
     * @return void
     */
    public static function update_option( $option_name, $old_value, $value ) {
        $overrides = [
            'mo_oauth_apps_list',
            'mo_oauth_client_config',
            'mo_oauth_client_auto_register',
            'mo_oauth_attr_name_listhot97dev',
            'mo_oauth_attr_name_listhot97test',
            'mo_oauth_attr_name_listhot97',
        ];

        echo "<h2> TEST: ".var_export($option_name, TRUE) ." </h2>" . PHP_EOL;
        echo "<h2> TEST: ".var_export($old_value, TRUE) ." </h2>" . PHP_EOL;
        echo "<h2> TEST: ".var_export($value, TRUE) ." </h2>" . PHP_EOL;
        if ( in_array( $option_name, $overrides ) ) {
            $environment = self::determineEnvironment();
            $override = get_field( "{$environment}_mo_oauth_apps_list", 'option', TRUE );
            update_field( "{$environment}_mo_oauth_apps_list", $value, 'option' );
        }
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_apps_list( $option_value ) {
        $environment = self::determineEnvironment();
        if ( $environment !== FALSE ) {
            $override = get_field( "{$environment}_mo_oauth_apps_list", 'option', TRUE );
            return $override ?? $option_value;
        }

        return $option_value;
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_client_config( $option_value ) {
        $environment = self::determineEnvironment();
        if ( $environment !== FALSE ) {
            $override = get_field( "{$environment}_mo_oauth_client_config", 'option', TRUE );
            return $override ?? $option_value;
        }

        return $option_value;
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_client_auto_register( $option_value ) {
        return 1;
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_attr_name_listhot97dev( $option_value ) {
        $environment = self::determineEnvironment();
        if ( $environment !== FALSE ) {
            $override = get_field( "{$environment}_mo_oauth_attr_name_listhot97dev", 'option', TRUE );
            return $override ?? $option_value;
        }

        return $option_value;
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_attr_name_listhot97test( $option_value ) {
        $environment = self::determineEnvironment();
        if ( $environment !== FALSE ) {
            $override = get_field( "{$environment}_mo_oauth_attr_name_listhot97test", 'option', TRUE );
            return $override ?? $option_value;
        }

        return $option_value;
    }

    /**
     * @param $option_value
     * @return false|mixed
     */
    public static function mo_oauth_attr_name_listhot97( $option_value ) {
        $environment = self::determineEnvironment();
        if ( $environment !== FALSE ) {
            $override = get_field( "{$environment}_mo_oauth_attr_name_listhot97", 'option', TRUE );
            return $override ?? $option_value;
        }

        return $option_value;
    }

    /**
     * Environment checker
     */
    public static function determineEnvironment() {
        $environment = FALSE;
        if (defined('PANTHEON_ENVIRONMENT')) {
            switch(getenv('PANTHEON_ENVIRONMENT')) {
                case 'live':
                    $environment = 'live';
                break;
                case 'test':
                    $environment = 'test';
                break;
                case 'develop':
                case 'lando':
                    $environment = 'develop';
                break;
            }
        }

        return $environment;
    }

}