<?php
/**
 * Section Header Main Menu
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
    array(
        'id'       => 'header_main_menu',
        'title'    => esc_html__( 'Main Menu', 'education-pack' ),
        'panel'    => 'header',
        'priority' => 30,
    )
);

// Select All Fonts For Main Menu
thim_customizer()->add_field(
    array(
        'id'        => 'main_menu',
        'type'      => 'typography',
        'label'     => esc_html__( 'Fonts', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you to select all font font properties for header. ', 'education-pack' ),
        'section'   => 'header_main_menu',
        'priority'  => 10,
        'default'   => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '15px',
            'line-height'    => '30px',
            'color'          => '#333333',
            'text-transform' => 'uppercase',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-family',
                'element'  => 'header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >a,
                               header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >span',
                'property' => 'font-family',
            ),
            array(
                'choice'   => 'variant',
                'element'  => 'header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >a,
                               header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >span',
                'property' => 'font-weight',
            ),
            array(
                'choice'   => 'font-size',
                'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'line-height',
                'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
                'property' => 'line-height',
            ),
            array(
                'choice'   => 'color',
                'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span,
                               header#masthead.site-header .navigation .width-navigation .inner-navigation .navbar > .current-menu-item a',
                'property' => 'color',
            ),
            array(
                'choice'   => 'text-transform',
                'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
                'property' => 'text-transform',
            ),
        )
    )
);

// Enable or disable menu right
thim_customizer()->add_field(
    array(
        'id'       => 'menu_right_display',
        'type'     => 'switch',
        'label'    => esc_html__( 'Show Search', 'education-pack' ),
        'tooltip'  => esc_html__( 'Allows you to enable or disable Search form.', 'education-pack' ),
        'section'  => 'header_main_menu',
        'default'  => true,
        'priority' => 15,
        'choices'  => array(
            true  => esc_html__( 'On', 'education-pack' ),
            false => esc_html__( 'Off', 'education-pack' ),
        ),
    )
);

// Text Link Hover
thim_customizer()->add_field(
    array(
        'id'        => 'main_menu_hover_color',
        'type'      => 'color',
        'label'     => esc_html__( 'Text Color Hover', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you to select color for text link when hover text link . ', 'education-pack' ),
        'section'   => 'header_main_menu',
        'default'   => '#3498DB',
        'priority'  => 16,
        'alpha'     => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => 'header#masthead.site-header #primary-menu >li >a:hover,
                               header#masthead.site-header #primary-menu >li >span:hover',
                'property' => 'color',
            )
        )
    )
);