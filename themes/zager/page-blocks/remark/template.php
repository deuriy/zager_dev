<?php
	$style = $field['background_color'] === 'red' ? ' Remark-red' : '';
?>

<?php if ($field['text']): ?>
	<div class="Remark<?php echo $style ?>">
		<?php echo $field['text'] ?>
	</div>
<?php endif ?>
