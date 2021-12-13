<?php
define('AUDIO_DIR', ABSPATH . 'audio/');
define('AUDIO_URL', '/audio/');
define('ZAGER_THEME_URL', get_stylesheet_directory_uri() . '/' );

function vd ($data = '') {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

add_action( 'wp_enqueue_scripts', 'zager_add_scripts' );

function zager_add_scripts() {
	wp_enqueue_style('more_style_css', ZAGER_THEME_URL . 'css/more_style.css');
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
