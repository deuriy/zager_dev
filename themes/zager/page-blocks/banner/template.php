<?php
$style = $field['background_image'] ? ' style="background-image: url(\''. $field['background_image'] .'\');"' : '';
$additional_classes .= !is_front_page() ? ' Banner-secondaryPage' : '';
$additional_classes .= $field['show_icons_and_texts_block'] == 'yes' ? ' Banner-noPaddingBottomDesktop' : '';
$icon_and_texts = $field['icons_and_texts_type'] === 'default' ? get_field('icons_and_texts', 'option') : $field['icons_and_texts'];
?>

<div class="Banner<?php echo $additional_classes ?>"<?php echo $style ?>>
	<div class="Container">
		<?php
			if (function_exists('zager_breadcrumbs') && $field['show_breadcrumbs'] === 'yes') {
				zager_breadcrumbs();
			}
		?>
		<div class="Banner_textWrapper">
			<?php if ($field['intro_text']): ?>
				<div class="Banner_intro">
					<?php echo $field['intro_text'] ?>
				</div>
			<?php endif ?>
			<?php if ($field['title']): ?>
				<h2 class="Banner_title Banner_title-<?php echo $field['title_size'] ?>">
					<?php echo $field['title'] ?>
				</h2>
			<?php endif ?>
			<?php if ($field['buttons']): ?>
				<div class="Banner_buttons">
					<?php
					foreach($field['buttons'] as $button):
						$button_style_classes = [
							'filled' => 'BtnYellow',
							'outline' => 'BtnOutline',
							'black' => 'BtnBlack',
						];

						$button_style_class = $button_style_classes[$button['button_style']];
						$button_icon_class = ($button['button_icon'] !== 'no_icon') ? ' ' . $button_style_class . '-' . $button['button_icon'] . ' ' : ' ';
						$button_classes = $button_style_class . $button_icon_class . 'Banner_btn';
						?>
						<a class="<?php echo $button_classes; ?>" href="<?php echo $button['url'] ?>"<?php echo $button['use_fancybox_link'] === 'yes' ? 'data-fancybox' : '' ?>>
							<?php echo $button['text'] ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif ?>
		</div>
		
		<?php if ($icon_and_texts && $field['show_icons_and_texts_block'] == 'yes'): ?>
			<div class="IconsAndTextsSwiper swiper Banner_iconsAndTextsSwiper hidden-smPlus">
				<div class="swiper-wrapper">
					<?php foreach ($icon_and_texts as $icon_and_text): ?>
						<div class="swiper-slide IconsAndTextsSwiper_slide">
							<div class="IconAndText IconAndText-highlighted IconsAndTexts_item">
								<?php if ($icon_and_text['icon']): ?>
	  							<div class="CircleIcon IconAndText_icon">
	  								<img class="CircleIcon_img" loading="lazy" src="<?php echo $icon_and_text['icon'] ?>" alt="Guitar">
	  							</div>
	  						<?php endif ?>

								<?php if ($icon_and_text['title']): ?>
									<h3 class="IconAndText_title">
										<?php echo $icon_and_text['title'] ?>
									</h3>
								<?php endif ?>

								<?php if ($icon_and_text['text']): ?>
									<div class="IconAndText_text">
										<?php echo $icon_and_text['text'] ?>
									</div>
								<?php endif ?>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		<?php endif ?>
	</div>

  <?php if ($icon_and_texts && $field['show_icons_and_texts_block'] == 'yes'): ?>
  	<div class="IconsAndTexts IconsAndTexts-highlighted Banner_iconsAndTexts hidden-xs">
  		<div class="Container">
  			<div class="IconsAndTexts_wrapper">
  				<?php foreach ($icon_and_texts as $icon_and_text): ?>
  					<div class="IconAndText IconsAndTexts_item">
  						<?php if ($icon_and_text['icon']): ?>
  							<div class="CircleIcon IconAndText_icon">
  								<img class="CircleIcon_img" loading="lazy" src="<?php echo $icon_and_text['icon'] ?>" alt="Guitar">
  							</div>
  						<?php endif ?>

  						<?php if ($icon_and_text['title']): ?>
	              <h3 class="IconAndText_title">
	                <?php echo $icon_and_text['title'] ?>
	              </h3>
	            <?php endif ?>

	            <?php if ($icon_and_text['text']): ?>
	            	<div class="IconAndText_text">
	            		<?php echo $icon_and_text['text'] ?>
	            	</div>
	            <?php endif ?>
  					</div>
  				<?php endforeach ?>
  			</div>
  		</div>
  	</div>
  <?php endif ?>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function(e) {
    new Swiper('.IconsAndTextsSwiper', {
      slidesPerView: 'auto',
      spaceBetween: 20,
      autoHeight: true,
    });
  });
</script>