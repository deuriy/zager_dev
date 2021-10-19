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

get_template_part( 'partials/banner', get_post_type() );

?>

<div class="wrapper py-4" id="post-wrapper">

	<div class="container-fluid px-0" id="content" tabindex="-1">

		<main class="site-main" id="main">

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

	</div><!-- #content -->

</div><!-- #post-wrapper -->

<?php
get_footer();
