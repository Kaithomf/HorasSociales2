<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php  if ( get_theme_mod( 'blog_single_comment', true ) ) :?>
	<div id="comments" class="comments-area">
		<div class="list-comments">
			<?php if ( have_comments() ) { ?>
				<h3 class="comments-title">
					<?php echo esc_html__( 'Comments', 'education-pack' ); ?>
				</h3>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through  ?>
					<nav id="comment-nav-above" class="comment-navigation" role="navigation">
						<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'education-pack' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'education-pack' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'education-pack' ) ); ?></div>
					</nav><!-- #comment-nav-above -->
				<?php endif; // check for comment navigation  ?>

				<ul class="comment-list">
					<?php wp_list_comments( 'type=comment&callback=education_pack_comment' ); ?>
				</ul>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through  ?>
					<nav id="comment-nav-below" class="comment-navigation" role="navigation">
						<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'education-pack' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'education-pack' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'education-pack' ) ); ?></div>
					</nav><!-- #comment-nav-below -->
				<?php endif; // check for comment navigation  ?>

			<?php } else {
				echo esc_html__('No comments yet! You be the first to comment.','education-pack');
			} // have_comments() ?>
			<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'education-pack' ); ?></p>
			<?php endif; ?>
		</div>

		<div class="form-comment">
			<?php comment_form( array(
				'comment_field' => '<p class="comment-form-comment"><textarea placeholder="' . esc_attr__( 'Message', 'education-pack' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>'
			) ); ?>
		</div>
	</div><!-- #comments -->
<?php endif; ?>
