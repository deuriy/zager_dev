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


add_action( 'wp_ajax_get_artist_reviews', 'get_artist_reviews' );
add_action( 'wp_ajax_nopriv_get_artist_reviews', 'get_artist_reviews' );
function get_artist_reviews() {
	$page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;
	$posts_per_page = 9;
  $current_page = $page;
  $page -= 2;

	$excluded_reviews_ids = isset($_POST['excluded_reviews_ids']) ? $_POST['excluded_reviews_ids'] : [];

  $offset = $page * $posts_per_page;

	$all_reviews_query = array_merge(array(
		'post_status' => 'publish',
		'post_type' => 'artist_review',
		'posts_per_page' => -1,
	));

	$all_reviews_wp_query = new WP_Query($all_reviews_query);
	$reviews_count = $all_reviews_wp_query->post_count;

	$query = array_merge(array(
    'post_status' => 'publish',
    'post_type' => 'artist_review',
    'posts_per_page' => $posts_per_page,
    'offset' => $offset,
    'post__not_in' => $excluded_reviews_ids,
	));

	$wpquery = new WP_Query($query);

	if ($wpquery->have_posts()) {
		while ($wpquery->have_posts()) {
			$wpquery->the_post();

			get_template_part( 'loop-templates/content', 'artist-review' );
		}

		wp_reset_postdata();
	}

	$pages_count = ceil($reviews_count / $posts_per_page);

  if ($pages_count != $current_page) {
  	echo '<div class="LoadingPosts LoadingPosts-center"><a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a></div>';
  }

	wp_die();
}