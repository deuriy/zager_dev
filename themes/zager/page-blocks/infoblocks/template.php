<?php if ($field['infoblock']): ?>
	<div class="InfoBlocks">
		<div class="InfoBlocksGroup">
			<?php foreach ($field['infoblock'] as $infoblock): ?>
				<div class="InfoBlock InfoBlock-extended InfoBlock-featuresTab InfoBlocksGroup_item">
					<?php if ($infoblock['title']): ?>
						<h3 class="InfoBlock_title">
							<?php echo $infoblock['title'] ?>
						</h3>
					<?php endif ?>

					<?php if ($infoblock['text']): ?>
					<div class="InfoBlock_text">
						<?php echo $infoblock['text'] ?>
					</div>
					<?php endif ?>

					<?php
					if ($infoblock['display_button'] === 'yes' && $infoblock['button']['url'] && $infoblock['button']['text']):
						$button_style_classes = [
							'filled' => 'BtnYellow',
							'outline' => 'BtnOutline',
							'black' => 'BtnBlack',
						];

						$button_style_class = $button_style_classes[$infoblock['button']['button_style']];
						$button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline ' : ' ';
						$button_icon_class = ($infoblock['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $infoblock['button']['button_icon'] . ' ' : ' ';
						$button_classes = $button_style_class . $button_additional_class . $button_icon_class . 'BtnOutline-infoBlock InfoBlock_btn';
						?>
						<a class="<?php echo $button_classes ?>" href="<?php echo $infoblock['button']['url'] ?>">
							<?php echo $infoblock['button']['text'] ?>
						</a>
					<?php endif ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<?php endif ?>