<?php
/*
 * Plugin Name: IOne Digital Ads - v1.3 - COLAB Modified
 * Description: Copy of IOne plug in with modified function - accepting custom post type archives. 
 * Version: 1.3
 * Author: COLAB
 * Author URI: https://www.teamcolab.com/
 */

require_once __DIR__ . '/php/class-ione-ad-plugin.php';
$ione_ad_plugin = new IOne_Ad_Plugin( __FILE__ );

require_once __DIR__ . '/php/class-ione-ad.php';
require_once __DIR__ . '/php/class-ione-ad-configurator.php';
new IOne_Ad_Configurator( $ione_ad_plugin );

// Incontent ad injection.
require_once __DIR__ . '/php/class-ione-comscore.php';
new IOne_Comscore();

// ads.txt file
require_once __DIR__ . '/php/class-ione-ads-file-handler.php';

$ads_file_handler = new IOne_Ads_File_Handler();
$ads_file_handler->init();

// Incontent ad injection.
require_once __DIR__ . '/php/class-ione-ad-injector.php';
new IOne_Ad_Injector();

// Anchor ad.
require_once __DIR__ . '/php/class-ione-anchor-ad.php';
new IOne_Anchor_Ad();

// Top AMP ad.
require_once __DIR__ . '/php/class-ione-top-ad.php';
new IOne_Top_Ad( $plugin );

// Index Exchange.
require_once __DIR__ . '/php/class-ione-index-exchange.php';
new IOne_Index_Exchange();

// WP Widget.
require_once __DIR__ . '/php/class-ione-advertisement.php';

function ione_widgets_init() {
	register_widget( 'Ione_Advertisement' );
}
add_action( 'widgets_init', 'ione_widgets_init' );

// Auto-updater.
require_once __DIR__ . '/php/class-ione-plugin-updater.php';
new IOne_Plugin_Updater( $ione_ad_plugin );

// This is needed by the the ads.txt file class.
register_activation_hook( __FILE__, function() use ( $ads_file_handler ) {
	// Must be done in this order ... even though it makes no sense.
	$ads_file_handler->add_rewrite_rule();
	flush_rewrite_rules();
} );

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
