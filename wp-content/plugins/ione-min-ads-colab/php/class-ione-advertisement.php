<?php


class Ione_Advertisement extends WP_Widget {

	var $ad_config;

	function __construct() {
		parent::__construct(
			false,
			'IOne Advertisement Widget',
			array(
				'description' => 'Allows an administrator to position ads of varying sizes on the sidebar.',
			)
		);

		$this->ad_config = IOne_Ad_Configurator::$ad_config;
	}

	function widget( $args, $instance ) {

		if ( empty( $instance['ad_type'] ) ) {
			return false;
		}

		echo wp_kses_post( $args['before_widget'] );
		$ad = new IOne_Ad( $instance['ad_type'] );
		$ad->render();
		echo wp_kses_post( $args['after_widget'] );
	}

	function form( $instance ) {
		if ( ! isset( $instance['ad_type'] ) ) {
			$instance['ad_type'] = '';
		}

		$available_pos_values = array();

		if ( $this->ad_config && ! empty( $this->ad_config['adConfig'] ) ) {
			foreach ( $this->ad_config['adConfig'] as $ad ) {
				$available_pos_values[] = $ad['targeting']['pos'];
			}
		}
		?>
		<p>
			<label>Select Advertisement Position</label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'ad_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'ad_name' ) ); ?>">
				<option value="" <?php selected( '', $instance['ad_type'] ); ?> >
					--- Select One ---
				</option>
				<?php
				foreach ( $available_pos_values as $pos ) {
					?>
					<option value="<?php echo esc_attr( $pos ); ?>" <?php selected( $pos, $instance['ad_type'] ); ?> >
						<?php echo esc_html( $pos ); ?>
					</option>
					<?php
				}
				?>

			</select>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$available_pos_values = array();

		if ( $this->ad_config && ! empty( $this->ad_config['adConfig'] ) ) {
			foreach ( $this->ad_config['adConfig'] as $ad ) {
				$available_pos_values[] = $ad['targeting']['pos'];
			}
		}

		if ( in_array( $new_instance['ad_type'], $available_pos_values, true ) ) {
			return $new_instance;
		}

		return $old_instance;
	}
}
