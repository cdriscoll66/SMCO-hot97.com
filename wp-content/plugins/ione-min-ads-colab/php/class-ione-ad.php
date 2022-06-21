<?php

class IOne_Ad {
	private $pos_value;
	private $desktop_ad_unit;
	private $mobile_ad_unit;
	private $amp_ad_unit;
	private $global_targeting;
	private $settings;

	public function __construct( $pos ) {
		$config = IOne_Ad_Configurator::get_ads_config();

		$this->pos_value = $pos;
		$this->desktop_ad_unit = $config['baseDesktopAdUnit'];
		$this->mobile_ad_unit = $config['baseMobileAdUnit'];
		$this->global_targeting = $config['targeting'];
		
		if ( ! empty( $config['baseAmpAdUnit'] ) ) {
			$this->amp_ad_unit = $config['baseAmpAdUnit'];
		} else {
			$this->amp_ad_unit = $this->mobile_ad_unit;
		}

		foreach ( $config['adConfig'] as $adSettings ) {
			if ( $adSettings['targeting']['pos'] === $pos ) {
				$this->settings = $adSettings;
				break;
			}
		}
	}

	public function get_html() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && ! empty( $this->amp_ad_unit ) ) {
			if ( isset( $this->settings['sizes']['amp'] ) ) {
				$sizes = $this->settings['sizes']['amp'];
			} else {
				$sizes = $this->settings['sizes']['mobile'];
			}

			$initial_width = $sizes[0][0];
			$initial_height = $sizes[0][1];

			$ad_targeting = $this->settings['targeting'];
			
			$default_targeting = IOne_Ad_Configurator::get_targeting_globals();

			$ad_json = apply_filters(
				'ione-ads__amp_json',
				array(
					'targeting' => array_merge( $ad_targeting, $default_targeting ),
				),
				$this
			);

			$multisizes = array();
			

			foreach ( $sizes as $size ) {
				$multisizes[] = $size[0] . 'x' . $size[1];
			}

			ob_start();
			?>
			<amp-ad width="<?php echo esc_attr( $initial_width ); ?>" height="<?php echo esc_attr( $initial_height ); ?>"
				type="doubleclick"
				data-slot="<?php echo esc_attr( $this->amp_ad_unit ); ?>"
				<?php
				if ( count( $multisizes ) > 1 ) {
					echo 'data-multi-size="' . esc_attr( implode( ',', $multisizes ) ) . '" ';
					echo 'data-multi-size-validation="false" ';
				}
				?>
				json='<?php echo wp_json_encode( (object) $ad_json ); ?>'
				<?php
				$ad_rtc_config = apply_filters( 'ione-ads__amp_rtc_config', array() );

				if ( ! empty( $ad_rtc_config ) ) {
					echo "rtc-config='" . wp_json_encode( (object) $ad_rtc_config ) . "'";
				}
				?>
			>
			</amp-ad>
			<?php
			$ad = ob_get_contents();
			ob_end_clean();

		} else {
			$ad = '<div class="ione-ad" data-pos="' . esc_attr( $this->pos_value ) . '"></div>';
		}

		return $ad;
	}

	public function render() {
		echo $this->get_html();
	}
}
