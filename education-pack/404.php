<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */
?>

<section class="error-404 not-found">
	<div class="page-content">
		<div class="row">
			<div class="col-md-6 col-sm-6 image-404">
				<div class="img">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/404.png' ); ?>" alt="" />
				</div>
			</div>
			<div class="col-md-6 col-sm-6 content-404">
				<h1 class="color"><?php esc_html_e( '404!', 'education-pack' ); ?></h1>
				<p class="intro"><?php esc_html_e( 'Page not found!', 'education-pack' ); ?></p>
				<p><?php printf( __( 'We couldn\'t find the page you\'re looking for. Back to <a href="%s">Homepage</a>', 'education-pack' ), get_home_url() ); ?></p>
				<?php
				get_search_form();
				?>
			</div>
		</div>

	</div><!-- .page-content -->
</section><!-- .error-404 -->