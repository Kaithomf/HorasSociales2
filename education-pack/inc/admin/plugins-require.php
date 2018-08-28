<?php

function education_pack_get_all_plugins_require( $plugins ) {
	return array(
		array(
			'name'     => 'Thim Education Pack',
			'slug'     => 'thim-education-pack',
			'required' => true,
			'premium'  => true,
		),
		array(
			'name'     => 'Education Pack Demo Data',
			'slug'     => 'education-pack-demo-data',
			'required' => true,
			'premium'  => true,
		),
		array(
			'name' => 'SiteOrigin Page Builder',
			'slug' => 'siteorigin-panels',
		),
		array(
			'name' => 'SiteOrigin Widgets Bundle',
			'slug' => 'so-widgets-bundle',
		),
		array(
			'name' => 'MailChimp',
			'slug' => 'mailchimp-for-wp',
		),
		array(
			'name' => 'Custom Twitter Feeds',
			'slug' => 'custom-twitter-feeds',
		),

		array(
			'name'     => 'LearnPress',
			'slug'     => 'learnpress',
			'required' => false,
		),
	);
}

add_action( 'thim_core_get_all_plugins_require', 'education_pack_get_all_plugins_require' );

function education_pack_get_core_require() {
	$education_pack_core = array(
		'name'    => 'Thim Core',
		'slug'    => 'thim-core',
		'version' => '1.0.6.1',
		'source'  => 'https://foobla.bitbucket.io/thim-core/dist/thim-core.zip',
	);

	return $education_pack_core;
}

/**
 * Theme id.
 */
if ( ! function_exists( 'thim_my_theme_item_id' ) ) {
	function thim_my_theme_item_id() {
		return '436';
	}
}
add_filter( 'thim_core_my_theme_id', 'thim_my_theme_item_id' );