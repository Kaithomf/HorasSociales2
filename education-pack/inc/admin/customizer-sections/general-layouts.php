<?php
/**
 * Section Layout
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'content_layout',
		'panel'    => 'general',
		'title'    => esc_html__( 'Layouts', 'education-pack' ),
		'priority' => 20,
	)
);

//---------------------------------------------Site-Content---------------------------------------------//

// Select Theme Content Layout
thim_customizer()->add_field(
	array(
		'id'            => 'box_content_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Site Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all contents on your site.', 'education-pack' ),
		'section'       => 'content_layout',
		'priority'      => 10,
		'default'       => 'wide',
		'choices'       => array(
			'wide'      => EDUCATION_PACK_URL . 'assets/images/layout/content-full.jpg',
			'boxed'     => EDUCATION_PACK_URL . 'assets/images/layout/content-boxed.jpg',
		),
	)
);

//-------------------------------------------------Archive---------------------------------------------//

// Select Archive Layout
thim_customizer()->add_field(
	array(
		'id'            => 'archive_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Archive Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all archive pages on your site.', 'education-pack' ),
		'section'       => 'content_layout',
		'priority'      => 12,
		'choices'       => array(
			'sidebar-left'     => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-left.jpg',
			'no-sidebar'       => EDUCATION_PACK_URL . 'assets/images/layout/body-full.jpg',
			'sidebar-right'    => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-right.jpg',
			'full-sidebar'     => EDUCATION_PACK_URL . 'assets/images/layout/body-left-right.jpg'
		),
	)
);

// Select Sidebar To Display In Sidebar Left For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'archive_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Archive Layout ', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on archive layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 13,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'archive_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Archive Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on archive layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 14,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

//-------------------------------------------------Single-------------------------------------------//

// Select Single Layout
thim_customizer()->add_field(
	array(
		'id'            => 'single_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Single Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for single pages on your site.', 'education-pack' ),
		'section'       => 'content_layout',
		'priority'      => 20,
		'choices'       => array(
			'sidebar-left'     => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-left.jpg',
			'no-sidebar'       => EDUCATION_PACK_URL . 'assets/images/layout/body-full.jpg',
			'sidebar-right'    => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-right.jpg',
			'full-sidebar'     => EDUCATION_PACK_URL . 'assets/images/layout/body-left-right.jpg'
		),
	)
);

// Select Sidebar To Display In Sidebar Left For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'single_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Post Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on single layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 21,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'single_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Post Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on single layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 22,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

//------------------------------------------------Page---------------------------------------------//

// Select All Page Layout
thim_customizer()->add_field(
	array(
		'id'            => 'page_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Page Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all pages on your site.', 'education-pack' ),
		'section'       => 'content_layout',
		'priority'      => 66,
		'choices'       => array(
			'sidebar-left'     => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-left.jpg',
			'no-sidebar'       => EDUCATION_PACK_URL . 'assets/images/layout/body-full.jpg',
			'sidebar-right'    => EDUCATION_PACK_URL . 'assets/images/layout/sidebar-right.jpg',
			'full-sidebar'     => EDUCATION_PACK_URL . 'assets/images/layout/body-left-right.jpg'
		),
	)
);

// Select Sidebar To Display In Sidebar Left For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'page_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Page Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on page layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 67,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'page_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'page_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Page Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on page layouts.', 'education-pack' ),
		'section'     => 'content_layout',
		'priority'    => 68,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'page_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);



