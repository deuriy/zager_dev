<?php
/**
 * Template Name: Block Layout Page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper py-4" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row primary-content-wrapper">

			<div class="content-area" id="primary">

				<main class="site-main" id="main">

					<?php
					$layouts = get_field('page_blocks'); // get the entire flex field

					if ( $layouts ) {
						foreach ( $layouts as $layout ) {
							$layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
							$template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
							if ($template) {
								$field = $layout; // Change layout to a friendly name.
								include( $template ); // if locate_template returns false, include(false) will throw an error
							}
						} // end foreach layout
					} // end if layouts
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
