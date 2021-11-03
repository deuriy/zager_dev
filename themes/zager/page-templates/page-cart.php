<?php
/*
Template Name: Cart Page Template
*/

// Exit if accessed directly.
get_header();

$layouts = get_field('page_blocks');

if ($layouts) {
	$before_content_blocks = [];
	$after_content_blocks = [];
	$bottom_blocks = [];

	foreach ($layouts as $layout) {
		switch ($layout['block_position']) {
			case 'before_content':
			$before_content_blocks[] = $layout;
			break;
			case 'after_content':
			$after_content_blocks[] = $layout;
			break;
			case 'bottom':
			$bottom_blocks[] = $layout;
			break;
		}
	}
}
?>

<main class="Main">
	<div class="Product Product-cartPage" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="Product_wrapper">
			<div class="Product_content">
				<div class="Container Container-cart">
					<h2 class="SectionTitle SectionTitle-cartPage Product_title">
						<?php the_title(); ?>
					</h2>
					
					<?php render_page_layouts($before_content_blocks); ?>

					<?php the_content(); ?>

					<?php render_page_layouts($after_content_blocks); ?>
				</div><!-- .entry-content -->
			</div>

			<div class="Sidebar Sidebar-cartPage Product_sidebar">
				<?php //edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
				<div class="Shipping Sidebar_shipping">
					<h3 class="Shipping_title">Shipping</h3>
					<div class="Shipping_type">Free</div>
					<div class="Shipping_text">
						<p>Free Shipping - 52 year anniversary sale!</p>
					</div>
				</div>
				<?php
				// global $woocommerce;
				// $amount2 = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
				?>
				<div class="SubTotal Sidebar_subTotal">
					<div class="SubTotal_label">Sub total</div>
					<div class="SubTotal_cost">$2,595</div>
					<div class="SubTotal_cost"><?php //echo $amount2 ?></div>
				</div>
				<div class="Sidebar_checkoutBtnWrapper">
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward BtnYellow BtnYellow-cartSidebar">
						<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
					</a>
				</div>
				<div class="PaymentMethods Sidebar_paymentMethods">
					<img src="<?php echo get_template_directory_uri(); ?>/images/payment_methods.webp" alt="" class="PaymentMethods_img">
					<div class="PaymentMethods_text">
						<p>We accept all major payment methods</p>
					</div>
				</div>
				<div class="FinancingPurchase">
					<div class="FinancingPurchase_text">
						<strong>Finance this purchase</strong>
					</div>
					<div class="FinancingPurchase_textAndLogo">
						<div class="FinancingPurchase_text">
							Starting at <strong>$72/mo</strong> with
						</div>
						<img src="<?php echo get_template_directory_uri(); ?>/images/affirm_logo.svg" alt="">
					</div>
					<a href="#" class="BtnGrey BtnGrey-totalPrice FinancingPurchase_prequalifyBtn">Prequalify now</a>
				</div>
			</div>
		</div>

		<?php render_page_layouts($bottom_blocks); ?>
		<div class="AccessoriesSection AccessoriesSection-gradientBg">
			<div class="Container">
				<div class="AccessoriesSection_wrapper">
					<h2 class="SectionTitle AccessoriesSection_title">Don’t forget your accessories</h2>
					<div class="AccessoriesSwiper AccessoriesSection_swiper swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide AccessoriesSwiper_slide">
								<div class="AccessoryCard AccessoryCard-swiper">
									<div class="AccessoryCard_imgWrapper"><img class="AccessoryCard_img" src="<?php echo get_template_directory_uri(); ?>/img/accessory_img_2.webp" alt="Accessory"><span class="Tag Tag-accessoryCard AccessoryCard_tag">On sale</span></div>
									<div class="AccessoryCard_textWrapper">
										<h3 class="AccessoryCard_title">Zager Professional Capo</h3>
										<div class="AccessoryCard_price">$39.00</div><a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a><a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="#">view details</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide AccessoriesSwiper_slide">
								<div class="AccessoryCard AccessoryCard-swiper">
									<div class="AccessoryCard_imgWrapper"><img class="AccessoryCard_img" src="<?php echo get_template_directory_uri(); ?>/img/accessory_img_3.webp" alt="Accessory"></div>
									<div class="AccessoryCard_textWrapper">
										<h3 class="AccessoryCard_title">Zager High Accuracy Sonic Guitar Tuner</h3>
										<div class="AccessoryCard_price">$39.00</div><a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a><a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="#">view details</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide AccessoriesSwiper_slide">
								<div class="AccessoryCard AccessoryCard-swiper">
									<div class="AccessoryCard_imgWrapper"><img class="AccessoryCard_img" src="<?php echo get_template_directory_uri(); ?>/img/accessory_img_1.webp" alt="Accessory"></div>
									<div class="AccessoryCard_textWrapper">
										<h3 class="AccessoryCard_title">1/4 inch Amplifier Cable</h3>
										<div class="AccessoryCard_price">$39.00</div><a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a><a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="#">view details</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide AccessoriesSwiper_slide">
								<div class="AccessoryCard AccessoryCard-swiper">
									<div class="AccessoryCard_imgWrapper"><img class="AccessoryCard_img" src="<?php echo get_template_directory_uri(); ?>/img/accessory_img_1.webp" alt="Accessory"></div>
									<div class="AccessoryCard_textWrapper">
										<h3 class="AccessoryCard_title">1/4 inch Amplifier Cable</h3>
										<div class="AccessoryCard_price">$39.00</div><a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a><a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="#">view details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button class="SwiperBtn SwiperBtn-next AccessoriesSection_next" type="button"></button>
					<button class="SwiperBtn SwiperBtn-prev AccessoriesSection_prev" type="button"></button>
					<div class="SwiperControls">
						<div class="SwiperPagination SwiperControls_pagination hidden-xs"></div><a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-more" href="/accessories.html">see all accessories</a>
					</div>
				</div>
			</div>
		</div>
		<div class="NewsLetter" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg_newsletter.webp')">
			<div class="Container">
				<h2 class="SectionTitle SectionTitle-lightBeige SectionTitle-center NewsLetter_title">Join the news letter to get <span class="Yellow">5% OFF</span></h2>
				<form class="SubscribeForm NewsLetter_form">
					<input class="FormText SubscribeForm_textInput" type="email" name="email" placeholder="Email address">
					<button class="BtnYellow BtnYellow-email SubscribeForm_submitBtn" type="submit">Join</button>
				</form>
				<div class="IconsAndTexts NewsLetter_iconsAndTexts">
					<div class="IconsAndTexts_wrapper">
						<div class="IconAndText IconsAndTexts_item">
							<div class="CircleIcon IconAndText_icon"><img class="CircleIcon_img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/advantages/guitar.svg" alt="Guitar"></div>
							<h3 class="IconAndText_title">Easier playability</h3>
							<div class="IconAndText_text">move faster and play longer <br class="hidden-smMinus">with less &nbsp;finger pain and <br class="hidden-smMinus">soreness. </div>
						</div>
						<div class="IconAndText IconsAndTexts_item">
							<div class="CircleIcon IconAndText_icon"><img class="CircleIcon_img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/advantages/percent.svg" alt="Percent"></div>
							<h3 class="IconAndText_title">Lower price save 50%</h3>
							<div class="IconAndText_text">buying direct from the builder avoiding the retail store price mark up</div>
						</div>
						<div class="IconAndText IconsAndTexts_item">
							<div class="CircleIcon IconAndText_icon"><img class="CircleIcon_img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/advantages/star.svg" alt="Star"></div>
							<h3 class="IconAndText_title">#1 rated components</h3>
							<div class="IconAndText_text">hand made solid wood guitars <br class="hidden-smMinus">w/ bone nuts, Fishman <br class="hidden-smMinus">electronics</div>
						</div>
						<div class="IconAndText IconsAndTexts_item">
							<div class="CircleIcon IconAndText_icon"><img class="CircleIcon_img" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/advantages/money.svg" alt="Money"></div>
							<h3 class="IconAndText_title">100% money back guarantee</h3>
							<div class="IconAndText_text">including shipping both ways meaning you can try 1 risk free.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #post-## -->
</main>

<?php get_footer(); ?>
