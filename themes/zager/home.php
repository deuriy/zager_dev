<?php
/**
 * The blog template file.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

get_template_part( 'partials/banner', 'home' );

?>

<div class="wrapper py-4" id="blog-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<?php get_template_part( 'sidebar-templates/sidebar', 'post' ); ?>

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<div class="row">

						<?php if ( have_posts() ) : ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'partials/post', 'card-masonry' ); ?>

							<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>

					</div><!-- .row -->

					<div class="row">

						<div class="col-12 text-center">

							<div class="pagination mt-2 justify-content-center">

								<?php echo understrap_pagination( $args = array(), $class = 'pagination' ); ?>

							</div>

						</div>

					</div><!-- .row -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #blog-wrapper -->

<?php get_footer(); ?>
