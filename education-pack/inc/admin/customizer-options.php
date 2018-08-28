<?php
/**
 * Create education_pack_Startertheme_Customize
 *
 */

/**
 * Class education_pack_Customize_Options
 */
class education_pack_Customize_Options {
	/**
	 * education_pack_Customize_Options constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', [ $this, 'education_pack_deregister' ] );
		add_action( 'thim_customizer_register', [ $this, 'education_pack_create_customize_options' ] );
	}

	/**
	 * Deregister customize default unnecessary
	 *
	 * @param $wp_customize
	 */
	public function education_pack_deregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'header_image' );
		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_control( 'blogname' );
		$wp_customize->remove_control( 'display_header_text' );
		$wp_customize->remove_section( 'static_front_page' );
		// Rename existing section
		$wp_customize->add_section( 'title_tagline', array(
			'title'    => esc_html__( 'Logo', 'education-pack' ),
			'panel'    => 'general',
			'priority' => 20,
		) );
	}

	/**
	 * Create customize
	 *
	 * @param $wp_customize
	 */
	public function education_pack_create_customize_options( $wp_customize ) {

		// include sections
		$customize_path = EDUCATION_PACK_DIR . 'inc/admin/customizer-sections/';

		require_once $customize_path . 'blog.php';
		require_once $customize_path . 'blog-general.php';
		require_once $customize_path . 'blog-layouts.php';
		require_once $customize_path . 'blog-meta.php';
		require_once $customize_path . 'blog-sharing.php';
		require_once $customize_path . 'footer.php';
		require_once $customize_path . 'footer-options.php';
		require_once $customize_path . 'footer-copyright.php';
		require_once $customize_path . 'general.php';
		require_once $customize_path . 'general-custom-css.php';
		require_once $customize_path . 'general-features.php';
		require_once $customize_path . 'general-layouts.php';
		require_once $customize_path . 'general-logo.php';
		require_once $customize_path . 'general-styling.php';
		require_once $customize_path . 'general-styling-boxed-bg.php';
		require_once $customize_path . 'general-typography.php';
		require_once $customize_path . 'general-typography-heading.php';
		require_once $customize_path . 'header.php';
		require_once $customize_path . 'header-layouts.php';
		require_once $customize_path . 'header-main-menu.php';
		require_once $customize_path . 'header-sticky-menu.php';
		require_once $customize_path . 'header-sub-menu.php';
		require_once $customize_path . 'page-title.php';
		require_once $customize_path . 'page-title-bar.php';
		require_once $customize_path . 'page-title-breadcrumb.php';
		require_once $customize_path . 'page-title-styling.php';
		require_once $customize_path . 'responsive.php';
		require_once $customize_path . 'sidebars.php';
	}
}

$education_pack_customize = new education_pack_Customize_Options();