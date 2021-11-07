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

	acf_add_options_page([
		'page_title'      => 'Global Content',
		'menu_title'      => 'Global Content',
		'position'        => 21,
		'menu_slug'       => 'global-content',
		'icon_url'        => 'dashicons-tagcloud',
		'autoload'        => true,
		'update_button'   => 'Update',
		'updated_message' => 'Global content updated.',
	]);
}

function render_page_layouts($layouts) {
	if ($layouts) {
		foreach ($layouts as $layout) {
			$layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
			$template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
			if ($template) {
				$field = $layout; // Change layout to a friendly name.
				include($template); // if locate_template returns false, include(false) will throw an error
			}
		}
	}
}

function display_product_tabs() {
	$selected_product_tabs = get_field('display_product_tabs');

	if ($selected_product_tabs):
		$product_tabs = [
			'features' => [
				'title' => get_field('override_features_tab_title') === 'yes' ? get_field('features_tab_title') : 'Features',
				'fields' => get_field('features_tab_blocks')
			],
			'specifications' => [
				'title' => get_field('override_specifications_tab_title') === 'yes' ? get_field('specifications_tab_title') : 'Specifications',
				'fields' => get_field('specifications_tab_blocks')
			],
			'finance' => [
				'title' => get_field('override_finance_tab_title') === 'yes' ? get_field('finance_tab_title') : 'Finance',
				'fields' => get_field('finance_tab_blocks')
			],
			'faq' => [
				'title' => get_field('override_faq_tab_title') === 'yes' ? get_field('faq_tab_title') : 'FAQ',
				'fields' => get_field('faq_tab_blocks')
			]
		];
		?>

		<div class="Tabs Tabs-defaultStyle Tabs-product Product_tabs hidden-xs">
			<ul class="Tabs_list">
				<?php foreach ($selected_product_tabs as $key => $selected_tab): ?>
					<li class="Tabs_item<?php echo $key === 0 ? ' Tabs_item-active' : '' ?>">
						<?php echo $product_tabs[$selected_tab]['title'] ?>
					</li>
				<?php endforeach ?>
			</ul>

			<div class="Tabs_container">
				<?php foreach ($selected_product_tabs as $key => $selected_tab): ?>
					<div class="Tabs_content<?php echo $key === 0 ? ' Tabs_content-active' : '' ?>">
						<?php
						$selected_tab_fields = $product_tabs[$selected_tab]['fields'];
						render_page_layouts($selected_tab_fields);
						?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif;
}

function zager_time_ago() {
	return human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}