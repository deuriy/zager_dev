<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main class="Main">

  <?php render_page_layouts(get_field('404_page_blocks', 'options')); ?>

</main><!-- #main -->

<?php
get_footer();

get_template_part( 'partials/page-blocks', 'footer' );
