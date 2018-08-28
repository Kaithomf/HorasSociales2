<?php
/**
 * Field Logo and Sticky Logo
 *
 */

// Header Logo
thim_customizer()->add_field(
	array(
		'id'       		=> 'header_logo',
		'type'          => 'image',
		'section'  		=> 'title_tagline',
		'label'    		=> esc_html__( 'Logo', 'education-pack' ),
		'tooltip'     	=> esc_html__( 'Allows you to add, remove, change logo on your site. ', 'education-pack' ),
		'priority' 		=> 10,
		'default'       => EDUCATION_PACK_URL . "assets/images/logo.png",
	)
);

// Header Sticky Logo
thim_customizer()->add_field(
	array(
		'id'       		=> 'header_sticky_logo',
		'type'          => 'image',
		'section'  		=> 'title_tagline',
		'label'    		=> esc_html__( 'Sticky Logo', 'education-pack' ),
		'tooltip'     	=> esc_html__( 'Allows you to add, remove, change sticky logo on your site. ', 'education-pack' ),
		'priority' 		=> 20,
		'default'       => EDUCATION_PACK_URL . "assets/images/sticky-logo.png",
	)
);

// Header Retina Logo
thim_customizer()->add_field(
	array(
		'id'       		=> 'header_retina_logo',
		'type'          => 'image',
		'section'  		=> 'title_tagline',
		'label'    		=> esc_html__( 'Retina Logo', 'education-pack' ),
		'tooltip'     	=> esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of the logo.', 'education-pack' ),
		'priority' 		=> 30,
	)
);

// Logo width
thim_customizer()->add_field(
	array(
		'id'          => 'width_logo',
		'type'        => 'dimension',
		'label'       => esc_html__( 'Logo width', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to assign a value for logo width. Example: 10px, 3em, 48%, 90vh etc.', 'education-pack' ),
		'section'     => 'title_tagline',
		'default'     => '211px',
		'priority'    => 40,
		'choices'     => array(
			'min'  => 100,
			'max'  => 500,
			'step' => 10,
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'width',
				'element'  => 'header#masthead .width-logo',
				'property' => 'width',
			)
		)
	)
);