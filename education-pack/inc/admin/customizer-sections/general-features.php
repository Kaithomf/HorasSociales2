<?php
/**
 * Section Advance features
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
	array(
		'id'       => 'advanced',
		'panel'    => 'general',
		'priority' => 90,
		'title'    => esc_html__( 'Extra Features', 'education-pack' ),
	)
);

// Feature: RTL
thim_customizer()->add_field( 
	array(
		'type'     => 'switch',
		'id'       => 'feature_rtl_support',
		'label'    => esc_html__( 'RTL Support', 'education-pack' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 10,
		'choices'  => array(
			true  => esc_html__( 'On', 'education-pack' ),
			false => esc_html__( 'Off', 'education-pack' ),
		),
	) 
);

// Feature: Smoothscroll
thim_customizer()->add_field( 
	array(
		'type'     => 'switch',
		'id'       => 'feature_smoothscroll',
		'label'    => esc_html__( 'Smooth Scrolling', 'education-pack' ),
		'tooltip'  => esc_html__( 'Turn on to enable smooth scrolling.', 'education-pack' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 20,
		'choices'  => array(
			true  => esc_html__( 'On', 'education-pack' ),
			false => esc_html__( 'Off', 'education-pack' ),
		),
	) 
);

// Feature: Back To Top
thim_customizer()->add_field( 
	array(
		'type'     => 'switch',
		'id'       => 'feature_backtotop',
		'label'    => esc_html__( 'Back To Top', 'education-pack' ),
		'tooltip'  => esc_html__( 'Turn on to enable the Back To Top script which adds the scrolling to top functionality.', 'education-pack' ),
		'section'  => 'advanced',
		'default'  => true,
		'priority' => 40,
		'choices'  => array(
			true  => esc_html__( 'On', 'education-pack' ),
			false => esc_html__( 'Off', 'education-pack' ),
		),
	) 
);

// Feature: Preload
thim_customizer()->add_field( array(
	'type'     => 'radio-image',
	'id'       => 'theme_feature_preloading',
	'section'  => 'advanced',
	'label'    => esc_html__( 'Preloading', 'education-pack' ),
	'default'  => 'off',
	'priority' => 70,
	'choices'  => array(
		'off'             => EDUCATION_PACK_URL . 'assets/images/preloading/off.jpg',
		'chasing-dots'    => EDUCATION_PACK_URL . 'assets/images/preloading/chasing-dots.gif',
		'circle'          => EDUCATION_PACK_URL . 'assets/images/preloading/circle.gif',
		'cube-grid'       => EDUCATION_PACK_URL . 'assets/images/preloading/cube-grid.gif',
		'double-bounce'   => EDUCATION_PACK_URL . 'assets/images/preloading/double-bounce.gif',
		'fading-circle'   => EDUCATION_PACK_URL . 'assets/images/preloading/fading-circle.gif',
		'folding-cube'    => EDUCATION_PACK_URL . 'assets/images/preloading/folding-cube.gif',
		'rotating-plane'  => EDUCATION_PACK_URL . 'assets/images/preloading/rotating-plane.gif',
		'spinner-pulse'   => EDUCATION_PACK_URL . 'assets/images/preloading/spinner-pulse.gif',
		'three-bounce'    => EDUCATION_PACK_URL . 'assets/images/preloading/three-bounce.gif',
		'wandering-cubes' => EDUCATION_PACK_URL . 'assets/images/preloading/wandering-cubes.gif',
		'wave'            => EDUCATION_PACK_URL . 'assets/images/preloading/wave.gif',
		'custom-image'    => EDUCATION_PACK_URL . 'assets/images/preloading/custom-image.jpg',
	),
) );

// Feature: Preload Image Upload
thim_customizer()->add_field( array(
	'type'            => 'kirki-image',
	'id'              => 'theme_feature_preloading_custom_image',
	'label'           => esc_html__( 'Preloading Custom Image', 'education-pack' ),
	'section'         => 'advanced',
	'priority'        => 80,
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '===',
			'value'    => 'custom-image',
		),
	),
) );

// Feature: Preload Colors
thim_customizer()->add_field( array(
	'type'      => 'multicolor',
	'id'        => 'theme_feature_preloading_style',
	'label'     => esc_html__( 'Preloading Color', 'education-pack' ),
	'section'   => 'advanced',
	'priority'  => 90,
	'choices'   => array(
		'background' => esc_html__( 'Background color', 'education-pack' ),
		'color'      => esc_html__( 'Icon color', 'education-pack' ),
	),
	'default'   => array(
		'background' => '#ffffff',
		'color'      => '#333333',
	),
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '!=',
			'value'    => 'off',
		),
	),
) );