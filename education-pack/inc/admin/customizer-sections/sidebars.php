<?php
/**
 * Section Sidebars
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
    array(
        'id'       => 'sidebar',
        'title'    => esc_html__( 'Sidebars', 'education-pack' ),
        'priority' => 50,
    )
);

// Sidebar Fonts
thim_customizer()->add_field(
    array(
        'id'        => 'sidebar_widget_title',
        'type'      => 'typography',
        'label'     => esc_html__( 'Sidebar Title Fonts', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you can select fonts property for sidebars title. ', 'education-pack' ),
        'section'   => 'sidebar',
        'priority'    => 20,
        'default'   => array(
            'font-size'      => '24px',
            'color'          => '#333333',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '#main-content .widget-area .widget .widget-title',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '#main-content .widget-area .widget .widget-title',
                'property' => 'color',
            ),
        )
    )
);

// Choose Margin Bottom
thim_customizer()->add_field(
    array(
        'id'          => 'sidebar_widget_margin_bottom',
        'type'        => 'dimension',
        'label'       => esc_html__( 'Widget Margin Bottom', 'education-pack' ),
        'tooltip'     => esc_html__( 'Choose the number of words you want to space between widgets on sidebars. Example: 10px, 3em, 48%, 90vh etc.', 'education-pack' ),
        'section'     => 'sidebar',
        'default'     => '50px',
        'priority'    => 50,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '#main-content .widget-area aside.widget',
                'property' => 'margin-bottom',
            )
        )
    )
);

