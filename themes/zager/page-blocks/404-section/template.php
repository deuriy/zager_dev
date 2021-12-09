<?php
	$style = $field['background_image'] ? ' style="background-image: url(\''. $field['background_image'] .'\');"' : '';
?>

<div class="Section404"<?php echo $style ?>>
	<div class="Container Section404_container">
		<?php if ($field['title']): ?>
			<h2 class="Section404_title">
				<?php echo $field['title'] ?>
			</h2>
		<?php endif ?>

		<?php if ($field['subtitle']): ?>
			<h3 class="Section404_subtitle">
				<?php echo $field['subtitle'] ?>
			</h3>
		<?php endif ?>

		<?php if ($field['description']): ?>
			<div class="Section404_description">
				<?php echo $field['description'] ?>
			</div>
		<?php endif ?>
	</div>
</div>