<?php if ($field['accessory_cards'] || $field['title']): ?>
	<div class="AccessoryTiles">
		<?php if ($field['title']): ?>
			<h3 class="AccessoryTiles_title">
				<?php echo $field['title']; ?>
			</h3>
		<?php endif ?>

		<?php if ($field['accessory_cards']): ?>
			<div class="AccessoryTiles_items">
				<?php foreach ($field['accessory_cards'] as $accessory_card): ?>
					<?php
					$thumbnail = get_the_post_thumbnail( $accessory_card->ID, 'full', array('class' => 'AccessoryTile_img') );
					$url = get_the_permalink($accessory_card->ID);
					?>

					<?php if ($thumbnail || $accessory_card->post_title): ?>
						<a class="AccessoryTile AccessoryTiles_item" href="<?php echo $url ?>">
							<?php if ($thumbnail): ?>
								<div class="AccessoryTile_imgWrapper">
									<?php echo $thumbnail; ?>
								</div>
							<?php endif ?>

							<?php if ($accessory_card->post_title): ?>
								<h4 class="AccessoryTile_title">
									<?php echo $accessory_card->post_title; ?>
								</h4>
							<?php endif ?>
						</a>
					<?php endif ?>
					
				<?php endforeach ?>
			</div>
		<?php endif ?>

	</div>
<?php endif ?>
