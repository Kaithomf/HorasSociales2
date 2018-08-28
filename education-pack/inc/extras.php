<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */


function education_pack_admin_notice_active( $arg ) {
	$array       = explode( '-', $arg );
	$length      = array_pop( $array );
	$option_name = implode( '-', $array );
	$db_record   = get_site_transient( $option_name );
	if ( 'forever' == $db_record ) {
		return false;
	} elseif ( absint( $db_record ) >= time() ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Handles Ajax request to persist notices dismissal.
 * Uses check_ajax_referer to verify nonce.
 */
add_action( 'wp_ajax_education_pack_dismiss_admin_notice', 'education_pack_dismiss_admin_notice' );
function education_pack_dismiss_admin_notice() {
	$option_name        = sanitize_text_field( $_POST['option_name'] );
	$dismissible_length = sanitize_text_field( $_POST['dismissible_length'] );
	$transient          = 0;
	if ( 'forever' != $dismissible_length ) {
		$transient          = absint( $dismissible_length ) * DAY_IN_SECONDS;
		$dismissible_length = strtotime( absint( $dismissible_length ) . ' days' );
	}
	check_ajax_referer( 'dismissible-notice', 'nonce' );
	$dismiss = set_site_transient( $option_name, $dismissible_length, $transient );
	wp_die( $dismiss );
}

/**
 * Enqueue javascript and variables.
 */
add_action( 'admin_enqueue_scripts', 'education_pack_admin_load_script' );
function education_pack_admin_load_script() {
	wp_enqueue_script(
		'dismissible-notices',
		EDUCATION_PACK_URL . 'inc/admin/assets/scripts.js',
		array( 'jquery', 'common' ),
		false,
		true
	);
	wp_localize_script(
		'dismissible-notices',
		'dismissible_notice',
		array(
			'nonce' => wp_create_nonce( 'dismissible-notice' ),
		)
	);
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function education_pack_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$classes[] = 'bg-type-' . get_theme_mod( 'background_boxed_type', 'color' );

	if ( get_theme_mod( 'enable_responsive', true ) ) {
		$classes[] = 'responsive';
	} else {
		$classes[] = 'disable-responsive';
	}

	if ( get_theme_mod( 'enable_box_shadow', true ) ) {
		$classes[] = 'box-shadow';
	}

	return $classes;
}

add_filter( 'body_class', 'education_pack_body_classes' );

/**
 * Primary menu
 */
function education_pack_primary_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	} else {
		wp_nav_menu( array(
			'theme_location' => '',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	}
}

/**
 * Display the classes for the #wrapper-container element.
 *
 * @param string|array $class One or more classes to add to the class list.
 */
function education_pack_wrapper_container_class( $class = '' ) {
	// Separates classes with a single space, collates classes for body element
	echo 'class="' . join( ' ', education_pack_get_wrapper_container_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the #wrapper-container element as an array.
 *
 * @param string|array $class One or more classes to add to the class list.
 *
 * @return array Array of classes.
 */
function education_pack_get_wrapper_container_class( $class = '' ) {
	$classes = array();

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filter the list of CSS #wrapper-container classes
	 *
	 * @param array $classes An array of #wrapper-container classes.
	 * @param array $class   An array of additional classes added to the #wrapper-container.
	 */
	$classes = apply_filters( 'education_pack_wrapper_container_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Adds custom classes to the array of #wrapper-container classes.
 *
 * @param array $classes Classes for the #wrapper-container element.
 *
 * @return array
 */
function education_pack_wrapper_container_classes( $classes ) {
	$classes[] = 'content-pusher';

	if ( get_theme_mod( 'box_content_layout' ) == 'boxed' ) {
		$classes[] = 'boxed-area';
	}

	if ( get_theme_mod( 'mobile_menu_position' ) == 'creative-left' ) {
		$classes[] = 'creative-left';
	} else {
		$classes[] = 'creative-right';
	}

	$classes[] = 'bg-type-' . get_theme_mod( 'background_main_type', 'color' );

	return $classes;
}

add_filter( 'education_pack_wrapper_container_class', 'education_pack_wrapper_container_classes' );


/**
 * Add lang to html tag
 *
 * @return @string
 */
if ( ! function_exists( 'education_pack_language_attributes' ) ) {
	function education_pack_language_attributes() {
		echo 'lang="' . get_bloginfo( 'language' ) . '"';
	}

	add_filter( 'language_attributes', 'education_pack_language_attributes', 10 );
}


/**
 * Optimize: Remove Emoji scripts
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Optimize: script_version
 */

function education_pack_optimize_remove_script_version( $src ) {
	$parts = explode( '?ver', $src );

	return $parts[0];
}

add_filter( 'script_loader_src', 'education_pack_optimize_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'education_pack_optimize_remove_script_version', 15, 1 );


/**
 * Support SSL (https)
 */
function education_pack_ssl_secure_url( $sources ) {
	$scheme = parse_url( site_url(), PHP_URL_SCHEME );
	if ( 'https' == $scheme ) {
		if ( stripos( $sources, 'http://' ) === 0 ) {
			$sources = 'https' . substr( $sources, 4 );
		}

		return $sources;
	}

	return $sources;
}

function education_pack_ssl_secure_image_srcset( $sources ) {
	$scheme = parse_url( site_url(), PHP_URL_SCHEME );
	if ( 'https' == $scheme ) {
		foreach ( $sources as &$source ) {
			if ( stripos( $source['url'], 'http://' ) === 0 ) {
				$source['url'] = 'https' . substr( $source['url'], 4 );
			}
		}

		return $sources;
	}

	return $sources;
}

add_filter( 'wp_calculate_image_srcset', 'education_pack_ssl_secure_image_srcset' );
add_filter( 'wp_get_attachment_url', 'education_pack_ssl_secure_url', 1000 );
add_filter( 'image_widget_image_url', 'education_pack_ssl_secure_url' );