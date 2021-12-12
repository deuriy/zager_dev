<?php if ($field['price_card'] || $field['title']): ?>
	<div class="PriceSection" id="PriceSection<?php echo $field_key ?>">
	  <div class="Container">
	    <div class="PriceSection_wrapper">
	    	<?php if ($field['title']): ?>
		      <h2 class="SectionTitle SectionTitle-center SectionTitle-alignLeftXS PriceSection_title">
		      	<?php echo $field['title'] ?>
		      </h2>
	    	<?php endif ?>

	    	<?php if ($field['price_card']): ?>
		      <div class="PriceSection_items">
		      	<?php foreach ($field['price_card'] as $price_card): ?>
		      		<?php
		      			$price_card_class = $price_card['show_tag'] == 'yes' ? ' PriceSection_item-withTag' : '';
		      		?>

			        <div class="PriceCard PriceSection_item<?php echo $price_card_class ?>">
			        	<?php if ($price_card['show_tag'] == 'yes' && $price_card['tag']): ?>
			        		<div class="Tag Tag-priceCard PriceCard_tag">
			        			<?php echo $price_card['tag'] ?>
			        		</div>
			        	<?php endif ?>

			        	<?php if ($price_card['title']): ?>
				          <h3 class="PriceCard_title">
				          	<?php echo $price_card['title'] ?>
				          </h3>
			        	<?php endif ?>

			        	<?php if ($price_card['price']): ?>
				          <div class="PriceCard_price">
				          	<?php echo '$' . $price_card['price'] ?>
				          </div>
			        	<?php endif ?>

			        	<?php if ($price_card['description']): ?>
				          <div class="PriceCard_description">
				          	<?php echo $price_card['description'] ?>
				          </div>
			        	<?php endif ?>

			        	<?php
			        		$button_is_display = !!($price_card['display_button'] === 'yes' && $price_card['button']['url'] && $price_card['button']['text']);
						      if ($button_is_display):
						        $button_style_classes = [
						          'filled' => 'BtnYellow',
						          'outline' => 'BtnOutline',
						          'black' => 'BtnBlack',
						        ];

						        $button_style_class = $button_style_classes[$price_card['button']['button_style']];
						        $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
						        $button_additional_class .= $button_style_class === 'BtnYellow' ? ' BtnYellow-priceCard ' : ' ';
						        $button_icon_class = ($price_card['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $price_card['button']['button_icon'] : '';
						        $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
			        	?>
				          <a class="<?php echo $button_classes ?> PriceCard_btn" href="<?php echo $price_card['button']['url'] ?>"<?php echo $price_card['button']['open_in_fancybox'] === 'yes' ? 'data-fancybox' : '' ?>>
				          	<?php echo $price_card['button']['text'] ?>
				          </a>
				        <?php endif ?>
			        </div>
		      	<?php endforeach ?>
		      </div>
	    	<?php endif ?>
	    </div>
	  </div>
	</div>
<?php endif ?>