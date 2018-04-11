<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OneK99ify_Customizer {

	public function __construct() {

		add_action( 'customize_register', array( $this, 'register' ) );

		add_action( 'wp_head', array( $this, 'output_dynamic_css' ) );

	}

	public function output_dynamic_css() {

		$trail_shape = onek99ify_option( 'mouse_trail_shape', 'square' );
		$trail_size = onek99ify_option( 'mouse_trail_size', 15 );
		$trail_color = onek99ify_option( 'mouse_trail_color', '#000000' );
		$fade = 1;
		?>
		<style type="text/css">

			.onek99-dot {
				background: <?php echo $trail_color; ?>;
				height: <?php echo absint( $trail_size ); ?>px;
				position: absolute;
				pointer-events: none;
				width: <?php echo absint( $trail_size ); ?>px;
			}

			body.onek99-trail-type--circle .onek99-dot {
				border-radius: 50%
			}

			body.onek99-trail-type--star .onek99-dot {
				background: none;
				display: block;
				border-bottom: <?php echo absint( $trail_size ) * 0.75; ?>px solid <?php echo $trail_color; ?>;
				border-left: <?php echo absint( $trail_size ); ?>px solid transparent;
				border-right: <?php echo absint( $trail_size ); ?>px solid transparent;
				height: 0px;
				-webkit-transform: rotate( 37deg );
				   -moz-transform: rotate( 37deg );
				    -ms-transform: rotate( 37deg );
				     -o-transform: rotate( 37deg );
				        transform: rotate( 37deg );
				width: 0px;
			}
			body.onek99-trail-type--star .onek99-dot:before {
				border-bottom: <?php echo absint( $trail_size ) * 0.7; ?>px solid <?php echo $trail_color; ?>;
				border-left: <?php echo absint( $trail_size ) * 0.234; ?>px solid transparent;
				border-right: <?php echo absint( $trail_size ) * 0.234; ?>px solid transparent;
				content: '';
				display: block;
				left: -<?php echo absint( $trail_size ) * 0.6; ?>px;
				position: absolute;
				top: -<?php echo absint( $trail_size ) * 0.467; ?>px;
				-webkit-transform: rotate( 323deg );
				   -moz-transform: rotate( 323deg );
				    -ms-transform: rotate( 323deg );
				     -o-transform: rotate( 323deg );
				        transform: rotate( 323deg );
			}
			body.onek99-trail-type--star .onek99-dot:after {
				border-bottom: <?php echo absint( $trail_size ) * 0.75; ?>px solid <?php echo $trail_color; ?>;
				border-left: <?php echo absint( $trail_size ); ?>px solid transparent;
				border-right: <?php echo absint( $trail_size ); ?>px solid transparent;
				content: '';
				display: block;
				left: -<?php echo absint( $trail_size ); ?>px;
				top: 0;
				position: absolute;
				-webkit-transform: rotate( 286deg );
				   -moz-transform: rotate( 286deg );
				    -ms-transform: rotate( 286deg );
				     -o-transform: rotate( 286deg );
				        transform: rotate( 286deg );
			}

			<?php while( $fade <= 12 ) :
				$prop = ( 12 - ( $fade - 0.5 ) ) / 12;
				$transform = ( 'star' === $trail_shape ) ? 'scale( ' . $prop . ' ) rotate( 323deg ) !important' : 'scale( ' . $prop . ' )';
				$fade++;
				?>
				.onek99-dot.dot--<?php echo $fade; ?> {
					opacity: <?php echo $prop; ?>;
					transform: <?php echo $transform; ?>
				}
			<?php endwhile; ?>
		</style>
		<?php
	}

	public function register( $wp_customize ) {

		// section
		$wp_customize->add_section( 'onek99ify_settings' , array(
			'title' => __( 'One Thousand Nine Hundred and Ninety-Nineify', 'onekninetynineify' ),
			'priority'   => 900,
		) );

		// settings
		$wp_customize->add_setting( 'onek99ify_mod[mouse_trail_status]' , array(
			'default' => false,
			'type' => 'option',
		) );

		$wp_customize->add_setting( 'onek99ify_mod[mouse_trail_shape]' , array(
			'default' => 'star',
			'type' => 'option',
		) );

		$wp_customize->add_setting( 'onek99ify_mod[mouse_trail_size]' , array(
			'default' => 15,
			'type' => 'option',
		) );

		$wp_customize->add_setting( 'onek99ify_mod[mouse_trail_color]' , array(
			'default' => '#000000',
			'type' => 'option',
		) );

		// controls
		$wp_customize->add_control( 'onek99ify_ctrl_mouse_trail_status', array(
			'description' => __( 'Never let a visitor lose track of their cursor again!', 'onekninetynineify' ),
			'label' => __( 'Enable Mouse Trails', 'onekninetynineify' ),
			'section' => 'onek99ify_settings',
			'settings' => 'onek99ify_mod[mouse_trail_status]',
			'type' => 'checkbox',
		) );

		$wp_customize->add_control( 'onek99ify_ctrl_mouse_trail_shape', array(
			// 'description' => __( 'Never let a visitor lose track of their cursor again!', 'onekninetynineify' ),
			'choices' => array(
				'star' => __( 'Star', 'onekninetynineify' ),
				'square' => __( 'Square', 'onekninetynineify' ),
				'circle' => __( 'Circle', 'onekninetynineify' ),
			),
			'label' => __( 'Mouse Trail Shape', 'onekninetynineify' ),
			'section' => 'onek99ify_settings',
			'settings' => 'onek99ify_mod[mouse_trail_shape]',
			'type' => 'radio',
			'active_callback' => function() {
				return ( onek99ify_option( 'mouse_trail_status', false ) );
			}
		) );

		$wp_customize->add_control( 'onek99ify_ctrl_mouse_trail_size', array(
			// 'description' => __( 'Never let a visitor lose track of their cursor again!', 'onekninetynineify' ),
			'label' => __( 'Mouse Trail Size (in pixels)', 'onekninetynineify' ),
			'section' => 'onek99ify_settings',
			'settings' => 'onek99ify_mod[mouse_trail_size]',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
			),
			'active_callback' => function() {
				return ( onek99ify_option( 'mouse_trail_status', false ) );
			}
		) );


		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'onek99ify_ctrl_mouse_trail_color',
			array(
				// 'description' => __( 'Never let a visitor lose track of their cursor again!', 'onekninetynineify' ),
				'label' => __( 'Mouse Trail Color', 'onekninetynineify' ),
				'section' => 'onek99ify_settings',
				'settings' => 'onek99ify_mod[mouse_trail_color]',
				'active_callback' => function() {
					return ( onek99ify_option( 'mouse_trail_status', false ) );
				}
			)
		) );



	}

}

return new OneK99ify_Customizer();
