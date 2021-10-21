<?php
$banner = $field['banner_type'] === 'default_banner' ? get_field('default_page_banner', 'option') : $field;
$style = $banner['background_image'] ? ' style="background-image: url(\''. $banner['background_image'] .'\');"' : '';
?>

<div class="Banner<?php echo $class ?>"<?php echo $style ?>>
	<div class="Container">
		<div class="Banner_textWrapper">
			<?php if ($banner['intro_text']): ?>
				<div class="Banner_intro">
					<?php echo $banner['intro_text'] ?>
				</div>
			<?php endif ?>
			<?php if ($banner['title']): ?>
				<h2 class="Banner_title">
					<?php echo $banner['title'] ?>
				</h2>
			<?php endif ?>
			<?php if ($banner['buttons'] && $banner['display_buttons'] === 'yes'): ?>
				<div class="Banner_buttons">
					<?php
					foreach($banner['buttons'] as $button):
						$button_style_class = $button['button_style'] === 'filled' ? 'BtnYellow' : 'BtnOutline';
						$button_icon_class = $button_style_class . '-' . $button['button_icon'];
						$button_classes = $button_style_class . ' ' . $button_icon_class;
						?>
						<a class="<?php echo $button_classes; ?>" href="<?php echo $button['url'] ?>">
							<?php echo $button['text'] ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>