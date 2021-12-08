<?php if ($field['accessory_cards'] || $field['title']): ?>
	<div class="AccessoriesSection AccessoriesSection-gradientBg">
		<div class="Container">
			<div class="AccessoriesSection_wrapper">
				<?php if ($field['title']): ?>
					<h2 class="SectionTitle AccessoriesSection_title">
						<?php echo $field['title'] ?>
					</h2>
				<?php endif ?>
				
				<?php if ($field['accessory_cards']): ?>
					<div class="AccessoriesSwiper AccessoriesSection_swiper swiper">
						<div class="swiper-wrapper">
							<?php foreach ($field['accessory_cards'] as $card_id): ?>
								<?php
									$product = wc_get_product($card_id);
									$thumbnail = get_the_post_thumbnail( $card_id, 'full', array('class' => 'AccessoryCard_img') );
									$product_url = get_permalink($card_id);
								?>

								<div class="swiper-slide AccessoriesSwiper_slide">
									<div class="AccessoryCard AccessoryCard-swiper">

										<?php if ($thumbnail): ?>
											<div class="AccessoryCard_imgWrapper">
												<a href="<?php echo $product_url ?>">
													<?php echo $thumbnail; ?>
												</a>

												<?php	if ( $product->is_on_sale() ) : ?>
													<span class="onsale Tag Tag-accessoryCard AccessoryCard_tag">
														<?php echo esc_html__( 'On sale', 'woocommerce' ) ?>
													</span>
												<?php endif; ?>
											</div>
										<?php endif ?>
										
										<div class="AccessoryCard_textWrapper">
											<h3 class="AccessoryCard_title">
												<a href="<?php echo $product_url ?>">
													<?php echo $product->get_name() ?>
												</a>
											</h3>

											<div class="AccessoryCard_price">
												<?php echo $product->get_price_html() ?>
											</div>

											<!-- <a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a> -->

											<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-outline-primary BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart">
												<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
											</button>

											<a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="<?php echo $product_url ?>">view details</a>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							
						</div>
					</div>

					<button class="SwiperBtn SwiperBtn-next AccessoriesSection_next" type="button"></button>
					<button class="SwiperBtn SwiperBtn-prev AccessoriesSection_prev" type="button"></button>
					
					<div class="SwiperControls">
						<div class="SwiperPagination SwiperControls_pagination hidden-xs"></div>
						<a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-more" href="/accessories.html">see all accessories</a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php endif ?>
