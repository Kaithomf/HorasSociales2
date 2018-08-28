<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

if ( ! is_active_sidebar( 'sidebar' ) || ( isset( $_GET['layout'] ) && ( $_GET['layout'] === 'no-sidebar' ) ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-4 sticky-sidebar">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
