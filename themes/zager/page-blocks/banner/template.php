<?php
$style = $field['background_image'] ? ' style="background-image: url(\''. $field['background_image'] .'\');"' : '';
?>

<div class="Banner<?php echo $class ?>"<?php echo $style ?>>
	<div class="Container">
		<div class="Banner_textWrapper">
			<?php if ($field['intro_text']): ?>
				<div class="Banner_intro">
					<?php echo $field['intro_text'] ?>
				</div>
			<?php endif ?>
			<?php if ($field['title']): ?>
				<h2 class="Banner_title">
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
						<a class="<?php echo $button_classes; ?>" href="<?php echo $button['url'] ?>">
							<?php echo $button['text'] ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>