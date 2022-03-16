<?php
/**
 * Plugin Name: Pantheon
 * Plugin URI: https://pantheon.io/
 * Description: Building on Pantheon's and WordPress's strengths, together.
 * Version: 0.1
 * Author: Pantheon
 * Author URI: https://pantheon.io/
 *
 * @package pantheon
 */
error_log(getenv($_ENV['PANTHEON_ENVIRONMENT']));
if ( isset( $_ENV['PANTHEON_ENVIRONMENT'] ) && $_ENV['PANTHEON_ENVIRONMENT'] != 'local' )  {

	require_once 'pantheon/pantheon-page-cache.php';
	if ( ! defined( 'DISABLE_PANTHEON_UPDATE_NOTICES' ) || ! DISABLE_PANTHEON_UPDATE_NOTICES ) {
		require_once 'pantheon/pantheon-updates.php';
	}
	if ( ! defined('RETURN_TO_PANTHEON_BUTTON') || RETURN_TO_PANTHEON_BUTTON ) {
		require_once 'pantheon/pantheon-login-form-mods.php';
	}
} // Ensuring that this is on Pantheon.
