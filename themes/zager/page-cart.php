<?php
/*
Template Name: Cart Page Template
*/

// Exit if accessed directly.
get_header();
?>

<main class="Main">
	<div class="Product Product-cartPage" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="Product_wrapper">
			<div class="Product_content">
				<div class="Container Container-cart">
					<h2 class="SectionTitle SectionTitle-cartPage Product_title"><?php the_title(); ?></h2>

					<?php the_content(); ?>

					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						)
					);
					?>

				</div><!-- .entry-content -->
			</div>

			<!-- <footer class="entry-footer"> -->

				<div class="Sidebar Sidebar-product Product_sidebar hidden-smMinus">
					<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

				<!-- </footer> --><!-- .entry-footer -->
			</div>
		</div><!-- #post-## -->
	</main>

	<?php get_footer(); ?>
