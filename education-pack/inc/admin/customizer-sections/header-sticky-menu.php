<?php
/**
 * Section Header Sticky Menu
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
	array(
		'id'             => 'header_sticky_menu',
		'title'          => esc_html__( 'Sticky Menu', 'education-pack' ),
		'panel'			 => 'header',
		'priority'       => 55,
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'          => 'show_sticky_menu',
		'type'        => 'switch',
		'label'       => esc_html__( 'Sticky On Scroll', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can show or hide sticky header menu on your site . ', 'education-pack' ),
		'section'     => 'header_sticky_menu',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'education-pack' ),
			false	  => esc_html__( 'Off', 'education-pack' ),
		),
	)
);

// Select Style
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_style',
		'type'        => 'select',
		'label'       => esc_html__( 'Select style', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can select sticky menu style for your header . ', 'education-pack' ),
		'section'     => 'header_sticky_menu',
		'default'     => 'same',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => array(
			'same' 	  => esc_html__( 'The same with main menu', 'education-pack' ),
			'custom'  => esc_html__( 'Custom', 'education-pack' )
		),
	)
);

// Background Header
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_background_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make background color for header sticky menu . ', 'education-pack' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#ffffff',
		'priority'    => 16,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.custom-sticky.affix',
				'property' => 'background-color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Color', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make text color on header sticky menu . ', 'education-pack' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#333333',
		'priority'    => 18,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a,
                               header#masthead.site-header.affix.custom-sticky #primary-menu >li >span',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Hover Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color_hover',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Hover Color', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you can select color for text link when hover text link on header sticky menu. ', 'education-pack' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#3498DB',
		'priority'    => 19,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a:hover,
                               body header#masthead.site-header.affix.custom-sticky #primary-menu >li >span:hover',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);