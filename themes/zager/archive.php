<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'partials/banner', 'archive' );

?>

<div class="wrapper py-4" id="blog-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<?php get_template_part( 'sidebar-templates/sidebar', get_post_type() ); ?>

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<div class="row">

							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header -->

						</div>

						<div class="row">
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'partials/post', 'card-masonry' ); ?>

							<?php endwhile; ?>
						</div>

					<?php else: ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<div class="row">

						<div class="col-12 text-center">

							<div class="pagination mt-2 justify-content-center">

								<?php echo understrap_pagination( $args = array(), $class = 'pagination' ); ?>

							</div>

						</div>

					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- #row -->

	</div><!-- #content -->

</div><!-- #blog-wrapper -->

<?php
get_footer();
