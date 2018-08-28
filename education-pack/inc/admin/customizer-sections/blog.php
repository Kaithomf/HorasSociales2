<?php
/**
 * Panel Blog
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'blog',
        'priority' => 42,
        'title'    => esc_html__( 'Blog', 'education-pack' ),
    )
);