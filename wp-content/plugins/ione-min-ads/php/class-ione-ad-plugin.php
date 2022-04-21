<?php

/**
 * Defines the plugin properties.
 */
class IOne_Ad_Plugin {

	/**
	 * Absolute path to the main plugin file.
	 * 
	 * For example, /absolute/path/to/wp-content/plugins/example-plugin/example-plugin.php
	 * 
	 * @var string
	 */
	protected $plugin_file_path;

	/**
	 * Absolute path to the plugin directory.
	 * 
	 * For example, /absolute/path/to/wp-content/plugins/example-plugin
	 * 
	 * @var string
	 */
	protected $plugin_dir_path;

	/**
	 * Setup the plugin definition.
	 * 
	 * @param string $plugin_file_path Absolute path to the main plugin file.
	 */
	public function __construct( $plugin_file_path ) {
		$this->plugin_file_path = $plugin_file_path;
		$this->plugin_dir_path = dirname( $plugin_file_path );
		$this->plugin_dir_url = rtrim( plugin_dir_url( $plugin_file_path ), '\\/' );
	}

	/**
	 * Get the plugin slug based on the plugin directory.
	 * 
	 * For example, for a plugin in wp-content/plugins/example-plugin/plugin.php
	 * this returns `example-plugin`.
	 * 
	 * Note that WP would resolve this from the plugin file but we have named
	 * it as generic `plugin.php` so we need to assume that the directory
	 * is our source of truth.
	 * 
	 * @return string
	 */
	public function slug() {
		return basename( $this->plugin_dir_path );
	}
	
	/**
	 * Get the plugin "basename" relative to the WP plugins directory.
	 * 
	 * For example, for a plugin in wp-content/plugins/example-plugin/plugin.php
	 * this returns `example-plugin/plugin.php`.
	 * 
	 * @return string
	 */
	public function basename() {
		return sprintf( '%s/%s', basename( $this->plugin_dir_path ), basename( $this->plugin_file_path ) );
	}

	protected function trim_relative_path( $path ) {
		return ltrim( trim( $path ), '/\\' );
	}

	/**
	 * Get the absolute path of a location relative to the
	 * plugin's root directory.
	 * 
	 * @return string
	 */
	public function path_to( $path_relative = null ) {
		if ( ! empty( $path_relative ) ) {
			return sprintf( 
				'%s/%s', 
				$this->plugin_dir_path, 
				$this->trim_relative_path( $path_relative ) 
			);
		}

		return $this->plugin_dir_path;
	}

	/**
	 * Get the URL of a location relative to the
	 * plugin's root directory.
	 * 
	 * @return string
	 */
	public function url_to( $path_relative = null ) {
		if ( ! empty( $path_relative ) ) {
			return sprintf( 
				'%s/%s', 
				$this->plugin_dir_url, 
				$this->trim_relative_path( $path_relative ) 
			);
		}

		return $this->plugin_dir_url;
	}
}
