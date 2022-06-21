<?php

/**
 * Build a floating ad at the bottom of the screen.
 */
class IOne_Anchor_Ad {
	const OPTION_NAME_ANCHOR = 'ione-advertising-config-anchor';

	public static $do_anchor;

	public function __construct() {
		self::$do_anchor = (bool) get_option( self::OPTION_NAME_ANCHOR );

		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'ione-ads__process_input', array( $this, 'save_settings' ) );

		if ( self::$do_anchor ) {
			add_action( 'wp_head', array( $this, 'action_wp_head' ) );
			add_action( 'wp_footer', array( $this, 'action_wp_footer' ) );
			add_action( 'amp_post_template_footer', array( $this, 'amp_post_content_bottom' ) );
		}
	}

	public function settings() {
		?>
		<p>
			<label>
				<input type="checkbox" name="ione-advertising-disable-anchor" <?php checked( self::$do_anchor ); ?>> Enable anchor ad.
			</label>
		</p>
		<?php
	}

	public function save_settings() {
		$disable_anchor = filter_input( INPUT_POST, 'ione-advertising-disable-anchor' );
		update_option( self::OPTION_NAME_ANCHOR, (bool) $disable_anchor );
	}

	public function action_wp_head() {
		?>
		<style>
			#anchor-ad-container {
				position: fixed;
				bottom: 0;
				width: 100%;
				text-align: center;
				background: none;
				z-index: 9999;
				transform: translate3d( 0, 0, 0 );
			}
			@media only screen and (min-width: 64.063em) {
				#anchor-ad-container {
					text-align: right;
				}
			}

			#close-button {
				position: absolute;
				right: 20px;
				width: 20px;
				height: 20px;
				background-color: black;
				border-radius: 10px;

				font-family: Arial;
				color: white;
				font-size: 15px;
				line-height: 20px;
				text-align: center;
			}
		</style>
		<?php
	}

	public function action_wp_footer() {
		?>
		<div id="anchor-ad-container">
			<div id="close-button">X</div>
			<?php
			$ad = new IOne_Ad( 'anchor' );
			$ad->render();
			?>
		</div>
		<script>
			( function() {
				var closeButton = document.querySelector( '#close-button' );
				if ( ! closeButton ) {
					return;
				}
				closeButton.addEventListener( 'click', function( e ) {
					e.preventDefault();
					var container = document.querySelector( '#anchor-ad-container' );
					if ( container ) {
						container.remove();
					}
				} );
			} )();
		</script>
		<?php
	}

	/**
	 * Insert Floating Ad.
	 *
	 * Uses custom template hook (amp_post_template_footer) in amp-single.php
	 *
	 * @param array $amp AMP Object.
	 */
	function amp_post_content_bottom( $amp ) {
		?>
		<amp-sticky-ad layout="nodisplay">
			<?php
			$ad = new IOne_Ad( 'anchor' );
			$ad->render();
			?>
		</amp-sticky-ad>
		<?php
	}

}
