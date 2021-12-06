<div class="ThesesSection">
	<?php if ($field['title']): ?>
		<h2 class="SectionTitle SectionTitle-theses ThesesSection_title">
			<?php echo $field['title'] ?>
		</h2>
	<?php endif ?>

	<?php if ($field['theses']): ?>
		<div class="Theses">
			<?php foreach ($field['theses'] as $thesis): ?>
				<?php
					$icon = wp_get_attachment_image( $thesis['icon'], 'full' );
				?>

				<div class="Thesis Theses_item">
					<?php if ($icon): ?>
						<div class="Thesis_iconWrapper">
							<?php echo $icon ?>
						</div>
					<?php endif ?>

					<?php if ($thesis['title']): ?>
						<h3 class="Thesis_title">
							<?php echo $thesis['title'] ?>
						</h3>
					<?php endif ?>

					<?php if ($thesis['text']): ?>
						<div class="Thesis_text">
							<?php echo $thesis['text'] ?>
						</div>
					<?php endif ?>
				</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>