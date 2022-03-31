<?php
/**
 * Partial template for content in page.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('Article'); ?> id="post-<?php the_ID(); ?>">

	<div class="Container">

		<?php 
			the_title('<h1 class="SectionTitle Article_title">', '</h1>')
		?>

		<div class="Article_content entry-content clearfix">

			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)
				);
			?>

		</div><!-- .entry-content -->

		<footer class="Article_footer entry-footer">

			<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>', get_the_ID(), 'BtnYellow' ); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
