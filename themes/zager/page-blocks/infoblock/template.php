<?php if ($field['text'] || $field['icon']): ?>
	<?php
		$icon = wp_get_attachment_image( $field['icon'], 'full' );
		$infoblock_classes = $icon ? ' InfoBlock-hasIcon' : '';
		$infoblock_classes .= $field['padding_on_desktop'] == 'large' ? ' InfoBlock-largePaddingDesktop' : '';
		$infoblock_classes .= $field['desktop_font_size'] == 'small' ? ' InfoBlock-smallFontDesktop' : '';
		$infoblock_classes .= $field['desktop_text_align'] == 'center' ? ' InfoBlock-centerDesktop' : '';

		switch ($field['block_offset']) {
			case 'half_up':
				$infoblock_classes .= ' InfoBlock-offsetHalfUp';
				break;
			case 'half_down':
				$infoblock_classes .= ' InfoBlock-offsetHalfDown';
				break;
		}
	?>
	<div class="InfoBlockSection">
		<div class="Container">
		  <div class="InfoBlock<?php echo $infoblock_classes ?>">
		  	<?php
		  		if ($icon) {
		  			echo $icon;
		  		}

		  		if ($field['text']) {
		  			echo $field['text'];
		  		}
		  	?>
		  </div>
		</div>
	</div>
<?php endif ?>