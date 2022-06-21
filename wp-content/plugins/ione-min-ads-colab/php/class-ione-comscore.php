<?php

/**
 * Add comscore to pages and amp.
 */
class IOne_Comscore {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'ione-ads__show_settings', array( $this, 'settings' ) );
		add_action( 'wp_footer', array( $this, 'render' ) );
		add_filter( 'amp_post_template_analytics', array( $this, 'add_to_amp' ), 10, 2 );
	}

	/**
	 * Do settings output.
	 */
	public function settings() {
		?>
		<p>
			<label>
				<input type="checkbox" name="ione-advertising-disable-comscore" checked disabled=""> Comscore is enabled. Cannot be turned off.
			</label>
		</p>
		<?php
	}

	/**
	 * [render description]
	 */
	public function render() {
		if ( apply_filters( 'ione-ads__do_comscore', true ) ) {
			?>
			<!-- Begin comScore Tag -->
			<script>
				var _comscore = _comscore || [];
				_comscore.push({ c1: "2", c2: "6035391", cs_ucfr: '1' });
				(function() {
					var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
					s.src = "https://sb.scorecardresearch.com/cs/6035391/beacon.js";
					el.parentNode.insertBefore(s, el);
				})();
			</script>
			<noscript>
				<img src="https://sb.scorecardresearch.com/p?c1=2&c2=6035391&cv=3.6.0&cj=1">
			</noscript>
			<!-- End comScore Tag -->
			<?php
		}
	}

	/**
	 * Filter in amp analytics.
	 *
	 * @param array  $analytics Array of analytics.
	 * @param object $post Post object.
	 */
	public function add_to_amp( $analytics, $post ) {
		if ( ! is_array( $analytics ) ) {
			$analytics = array();
		}

		$analytics['comscore'] = array(
			'type'        => 'comscore',
			'attributes'  => array(),
			'config_data' => array(
				'vars'           => array(
					'c2' => '6035391',
				),
				'extraUrlParams' => array(
					'comscorekw' => 'amp',
				),
			),
		);

		return $analytics;
	}
}
