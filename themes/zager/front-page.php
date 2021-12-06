<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<main class="Main">

		<?php render_page_layouts(get_field('page_blocks')); ?>

	</main><!-- #main -->

<?php
get_footer();

get_template_part( 'partials/page-blocks', 'footer' );
