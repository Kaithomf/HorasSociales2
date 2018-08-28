<?php
/**
 * Header V1 Template
 *
 * @package education_pack_Starter_Theme
 */
?>

<div class="header-v1 container">
    <div class="row">
        <div class="navigation-top col-sm-12">
            <div class="tm-table">
                <div class="width-logo table-cell sm-logo">
                    <?php do_action( 'education_pack_header_logo' ); ?>
                    <?php do_action( 'education_pack_header_sticky_logo' ); ?>
                </div>
                <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <?php if ( get_theme_mod( 'header_sidebar_right_display', true ) ) : ?>
                    <div class="hidden-sm header-right">
                        <?php dynamic_sidebar( 'header_right' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="navigation">
    <div class="container">
        <nav class="width-navigation table-cell table-right main-navigation">
            <div class="inner-navigation">
                <?php get_template_part( 'templates/header/main-menu' ); ?>
            </div>
        </nav>
    </div>
</div>