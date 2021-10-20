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

get_template_part( 'partials/banner', 'front-page' );

?>
	<main class="Main">

		<?php
			$layouts = get_field('page_blocks');

			if ($layouts) {
					foreach ($layouts as $layout) {
							$layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
							$template = locate_template('page-blocks/'.$layout_name.'/template.php', false, false);
							if ($template) {
									$field = $layout; // Change layout to a friendly name.
									include($template); // if locate_template returns false, include(false) will throw an error
							}
					}
			}
		?>

	</main><!-- #main -->

<?php
get_footer();
