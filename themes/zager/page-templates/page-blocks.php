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

  <?php get_template_part( 'partials/flexible_layouts' ); ?>

</main><!-- #main -->

<?php
    get_footer();