<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper py-4" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<header class="page-header author-header">

						<?php
						if ( get_query_var( 'author_name' ) ) {
							$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
						} else {
							$curauth = get_userdata( intval( $author ) );
						}
						?>

						<h1><?php echo esc_html__( 'About:', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?></h1>

						<?php
						if ( ! empty( $curauth->ID ) ) {
							echo get_avatar( $curauth->ID );
						}
						?>

						<?php if ( ! empty( $curauth->user_url ) || ! empty( $curauth->user_description ) ) : ?>
							<dl>
								<?php if ( ! empty( $curauth->user_url ) ) : ?>
									<dt><?php esc_html_e( 'Website', 'understrap' ); ?></dt>
									<dd>
										<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
									</dd>
								<?php endif; ?>

								<?php if ( ! empty( $curauth->user_description ) ) : ?>
									<dt><?php esc_html_e( 'Profile', 'understrap' ); ?></dt>
									<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
								<?php endif; ?>
							</dl>
						<?php endif; ?>

						<h2><?php echo esc_html__( 'Posts by', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?>:</h2>

					</header><!-- .page-header -->

					<div class="row">
						<?php if ( have_posts() ) : ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'partials/post', 'card-masonry' ); ?>

							<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>
					</div>

					<div class="row">

					<div class="col-12 text-center">

						<div class="pagination mt-2 justify-content-center">

							<?php echo understrap_pagination( $args = array(), $class = 'pagination' ); ?>

						</div>

					</div>

					</div>

				</main><!-- #main -->


			</div> <!-- #primary -->

		</div> <!-- .row -->

	</div><!-- #content -->

</div><!-- #author-wrapper -->

<?php
get_footer();
