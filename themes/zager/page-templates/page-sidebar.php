<?php
/**
 * Template Name: Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'partials/banner', 'page' );

?>

<div class="wrapper py-4" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<?php get_template_part( 'sidebar-templates/sidebar', 'page' ); ?>

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->


<?php
get_footer();
