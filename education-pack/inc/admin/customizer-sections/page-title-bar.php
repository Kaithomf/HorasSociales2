<?php
/**
 * Section Page Title Bar
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'page_title_bar',
        'title'    => esc_html__( 'Page Title', 'education-pack' ),
        'priority' => 30,
    )
);
