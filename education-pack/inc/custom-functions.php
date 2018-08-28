<?php
/**
 * Custom Functions
 */

/**
 * Check a plugin active
 *
 * @param $plugin_var
 *
 * @return bool
 */
function education_pack_plugin_active( $plugin_dir, $plugin_file = null ) {
	$plugin_file            = $plugin_file ? $plugin_file : ( $plugin_dir . '.php' );
	$plugin                 = $plugin_dir . '/' . $plugin_file;
	$active_plugins_network = get_site_option( 'active_sitewide_plugins' );

	if ( isset( $active_plugins_network[ $plugin ] ) ) {
		return true;
	}

	$active_plugins = get_option( 'active_plugins' );

	if ( in_array( $plugin, $active_plugins ) ) {
		return true;
	}

	return false;
}

/**
 * Get header layouts
 *
 * @return string CLASS for header layouts
 */
function education_pack_header_layout_class() {
	if ( get_theme_mod( 'header_position', 'default' ) === 'default' ) {
		echo ' header-default';
	} else {
		echo ' header-overlay';
	}

	if ( get_theme_mod( 'show_sticky_menu', true ) ) {
		echo ' sticky-header';
	}

	if ( get_theme_mod( 'sticky_menu_style', 'same' ) === 'custom' ) {
		echo ' custom-sticky';
	} else {
		echo '';
	}

	if ( isset( $education_pack_options['header_retina_logo'] ) && get_theme_mod( 'header_retina_logo' ) ) {
		echo ' has-retina-logo';
	}
}

/**
 * Get Header Logo
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_header_logo' ) ) {
	function education_pack_header_logo() {
		$education_pack_options         = get_theme_mods();
		$education_pack_logo_src        = EDUCATION_PACK_URL . "assets/images/logo.png";
		$education_pack_mobile_logo_src = EDUCATION_PACK_URL . "assets/images/logo.png";
		$education_pack_retina_logo_src = '';

		if ( isset( $education_pack_options['header_logo'] ) && $education_pack_options['header_logo'] <> '' ) {
			$education_pack_logo_src = get_theme_mod( 'header_logo' );
			if ( is_numeric( $education_pack_logo_src ) ) {
				$logo_attachment         = wp_get_attachment_image_src( $education_pack_logo_src, 'full' );
				$education_pack_logo_src = $logo_attachment[0];
			}
		}

		if ( isset( $education_pack_options['mobile_logo'] ) && $education_pack_options['mobile_logo'] <> '' ) {
			$education_pack_mobile_logo_src = get_theme_mod( 'mobile_logo' );
			if ( is_numeric( $education_pack_mobile_logo_src ) ) {
				$logo_attachment                = wp_get_attachment_image_src( $education_pack_mobile_logo_src, 'full' );
				$education_pack_mobile_logo_src = $logo_attachment[0];
			}
		}

		echo '<a class="no-sticky-logo" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">';
		echo '<img class="logo" src="' . esc_url( $education_pack_logo_src ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />';

		if ( get_theme_mod( 'header_retina_logo', false ) ) {
			$education_pack_retina_logo_src = get_theme_mod( 'header_retina_logo' );
			if ( is_numeric( $education_pack_retina_logo_src ) ) {
				$logo_attachment                = wp_get_attachment_image_src( $education_pack_retina_logo_src, 'full' );
				$education_pack_retina_logo_src = $logo_attachment[0];
			}
			echo '<img class="retina-logo" src="' . esc_url( $education_pack_retina_logo_src ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />';
		}

		echo '<img class="mobile-logo" src="' . esc_url( $education_pack_mobile_logo_src ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />';
		echo '</a>';
	}
}
add_action( 'education_pack_header_logo', 'education_pack_header_logo' );

/**
 * Get Header Sticky logo
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_header_sticky_logo' ) ) {
	function education_pack_header_sticky_logo() {
		if ( get_theme_mod( 'header_sticky_logo' ) != '' ) {
			$education_pack_logo_stick_logo     = get_theme_mod( 'header_sticky_logo' );
			$education_pack_logo_stick_logo_src = $education_pack_logo_stick_logo; // For the default value
			if ( is_numeric( $education_pack_logo_stick_logo ) ) {
				$logo_attachment = wp_get_attachment_image_src( $education_pack_logo_stick_logo, 'full' );
				if ( $logo_attachment ) {
					$education_pack_logo_stick_logo_src = $logo_attachment[0];
				} else {
					$education_pack_logo_stick_logo_src = EDUCATION_PACK_URL . 'assets/images/sticky-logo.png';
				}
			}
			$education_pack_logo_size = $education_pack_logo_stick_logo_src;
			$logo_size                = $education_pack_logo_size[3];
			$site_title               = esc_attr( get_bloginfo( 'name', 'display' ) );
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home" class="sticky-logo">
					<img src="' . $education_pack_logo_stick_logo_src . '" alt="' . $site_title . '" ' . $logo_size . ' /></a>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home" class="sticky-logo">' . esc_attr( get_bloginfo( 'name' ) ) . '</a>';
		}
	}
}
add_action( 'education_pack_header_sticky_logo', 'education_pack_header_sticky_logo' );

/**
 * Get Page Title Content For Single
 *
 * @return string HTML for Page title bar
 */
function education_pack_get_single_page_title_content() {
	$post_id = get_the_ID();

	if ( get_post_type( $post_id ) == 'post' ) {
		$categories = get_the_category();
	} elseif ( get_post_type( $post_id ) == 'attachment' ) {
		echo '<h2 class="title">' . esc_html__( 'Attachment', 'education-pack' ) . '</h2>';

		return;
	} else {// Custom post type
		$categories = get_the_terms( $post_id, 'taxonomy' );
	}
	if ( ! empty( $categories ) ) {
		echo '<h2 class="title">' . esc_html( $categories[0]->name ) . '</h2>';
	}
}

/**
 * Get Page Title Content For Date Format
 *
 * @return string HTML for Page title bar
 */
function education_pack_get_page_title_date() {
	if ( is_year() ) {
		echo '<h2 class="title">' . esc_html__( 'Year', 'education-pack' ) . '</h2>';
	} elseif ( is_month() ) {
		echo '<h2 class="title">' . esc_html__( 'Month', 'education-pack' ) . '</h2>';
	} elseif ( is_day() ) {
		echo '<h2 class="title">' . esc_html__( 'Day', 'education-pack' ) . '</h2>';
	}

	$date  = '';
	$day   = intval( get_query_var( 'day' ) );
	$month = intval( get_query_var( 'monthnum' ) );
	$year  = intval( get_query_var( 'year' ) );
	$m     = get_query_var( 'm' );

	if ( ! empty( $m ) ) {
		$year  = intval( substr( $m, 0, 4 ) );
		$month = intval( substr( $m, 4, 2 ) );
		$day   = substr( $m, 6, 2 );

		if ( strlen( $day ) > 1 ) {
			$day = intval( $day );
		} else {
			$day = 0;
		}
	}

	if ( $day > 0 ) {
		$date .= $day . ' ';
	}
	if ( $month > 0 ) {
		global $wp_locale;
		$date .= $wp_locale->get_month( $month ) . ' ';
	}
	$date .= $year;
	echo '<div class="description">' . esc_attr( $date ) . '</div>';
}

/**
 * Get Page Title Content
 *
 * @return string HTML for Page title bar
 */
if ( ! function_exists( 'education_pack_page_title_content' ) ) {
	function education_pack_page_title_content() {
		if ( is_front_page() ) {// Front page
			echo '<h2 class="title">' . get_bloginfo( 'name' ) . '</h2>';
			echo '<div class="description">' . get_bloginfo( 'description' ) . '</div>';
		} elseif ( is_home() ) {// Post page
			echo '<h2 class="title">' . esc_html__( 'Blog', 'education-pack' ) . '</h2>';
			echo '<div class="description">' . get_bloginfo( 'description' ) . '</div>';
		} elseif ( is_page() ) {// Page
			echo '<h2 class="title">' . get_the_title() . '</h2>';
		} elseif ( is_single() ) {// Single
			education_pack_get_single_page_title_content();
		} elseif ( is_author() ) {// Author
			echo '<h2 class="title">' . esc_html__( 'Author', 'education-pack' ) . '</h2>';
			echo '<div class="description">' . get_the_author() . '</div>';
		} elseif ( is_search() ) {// Search
			echo '<h2 class="title">' . esc_html__( 'Search', 'education-pack' ) . '</h2>';
			echo '<div class="description">' . get_search_query() . '</div>';
		} elseif ( is_tag() ) {// Tag
			echo '<h2 class="title">' . esc_html__( 'Tag', 'education-pack' ) . '</h2>';
			echo '<div class="description">' . single_tag_title( '', false ) . '</div>';
		} elseif ( is_category() ) {// Archive
			echo '<h2 class="title">' . esc_html__( 'Category', 'education-pack' ) . '</h2>';
			echo '<div class="description">' . single_cat_title( '', false ) . '</div>';
		} elseif ( is_404() ) {
			echo '<h2 class="title">' . esc_html__( 'Page Not Found!', 'education-pack' ) . '</h2>';
		} elseif ( is_date() ) {
			education_pack_get_page_title_date();
		}
	}
}
add_action( 'education_pack_page_title_content', 'education_pack_page_title_content' );

/**
 * Get breadcrumb for page
 *
 * @return string
 */
function education_pack_get_breadcrumb_items_other() {
	global $author;
	$userdata   = get_userdata( $author );
	$categories = get_the_category();
	if ( is_front_page() ) { // Do not display on the homepage
		return;
	}
	if ( is_home() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html__( 'Blog', 'education-pack' ) . '</span></li>';
	} else if ( is_category() ) { // Category page
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . esc_html( $categories[0]->cat_name ) . '</span></li>';
	} else if ( is_tag() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( single_term_title( '', false ) ) . '">' . esc_html( single_term_title( '', false ) ) . '</span></li>';
	} else if ( is_year() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'Y' ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></li>';
	} else if ( is_author() ) { // Auhor archive
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( $userdata->display_name ) . '">' . esc_attr__( 'Author', 'education-pack' ) . ' ' . esc_html( $userdata->display_name ) . '</span></li>';
	} else if ( get_query_var( 'paged' ) ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Page', 'education-pack' ) . ' ' . get_query_var( 'paged' ) . '">' . esc_html__( 'Page', 'education-pack' ) . ' ' . esc_html( get_query_var( 'paged' ) ) . '</span></li>';
	} else if ( is_search() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Search results for:', 'education-pack' ) . ' ' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'education-pack' ) . ' ' . esc_html( get_search_query() ) . '</span></li>';
	} elseif ( is_404() ) {
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( '404 Page', 'education-pack' ) . '">' . esc_html__( '404 Page', 'education-pack' ) . '</span></li>';
	}
}

/**
 * Get content breadcrumbs
 *
 * @return string
 */
if ( ! function_exists( 'education_pack_breadcrumbs' ) ) {
	function education_pack_breadcrumbs() {
		global $post;
		if ( is_front_page() ) { // Do not display on the homepage
			return;
		}
		$categories             = get_the_category();
		$education_pack_options = get_theme_mods();
		$icon                   = '-';
		if ( isset( $education_pack_options['breadcrumb_icon'] ) ) {
			$icon = html_entity_decode( get_theme_mod( 'breadcrumb_icon' ) );
		}
		// Build the breadcrums
		echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( home_url() ) . '" title="' . esc_attr__( 'Home', 'education-pack' ) . '"><span itemprop="name">' . esc_html__( 'Home', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
		if ( is_single() ) { // Single post (Only display the first category)
			if ( isset( $categories[0] ) ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" title="' . esc_attr( $categories[0]->cat_name ) . '"><span itemprop="name">' . esc_html( $categories[0]->cat_name ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span></li>';
		} else if ( is_page() ) {
			// Standard page
			if ( $post->post_parent ) {
				$anc = get_post_ancestors( $post->ID );
				$anc = array_reverse( $anc );
				// Parent page loop
				foreach ( $anc as $ancestor ) {
					echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( $ancestor ) ) . '" title="' . esc_attr( get_the_title( $ancestor ) ) . '"><span itemprop="name">' . esc_html( get_the_title( $ancestor ) ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
				}
			}
			// Current page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span></li>';
		} elseif ( is_day() ) {// Day archive
			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			// Month link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '" title="' . esc_attr( get_the_time( 'M' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			// Day display
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'jS' ) ) . '"> ' . esc_html( get_the_time( 'jS' ) ) . ' ' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></li>';

		} else if ( is_month() ) {
			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'M' ) ) . '">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'education-pack' ) . '</span></li>';
		}
		education_pack_get_breadcrumb_items_other();
		echo '</ul>aaaa';
	}
}

/**
 * Get list sidebars
 */
if ( ! function_exists( 'education_pack_get_list_sidebar' ) ) {
	function education_pack_get_list_sidebar() {
		global $wp_registered_sidebars;

		$sidebar_array = array();
		$dp_sidebars   = $wp_registered_sidebars;

		$sidebar_array[''] = esc_attr__( '-- Select Sidebar --', 'education-pack' );

		foreach ( $dp_sidebars as $sidebar ) {
			$sidebar_array[ $sidebar['name'] ] = $sidebar['name'];
		}

		return $sidebar_array;
	}
}

/**
 * Turn on and get the back to top
 *
 * @return string HTML for the back to top
 */
if ( ! class_exists( 'education_pack_back_to_top' ) ) {
	function education_pack_back_to_top() {
		if ( get_theme_mod( 'feature_backtotop', true ) ) {
			?>
			<div id="back-to-top">
				<?php
				get_template_part( 'templates/footer/back-to-top' );
				?>
			</div>
			<?php
		}
	}
}
add_action( 'education_pack_space_body', 'education_pack_back_to_top', 10 );

/**
 * Switch footer layout
 *
 * @return string HTML footer layout
 */
if ( ! function_exists( 'education_pack_footer_layout' ) ) {
	function education_pack_footer_layout() {
		$template_name = 'templates/footer/' . get_theme_mod( 'footer_template', 'default' );
		get_template_part( $template_name );
	}
}

/**
 * Footer Widgets
 *
 * @return bool
 * @return string
 */
if ( ! function_exists( 'education_pack_footer_widgets' ) ) {
	function education_pack_footer_widgets() {
		if ( get_theme_mod( 'footer_widgets', true ) ) : ?>
			<div class="footer-sidebars">
				<?php
				$col = 12 / get_theme_mod( 'footer_columns', 4 );
				if ( get_theme_mod( 'footer_columns' ) == 5 ) {
					$col = '20';
				}
				for ( $i = 1; $i <= get_theme_mod( 'footer_columns', 4 ); $i ++ ): ?>
					<?php if ( is_active_sidebar( 'footer-sidebar-' . $i ) ) { ?>
						<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr( $col ); ?>">
							<?php dynamic_sidebar( 'footer-sidebar-' . $i ); ?>
						</div>
					<?php } ?>
				<?php endfor; ?>
			</div>
		<?php endif;
	}
}


/**
 * Footer Copyright bar
 *
 * @return bool
 * @return string
 */
if ( ! function_exists( 'education_pack_copyright_bar' ) ) {
	function education_pack_copyright_bar() {
		if ( get_theme_mod( 'copyright_bar', true ) ) : ?>
			<div class="copyright-text text-center">

                <?php
                $link_default = 'Copyright &copy; 2018, All rights reserved. <a href="https://thimpress.com/product/education-pack-1-free-education-wordpress-theme/?utm_source=edupackfooter&utm_medium=footer">Theme: Education Pack.</a>';
                $copyright_text = get_theme_mod( 'copyright_text', $link_default );
                echo wp_kses( $copyright_text, array(
                    'a'      => array( 'href' => array() ),
                    'br'     => array(),
                    'strong' => array(),
                    'li'     => array(),
                    'ol'     => array(),
                    'i'      => array(),
                    'sub'    => array(),
                    'sup'    => array()
                ) );
                ?>
			</div>
		<?php endif;
	}
}

/**
 * Footer menu
 *
 * @return bool
 * @return array
 */
if ( ! function_exists( 'education_pack_copyright_menu' ) ) {
	function education_pack_copyright_menu() {
		if ( get_theme_mod( 'copyright_menu', true ) ) :
			if ( has_nav_menu( 'copyright_menu' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'copyright_menu',
					'container'      => false,
					'items_wrap'     => '<ul id="copyright-menu" class="list-inline">%3$s</ul>',
				) );
			}
		endif;
	}
}

/**
 * Theme Feature: RTL Support.
 *
 * @return @string
 */
if ( ! function_exists( 'education_pack_feature_rtl_support' ) ) {
	function education_pack_feature_rtl_support() {
		if ( get_theme_mod( 'feature_rtl_support', false ) ) {
			echo " dir=\"rtl\"";
		}
	}

	add_filter( 'language_attributes', 'education_pack_feature_rtl_support', 10 );
}

/**
 * Theme Feature: Preload
 *
 * @return bool
 * @return string HTML for preload
 */
if ( ! function_exists( 'education_pack_preloading' ) ) {
	function education_pack_preloading() {
		$preloading = get_theme_mod( 'theme_feature_preloading', 'off' );
		if ( $preloading != 'off' ) {

			echo '<div id="thim-preloading">';

			switch ( $preloading ) {
				case 'custom-image':
					$preloading_image = get_theme_mod( 'theme_feature_preloading_custom_image', false );
					if ( $preloading_image ) {
						if ( locate_template( 'templates/features/preloading/' . $preloading . '.php' ) ) {
							include locate_template( 'templates/features/preloading/' . $preloading . '.php' );
						}
					}
					break;
				default:
					if ( locate_template( 'templates/features/preloading/' . $preloading . '.php' ) ) {
						include locate_template( 'templates/features/preloading/' . $preloading . '.php' );
					}
					break;
			}

			echo '</div>';

		}
	}

	add_action( 'education_pack_before_body', 'education_pack_preloading', 10 );
}

/**
 * Responsive: enable or disable responsive
 *
 * @return string
 * @return bool
 */
if ( ! function_exists( 'education_pack_enable_responsive' ) ) {
	function education_pack_enable_responsive() {
		if ( get_theme_mod( 'enable_responsive', true ) ) {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		}
	}

	add_action( 'wp_head', 'education_pack_enable_responsive', 1 );
}


/**
 * Override ajax-loader contact form
 *
 * $return mixed
 */

function education_pack_wpcf7_ajax_loader() {
	return EDUCATION_PACK_URL . 'assets/images/icons/ajax-loader.gif';
}

add_filter( 'wpcf7_ajax_loader', 'education_pack_wpcf7_ajax_loader' );


/**
 * aq_resize function fake.
 * Aq_Resize
 */
if ( ! class_exists( 'Aq_Resize' ) ) {
	function education_pack_aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
		return $url;
	}
} else {
	function education_pack_aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
		/* WPML Fix */
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
			global $sitepress;
			if ( is_string( $url ) ) {
				$url = $sitepress->convert_url( $url, $sitepress->get_default_language() );
			}
		}
		/* WPML Fix */

		$aq_resize = Aq_Resize::getInstance();

		return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
	}
}


/**
 * Get feature image
 *
 * @param int  $width
 * @param int  $height
 * @param bool $link
 *
 * @return string
 */
function education_pack_feature_image( $width = 1024, $height = 768, $link = true ) {
	global $post;
	if ( has_post_thumbnail() ) {
		if ( $link != true && $link != false ) {
			the_post_thumbnail( $post->ID, $link );
		} else {
			$get_thumbnail = simplexml_load_string( get_the_post_thumbnail( $post->ID, 'full' ) );
			if ( $get_thumbnail ) {
				$thumbnail_src = $get_thumbnail->attributes()->src;
				$img_url       = $thumbnail_src;
				$data          = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
				$width_data    = $data[1];
				$height_data   = $data[2];
				if ( $link ) {
					if ( ( $width_data < $width ) || ( $height_data < $height ) ) {
						echo '<div class="thumbnail"><a href="' . esc_url( get_permalink() ) . '" title = "' . get_the_title() . '">';
						echo '<img src="' . $img_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
						echo '</a></div>';
					} else {
						$image_crop = education_pack_aq_resize( $img_url[0], $width, $height, true );
						echo '<div class="thumbnail"><a href="' . esc_url( get_permalink() ) . '" title = "' . get_the_title() . '">';
						echo '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
						echo '</a></div>';
					}
				} else {
					if ( ( $width_data < $width ) || ( $height_data < $height ) ) {
						return '<img src="' . $img_url[0] . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
					} else {
						$image_crop = education_pack_aq_resize( $img_url[0], $width, $height, true );

						return '<img src="' . $image_crop . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
					}
				}
			}
		}
	}
}

/**
 * Update 1.1.0
 */
/**
 * LearnPress section
 */
if ( is_plugin_active( 'learnpress/learnpress.php' ) ) {
	require_once EDUCATION_PACK_DIR . 'inc/learnpress-functions.php';
}

function thim_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . '...';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

	return $excerpt;
}

/**
 * Display feature image
 *
 * @param $attachment_id
 * @param $size_type
 * @param $width
 * @param $height
 * @param $alt
 * @param $title
 *
 * @return string
 */
function thim_get_feature_image( $attachment_id, $size_type = null, $width = null, $height = null, $alt = null, $title = null ) {

	if ( ! $size_type ) {
		$size_type = 'full';
	}
	$src   = wp_get_attachment_image_src( $attachment_id, $size_type );
	$style = '';
	if ( ! $src ) {
		// Get demo image
		global $wpdb;
		$attachment_id = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT p.ID FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
				WHERE 	pm.meta_key = %s
				AND 	pm.meta_value LIKE %s",
				'_wp_attached_file',
				'%demo_image.jpg'
			)
		);

		if ( empty( $attachment_id[0] ) ) {
			return;
		}

		$attachment_id = $attachment_id[0];
		$src           = wp_get_attachment_image_src( $attachment_id, 'full' );

	}

	if ( $width && $height ) {

		if ( $src[1] >= $width || $src[2] >= $height ) {

			$crop = ( $src[1] >= $width && $src[2] >= $height ) ? true : false;

			if ( $new_link = thim_aq_resize( $src[0], $width, $height, $crop ) ) {

				$src[0] = $new_link;

			}

		}
		$style = ' width="' . $width . '" height="' . $height . '"';
	} else {
		if ( ! empty( $src[1] ) && ! empty( $src[2] ) ) {
			$style = ' width="' . $src[1] . '" height="' . $src[2] . '"';
		}
	}

	if ( ! $alt ) {
		$alt = get_the_title( $attachment_id );
	}

	if ( ! $title ) {
		$title = get_the_title( $attachment_id );
	}

	return '<img src="' . esc_url( $src[0] ) . '" alt="' . esc_attr( $alt ) . '" title="' . esc_attr( $title ) . '" ' . $style . '>';

}

/**
 * Social sharing
 */
if ( ! function_exists( 'thim_social_share' ) ) {
	function thim_social_share() {
		echo '<ul class="thim-social-share">';
		do_action( 'thim_before_social_list' );

		echo '<li><div class="facebook-social"><a target="_blank" class="facebook"  href="https://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" title="' . esc_attr__( 'Facebook', 'education-pack' ) . '"><i class="fa fa-facebook"></i></a></div></li>';

		echo '<li><div class="googleplus-social"><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . rawurlencode( esc_attr( get_the_title() ) ) . '" title="' . esc_attr__( 'Google Plus', 'education-pack' ) . '" onclick=\'javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></div></li>';

		echo '<li><div class="twitter-social"><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . rawurlencode( esc_attr( get_the_title() ) ) . '" title="' . esc_attr__( 'Twitter', 'education-pack' ) . '"><i class="fa fa-twitter"></i></a></div></li>';

		echo '<li><div class="pinterest-social"><a target="_blank" class="pinterest"  href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . rawurlencode( esc_attr( get_the_excerpt() ) ) . '&amp;media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . esc_attr__( 'Pinterest', 'education-pack' ) . '"><i class="fa fa-pinterest-p"></i></a></div></li>';

		do_action( 'thim_after_social_list' );

		echo '</ul>';
	}
}
add_action( 'thim_social_share', 'thim_social_share' );

/**
 * @param $id
 * @param $size
 * @param $type : default is post
 *
 * @return string
 */
if ( ! function_exists( 'thim_get_thumbnail' ) ) {
    function thim_get_thumbnail( $id, $size = 'thumbnail', $type = 'post', $link = true, $classes = '' ) {
        $width         = 0;
        $height        = 0;
        $attachment_id = $id;
        if ( $type === 'post' ) {
            $attachment_id = get_post_thumbnail_id( $id );
        }
        $src = wp_get_attachment_image_src( $attachment_id, 'full' );

        if ( $size != 'full' && ! in_array( $size, get_intermediate_image_sizes() ) ) {
            //custom size
            $thumbnail_size = explode( 'x', $size );
            $width          = $thumbnail_size[0];
            $height         = $thumbnail_size[1];
            $img_src        = thim_aq_resize( $src[0], $width, $height, true );
        } else {
            if ( $size == 'full' ) {
                $img_src = $src[0];
                $width   = $src[1];
                $height  = $src[2];
            } else {
                $image_size = wp_get_attachment_image_src( $attachment_id, $size );
                $width      = $image_size[1];
                $height     = $image_size[2];
            }
        }

        if ( empty( $img_src ) ) {
            $img_src = $src[0];
        }

        $html = '';
        $html .= '<img ' . image_hwstring( $width, $height ) . ' src="' . esc_attr( $img_src ) . '" alt="' . get_the_title( $id ) . '" class="' . $classes . '">';
        if ( $link ) {
            $html .= '<a href="' . esc_url( get_permalink( $id ) ) . '" class="img-link"></a>';
        }

        return $html;
    }
}

/**
 * @param      $id
 * @param      $size
 */
if ( ! function_exists( 'thim_thumbnail' ) ) {
    function thim_thumbnail( $id, $size, $type = 'post', $link = true, $classes = '' ) {
        echo thim_get_thumbnail( $id, $size, $type, $link, $classes );
    }
}