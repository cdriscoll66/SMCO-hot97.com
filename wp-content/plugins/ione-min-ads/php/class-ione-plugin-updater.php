<?php
/**
 * Auto-update plugin when updates are available from source server.
 */
class IOne_Plugin_Updater {

	const API_URL = 'https://trending.interactiveone.com/plugin/check';

	protected $plugin;
	
	/**
	 * Add filters
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		
		// Take over the update check
		add_filter( 'pre_set_site_transient_update_plugins', [ $this, 'set_checked_data' ] );

		// Take over the Plugin info screen
		add_filter( 'plugins_api', [ $this, 'plugin_updater_api_call' ], 10, 3 );
	}

	/**
	 * Set checked data.
	 *
	 * @param object $checked_data An object containing an array of objects with info on each plugin.
	 *
	 * @return object
	 */
	function set_checked_data( $checked_data ) {
		if ( empty( $checked_data->checked ) ) {
			return $checked_data;
		}

		$plugin_file = $this->plugin->basename();

		$request_args = (object) [
			'slug' => $this->plugin->slug(),
			'version' => $checked_data->checked[ $plugin_file ],
		];

		$request_string = $this->prepare_request( 'basic_check', $request_args );

		// Start checking for an update
		$raw_response = wp_remote_post( self::API_URL, $request_string );

		if ( ! is_wp_error( $raw_response ) && ( 200 === $raw_response['response']['code'] ) ) {
			$response = json_decode( $raw_response['body'] );
		}

		if ( ! empty( $response ) && is_object( $response ) ) {
			// Other fields that may be needed: id, url, icons, banners, banners_rtl, tested, requires_php, compatibility
			$response->plugin = $plugin_file;

			if ( isset( $response->new_version ) ) {
				// Feed the update data into WP updater.
				$checked_data->response[ $plugin_file ] = $response;
			} else {
				// Adding the "mock" response to the `no_update` property is required
				// for the enable/disable auto-updates links to correctly appear in UI.
				$checked_data->no_update[ $plugin_file ] = $response;
			}
		}

		return $checked_data;
	}

	/**
	 * Filters the response for the current WordPress.org Plugin Installation API request.
	 *
	 * Passing a non-false value will effectively short-circuit the WordPress.org API request.
	 *
	 * If `$action` is 'query_plugins' or 'plugin_information', an object MUST be passed.
	 * If `$action` is 'hot_tags' or 'hot_categories', an array should be passed.
	 *
	 * @param false|object|array $result The result object or array. Default false.
	 * @param string             $action The type of information being requested from the Plugin Installation API.
	 * @param object             $args   Plugin API arguments.
	 *
	 * @return mixed
	 */
	function plugin_updater_api_call( $result, $action, $args ) {
		if ( $args->slug !== $this->plugin->slug() ) {
			return false;
		}

		// Get the current version
		$plugin_info = get_site_transient( 'update_plugins' );
		$current_version = $plugin_info->checked[ $this->plugin->basename() ];
		$args->version = $current_version;

		$request_string = $this->prepare_request( $action, $args );

		$request = wp_remote_post( self::API_URL, $request_string );

		if ( is_wp_error( $request ) ) {
			$result = new WP_Error(
				'plugins_api_failed',
				__( 'An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>' ),
				$request->get_error_message()
			);
		} else {
			$result = json_decode( $request['body'] );
			$result->sections = [
				'description' => $result->sections->description,
			];

			if ( empty( $result ) ) {
				$result = new WP_Error( 'plugins_api_failed', __( 'An unknown error occurred' ), $request['body'] );
			}
		}

		return $result;
	}

	/**
	 * Prepare request to be sent to custom plugin server.
	 *
	 * @param string $action The type of information being requested from the Plugin Installation API.
	 * @param object $args   Plugin API arguments.
	 *
	 * @return array
	 */
	function prepare_request( $action, $args ) {
		global $wp_version;

		return [
			'body' => [
				'action' => $action,
				'request' => wp_json_encode( $args ),
				'api-key' => md5( get_bloginfo( 'url' ) ),
			],
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
		];
	}
}
