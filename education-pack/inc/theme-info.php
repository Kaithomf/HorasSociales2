<?php
/**
 * Theme info
 *
 * @package Education Pack
 */

//Add the theme page
add_action( 'admin_menu', 'education_pack_add_theme_info' );
function education_pack_add_theme_info() {
	$theme_info = add_theme_page( esc_html__( 'Theme Info', 'education-pack' ), esc_html__( 'Theme Info', 'education-pack' ), 'manage_options', 'thim-info.php', 'education_pack_info_page' );
	add_action( 'load-' . $theme_info, 'education_pack_info_hook_styles' );
}

//Callback
function education_pack_info_page() {
	?>
	<div class="info-container">
		<h2 class="info-title"><?php esc_html_e( 'Notice: ', 'education-pack' ); ?></h2>
		<p><?php echo esc_html__( 'Please install and active Thim Core', 'education-pack' ); ?></p>
		<a class="btn" href="https://foobla.bitbucket.io/thim-core/dist/thim-core.zip" target="_blank"><?php esc_html_e( 'DOWNLOAD THIM CORE', 'education-pack' ); ?></a>
	</div>
	<div class="info-container">
		<h2 class="info-title"><?php esc_html_e( 'Theme Info', 'education-pack' ); ?></h2>
		<div class="info-block">
			<div class="dashicons dashicons-desktop info-icon"></div>
			<p class="info-text">
				<a href="<?php echo esc_url( 'http://university.thimpress.com/' ); ?>" target="_blank"><?php esc_html_e( 'Theme demo', 'education-pack' ); ?></a>
			</p></div>
		<div class="info-block">
			<div class="dashicons dashicons-book-alt info-icon"></div>
			<p class="info-text">
				<a href="<?php echo esc_url( 'http://docspress.thimpress.com/university/' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'education-pack' ); ?></a>
			</p></div>
		<div class="info-block">
			<div class="dashicons dashicons-sos info-icon"></div>
			<p class="info-text">
				<a href="<?php echo esc_url( 'https://thimpress.com/forums/forum/university/' ); ?>" target="_blank"><?php esc_html_e( 'Support', 'education-pack' ); ?></a>
			</p></div>
		<div class="info-block">
			<div class="dashicons dashicons-tag info-icon"></div>
			<p class="info-text">
				<a href="<?php echo esc_url( 'https://thimpress.com/knowledge-base/' ); ?>" target="_blank"><?php esc_html_e( 'Knowledge Base', 'education-pack' ); ?></a>
			</p></div>
	</div>
	<?php
}

//Styles
function education_pack_info_hook_styles() {
	add_action( 'admin_enqueue_scripts', 'education_pack_info_page_styles' );
}

function education_pack_info_page_styles() {
	wp_enqueue_style( 'education-pack-style', get_template_directory_uri() . '/assets/css/theme-info.css', array(), true );
}