<?php
/**
 * Template Name: Block Layout Page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main class="Main">

  <?php
    $layouts = get_field('page_blocks');

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
    ?>

</main><!-- #main -->

<?php
    get_footer();