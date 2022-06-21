<?php

/**
 * Build the amp ad below the post meta.
 */
class IOne_Top_Ad {
	const OPTION_NAME_TOP = 'ione-advertising-config-amp-top';

	public static $do_amp_top_ad;

	protected $plugin;

	public function __construct( $plugin ) {
		$this->plugin = $plugin;

		self::$do_amp_top_ad = (bool) get_option( self::OPTION_NAME_TOP );

		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'ione-ads__process_input', array( $this, 'save_settings' ) );

		if ( self::$do_amp_top_ad ) {
			add_filter( 'amp_post_article_header_meta', function( $parts ) {
				$parts = array_merge( array( 'ione-ad' ), $parts );
				return $parts;
			} );

			add_filter( 'amp_post_template_file', function( $file, $template_type ) {
				if ( 'ione-ad' === $template_type ) {
					return $this->plugin->path_to( 'php/ione-amp-template-top-ad.php' );
				}
				return $file;
			}, 10, 2 );
		}
	}

	public function settings() {
		?>
		<p>
			<label>
				<input type="checkbox" name="ione-advertising-disable-amp-top" <?php checked( self::$do_amp_top_ad ); ?>> Enable top AMP ad.
			</label>
		</p>
		<?php
	}

	public function save_settings() {
		$disable_anchor = filter_input( INPUT_POST, 'ione-advertising-disable-amp-top' );
		update_option( self::OPTION_NAME_TOP, (bool) $disable_anchor );
	}
}
