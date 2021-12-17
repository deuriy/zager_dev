<?php if ($field['product_card'] || $field['title']): ?>
	<div class="PriceSection" id="PriceSection<?php echo $field_key ?>">
	  <div class="Container">
	    <div class="PriceSection_wrapper">
	    	<?php if ($field['title']): ?>
		      <h2 class="SectionTitle SectionTitle-center SectionTitle-alignLeftXS PriceSection_title">
		      	<?php echo $field['title'] ?>
		      </h2>
	    	<?php endif ?>

	    	<?php if ($field['product_card']): ?>
		      <div class="PriceSection_items">
		      	<?php foreach ($field['product_card'] as $product_card_id): ?>
		      		<?php
		      			$product_card = wc_get_product($product_card_id);
		      			$product_card_class = get_field('display_special_label', $product_card_id) == 'yes' ? ' PriceSection_item-withTag' : '';
		      		?>

			        <div class="PriceCard PriceSection_item<?php echo $product_card_class ?>">
			        	<?php if (get_field('display_special_label', $product_card_id) == 'yes'): ?>
			        		<div class="Tag Tag-priceCard PriceCard_tag">
										<?php the_field('special_label', $product_card_id) ?>
									</div>
								<?php endif ?>

			          <h3 class="PriceCard_title">
			          	<?php echo $product_card->get_name() ?>
			          </h3>

			          <div class="PriceCard_price">
			          	<?php echo $product_card->get_price_html() ?>
			          </div>

			          <div class="PriceCard_description">
			          	<?php
	                  if ($product_card->get_short_description()) {
	                    echo $product_card->get_short_description();
	                  } else {
	                    echo wpautop(wp_trim_words($product_card->get_description(), 18, '...'));
	                  }
	                ?>
			          </div>

			        	<a href="<?php echo get_home_url(); ?>/?add-to-cart=<?php echo $product_card_id ?>" class="BtnYellow BtnYellow-priceCard PriceCard_btn">buy now</a>
			        </div>
		      	<?php endforeach ?>
		      </div>
	    	<?php endif ?>
	    </div>
	  </div>
	</div>
<?php endif ?>