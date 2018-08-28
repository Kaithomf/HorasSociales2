<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$user = LP_Global::user();
$course_id = get_the_ID();
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php do_action( 'learn-press/before-courses-loop-item' ); ?>

    <div class="content">

        <div class="thumbnail">

            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="img_thumbnail">
                    <?php echo thim_get_thumbnail( $course_id, '320x320', 'post', false ); ?>
                </a>
            <?php endif; ?>

            <span class="price"><?php learn_press_get_template( 'single-course/price.php' ); ?></span>
        </div>

        <div class="sub-content">
            <h4 class="title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <?php if ( class_exists( 'LP_Addon_Course_Review' ) ): ?>
                <div class="review">
                    <div class="sc-review-stars">
                        <?php $course_rate = learn_press_get_course_rate( $course_id ); ?>
                        <?php learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) ); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="date-comment">
                <?php echo '<span class="date-meta">' . get_the_date() . '</span>' . esc_html_x(' / ','Divide the course creation date and number of comments','course-builder');
                $comment = get_comments_number();
                echo '<span class="number-comment">';
                if ( $comment == 0 ) {
                    echo esc_html__( "No Comments", 'course-builder' );
                } else {
                    echo ( $comment == 1 ) ? esc_html( $comment . ' Comment' ) : esc_html( $comment . ' Comments' );
                }
                echo '</span>';
                ?>
            </div>

            <div class="course-description">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>

    <?php do_action( 'learn-press/after-courses-loop-item' ); ?>
</li>