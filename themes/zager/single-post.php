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

	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'loop-templates/content', 'single' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			echo '<div class="container">';
			comments_template();
			echo '</div>';
		}
	}
	?>

</main><!-- #main -->

<?php
get_footer();
