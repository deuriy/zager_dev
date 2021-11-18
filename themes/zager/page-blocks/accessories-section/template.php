<?php
	// print '<pre>';
	// print_r($field);
	// print '</pre>';
?>

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
							<?php foreach ($field['accessory_cards'] as $accessory_card): ?>
								<?php
									$product_obj = wc_get_product($accessory_card->ID);
									$thumbnail = get_the_post_thumbnail( $accessory_card->ID, 'full', array('class' => 'AccessoryCard_img') );
									$url = get_the_permalink($accessory_card->ID);
								?>

								<div class="swiper-slide AccessoriesSwiper_slide">
									<div class="AccessoryCard AccessoryCard-swiper">

										<?php if ($thumbnail): ?>
											<div class="AccessoryCard_imgWrapper">
												<?php echo $thumbnail ?>
												<span class="Tag Tag-accessoryCard AccessoryCard_tag">On sale</span>
											</div>
										<?php endif ?>
										
										<div class="AccessoryCard_textWrapper">
											<?php if ($accessory_card->post_title): ?>
												<h3 class="AccessoryCard_title">
													<?php echo $accessory_card->post_title ?>
												</h3>
											<?php endif ?>


											<div class="AccessoryCard_price">$39.00</div>
											<a class="BtnYellow BtnYellow-accessoryCard AccessoryCard_btn AccessoryCard_btn-addToCart" href="#">Add to cart</a>
											<a class="BtnOutline BtnOutline-lightBeigeBg BtnOutline-darkText BtnOutline-accessoryCard AccessoryCard_btn hidden-xs" href="#">view details</a>
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
