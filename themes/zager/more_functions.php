<?php
define('AUDIO_DIR', ABSPATH . 'audio/');
define('AUDIO_URL', '/audio/');
define('ZAGER_THEME_URL', get_stylesheet_directory_uri() . '/' );
define('ZAGER_THEME_DIR', get_theme_file_path() . '/' );

define('REVIEW_STEP', 5 );


function vd ($data = '') {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

//Get file to buffer
function get_buffered_file ($_file, $data = array(), $once = true) {
	if (!file_exists($_file))
		return '';

	ob_start();

	foreach ( $data as $key => $value ) {
		$$key = $value;
	}

	if ( $once )
		include_once($_file);
	else
		include($_file);

	return ob_get_clean();
}

add_action( 'wp_enqueue_scripts', 'zager_add_scripts' );

function zager_add_scripts() {
	wp_enqueue_style('more_style_css', ZAGER_THEME_URL . 'css/more_style.css');
	wp_register_script('more_script_js', ZAGER_THEME_URL . 'js/more_script.js', 'jquery');
	wp_enqueue_script('more_script_js');
}

global $audio_array;
$audio_array = false;

function get_audio_for_review() {
	global $audio_array;
	if ( false === $audio_array )
		get_all_audio();

	$audio_len = count($audio_array);

	if ( empty($audio_len) )
		return false;

	$random = rand( 0, ($audio_len - 1) );

	$audio = $audio_array[$random];
	unset($audio_array[$random]);
	sort($audio_array);

	return $audio;
}

function get_all_audio () {
	global $audio_array;

	if ( !is_dir(AUDIO_DIR) )
		return [];

	foreach ( scandir(AUDIO_DIR) as $file ) {
		if ( !is_file(AUDIO_DIR . $file) )
			continue;

		$audio_array[] = AUDIO_URL . $file;
	}
}

add_action('wp_ajax_get_reviews', 'get_reviews');
add_action('wp_ajax_nopriv_get_reviews', 'get_reviews');

function get_reviews () {

	$data = [];

	$href = explode('&', trim($_REQUEST['href'], '?') );
	$list = 1;
	$guitar = false;

	foreach ( $href as $r ) {
		$ra = explode('=', $r);

		switch ( $ra[0] ) {
			case 'list':
				$list = intval($ra[1]);
				break;
			case 'guitar':
				if ( !empty($ra[0]) && $ra[0] !== 'all' )
					$guitar = $ra[1];
				break;
		}
	}

	$args = [
		'post_type' 	=> 'customer_review',
		'posts_per_page'=> REVIEW_STEP,
		'offset'		=> ( REVIEW_STEP * ($list - 1) ),
		'orderby'     	=> 'date',
		'order'       	=> 'DESC',
	];

	if ( !empty($guitar) ) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'customer_reviews_category',
				'field' => 'slug',
				'terms' => [$guitar]
			]
		];
	}

	$query = new WP_Query ($args);
	$reviews = $query->posts;

	$total = $query->found_posts;
	$last = intval(floor($total / REVIEW_STEP));

	$data['reviews'] = get_buffered_file(ZAGER_THEME_DIR . 'more-templates/reviews-guitar.php', ['reviews' => $reviews]);
	$data['pagination'] = get_buffered_file(ZAGER_THEME_DIR . 'more-templates/reviews-pagination.php', ['list' => $list, 'last' => $last, 'total' => $total, 'guitar' => $guitar]);

	echo json_encode($data);

	wp_die();
}
