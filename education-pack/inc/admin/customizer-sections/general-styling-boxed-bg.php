<?php
/**
 * Section Background Boxed Mode
 *
 * @package Hair_Salon
 */

// Body Background Group
thim_customizer()->add_group( array(
	'id'       => 'general_boxed_background_group',
	'section'  => 'general_styling',
	'priority' => 50,
	'groups'   => array(
		array(
			'id'     => 'boxed_background_group',
			'label'  => esc_html__( 'Boxed Background', 'education-pack' ),
			'fields' => array(
				array(
					'type'     => 'radio-buttonset',
					'id'       => 'background_boxed_type',
					'label'    => esc_html__( 'Select Background Type', 'education-pack' ),
					'tooltip'  => esc_html__( 'Allows you to select a background for body content when you selected box layout in General Layouts', 'education-pack' ),
					'default'  => 'color',
					'priority' => 10,
					'choices'  => array(
						'color'   => esc_html__( 'Color', 'education-pack' ),
						'image'   => esc_html__( 'Image', 'education-pack' ),
						'pattern' => esc_html__( 'Pattern', 'education-pack' ),
					),
				),
				array(
					'type'            => 'color',
					'id'              => 'background_boxed_color',
					'label'           => esc_html__( 'Background Color', 'education-pack' ),
					'default'         => '#FFFFFF',
					'priority'        => 15,
					'alpha'           => true,
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-color',
							'function' => 'css',
							'property' => 'background-color',
						),
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'color',
						),
					),
				),
				array(
					'type'            => 'kirki-image',
					'id'              => 'background_boxed_image',
					'label'           => esc_html__( 'Background image', 'education-pack' ),
					'priority'        => 30,
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-image',
							'function' => 'css',
							'property' => 'background-image',
						),
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_boxed_image_repeat',
					'label'           => esc_html__( 'Background Repeat', 'education-pack' ),
					'default'         => 'no-repeat',
					'priority'        => 40,
					'choices'         => array(
						'repeat'    => esc_html__( 'Tile', 'education-pack' ),
						'repeat-x'  => esc_html__( 'Tile Horizontally', 'education-pack' ),
						'repeat-y'  => esc_html__( 'Tile Vertically', 'education-pack' ),
						'no-repeat' => esc_html__( 'No Repeat', 'education-pack' ),
					),
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-image',
							'function' => 'css',
							'property' => 'background-repeat',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_boxed_image_position',
					'label'           => esc_html__( 'Background Position', 'education-pack' ),
					'default'         => 'center',
					'priority'        => 50,
					'choices'         => array(
						'left'   => esc_html__( 'Left', 'education-pack' ),
						'center' => esc_html__( 'Center', 'education-pack' ),
						'right'  => esc_html__( 'Right', 'education-pack' ),
					),
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-image',
							'function' => 'css',
							'property' => 'background-position',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_boxed_image_attachment',
					'label'           => esc_html__( 'Background Attachment', 'education-pack' ),
					'default'         => 'fixed',
					'priority'        => 60,
					'choices'         => array(
						'scroll' => esc_html__( 'Scroll', 'education-pack' ),
						'fixed'  => esc_html__( 'Fixed', 'education-pack' ),
					),
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-image',
							'function' => 'css',
							'property' => 'background-attachment',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'radio-image',
					'id'              => 'background_boxed_pattern_image',
					'label'           => esc_html__( 'Select a Background Pattern', 'education-pack' ),
					'section'         => 'background',
					'default'         => EDUCATION_PACK_URL . 'assets/images/patterns/pattern1.png',
					'priority'        => 70,
					'choices'         => array(
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern1.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern1_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern2.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern2_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern3.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern3_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern4.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern4_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern5.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern5_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern6.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern6_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern7.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern7_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern8.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern8_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern9.png'  => EDUCATION_PACK_URL . 'assets/images/patterns/pattern9_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern10.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern10_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern11.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern11_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern12.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern12_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern13.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern13_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern14.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern14_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern15.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern15_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern16.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern16_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern17.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern17_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern18.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern18_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern19.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern19_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern20.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern20_icon.png',
						EDUCATION_PACK_URL . 'assets/images/patterns/pattern21.png' => EDUCATION_PACK_URL . 'assets/images/patterns/pattern21_icon.png',
					),
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body.bg-type-pattern',
							'function' => 'css',
							'property' => 'background-image',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_boxed_type',
							'operator' => '===',
							'value'    => 'pattern',
						),
					),
				),
				array(
					'id'          => 'enable_box_shadow',
					'type'        => 'switch',
					'label'       => esc_html__( 'Boxed Layouts Box Shadow', 'education-pack' ),
					'tooltip'     => esc_html__( 'Allows you to enable or disable box shadow at body tag when you selected boxed layout. ', 'education-pack' ),
					'default'     => true,
					'priority'    => 80,
					'choices'     => array(
						true  	  => esc_html__( 'On', 'education-pack' ),
						false	  => esc_html__( 'Off', 'education-pack' ),
					),
				)
			),
		),
	)
) );