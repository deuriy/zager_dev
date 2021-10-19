<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Create function to add ACF Options page at wp-admin. Should be modified for general purposes
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( [
		'page_title'      => 'Site Settings',
		'menu_title'      => 'Site Settings',
		'position'        => 82,
		'menu_slug'       => 'site-settings',
		'icon_url'        => 'dashicons-admin-generic',
		'autoload'        => true,
		'update_button'   => 'Update Site Settings',
		'updated_message' => 'Site settings updated.',
	] );

	acf_add_options_page( [
		'page_title'      => 'Global Content',
		'menu_title'      => 'Global Content',
		'position'        => 21,
		'menu_slug'       => 'global-content',
		'icon_url'        => 'dashicons-tagcloud',
		'autoload'        => true,
		'update_button'   => 'Update',
		'updated_message' => 'Global content updated.',
	] );
}

