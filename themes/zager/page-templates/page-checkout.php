<?php
/*
Template Name: Checkout Page Template
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main class="Main">

	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'loop-templates/content', 'page-checkout' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	?>

</main><!-- #main -->

<?php
get_footer();
