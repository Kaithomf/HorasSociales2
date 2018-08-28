<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action( 'education_pack_before_body' ); ?>

<div id="wrapper-container" <?php education_pack_wrapper_container_class(); ?>>

	<header id="masthead" class="site-header affix-top<?php education_pack_header_layout_class(); ?>">
		<?php get_template_part( 'templates/header/header_v1' ); ?>
	</header><!-- #masthead -->

	<nav class="visible-xs mobile-menu-container mobile-effect" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php get_template_part( 'templates/header/mobile-menu' ); ?>
	</nav><!-- nav.mobile-menu-container -->

	<div id="main-content">