<?php
/**
 * Related Post
 *
 */

$related         = education_pack_get_related_posts();
$related_columns = education_pack_get_related_columns_class( 'col-sm-6' );

if ( $related->have_posts() ) {
	?>
	<section class="related-archive">
		<h3 class="related-title"><?php esc_html_e( 'Your Might Also Like', 'education-pack' ); ?></h3>
		<?php
		echo '<ul class="archived-posts row">';
		while ( $related->have_posts() ) {
			$related->the_post();
			if ( has_post_thumbnail() ) {
				?>
				<li <?php post_class( $related_columns ); ?>>
					<div class="category-posts clear">
						<?php education_pack_feature_image( 250, 185, 'thumbnail' ); ?>
						<div class="rel-post-text">
							<h5 class="entry-title">
								<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a>
							</h5>

							<div class="entry-meta">
								<?php education_pack_entry_meta_date(); ?>
								<?php education_pack_entry_meta_author(); ?>
							</div>
						</div>
					</div>
				</li>
				<?php
			} else { ?>
				<li <?php post_class( $related_columns ); ?>>
					<div class="category-posts clear">
						<div class="rel-post-text">
							<h5 class="entry-title no-images">
								<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a>
							</h5>

							<div class="entry-meta">
								<?php education_pack_entry_meta_author(); ?>
								<?php education_pack_entry_meta_date(); ?>
							</div>
						</div>
						<div class="des-related">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</li>
			<?php }
		}
		echo '</ul>';
		?>
	</section><!--.related-->
	<?php
}

wp_reset_postdata();

?>