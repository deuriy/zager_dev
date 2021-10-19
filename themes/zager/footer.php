<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer bg-dark text-light py-3" id="colophon">

		<div class="container">

			<div class="row">

				<div class="col-md-6">

					<?php $business_details = get_field( 'business_details', 'options' ); ?>

					<?php if( isset( $business_details['business_name'] ) ) : ?>
						<h1><?php echo $business_details['business_name']; ?></h1>
					<?php endif; ?>

					<?php if( isset( $business_details['phone'] ) ) : ?>
						<a href="tel:<?php echo esc_attr( $business_details['phone'] ); ?>" class="phone"><span class="sr-only">Phone: </span><?php echo $business_details['phone']; ?></a>
					<?php endif; ?>
					<?php if( isset( $business_details['fax'] ) ) : ?>
						<a href="fax:<?php echo esc_attr( $business_details['fax'] ); ?>" class="fax"><span class="sr-only">Fax: </span><?php echo $business_details['fax']; ?></a>
					<?php endif; ?>
					<?php if( isset( $business_details['email'] ) ) : ?>
						<a href="mailto:<?php echo esc_attr( $business_details['email'] ); ?>" class="email"><span class="sr-only">Email: </span><?php echo $business_details['email']; ?></a>
					<?php endif; ?>

					<address>
						<?php if( isset( $business_details['street_address']['address_line_1'] ) ) : ?>
							<div class="address-line-1"><?php echo $business_details['street_address']['address_line_1']; ?></div>
						<?php endif; ?>
						<?php if( isset( $business_details['street_address']['address_line_2'] ) ) : ?>
							<div class="address-line-2"><?php echo $business_details['street_address']['address_line_2']; ?></div>
						<?php endif; ?>
						<?php if( isset( $business_details['street_address']['city'] ) ) : ?>
							<div class="address-line-2"><?php echo $business_details['street_address']['city']; ?></div>
						<?php endif; ?>
						<?php if( isset( $business_details['street_address']['postal_code'] ) ) : ?>
							<div class="address-line-2"><?php echo $business_details['street_address']['postal_code']; ?></div>
						<?php endif; ?>
						<?php if( isset( $business_details['street_address']['province'] ) ) : ?>
							<div class="address-line-2"><?php echo $business_details['street_address']['province']; ?></div>
						<?php endif; ?>
					</address>

				</div><!--col end -->

				<div class="col-md-6">

					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container'       => 'nav',
							'container_class' => 'nav',
							'container_id'    => 'footer-nav',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu',
							'depth'           => 1,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>

					<?php $social_media = get_field( 'social_media', 'option' ); ?>

					<?php if( $social_media ) : ?>
						<ul class="social-media">
							<?php foreach( $social_media as $social ) : ?>
								<li><a href="<?php echo esc_attr( $social['link'] ); ?>" target="_blank" rel="noreferrer noopener"><span class="sr-only"><?php echo $social['link_title']; ?></span><?php echo get_fa_icon_as_svg( $social['icon'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

				</div>

			</div><!-- row end -->

		</div><!-- container end -->

	</footer><!-- #colophon -->

	<div class="site-info small text-light bg-dark py-3">

		<div class="container">

			<div class="row">

				<div class="col-md-12 text-center">

					<?php understrap_site_info(); ?>

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

