<?php if ($field['beneficiaries'] || $field['title']): ?>
	<div class="BeneficiariesSection">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h2 class="SectionTitle SectionTitle-center SectionTitle-alignLeftXS BeneficiariesSection_title">
		    	<?php echo $field['title'] ?>
		    </h2>
	  	<?php endif ?>

	  	<?php if ($field['beneficiaries']): ?>
		    <div class="BeneficiariesSection_swiperWrapper">
		      <div class="BeneficiariesSwiper BeneficiariesSection_swiper swiper">
		        <div class="swiper-wrapper">
		        	<?php foreach ($field['beneficiaries'] as $beneficiary): ?>
			          <div class="swiper-slide BeneficiariesSwiper_slide">
			            <div class="Beneficiary Beneficiary-slider">
			            	<?php if ($beneficiary['title']): ?>
				              <h3 class="Beneficiary_title">
				              	<?php echo $beneficiary['title'] ?>
				              </h3>
			            	<?php endif ?>

			            	<?php if ($beneficiary['nominated_by']): ?>
				              <div class="Beneficiary_nomination">
				                <div class="Beneficiary_nominationLabel">Nominated by:</div>
				                <div class="Beneficiary_nominationValue"><?php echo $beneficiary['nominated_by'] ?></div>
				              </div>
			            	<?php endif ?>

			            	<?php
			            		$image = wp_get_attachment_image( $beneficiary['image'], 'full', false, array('class' => 'Beneficiary_img') );
			            	?>

			            	<?php if ($image): ?>
				              <div class="Beneficiary_imgWrapper">
				              	<?php echo $image ?>
				              </div>
			            	<?php endif ?>

			            	<?php if ($beneficiary['description']): ?>
				              <div class="Beneficiary_description">
				                <?php echo $beneficiary['description'] ?>
				              </div>
			            	<?php endif ?>

			            	<?php
							      	$button_is_display = !!($beneficiary['display_button'] === 'yes' && $beneficiary['button']['url'] && $beneficiary['button']['text']);
								      if ($button_is_display):
								        $button_style_classes = [
								          'filled' => 'BtnYellow',
								          'outline' => 'BtnOutline',
								          'black' => 'BtnBlack',
								        ];

								        $button_style_class = $button_style_classes[$beneficiary['button']['button_style']];
								        $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
								        $button_icon_class = ($beneficiary['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $beneficiary['button']['button_icon'] : '';
								        $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
							      ?>
							      	<a class="<?php echo $button_classes ?> Beneficiary_btn" href="<?php echo $beneficiary['button']['url'] ?>"<?php echo $beneficiary['button']['open_in_fancybox'] === 'yes' ? 'data-fancybox' : '' ?>>
							      		<span class="hidden-mdPlus"><?php echo $beneficiary['button']['mobile_text'] ?></span>
			              		<span class="hidden-smMinus"><?php echo $beneficiary['button']['text'] ?></span>
							        </a>
								    <?php endif ?>
			            </div>
			          </div>
		        	<?php endforeach ?>
		        </div>
		      </div>
		      <button class="SwiperBtn SwiperBtn-next BeneficiariesSection_next hidden-smMinus" type="button"></button>
		    </div>
		    <div class="SwiperControls">
		      <div class="SwiperPagination SwiperControls_pagination BeneficiariesSection_pagination hidden-smMinus"></div>

		      <?php
		      	$button_is_display = !!($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']);
			      if ($button_is_display):
			        $button_style_classes = [
			          'filled' => 'BtnYellow',
			          'outline' => 'BtnOutline',
			          'black' => 'BtnBlack',
			        ];

			        $button_style_class = $button_style_classes[$field['button']['button_style']];
			        $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
			        $button_additional_class .= $button_style_class === 'BtnYellow' ? ' BtnYellow-beneficiaries ' : ' ';
			        $button_icon_class = ($field['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $field['button']['button_icon'] : '';
			        $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
		      ?>
		      	<a class="<?php echo $button_classes ?>" href="<?php echo $field['button']['url'] ?>"<?php echo $field['button']['open_in_fancybox'] === 'yes' ? 'data-fancybox' : '' ?>>
		          <?php echo $field['button']['text'] ?>
		        </a>
			    <?php endif ?>
		    </div>
	  	<?php endif ?>
	  </div>
	</div>
<?php endif ?>