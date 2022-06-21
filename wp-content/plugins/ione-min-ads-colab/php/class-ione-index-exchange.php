<?php

/**
 * Add index exchange.
 */
class IOne_Index_Exchange {

	/**
	 * Option Name.
	 */
	const OPTION_NAME_INDEX_EX = 'ione-advertising-config-index_ex';

	/**
	 * Index Exchange Id.
	 *
	 * @var string
	 */
	public static $do_index_ex = '';

	/**
	 * Constructor.
	 */
	public function __construct() {
		self::$do_index_ex = get_option( self::OPTION_NAME_INDEX_EX );

		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'ione-ads__process_input', array( $this, 'save_settings' ) );

		if ( self::$do_index_ex ) {
			add_action( 'wp_head', array( $this, 'render' ), 1 );
			add_filter( 'ione-ads__amp_rtc_config', array( $this, 'add_to_amp' ), 10, 2 );
		}
	}

	/**
	 * Display settings.
	 */
	public function settings() {
		?>
		<p>
			<label>
				<input type="text" name="ione-advertising-index-ex" value="<?php echo esc_attr( self::$do_index_ex ); ?>"> Index Exchange ID <small>( Pull from the index URL. Ex: //js-sec.indexww.com/ht/p/<span style="color:red">186774-159866622015434</span>.js )</small>.
			</label>
		</p>
		<?php
	}

	/**
	 * Save option.
	 */
	public function save_settings() {
		$index_ex = filter_input( INPUT_POST, 'ione-advertising-index-ex', FILTER_SANITIZE_STRING );
		update_option( self::OPTION_NAME_INDEX_EX, sanitize_text_field( $index_ex ) );
	}

	/**
	 * Add script to html.
	 */
	public function render() {
		// phpcs:disable -- This MUST be the very first script on the page and async, can't enqueue
		?>
		<script async src="<?php echo esc_url( '//js-sec.indexww.com/ht/p/' . self::$do_index_ex . '.js' ); ?>"></script>
		<?php
		// phpcs:enable
	}

	/**
	 * Add Index Exchange id to amp rtc-config parameter.
	 *
	 * @param array $rtc_config Current rtc_config value(s).
	 *
	 * @return array
	 */
	public function add_to_amp( $rtc_config ) {
		$rtc_config['vendors'] = array(
			'indexexchange' => array(
				'SITE_ID' => self::$do_index_ex,
			),
		);

		return $rtc_config;
	}
}
