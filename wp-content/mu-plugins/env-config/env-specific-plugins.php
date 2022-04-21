<?php
require_once ABSPATH . 'wp-admin/includes/plugin.php';
// List Development Plugins.
// $plugins = array(
// 	// 'miniorange-saml-20-single-sign-on/login.php',
// );

// // Live-specific configs.
// if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], ['develop', 'test', 'live'] ) ) {
// 	// Activate Live Plugins.
// 	require_once ABSPATH . 'wp-admin/includes/plugin.php';
// 	foreach ( $plugins as $plugin ) {
// 		if ( is_plugin_inactive( $plugin ) ) {
// 			activate_plugin( $plugin );
// 		}
// 	}
// }

// // Configs for All environments but Live.
// else {

// 	// Disable Live Plugins.
// 	require_once ABSPATH . 'wp-admin/includes/plugin.php';

// 	foreach ( $plugins as $plugin ) {
// 		if ( is_plugin_active( $plugin ) ) {
// 			deactivate_plugins( $plugin );
// 		}
// 	}
// }

// Ensure enabled for ALL environments
$plugins = [
	'colab-custom-rest-endpoints/colab-custom-rest-endpoints.php'
];

foreach ( $plugins as $plugin ) {
	if ( is_plugin_inactive( $plugin ) ) {
		activate_plugin( $plugin );
	}
}
