<div class="Series">
  <div class="Container">
    <div class="Series_wrapper">
    	<?php if ($field['title']): ?>
	      <h2 class="SectionTitle SectionTitle-large Series_title">
	      	<?php echo $field['title'] ?>
	      </h2>
    	<?php endif ?>

    	<?php if ($field['tags']): ?>
    		<ul class="Tags Series_tags">
    			<?php foreach ($field['tags'] as $index => $tag): ?>
    				<?php
    					$label_classes = $index !== 0 ? ' Label-lightBeigeBg' : '';
    				?>

    				<li class="Tags_item">
    					<span class="Label Label-large<?php echo $label_classes ?>">
    						<?php echo $tag['tag'] ?>
    					</span>
    				</li>
    			<?php endforeach ?>
    		</ul>
    	<?php endif ?>

    	<?php
    		$quote_block = $field['quote_block_type'] === 'default' ? get_field('quote_block', 'option') : $field['quote_block'];
    		$quote_css_class = $quote_block['text_background_style'] === 'dark' ? ' Quote-greyBg' : '';
    	?>

    	<?php if ($quote_block['text'] || $quote_block['author']): ?>
        <div class="Quote Quote-inlineDesktop Series_quote<?php echo $quote_css_class; ?>">
          <?php if ($quote_block['text']): ?>
            <div class="Quote_text">
              <?php echo $quote_block['text'] ?>
            </div>
          <?php endif ?>

          <?php if ($quote_block['author']): ?>
            <div class="Quote_author">
              <?php echo $quote_block['author'] ?>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>

      <?php if ($field['description']): ?>
      	<div class="Series_description">
      		<?php echo $field['description'] ?>
      	</div>
      <?php endif ?>
    </div>

    <?php if ($field['series_tiles']): ?>
    <div class="ProductCardsSwiper Series_productCardsSwiper swiper hidden-smPlus">
      <div class="swiper-wrapper">
	    	<?php foreach ($field['series_tiles'] as $id): ?>
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
	    					<?php if ($product_image || $additional_labels): ?>
                  <div class="ProductCard_imgWrapper">
                    <?php if ($product_image): ?>
                      <?php echo $product_image ?>
                    <?php endif ?>

                    <?php if ($additional_labels): ?>
                      <?php foreach ($additional_labels as $additional_label): ?>
                        <?php if ($additional_label['value'] == 'special_addition'): ?>
                          <span class="Label Label-productCard ProductCard_label">
                            <?php echo $additional_label['label'] ?>
                          </span>
                        <?php endif ?>

                        <?php if ($additional_label['value'] == 'save'): ?>
                          <?php
                            $discount = get_field('discount', $id);
                          ?>
                          <span class="Tag Tag-productCard ProductCard_tag">
                            <?php echo $additional_label['label'] . ' ' . $discount . '%' ?>
                          </span>
                        <?php endif ?>
                      <?php endforeach ?>
                    <?php endif ?>
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

    <div class="ProductCards hidden-xs">
      <div class="ProductCards_wrapper">
      	<?php foreach ($field['series_tiles'] as $id): ?>
      		<?php
      			$product = wc_get_product($id);
            $product_image = $product->get_image('product-card', array('class' => 'ProductCard_img'));
            $product_attributes = $product->get_attributes();
            $product_url = get_permalink($id);
            $additional_labels = get_field('additional_labels', $id);
            $additional_classes = $product->get_type() == 'variable' ? ' ProductCard-extended' : '';
      		?>

      		<div class="ProductCard ProductCards_item">
	          <div class="ProductCard_wrapper">
	            <?php if ($product_image || $additional_labels): ?>
                <div class="ProductCard_imgWrapper">
                  <?php if ($product_image): ?>
                    <?php echo $product_image ?>
                  <?php endif ?>

                  <?php if ($additional_labels): ?>
                    <?php foreach ($additional_labels as $additional_label): ?>
                      <?php if ($additional_label['value'] == 'special_addition'): ?>
                        <span class="Label Label-productCard ProductCard_label">
                          <?php echo $additional_label['label'] ?>
                        </span>
                      <?php endif ?>

                      <?php if ($additional_label['value'] == 'save'): ?>
                        <?php
                          $discount = get_field('discount', $id);
                        ?>
                        <span class="Tag Tag-productCard ProductCard_tag">
                          <?php echo $additional_label['label'] . ' ' . $discount . '%' ?>
                        </span>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endif ?>
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

	              <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">View options and features</a>
	            </div>
	          </div>
	        </div>
      	<?php endforeach ?>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>