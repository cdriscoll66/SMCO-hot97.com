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
     * Sample override
     */
    public static function sampleReplacement( $option ) {
        $environment = self::determineEnvironment();

        // Replace whatever $option is with the environment as a test
        $override =  $environment;

        if ($override) {
            return $override;
        } else {
            return $option;
        }
    }

    /**
     * miniOrange overrides
     *
     */
    public static function miniOrangeReplacement( $option ) {
        $environment = self::determineEnvironment();

        // Replace the $option with the ACF environment specific value
        $override = get_option("options_{$environment}_environment_miniorange_sso_idp_settings_{$option}");

        // Certificate is stored as an array for some reason
        if($option == 'saml_x509_certificate') {
            $override = serialize([$override]);
        }

        if ($override) {
            return $override;
        } else {
            return $option;
        }
    }

    /**
     * Environment checker
     */
    public static function determineEnvironment() {
        $environment = 'local_multidev';
        if (defined('PANTHEON_ENVIRONMENT')) {
            switch(getenv('PANTHEON_ENVIRONMENT')) {
                case 'live':
                    $environment = 'live';
                break;
                case 'test':
                    $environment = 'test';
                break;
                case 'dev':
                    $environment = 'dev';
                break;
            }
        }

        return $environment;
    }

}