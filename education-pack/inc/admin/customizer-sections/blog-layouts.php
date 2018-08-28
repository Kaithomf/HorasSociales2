<?php
/**
 * Section Blog Layouts
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'             => 'blog_layout',
		'panel'			 => 'blog',
		'title'          => esc_html__( 'Layouts', 'education-pack' ),
		'priority'       => 10,
	)
);

//-------------------------------------------------Archive---------------------------------------------//

// Select Blog Archive Layout
thim_customizer()->add_field(
	array(
		'id'            => 'blog_archive_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Blog Archive Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all blog archive, blog category page on your site.', 'education-pack' ),
		'section'       => 'blog_layout',
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
		'id'          => 'blog_archive_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Blog Archive Layout ', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on Blog archive layout.', 'education-pack' ),
		'section'     => 'blog_layout',
		'priority'    => 13,
		'multiple'    => 1,
		'default'     => 'sidebar',
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'blog_archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'blog_archive_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Blog Archive Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on Archive layout.', 'education-pack' ),
		'section'     => 'blog_layout',
		'priority'    => 14,
		'multiple'    => 1,
		'default'     => 'sidebar',
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'blog_archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

//-------------------------------------------------Single---------------------------------------------//

// Select Single Layout
thim_customizer()->add_field(
	array(
		'id'            => 'blog_single_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Blog Single Layouts', 'education-pack' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for only blog single page on your site.', 'education-pack' ),
		'section'       => 'blog_layout',
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
		'id'          => 'blog_single_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Post Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on Post layout.', 'education-pack' ),
		'section'     => 'blog_layout',
		'priority'    => 21,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'blog_single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'blog_single_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Post Layout', 'education-pack' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on Post layout.', 'education-pack' ),
		'section'     => 'blog_layout',
		'priority'    => 22,
		'multiple'    => 1,
		'choices'     => education_pack_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'blog_single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);