<?php
/**
 * The blog template file.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

?>

<div class="wrapper py-4" id="shop-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<?php get_template_part( 'sidebar-templates/sidebar', 'shop' ); ?>

			<div class="content-area" id="primary">

				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

				<main class="site-main" id="main">
					<?php woocommerce_content(); ?>
				</main><!-- #main -->

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

			</div><!-- #primary -->

		</div><!-- #row -->

	</div><!-- #content -->

</div><!-- #blog-wrapper -->

<?php get_footer( 'shop' ); ?>
