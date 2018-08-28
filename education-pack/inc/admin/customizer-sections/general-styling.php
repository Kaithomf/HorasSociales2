<?php
/**
 * Section Styling
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'general_styling',
		'panel'    => 'general',
		'title'    => esc_html__( 'Styling', 'education-pack' ),
		'priority' => 30,
	)
);

// Select Theme Primary Colors
thim_customizer()->add_field(
	array(
		'id'            => 'body_primary_color',
		'type'          => 'color',
		'label'         => esc_html__( 'Primary Color', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a primary color for your site.', 'education-pack' ),
		'section'       => 'general_styling',
		'priority'      => 10,
		'alpha'       => true,
		'default'     => '#3498DB',
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'hover',
				'element'  => '
                    body #sb_instagram .sbi_follow_btn a strong,
                    body .thim-primary-color, body .thim-color,
                    body .thim-sc-heading .heading-button a,
                    body .thim-sc-heading .heading-button a:hover,
                    body .thim-sc-posts.site-content .blog-content article .entry-meta a:hover
                    body #secondary ul li a:hover,
                    body .site-content .blog-content article .entry-title a:hover, 
                    body .site-content .page-content article .entry-title a:hover,
                    body .site-content .blog-content article .entry-title:before, 
                    body .site-content .page-content article .entry-title:before, 
                    body .site-content .blog-content article .entry-meta a:hover, 
                    body .site-content .page-content article .entry-meta a:hover,
                    body #comments .comment-list li .content-comment .author span .comment-edit-link,
                    body #comments .comment-list li .content-comment .author span .comment-reply-link,
                    body ul.product-grid li.product .wrapper .quick-view span, 
                    body ul.product-list li.product .wrapper .quick-view span
                    ',
				'property' => 'color',
			),
			array(
				'choice'   => 'background-color',
				'element'  => 'body .main-top .overlay-top-header,
                               body .mc4wp-form input[type=submit]:hover,
                               body #back-to-top,
                               body .thim-testimonial-slider:after,
                               body.woocommerce .product span.onsale',
				'property' => 'background-color',
			),
			array(
				'choice'   => 'border-color',
				'element'  => 'body .widget-area aside.widget.newsletter .newsletter-content form input[type="email"]:focus,
                               body .site-content .blog-content article .content-inner .entry-content .readmore a:before,
                               body .thim-search-box .form-search-wrapper .search-form .search-field',
				'property' => 'border-color',
			)
		),
	)
);

// Body Background Group
thim_customizer()->add_group( array(
	'id'       => 'general_background_group',
	'section'  => 'general_styling',
	'priority' => 20,
	'groups'   => array(
		array(
			'id'     => 'main_background_group',
			'label'  => esc_html__( 'Main Content Background', 'education-pack' ),
			'fields' => array(
				array(
					'type'     => 'radio-buttonset',
					'id'       => 'background_main_type',
					'label'    => esc_html__( 'Select Background Type', 'education-pack' ),
					'tooltip'  => esc_html__( 'Allows you to select a background for body tag content on your site', 'education-pack' ),
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
					'id'              => 'background_main_color',
					'label'           => esc_html__( 'Background Color', 'education-pack' ),
					'default'         => '#ffffff',
					'priority'        => 20,
					'alpha'           => true,
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body #main-content.bg-type-color',
							'function' => 'css',
							'property' => 'background-color',
						),
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'color',
						),
					),
				),
				array(
					'type'            => 'kirki-image',
					'id'              => 'background_main_image',
					'label'           => esc_html__( 'Background image', 'education-pack' ),
					'priority'        => 30,
					'transport'       => 'postMessage',
					'js_vars'         => array(
						array(
							'element'  => 'body #main-content.bg-type-image',
							'function' => 'css',
							'property' => 'background-image',
						),
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_main_image_repeat',
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
							'element'  => 'body #main-content.bg-type-image',
							'function' => 'css',
							'property' => 'background-repeat',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_main_image_position',
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
							'element'  => 'body #main-content.bg-type-image',
							'function' => 'css',
							'property' => 'background-position',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'select',
					'id'              => 'background_main_image_attachment',
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
							'element'  => 'body #main-content.bg-type-image',
							'function' => 'css',
							'property' => 'background-attachment',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'image',
						),
					),
				),
				array(
					'type'            => 'radio-image',
					'id'              => 'background_main_pattern_image',
					'label'           => esc_html__( 'Select a Background Pattern', 'education-pack' ),
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
							'element'  => 'body #main-content.bg-type-pattern',
							'function' => 'css',
							'property' => 'background-image',
						)
					),
					'active_callback' => array(
						array(
							'setting'  => 'background_main_type',
							'operator' => '===',
							'value'    => 'pattern',
						),
					),
				)
			),
		),
	)
) );