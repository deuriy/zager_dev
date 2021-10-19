<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'partials/banner', 'page' );

$headline = get_field( '404_headline', 'option' );
$content  = get_field( '404_content', 'option' );

if( '' === $headline ) {
	$headline = 'Oops! That page can&rsquo;t be found.';
}

if( '' === $content ) {
	$content  = 'It looks like nothing was found at this location. Maybe try one of the links below or a search?';
}

?>

<div class="wrapper py-4" id="error-404-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php echo $headline; ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php echo $content; ?></p>

							<?php get_search_form(); ?>

							<?php if( have_rows('404_buttons', 'options') ): ?>
								<div class="buttons my-4">
								<?php while( have_rows('404_buttons', 'options') ): the_row(); ?>
									<?php
									$link = get_sub_field('button');
									if( $link ) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self'
										?>
										<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="btn btn-primary"><?php echo $link_title; ?></a>
									<?php endif; ?>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
