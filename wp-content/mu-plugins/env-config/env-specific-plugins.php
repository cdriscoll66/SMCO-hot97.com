<?php
require_once ABSPATH . 'wp-admin/includes/plugin.php';

$plugins = [
    'conditional-plugins' => [
        'miniorange-oauth-oidc-single-sign-on/mo_oauth_settings.php',
        'colab-environment-overrides/colab-environment-overrides.php',
    ],
    'always-on' => [
        'colab-custom-rest-endpoints/colab-custom-rest-endpoints.php',
    ]
];


// Live-specific configs.
if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], [ 'develop', 'test', 'live', 'lando' ] ) ) {
    // Activate Live Plugins.
    foreach ( $plugins['conditional-plugins'] as $plugin ) {
        if ( is_plugin_inactive( $plugin ) ) {
            activate_plugin( $plugin );
        }
    }
} else {
 	foreach ( $plugins['conditional-plugins'] as $plugin ) {
 		if ( is_plugin_active( $plugin ) ) {
 			deactivate_plugins( $plugin );
 		}
 	}
}

// Turn on always on plugins
foreach ( $plugins['always-on'] as $plugin ) {
    if ( is_plugin_active( $plugin ) ) {
        activate_plugin( $plugin );
    }
}
