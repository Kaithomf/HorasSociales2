<?php
/**
 * Template part for displaying single.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-inner">
		<div class="entry-top">
			<?php if ( get_theme_mod( 'blog_single_feature_image', true ) ) :
				do_action( 'education_pack_entry_top', 'full' );
			endif; ?>
		</div><!-- .entry-top -->
		<div class="entry-content">
			<header class="entry-header">
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header><!-- .entry-header -->

			<?php education_pack_entry_meta(); ?>

			<div class="entry-description">
				<?php
				if ( has_post_format( 'chat' ) ) {
					education_pack_get_list_group_chat();
				}
				// Get post content
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-pack' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<div class="entry-tag-share">
				<?php if ( get_theme_mod( 'show_tags_meta_tags', true ) ) : ?>
					<?php education_pack_entry_meta_tags(); ?>
				<?php endif; ?>
				<?php do_action( 'education_pack_social_share' ); ?>
			</div>

		</div><!-- .entry-content -->

	</div><!-- .content-inner -->
	<?php if ( get_theme_mod( 'blog_single_nav', true ) ) : ?>
	<div class="nav-single">
		<div class="nav-wrapper">
			<h3 class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . esc_html__('Previous ', 'education-pack') . '</span> %title'); ?></h3>
			<h3 class="nav-next"><?php next_post_link('%link', '<span class="meta-nav">' . esc_html__('Next', 'education-pack') . '</span> %title'); ?></h3>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( get_theme_mod( 'blog_single_author', true ) ) : ?>
		<?php do_action( 'education_pack_about_author' ); ?>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'blog_single_related_post', true ) ) :
		get_template_part( 'templates/template-parts/related-single' );
	endif; ?>
</article><!-- #post-## -->