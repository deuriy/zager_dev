<?php
	global $post;
?>

<?php if ($field['group']): ?>
	<div class="ProductCardsSection">
	  <div class="Container">
	    <div class="ProductCardsSection_groups">
	    	<?php foreach ($field['group'] as $group): ?>
		      <div class="ProductCardsGroup ProductCardsSection_group">
		      	<?php if ($group['title']): ?>
			        <h3 class="ProductCardsGroup_title">
			        	<?php echo $group['title'] ?>
			        </h3>
		      	<?php endif ?>

		      	<?php if ($group['cards']): ?>
			        <div class="ProductCardsSwiper ProductCardsGroup_swiper swiper hidden-mdPlus">
			          <div class="swiper-wrapper">
			          	<?php foreach ($group['cards'] as $id): ?>
			          		<?php
			                $product = wc_get_product($id);
			                $product_image = $product->get_image('product-card', array('class' => 'ProductCard_img'));
			                $product_attributes = $product->get_attributes();
			                $product_url = get_permalink($id);
			                $additional_labels = get_field('additional_labels', $id);
			                $additional_classes = $product->get_type() == 'variable' ? ' ProductCard-extended' : '';
			              ?>

				            <div class="swiper-slide ProductCardsSwiper_slide">
				              <div class="ProductCard">
				                <div class="ProductCard_wrapper">
				                	<?php if ($product_image || $product->is_on_sale()):?>
					                  <div class="ProductCard_imgWrapper">
					                  	<?php if ($product_image): ?>
			                          <?php echo $product_image ?>
			                        <?php endif ?>

					                  	<?php if ( $product->is_on_sale() ) : ?>

																<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="Tag Tag-stars ProductCard_tag ProductCard_tag-topLeft">' . esc_html__( 'On sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

															<?php endif; ?>
					                  </div>
					                <?php endif ?>

				                  <div class="ProductCard_textWrapper">
				                    <h3 class="ProductCard_title">
			                        <?php echo $product->get_name() ?>
			                      </h3>

			                      <?php if ($product_attributes): ?>
			                        <div class="ProductCard_tags">
			                          <div class="ProductCard_tagsLabel">Available in</div>
			                          <ul class="ProductCard_tagsList">
			                            <?php foreach ($product_attributes as $key => $value): ?>
			                              <?php foreach (wc_get_product_terms($id, $key) as $term): ?>
			                                <li class="ProductCard_tagsItem">
			                                  <span class="CategoryTag CategoryTag-productCard">
			                                    <?php echo $term->name; ?>
			                                  </span>
			                                </li>
			                              <?php endforeach; ?>
			                            <?php endforeach; ?>
			                          </ul>
			                        </div>
			                      <?php endif ?>

				                    <div class="ProductCard_priceFrom">
			                        <?php echo $product->get_price_html() ?>
			                      </div>

			                      <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">
			                        View options
			                      </a>
				                  </div>
				                </div>
				              </div>
				            </div>
			          	<?php endforeach ?>
			          </div>
			        </div>

			        <div class="ProductCardsGroup_items hidden-smMinus">
			        	<?php foreach ($group['cards'] as $id): ?>
			        		<?php
		                $product = wc_get_product($id);
		                $product_image = $product->get_image('product-card', array('class' => 'ProductCard_img'));
		                $product_attributes = $product->get_attributes();
		                $product_url = get_permalink($id);
		                $additional_labels = get_field('additional_labels', $id);
		                $additional_classes = $product->get_type() == 'variable' ? ' ProductCard-extended' : '';
		              ?>

				          <div class="ProductCard ProductCard-group ProductCardsGroup_item">
				            <div class="ProductCard_wrapper">
				              <?php if ($product_image || $product->is_on_sale()):?>
			                  <div class="ProductCard_imgWrapper">
			                  	<?php if ($product_image): ?>
	                          <?php echo $product_image ?>
	                        <?php endif ?>

			                  	<?php if ( $product->is_on_sale() ) : ?>

														<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="Tag Tag-stars ProductCard_tag ProductCard_tag-topLeft">' . esc_html__( 'On sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

													<?php endif; ?>
			                  </div>
			                <?php endif ?>

				              <div class="ProductCard_textWrapper">
				                <h3 class="ProductCard_title">
	                        <?php echo $product->get_name() ?>
	                      </h3>

	                      <?php if ($product_attributes): ?>
	                        <div class="ProductCard_tags">
	                          <div class="ProductCard_tagsLabel">Available in</div>
	                          <div class="TagLinks ProductCard_tagLinks">
		                          <ul class="TagLinks_list">
		                            <?php foreach ($product_attributes as $key => $value): ?>
		                              <?php foreach (wc_get_product_terms($id, $key) as $term): ?>
		                                <li class="TagLinks_item">
		                                  <span class="TagLink TagLinks_link">
		                                    <?php echo $term->name; ?>
		                                  </span>
		                                </li>
		                              <?php endforeach; ?>
		                            <?php endforeach; ?>
		                          </ul>
	                          </div>
	                        </div>
	                      <?php endif ?>

				                <div class="ProductCard_priceFrom">
	                        <?php echo $product->get_price_html() ?>
	                      </div>

				                <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">
	                        View options
	                      </a>
				              </div>
				            </div>
				          </div>
			        	<?php endforeach ?>
			        </div>
		      	<?php endif ?>
		      </div>
	    	<?php endforeach ?>
	    </div>
	  </div>
	</div>
<?php endif ?>