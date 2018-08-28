<?php
/**
 * Thim - Starter Theme Theme Customizer.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_pack_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'blogname' );
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'display_header_text' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
}

add_action( 'customize_register', 'education_pack_customize_register' );


if ( education_pack_plugin_active( 'thim-core' ) ) {
	require_once EDUCATION_PACK_DIR . 'inc/admin/customizer-options.php';
}

/**
 * Compile Sass from theme customize.
 */
add_filter( 'thim_core_config_sass', 'education_pack_theme_options_sass' );
function education_pack_theme_options_sass() {
	$dir = EDUCATION_PACK_DIR . 'assets/sass/';

	return array(
		'dir'  => $dir,
		'name' => '_style-options.scss',
	);
}
