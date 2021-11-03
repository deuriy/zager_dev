<?php
	$style = $field['background_color'] === 'red' ? ' Remark-red' : '';
?>

<div class="Remark<?php echo $style ?>">
	<?php echo $field['text'] ?>
</div>