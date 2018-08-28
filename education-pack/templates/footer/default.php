<?php
/**
 * Footer template: Default
 * 
 * @package education_pack_Starter_Theme
 */

$class_default = '';
$education_pack_options = get_theme_mods();

if ( ! education_pack_plugin_active( 'thim-core' ) ) {
	$class_default = 'no-padding';
}
?>
<div class="footer <?php echo esc_attr($class_default); ?>">
	<div class="container">
		<div class="row">
			<?php education_pack_footer_widgets(); ?>
		</div>
	</div>
</div>

<div class="copyright-area">
	<div class="container">
		<div class="copyright-content">
			<div class="row">
				<div class="<?php if ( get_theme_mod( 'copyright_menu', true ) ) { ?>col-sm-6<?php }else { ?>col-sm-12<?php } ?>">
					<?php education_pack_copyright_bar(); ?>
				</div>
				<?php if ( get_theme_mod( 'copyright_menu', true ) ) : ?>
				<div class="col-sm-6 text-right">
					<?php education_pack_copyright_menu(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>