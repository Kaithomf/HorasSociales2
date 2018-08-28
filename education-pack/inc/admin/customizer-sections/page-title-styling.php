<?php
/**
 * Section Page Title
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
    array(
        'id'       => 'page_title_styling',
        'panel'    => 'page_title_bar',
        'title'    => esc_html__( 'Title', 'education-pack' ),
        'priority' => 12,
    )
);

// Upload Background Image
thim_customizer()->add_field(
    array(
        'id'              => 'page_title_background_image',
        'type'            => 'image',
        'label'           => esc_html__( 'Background Image', 'education-pack' ),
        'tooltip'         => esc_html__( 'You can upload image make to background image for page title on heading top. ', 'education-pack' ),
        'section'         => 'page_title_styling',
        'priority'        => 30,
        'js_vars'         => array(
            array(
                'element'  => '.main-top',
                'function' => 'css',
                'property' => 'background-image',
            ),
        ),
    )
);

// Page Title Background Color
thim_customizer()->add_field(
    array(
        'id'          => 'page_title_background_color',
        'type'        => 'color',
        'label'       => esc_html__( 'Background Color', 'education-pack' ),
        'tooltip'     => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'education-pack' ),
        'section'     => 'page_title_styling',
        'default'     => '#222222',
        'priority'    => 35,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top .overlay-top-header',
                'property' => 'background',
            )
        )
    )
);

// Page Title Background Color opacity
thim_customizer()->add_field(
    array(
        'id'          => 'page_title_background_opacity',
        'type'        => 'text',
        'label'       => esc_html__( 'Background Color Opacity', 'education-pack' ),
        'section'     => 'page_title_styling',
        'default'     => '0.6',
        'priority'    => 35,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'text',
                'element'  => '.page-title .main-top .overlay-top-header',
                'property' => 'opacity',
            )
        )
    )
);

// Height Page Title
thim_customizer()->add_field(
    array(
        'id'          => 'page_title_height',
        'type'        => 'dimension',
        'label'       => esc_html__( 'Height', 'education-pack' ),
        'tooltip'     => esc_html__( 'You can choose numbers to height for page title. Example: 100px, 30em, 48%, 90vh etc.', 'education-pack' ),
        'section'     => 'page_title_styling',
        'default'     => '300px',
        'priority'    => 40,
        'choices'     => array(
            'min'  => 100,
            'max'  => 500,
            'step' => 10,
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'height',
                'element'  => '.page-title .main-top',
                'property' => 'height',
            )
        )
    )
);

// Padding Top
thim_customizer()->add_field(
    array(
        'id'          => 'page_title_padding_top',
        'type'        => 'dimension',
        'label'       => esc_html__( 'Padding Top', 'education-pack' ),
        'tooltip'     => esc_html__( 'You can choose padding top from page title to menu in header overlay layout. Example: 10px, 3em, 48%, 90vh etc.', 'education-pack' ),
        'section'     => 'page_title_styling',
        'default'     => '0',
        'priority'    => 45,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'padding-top',
                'element'  => '.page-title .main-top .content',
                'property' => 'padding-top',
            ),
        )
    )
);

// Align Page Title
thim_customizer()->add_field(
    array(
        'id'        => 'font_page_title',
        'type'      => 'typography',
        'label'     => esc_html__( 'Title Styling', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you can select fonts property for page title. ', 'education-pack' ),
        'section'   => 'page_title_styling',
        'priority'    => 50,
        'default'   => array(
            'font-size'      => '36px',
            'color'          => '#ffffff',
            'text-align'     => 'left',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
                'property' => 'color',
            ),
            array(
                'choice'   => 'text-align',
                'element'  => '.page-title .main-top .content',
                'property' => 'text-align',
            ),
        )
    )
);

// Align Page Description
thim_customizer()->add_field(
    array(
        'id'        => 'font_page_title_description',
        'type'      => 'typography',
        'label'     => esc_html__( ' Description Styling', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you can select fonts property for page title description. ', 'education-pack' ),
        'section'   => 'page_title_styling',
        'priority'    => 60,
        'default'   => array(
            'font-size'      => '20px',
            'color'          => '#ffffff',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '.page-title .main-top .content .banner-description',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top .content .banner-description',
                'property' => 'color',
            ),
        )
    )
);


