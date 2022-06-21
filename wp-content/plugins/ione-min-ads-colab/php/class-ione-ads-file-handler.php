<?php

/**
 * Handles the ads.txt file
 */
class IOne_Ads_File_Handler {

	var $cache_time = 3600; // 1 hour
	var $cache_backup_time = 3600 * 24 * 3; // 3 days
	var $cache_key  = 'ione_ads_txt_file';
	var $cache_backup_key = 'ione_ads_txt_file_backup';
	var $query_var  = 'ione_ads_txt';
	var $file_url   = 'https://s3.amazonaws.com/ione-adstxt/ionepartners/ads.txt';

	/**
	 * Add the hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'query_vars', array( $this, 'add_query_var' ) );
		add_action( 'parse_request', array( $this, 'file_output' ) );
		add_action( 'init', array( $this, 'add_rewrite_rule' ) );
	}

	/**
	 * Do settings output.
	 */
	public function settings() {
		?>
		<p>
			<label>
				<input type="checkbox" name="ione-advertising-disable-ads-txt" checked disabled=""> Ads.txt is enabled. Cannot be turned off. 
				<?php
				if ( '1' === filter_input( INPUT_GET, 'flush-rewrites' ) ) {
					echo ' Rewrite rules flushed.';
				} else {
					?>If ads.txt cannot be found (404) try to <a href="?page=ione-advertising&flush-rewrites=1">Flush Rewrite Rules clicking here.
					<?php
				}
				?>
				</a>
			</label>
		</p>
		<?php
	}

	/**
	 * Add the rewrite rule for the ads.txt file.
	 *
	 * @return void
	 */
	public function add_rewrite_rule() {
		if ( '1' === filter_input( INPUT_GET, 'flush-rewrites', FILTER_SANITIZE_STRING ) ) {
			flush_rewrite_rules();
		}
		add_rewrite_rule( '^ads.txt', sprintf( 'index.php?%s=1', $this->query_var ), 'top' );
	}

	/**
	 * Add the query var for the ads.txt file.
	 *
	 * @param array $query_vars Array with the current query vars.
	 * @return array
	 */
	public function add_query_var( $query_vars ) {
		$query_vars[] = $this->query_var;
		return $query_vars;
	}
	

	/**
	 * Renders the content of the ads.txt file.
	 *
	 * @param \WP $wp Current request.
	 * @return void
	 */
	public function file_output( $wp ) {
		if ( ! isset( $wp->query_vars[ $this->query_var ] ) ) {
			return;
		}

		$file_content = get_transient( $this->cache_key );

		if ( empty( $file_content ) ) {
			$response = wp_remote_get( $this->file_url );

			if ( is_wp_error( $response ) || 200 !== $response['response']['code'] || empty( wp_remote_retrieve_body( $response ) ) ) {
				$file_content = get_transient( $this->cache_backup_key );
			} else {
				$file_content = wp_remote_retrieve_body( $response );
				set_transient( $this->cache_backup_key, $file_content, $this->cache_backup_time );
			}

			set_transient( $this->cache_key, $file_content, $this->cache_time );
		}

		header( 'Content-Type: text/plain' );

		// We need to check again here in case the code above set an empty value to this varaible.
		if ( empty( $file_content ) ) {
			echo 'ads.txt not found';
		} else {
			echo esc_html( $file_content );
		}

		exit;
	}

}
