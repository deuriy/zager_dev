<?php if ($field['text'] || $field['icon']): ?>
	<?php
		$icon = wp_get_attachment_image( $field['icon'], 'full' );
		$infoblock_classes = $icon ? ' InfoBlock-hasIcon' : '';

		switch ($field['block_offset']) {
			case 'half_up':
				$infoblock_classes .= ' InfoBlock-offsetHalfUp';
				break;
			case 'half_down':
				$infoblock_classes .= ' InfoBlock-offsetHalfDown';
				break;
		}
	?>
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
<?php endif ?>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		function checkInfoBlockHeight(infoBlock) {
		  if (infoBlock.classList.contains('InfoBlock-offsetHalfUp')) {
		    infoBlock.style.marginBottom = `-${infoBlock.offsetHeight}px`;
		  } else if (infoBlock.classList.contains('InfoBlock-offsetHalfDown')) {
		    infoBlock.style.marginTop = `-${infoBlock.offsetHeight}px`;
		  }
		}

		let infoBlocksOffsetHalf = document.querySelectorAll('.InfoBlock-offsetHalfUp, .InfoBlock-offsetHalfDown');
		infoBlocksOffsetHalf.forEach(infoBlock => {
		  checkInfoBlockHeight(infoBlock);
		});

		window.addEventListener('resize', function () {
		  infoBlocksOffsetHalf.forEach(infoBlock => {
		    checkInfoBlockHeight(infoBlock);
		  });
		});
	});
</script>