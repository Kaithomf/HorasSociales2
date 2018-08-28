<?php
/**
 * Header Main Menu Template
 *
 */
?>

<?php if ( class_exists( 'Thim_Mega_Menu' ) && Thim_Mega_Menu::menu_is_enabled( 'primary' ) ) : ?>
    <div class="mega-menu-wrapper">
        <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s'
            )
        );
        ?>
    </div>
<?php else: ?>

    <ul id="primary-menu" class="navbar">
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
<?php endif; ?>

<?php if ( get_theme_mod( 'menu_right_display', true ) ) : ?>
    <div class="menu-right">
        <div class="button_search"><i class="fa fa-search"></i></div>
        <?php get_search_form(); ?>
    </div>
<?php endif; ?>