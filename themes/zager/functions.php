<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$understrap_includes = array(
    '/setup.php',                           // Theme setup and custom theme supports.
    '/widgets.php',                         // Register widget area.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/template-tags.php',                   // Custom template tags for this theme.
    '/pagination.php',                      // Custom pagination for this theme.
    '/hooks.php',                           // Custom hooks.
    '/extras.php',                          // Custom functions that act independently of the theme templates.
    '/customizer.php',                      // Customizer additions.
    '/custom-comments.php',                 // Custom Comments file.
    '/jetpack.php',                         // Load Jetpack compatibility file.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
    '/class-wp-primary-navwalker.php',
    '/class-wp-secondary-navwalker.php',
    '/woocommerce.php',                     // Load WooCommerce functions.
    '/editor.php',                          // Load Editor functions.
    '/acf.php',                          	// Load ACF field groups.
);

foreach ($understrap_includes as $file) {
    $file_path = get_template_directory() . '/inc' . $file;

    if (file_exists($file_path)) {
        require_once $file_path;
    }
}

$understrap_includes = array(
    '',
);

foreach ($understrap_includes as $file) {
    $file_path = get_template_directory() . '/post-types' . $file;

    if (file_exists($file_path)) {
        require_once $file_path;
    }
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