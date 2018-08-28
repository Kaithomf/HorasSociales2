<?php
/**
 * Breadcrumb for LearnPress
 */
if ( ! function_exists( 'thim_learnpress_breadcrumb' ) ) {
	function thim_learnpress_breadcrumb() {

		// Do not display on the homepage
		if ( is_front_page() || is_404() ) {
			return;
		}

		// Get the query & post information
		global $post;
		$icon = '-';

		// Build the breadcrums
		echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';

		// Home page
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr__( 'Home', 'education-pack' ) . '"><span itemprop="name">' . esc_html__( 'Home', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';

		if ( is_single() ) {

			$categories = get_the_terms( $post, 'course_category' );

			if ( get_post_type() == 'lp_course' ) {
				// All courses
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'education-pack' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			} else {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '" title="' . esc_attr( get_the_title( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '"><span itemprop="name">' . esc_html( get_the_title( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			}

			// Single post (Only display the first category)
			if ( isset( $categories[0] ) ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $categories[0] ) ) . '" title="' . esc_attr( $categories[0]->name ) . '"><span itemprop="name">' . esc_html( $categories[0]->name ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';

		} else if ( is_tax( 'course_category' ) || is_tax( 'course_tag' ) ) {
			// All courses
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'education-pack' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';

			// Category page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( single_term_title( '', false ) ) . '">' . esc_html( single_term_title( '', false ) ) . '</span><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
		} else if ( ! empty( $_REQUEST['s'] ) && ! empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
			// All courses
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'education-pack' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'education-pack' ) . '</span></a><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';

			// Search result
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Search results for:', 'education-pack' ) . ' ' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'education-pack' ) . ' ' . esc_html( get_search_query() ) . '</span><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
		} else if ( function_exists( 'learn_press_is_profile' ) && ( learn_press_is_profile() == true ) ) {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Profile', 'education-pack' ) . '">' . esc_html__( 'Profile', 'education-pack' ) . '</span><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
		} else {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'All courses', 'education-pack' ) . '">' . esc_html__( 'All courses', 'education-pack' ) . '</span><span class="breadcrum-icon">' . ent2ncr( $icon ) . '</span></li>';
		}

		echo '</ul>';
	}
}

if ( ! function_exists( 'thim_related_courses' ) ) {

    function thim_related_courses() {
        $related_courses = thim_get_related_courses( 4 );
        if ( $related_courses ) {
            ?>
            <div class="thim-related-course">
                <h3 class="related-title"><?php esc_html_e( 'Related Courses', 'course-builder' ); ?></h3>

                <div class="course-grid row">
                    <?php foreach ( $related_courses as $course_item ) : ?>
                        <?php
                        $course      = LP_Course::get_course( $course_item->ID );
                        $is_required = $course->is_required_enroll();
                        $course_id   = $course_item->ID;
                        if ( class_exists( 'LP_Addon_Course_Review' ) ) {
                            $course_rate              = learn_press_get_course_rate( $course_id );
                            $course_number_vote       = learn_press_get_course_rate_total( $course_id );
                            $html_course_number_votes = $course_number_vote ? sprintf( _n( '(%1$s vote )', ' (%1$s votes)', $course_number_vote, 'course-builder' ), number_format_i18n( $course_number_vote ) ) : esc_html__( '(0 vote)', 'course-builder' );
                        }
                        ?>
                        <div class="inner-course col-sm-3">
                            <?php do_action( 'learn_press_before_course_header' ); ?>

                            <div class="wrapper-course-thumbnail">
                                <?php if ( has_post_thumbnail( $course_id ) ) : ?>
                                    <a href="<?php the_permalink( $course_id ); ?>"
                                       class="img_thumbnail"><?php thim_thumbnail( $course_id, '320x320', 'post', false ); ?></a>
                                <?php endif; ?>
                                <div class="price-ht">
                                    <?php if ( $price = $course->get_price_html() ) {

                                        $origin_price = $course->get_origin_price_html();
                                        $sale_price   = $course->get_sale_price();
                                        $sale_price   = isset( $sale_price ) ? $sale_price : '';
                                        ?>
                                        <?php if ( $course->is_free() || ! $is_required ) { ?>
                                            <div class="value free-course" itemprop="price"
                                                 content="<?php esc_attr_e( 'Free', 'course-builder' ); ?>">
                                                <?php esc_html_e( 'Free', 'course-builder' ); ?>
                                            </div>
                                        <?php } else {
                                            echo '<span class="price">' . esc_html( $price ) . '</span>';
                                        }
                                    } ?>
                                </div>
                            </div>
                            <div class="item-list-center">
                                <div class="course-title">
                                    <h5 class="title">
                                        <a href="<?php echo esc_url( get_the_permalink( $course_item->ID ) ); ?>"> <?php echo get_the_title( $course_item->ID ); ?></a>
                                    </h5>
                                </div>
                                <?php
                                $count = $course->get_users_enrolled( 'append' ) ? $course->get_users_enrolled( 'append' ) : 0;
                                ?>
                                <span class="date-comment"><?php echo get_the_date() . ' / '; ?>
                                    <?php $comment = get_comments_number();
                                    if ( $comment == 0 ) {
                                        echo esc_html__( "No Comments", 'course-builder' );
                                    } else {
                                        echo esc_html( $comment . ' Comment' );
                                    }
                                    ?>
								</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        }
    }
}


function thim_get_related_courses( $limit ) {
    if ( ! $limit ) {
        $limit = 4;
    }
    $course_id = get_the_ID();

    $tag_ids = array();
    $tags    = get_the_terms( $course_id, 'course_tag' );

    if ( $tags ) {
        foreach ( $tags as $individual_tag ) {
            $tag_ids[] = $individual_tag->slug;
        }
    }

    $args = array(
        'posts_per_page'      => 4,
        'paged'               => 1,
        'ignore_sticky_posts' => 1,
        'post__not_in'        => array( $course_id ),
        'post_type'           => 'lp_course'
    );

    if ( $tag_ids ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'course_tag',
                'field'    => 'slug',
                'terms'    => $tag_ids
            )
        );
    }
    $related = array();
    if ( $posts = new WP_Query( $args ) ) {
        global $post;
        while ( $posts->have_posts() ) {
            $posts->the_post();
            $related[] = $post;
        }
    }
    wp_reset_query();

    return $related;
}



// remove default breadcrumb
remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 );

//remove_action( 'learn-press/content-landing-summary', 'learn_press_course_students', 10 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 30 );
//remove_action( 'learn-press/content-learning-summary', 'learn_press_course_students', 15 );

add_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 9 );
add_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 10 );
add_action( 'learn-press/content-landing-summary', 'thim_related_courses', 75 );






