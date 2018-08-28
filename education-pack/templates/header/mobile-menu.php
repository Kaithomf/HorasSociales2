<?php
/**
 * Header Mobile Menu Template
 *
 * @package education_pack_Starter_Theme
 */
?>

<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</div>

<ul class="nav navbar-nav">
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	} else {
		wp_nav_menu( array(
			'theme_location' => '',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	}
	?>
</ul>
<?php if ( get_theme_mod( 'menu_right_display', true ) ) : ?>
	<div class="menu-right">
		<a href="#" class="button_search"><i class="fa fa-search"></i></a>
		<?php get_search_form(); ?>
	</div>
<?php endif; ?>
<?php if ( get_theme_mod( 'header_sidebar_right_display', true ) ) : ?>
	<div class="header-right">
		<?php dynamic_sidebar( 'header_right' ); ?>
	</div>
<?php endif; ?>

