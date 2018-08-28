<?php
/**
 * Wrapper Layout
 *
 */

/**
 * Thim wrapper layout
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_wrapper_layout' ) ) :
	function education_pack_wrapper_layout() {
		global $wp_query;
		$postid            = get_the_ID();
		$education_pack_options      = get_theme_mods();
		$wrapper_layout    = $using_custom_layout = $cat_ID = '';
		$wrapper_class_col = 'col-sm-8 alignleft';
		if ( get_post_type() == "product" ) {
			$prefix = 'woocommerce_';
		} elseif ( get_post_type() == "post" ) {
			$prefix = 'blog_';
		} else {
			$prefix = '';
		}

		// get id category
		$cat_obj = $wp_query->get_queried_object();
		if ( isset( $cat_obj->term_id ) ) {
			$cat_ID = $cat_obj->term_id;
		}

		//Get layout from customizer
		if ( is_page() ) {
			if ( isset( $education_pack_options['page_layout'] ) ) {
				$wrapper_layout = get_theme_mod( 'page_layout' );
			}
			// Get custom layout for page options ( metabox).
			$using_custom_layout = get_post_meta( $postid, 'thim_custom_layout', true );
			if ( $using_custom_layout ) {
				$wrapper_layout = get_post_meta( $postid, 'thim_custom_layout', true );
			}


		} elseif ( is_single() ) {
			if ( isset( $education_pack_options[ '' . $prefix . 'single_layout' ] ) ) {
				$wrapper_layout = get_theme_mod( '' . $prefix . 'single_layout' );
			}
			// Get custom layout for single post options ( meta-box).
			$using_custom_layout = get_post_meta( $postid, 'thim_custom_layout', true );
			if ( $using_custom_layout ) {
				$wrapper_layout = get_post_meta( $postid, 'thim_custom_layout', true );
			}

		} else {
			if ( isset( $education_pack_options[ '' . $prefix . 'archive_layout' ] ) ) {
				$wrapper_layout = get_theme_mod( '' . $prefix . 'archive_layout' );
			}
			// Get custom layout for category,... from category options.
			// Code a here.
		}
		// Get layout for custom post type (testimonial, ourteam, ...) // Code a here.

		if ( isset( $_GET['layout'] ) ) {
			$wrapper_layout = trim( $_GET['layout'] );
		}
		// Get class layout
		if ( $wrapper_layout == 'no-sidebar' ) {
			$wrapper_class_col = "col-sm-12 full-width";
		}
		if ( $wrapper_layout == 'sidebar-left' ) {
			$wrapper_class_col = "col-sm-8 alignright";
		}
		if ( $wrapper_layout == 'sidebar-right' ) {
			$wrapper_class_col = 'col-sm-8 alignleft';
		}
		if ( $wrapper_layout == 'full-sidebar' ) {
			$wrapper_class_col = 'col-sm-6 aligncenter';
		}

		return $wrapper_class_col;
	}
endif;


add_action( 'education_pack_wrapper_loop_start', 'education_pack_wrapper_loop_start' );
/**
 * Get wrapper layout start
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_wrapper_loop_start' ) ) :
	function education_pack_wrapper_loop_start() {
		$class_no_padding = '';
		if ( get_post_type() == "product" ) {
			$prefix = 'woocommerce_';
		} elseif ( get_post_type() == "post" ) {
			$prefix = 'blog_';
		} else {
			$prefix = '';
		}
		if ( is_page() || is_single() ) {
			$mtb_no_padding = get_post_meta( get_the_ID(), 'thim_no_padding_content', true );
			if ( $mtb_no_padding ) {
				$class_no_padding = 'no-padding';
			}
		}
		$wrapper_class_col = education_pack_wrapper_layout();
		if ( is_404() ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( is_search() ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( is_single() && (get_post_type() == 'lp_course')) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( function_exists( 'learn_press_is_profile' ) && ( learn_press_is_profile() == true ) ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		echo '<div class="container site-content ' . $class_no_padding . '"><div class="row">';
		if ( $wrapper_class_col == 'col-sm-6 aligncenter' ) {
			$postid = get_the_ID();
			if ( is_page() ) {
				$get_sidebar_left = get_theme_mod( 'page_layout_sidebar_left' );
				// get sidebar from MTB
				$sidebar_left = get_post_meta( $postid, 'thim_custom_sidebar_left', true );
				if ( $sidebar_left ) {
					$get_sidebar_left = get_post_meta( $postid, 'thim_custom_sidebar_left', true );
				}
			} elseif ( is_single() ) {
				$get_sidebar_left = get_theme_mod( '' . $prefix . 'single_layout_sidebar_left' );
				// get sidebar from MTB
				$sidebar_left = get_post_meta( $postid, 'thim_custom_sidebar_left', true );
				if ( $sidebar_left ) {
					$get_sidebar_left = get_post_meta( $postid, 'thim_custom_sidebar_left', true );
				}
			} else {
				$get_sidebar_left = get_theme_mod( '' . $prefix . 'archive_layout_sidebar_left' );
			}
			echo '<aside id="secondary-left" class="widget-area col-sm-3 sticky-sidebar sidebar-left">';
			dynamic_sidebar( $get_sidebar_left );
			echo '</aside>';
		}
		echo '<main id="main" class="site-main ' . $wrapper_class_col . '" >';
	}
endif;


add_action( 'education_pack_wrapper_loop_end', 'education_pack_wrapper_loop_end' );
/**
 * Get wrapper layout end
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_wrapper_loop_end' ) ) :
	function education_pack_wrapper_loop_end() {
		$postid = get_the_ID();
		if ( get_post_type() == "product" ) {
			$prefix = 'woocommerce_';
		} elseif ( get_post_type() == "post" ) {
			$prefix = 'blog_';
		} else {
			$prefix = '';
		}
		$wrapper_class_col = education_pack_wrapper_layout();
		if ( is_404() ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( is_search() ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( is_single() && (get_post_type() == 'lp_course')) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		if ( function_exists( 'learn_press_is_profile' ) && ( learn_press_is_profile() == true ) ) {
			$wrapper_class_col = 'col-sm-12 full-width';
		}
		echo '</main>';
		if ( $wrapper_class_col != 'col-sm-12 full-width' && $wrapper_class_col != 'col-sm-6 aligncenter' ) {
			if ( get_post_type() == "product" ) {
				get_sidebar( 'shop' );
			} else {
				get_sidebar();
			}
		}
		if ( $wrapper_class_col == 'col-sm-6 aligncenter' ) {
			if ( is_page() ) {
				$get_sidebar_right = get_theme_mod( 'page_layout_sidebar_right' );
				// get sidebar from MTB
				$sidebar_right = get_post_meta( $postid, 'thim_custom_sidebar_right', true );
				if ( $sidebar_right ) {
					$get_sidebar_right = get_post_meta( $postid, 'thim_custom_sidebar_right', true );
				}
			} elseif ( is_single() ) {
				$get_sidebar_right = get_theme_mod( '' . $prefix . 'single_layout_sidebar_right' );
				// get sidebar from MTB
				$sidebar_right = get_post_meta( $postid, 'thim_custom_sidebar_right', true );
				if ( $sidebar_right ) {
					$get_sidebar_right = get_post_meta( $postid, 'thim_custom_sidebar_right', true );
				}
			} else {
				$get_sidebar_right = get_theme_mod( '' . $prefix . 'archive_layout_sidebar_right' );
			}
			echo '<aside id="secondary-right" class="widget-area col-sm-3 sticky-sidebar">';
			dynamic_sidebar( $get_sidebar_right );
			echo '</aside>';
		}
		echo '</div></div>';
	}
endif;
