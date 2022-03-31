<div class="Products">
  <div class="Container">
    <div class="ProductCardsSwiper Products_cardsSwiper swiper hidden-mdPlus">
      <div class="swiper-wrapper">
      	<?php foreach ($field['cards'] as $id): ?>
      	<?php
          $product = wc_get_product($id);
          $product_image = $product->get_image('full', array('class' => 'ProductCard_img'));
          $product_attributes = $product->get_attributes();
          $product_url = get_permalink($id);
          $additional_labels = get_field('additional_labels', $id);
        ?>

        <div class="swiper-slide ProductCardsSwiper_slide">
          <div class="ProductCard ProductCard-slide">
            <div class="ProductCard_wrapper">
            	<?php if ($product_image || $additional_labels): ?>
                <div class="ProductCard_imgWrapper">
                  <?php if ($product_image): ?>
                    <?php echo $product_image ?>
                  <?php endif ?>

                  <?php foreach ($additional_labels as $additional_label): ?>
                    <?php if ($additional_label['value'] == 'special_addition'): ?>
                      <span class="Label Label-productCardSmall ProductCard_label">
                        <?php echo $additional_label['label'] ?>
                      </span>
                    <?php endif ?>

                    <?php if ($additional_label['value'] == 'save'): ?>
                      <?php
                        $discount = get_field('discount', $id);
                      ?>
                      <span class="Tag Tag-productCardSmall ProductCard_tag">
                        <?php echo $additional_label['label'] . ' ' . $discount . '%' ?>
                      </span>
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
              <?php endif ?>

              <div class="ProductCard_textWrapper">
                <h3 class="ProductCard_title">
                	<?php echo $product->get_name() ?>
                </h3>

                <div class="ProductCard_description">
                  <?php
                    if ($product->get_short_description()) {
                      echo $product->get_short_description();
                    } else {
                      echo wp_trim_words($product->get_description(), 18, '...');
                    }
                  ?>
                </div>

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

                <div class="ProductCard_prices">
                	<?php echo $product->get_price_html() ?>
                </div>

                <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">View options</a>
              </div>
            </div>
          </div>
        </div>
      	<?php endforeach ?>
      </div>
    </div>

    <div class="Products_items hidden-smMinus">
	    <?php foreach ($field['cards'] as $id): ?>
	    	<?php
          $product = wc_get_product($id);
          $product_image = $product->get_image('full', array('class' => 'ProductCard_img'));
          $product_attributes = $product->get_attributes();
          $product_url = get_permalink($id);
          $additional_labels = get_field('additional_labels', $id);
        ?>

	      <div class="ProductCard ProductCard-twoColumnMd Products_item">
	        <div class="ProductCard_wrapper">
	        	<?php if ($product_image || $additional_labels): ?>
              <div class="ProductCard_imgWrapper">
                <?php if ($product_image): ?>
                  <?php echo $product_image ?>
                <?php endif ?>

                <?php foreach ($additional_labels as $additional_label): ?>
                  <?php if ($additional_label['value'] == 'special_addition'): ?>
                    <span class="Label Label-productCardSmall ProductCard_label">
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
              </div>
            <?php endif ?>

	          <div class="ProductCard_textWrapper">
	            <h3 class="ProductCard_title">
	            	<?php echo $product->get_name() ?>
	            </h3>

	            <div class="ProductCard_description">
	              <?php
                  if ($product->get_short_description()) {
                    echo $product->get_short_description();
                  } else {
                    echo wp_trim_words($product->get_description(), 18, '...');
                  }
                ?>
	            </div>

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

	            <div class="ProductCard_prices">
	            	<?php echo $product->get_price_html() ?>
	            </div>

	            <a class="BtnYellow BtnYellow-productCard ProductCard_btn" href="<?php echo $product_url ?>">View options and features</a>
	          </div>
	        </div>
	      </div>
	    <?php endforeach ?>
    </div>
  </div>
</div>