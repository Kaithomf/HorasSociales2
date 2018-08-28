<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

$education_pack_options = get_theme_mods();

$column = isset( $education_pack_options['archive_post_column'] ) ? get_theme_mod( 'archive_post_column' ) : 1;
$class  = 'column-' . $column . ' col-md-' . ( 12 / $column );

if ( isset( $_GET['column'] ) ) {
	$class = 'col-md-' . ( 12 / ( $_GET['column'] ) );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="content-inner">
		<div class="entry-top">
			<?php
			if ( $column === '1' ) {
				do_action( 'education_pack_entry_top', 'full' );
			} else {
				education_pack_feature_image( 370, 250, 'full' );
			}
			?>
		</div><!-- .entry-top -->

		<div class="entry-content">
			<?php
			if ( function_exists('education_pack_meta') && has_post_format( 'link' ) && education_pack_meta( 'thim_link_url' ) && education_pack_meta( 'thim_link_text' ) ) {
				$url  = education_pack_meta( 'thim_link_url' );
				$text = education_pack_meta( 'thim_link_text' );
				if ( $url && $text ) { ?>
					<header class="entry-header">
						<h3 class="entry-title">
							<a class="link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $text ); ?></a>
						</h3>
					</header><!-- .entry-header -->
					<?php
				}
				?>
				<?php if ( get_theme_mod( 'excerpt_archive_content_display', true ) ) { ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				<?php } ?>
				<?php if ( get_theme_mod( 'readmore_archive_content_display', true ) ) { ?>
					<div class="readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'education-pack' ); ?></a>
					</div><!-- .read-more -->
				<?php } ?>

			<?php } elseif (function_exists('education_pack_meta') && has_post_format( 'quote' ) && education_pack_meta( 'thim_quote_author_url' ) ) {

				$author     = education_pack_meta( 'thim_quote_author_text' );
				$author_url = education_pack_meta( 'thim_quote_author_url' );
				if ( $author_url ) {
					$author = ' <a href=' . esc_url( $author_url ) . '>' . $author . '</a>';
				}
				?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->
				<?php if ( get_theme_mod( 'excerpt_archive_content_display', true ) ) { ?>
					<div class="entry-summary">
						<?php if ( $author ) { ?>
							<div class="box-header box-quote">
								<blockquote><?php the_content(); ?><cite><?php echo wp_kses( $author, array(
											'a' => array(
												'href' => array(),
											)
										) ); ?></cite>
								</blockquote>
							</div>
						<?php } ?>
					</div><!-- .entry-summary -->
				<?php } ?>
				<?php if ( get_theme_mod( 'readmore_archive_content_display', true ) ) { ?>
					<div class="readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'education-pack' ); ?></a>
					</div><!-- .read-more -->
				<?php } ?>
				<?php
			} elseif ( has_post_format( 'audio' ) ) { ?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<?php education_pack_entry_meta(); ?>
				</header><!-- .entry-header -->
				<?php if ( get_theme_mod( 'excerpt_archive_content_display', true ) ) { ?>
					<div class="entry-summary">
						<?php
						the_excerpt();
						?>
					</div><!-- .entry-summary -->
				<?php } ?>
				<?php if ( get_theme_mod( 'readmore_archive_content_display', true ) ) { ?>
					<div class="readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'education-pack' ); ?></a>
					</div><!-- .read-more -->
				<?php } ?>

			<?php } elseif ( has_post_format( 'chat' ) ) { ?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<?php education_pack_entry_meta(); ?>
				</header><!-- .entry-header -->
				<?php if ( get_theme_mod( 'excerpt_archive_content_display', true ) ) { ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				<?php } ?>
				<?php if ( get_theme_mod( 'readmore_archive_content_display', true ) ) { ?>
					<div class="readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'education-pack' ); ?></a>
					</div><!-- .read-more -->
				<?php } ?>

			<?php } else { ?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>
				<!-- .entry-header -->

				<?php education_pack_entry_meta(); ?>
				<?php if ( get_theme_mod( 'excerpt_archive_content_display', true ) ) { ?>
					<div class="entry-summary">
						<?php
						the_excerpt();
						?>
					</div><!-- .entry-summary -->
				<?php } ?>
				<?php if ( get_theme_mod( 'readmore_archive_content_display', true ) ) { ?>
					<div class="readmore">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'education-pack' ); ?></a>
					</div>
				<?php } ?>
			<?php }
			?>
		</div><!-- .entry-content -->
	</div> <!-- .content-inner -->
</article><!-- #post-## -->
