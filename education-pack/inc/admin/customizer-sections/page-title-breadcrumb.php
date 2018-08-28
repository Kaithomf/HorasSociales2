<?php
/**
 * Section Breadcrumb
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_section(
    array(
        'id'       => 'breadcrumb',
        'panel'    => 'page_title_bar',
        'title'    => esc_html__( 'Breadcrumbs', 'education-pack' ),
        'priority' => 20,
    )
);

// Enable or Disable Breadcrumb
thim_customizer()->add_field(
    array(
        'id'          => 'disable_breadcrumb',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hide Breadcrumb', 'education-pack' ),
        'tooltip'     => esc_html__( 'Allows you can HIDE breadcrumb on page title bar. ', 'education-pack' ),
        'section'     => 'breadcrumb',
        'default'     => false,
        'priority'    => 10,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'education-pack' ),
            false	  => esc_html__( 'Off', 'education-pack' ),
        ),
    )
);

// Enter Icon To Show In Breadcrumb
$link_icon = 'http://fontawesome.io/icons/';

thim_customizer()->add_field(
    array(
        'id'          => 'breadcrumb_icon',
        'type'        => 'text',
        'label'       => esc_html__( 'Breadcrumb Icon', 'education-pack' ),
        'description' => sprintf('Enter any one character from the keyboard or <a href="' . esc_url($link_icon) . '" target="_blank" >FontAwesome</a> icon name. For example: 	&lt;i class="fa fa-angle-right"&gt; &lt;&#47i&gt; ,...','education-pack'),
        'section'     => 'breadcrumb',
        'default'     => '-',
        'priority'    => 20,
    )
);

thim_customizer()->add_field(
    array(
        'id'        => 'font_breadcrumb',
        'type'      => 'typography',
        'label'     => esc_html__( 'Breadcrumb Fonts', 'education-pack' ),
        'tooltip'   => esc_html__( 'Allows you can select fonts property for breadcrumb. ', 'education-pack' ),
        'section'   => 'breadcrumb',
        'priority'    => 30,
        'default'   => array(
            'font-size'      => '16px',
            'color'          => '#ffffff',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '.breadcrumb-content #breadcrumbs li a,
                               .breadcrumb-content #breadcrumbs li span,
                               .breadcrumb-content #breadcrumbs li i',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '.breadcrumb-content #breadcrumbs li a,
                               .breadcrumb-content #breadcrumbs li span,
                               .breadcrumb-content #breadcrumbs li i',
                'property' => 'color',
            ),
        )
    )
);
