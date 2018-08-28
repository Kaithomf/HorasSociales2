<?php
/**
 * Section Header Layout
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
	array(
		'id'             => 'header_layout',
		'title'          => esc_html__( 'Layouts', 'education-pack' ),
		'panel'			 => 'header',
		'priority'       => 20,
	)
);

// Select Header Position
thim_customizer()->add_field(
	array(
		'id'          => 'header_position',
		'type'        => 'select',
		'label'       => esc_html__( 'Header Positions', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can select position layout for header layout. ', 'education-pack' ),
		'section'     => 'header_layout',
		'priority'    => 20,
		'multiple'    => 0,
		'default'     => 'default',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'education-pack' ),
			'overlay' => esc_html__( 'Overlay', 'education-pack' ),
		),
	)
);

// Enable or disable header right
thim_customizer()->add_field(
	array(
		'id'       => 'header_sidebar_right_display',
		'type'     => 'switch',
		'label'    => esc_html__( 'Show Header Right', 'education-pack' ),
		'tooltip'  => esc_html__( 'Allows you to enable or disable Header right.', 'education-pack' ),
		'section'  => 'header_layout',
		'default'  => true,
		'priority' => 25,
		'choices'  => array(
			true  => esc_html__( 'On', 'education-pack' ),
			false => esc_html__( 'Off', 'education-pack' ),
		),
	)
);


// Background Header
thim_customizer()->add_field(
	array(
		'id'          => 'header_background_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can choose background color for your header. ', 'education-pack' ),
		'section'     => 'header_layout',
		'default'     => '#ffffff',
		'priority'    => 30,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body #masthead.site-header',
				'property' => 'background-color',
			)
		)
	)
);