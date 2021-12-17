<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Create function to add ACF Options page at wp-admin. Should be modified for general purposes
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title'      => 'Site Settings',
		'menu_title'      => 'Site Settings',
		'position'        => 82,
		'menu_slug'       => 'site-settings',
		'icon_url'        => 'dashicons-admin-generic',
		'autoload'        => true,
		'update_button'   => 'Update Site Settings',
		'updated_message' => 'Site settings updated.',
	]);
}

if ( !function_exists('is_empty') ) {
	function is_empty($var) {
	  return !empty($var);
	}
}

function render_page_layouts($layouts) {
	if ($layouts) {
		foreach ($layouts as $key => $layout) {
			$layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
			$template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
			if ($template) {
				$field = $layout; // Change layout to a friendly name.
				$field_key = $key;
				include($template); // if locate_template returns false, include(false) will throw an error
			}
		}
	}
}

function zager_time_ago() {
	return human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

function count_rating() {

}