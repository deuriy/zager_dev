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

  <?php render_page_layouts(get_field('page_blocks')); ?>

</main><!-- #main -->

<?php

get_footer();

get_template_part( 'partials/page-blocks', 'footer' );

