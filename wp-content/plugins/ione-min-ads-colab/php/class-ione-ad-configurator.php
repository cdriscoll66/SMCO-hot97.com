<?php

class IOne_Ad_Configurator {
	const OPTION_NAME = 'ione-advertising-config';

	public static $ad_config = array();

	protected $plugin;

	public function __construct( $plugin ) {
		$this->plugin = $plugin;

		$defaults = [
			'desktopBreakPoint'       => [ 700, 300 ],
			'targeting'               => new stdClass(),
			'adConfig'                => [],
			'baseDesktopAdUnit'       => '/4052/bossip/desktop',
			'baseMobileAdUnit'        => '/4052/bossip/mobile',
			'baseAmpAdUnit'           => '/4052/bossip/amp',
			'viewableRefreshInterval' => 30,
		];
		self::$ad_config = wp_parse_args( get_option( self::OPTION_NAME, [] ), $defaults );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
		add_action( 'admin_post', array( $this, 'process_input' ) );

		add_action( 'amp_post_template_css', function() {
			?>
			.ione-ad {
				text-align: center;
				width: 100%;
			}
			<?php
		} );
	}

	function register_menu() {
		add_options_page( 'Advertising', 'Advertising', 'manage_options', 'ione-advertising', array( $this, 'render_admin_page' ) );
	}

	function render_admin_page() {
		?>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="max-width: 650px">
			<?php wp_nonce_field( 'ione_advertising_admin', 'ione_advertising_admin' ); ?>

			<h2>Advertising configuration</h2>
			<div>
				<p>Use this area to setup the configuration of the plugin. The configuration <strong>must</strong> be completed for proper functionality. This will be provided by the IOne Digital team.</p>

				<?php do_action( 'ione-ads__show_settings' ); ?>

				<textarea name="ione-advertising-json" style="font-family: Courier; max-width: 650px; width:100%;height:200px;"><?php echo wp_json_encode( (object) $this->get_ads_config(), JSON_PRETTY_PRINT ); ?></textarea>
			</div>
			<input type="submit" value="Save Settings" class="button button-primary" />
		</form>
		<hr style="margin: 1em auto;" />
		<h2>How to</h2>
		<div style="max-width: 650px">
			<p>There are 2 ways of adding advertisement to your site: Widgets and Copy+Paste code.</p>

			<h3>Widgets</h3>
			<p>If your site supports widgets, and the you are planning on using ads on those sidebars, you can use the <em>IOne Advertisement Widget</em> by dragging and dropping onto the sidebar, just like you would with any other widgets. Once dropped, just select the position you would like to use.</p>

			<h3>Copy and Paste Code</h3>
			<p>If you have access and would like to add the ads manually, you can copy this code <strong><em>replace the pos value</em></strong> to the ad you would like to use and then paste it in your site:</p>
			<code style="border:1px solid black; padding: 1em; margin: 1em auto; display: block;position:relative;">
				<span id="the_code">
					&lt;div class=&quot;ione-ad&quot; data-pos=&quot;top&quot;&gt;&lt;/div&gt;
				</span>
				<button id="copy-button" class="button-secondary" style="position: absolute; top: 0.5rem; right: 0.5rem;">Copy to Clipboard</button>
			</code>

			<p>The plugin will find this code and make an ad out of it. In this example the ad with pos=top will be used.</p>
		</div>
		<script>
			( function() {
				var button = document.querySelector( '#copy-button' );
				if ( ! button ) {
					return;
				}

				button.addEventListener( 'click', function( e ) {
					const copyText = document.querySelector( '#the_code' );
					const selection = window.getSelection();
					const range = document.createRange();
					const previousText = e.target.innerHTML;

					range.selectNodeContents( copyText );
					selection.removeAllRanges();
					selection.addRange( range );

					document.execCommand( 'copy' );

					e.target.innerHTML = 'Copied!';
					setTimeout( () => {
						e.target.innerHTML = previousText;
					}, 3000 );
				} );
			} )();
		</script>
		<?php
	}

	function process_input() {
		$nonce = filter_input( INPUT_POST, 'ione_advertising_admin', FILTER_UNSAFE_RAW );
		if ( $nonce && wp_verify_nonce( $nonce, 'ione_advertising_admin' ) ) {
			$ad_config = filter_input( INPUT_POST, 'ione-advertising-json' );

			$json = json_decode( $ad_config, true );
			if ( $json ) {
				update_option( self::OPTION_NAME, $json );
			}

			do_action( 'ione-ads__process_input' );

			$referrer = filter_input( INPUT_POST, '_wp_http_referer', FILTER_SANITIZE_URL );
			if ( empty( $referrer ) ) { // Input var okay.
				$url = wp_login_url();
			} else {
				$url = wp_unslash( $referrer );
			}
			wp_safe_redirect( urldecode( $url ) );
			exit();
		}
	}

	function enqueue_scripts() {
		wp_register_script( 
			'ione-view-time-tracker', 
			$this->plugin->url_to( 'js/src/ione-view-time-tracker.js' ), 
			array( 'underscore' ), 
			filemtime( $this->plugin->path_to( 'js/src/ione-view-time-tracker.js' ) ),
			true 
		);

		wp_enqueue_script( 
			'ione-ads', 
			$this->plugin->url_to( 'js/src/dfp-loader.js' ), 
			array( 'ione-view-time-tracker' ), 
			filemtime( $this->plugin->path_to( 'js/src/dfp-loader.js' ) ),
			true
		);

		$data = $this->get_ads_config();
		$data['targeting'] = self::get_targeting_globals();

		wp_localize_script( 'ione-ads', 'ioneAdsConfig', apply_filters( 'ione-ads__ad_config', $data ) );

		if ( apply_filters( 'ione-ads__enqueue_richmedia_css', true ) ) {
			wp_enqueue_style( 'ione_remote_ad_stylesheet', 'https://s3.amazonaws.com/ads-videoplayer/rich-media-ads-global.css' );
		}
	}

	public static function get_targeting_globals() {
		$data = array(
			'postID'   => (string) get_queried_object_id(),
			'category' => self::get_categories(),
			'tag'      => self::get_tags(),
			'kw'       => self::get_kw_value(),
		);
		if ( is_home() || is_front_page() ) {
			$data['pg'] = 'home';
		}

		return $data;
	}

	private static function get_kw_value() {
		$keyword = filter_input( INPUT_GET, 'ads_add_testing_keyword', FILTER_SANITIZE_STRING );
		if ( ! empty( $keyword ) ) {
			return sanitize_text_field( $keyword );
		}

		return '';
	}

	private static function get_categories() {
		if ( is_home() || is_front_page() || is_post_type_archive() ) {
			return array( 'home' );

		} elseif ( is_category() ) {
			$queried_object = get_queried_object();
			if ( ! empty( $queried_object->slug ) ) {
				return array( 'category', $queried_object->slug );
			}
		} elseif ( is_search() ) {
			return array( 'search' );

		} else {
			$queried_object  = get_queried_object();
			if ( $queried_object ) {

				$post_categories = get_the_terms( $queried_object->ID, 'category' );
				if ( is_array( $post_categories ) ) {
					$list   = wp_list_pluck( $post_categories, 'slug' );
					$list[] = 'post';
					return $list;
				}
			}
		}

		return array();
	}

	private static function get_tags() {
		if ( is_single() ) {
			$queried_object = get_queried_object();
			$post_tags      = get_the_terms( $queried_object->ID, 'post_tag' );

			if ( is_array( $post_tags ) ) {
				return wp_list_pluck( $post_tags, 'slug' );
			}
		}

		return array();
	}

	public static function get_ads_config() {
		return self::$ad_config;
	}
}
