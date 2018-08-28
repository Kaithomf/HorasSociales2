<?php
/**
 * Panel Footer
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'footer',
		'priority' => 60,
		'title'    => esc_html__( 'Footer', 'education-pack' ),
	)
);
