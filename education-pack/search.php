<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */
?>

<?php
if ( have_posts() ) :
	?>
	<div class="blog-content blog-list">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			get_template_part( 'templates/template-parts/content', 'search' );
		endwhile;
		?>
	</div><!-- .blog-content.blog-list -->
	<?php education_pack_paging_nav(); ?>
<?php else : ?>
	<?php get_template_part( 'templates/template-parts/content', 'none' ); ?>
<?php endif; ?>