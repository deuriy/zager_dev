<?php if ($reviews): ?>
	<?php foreach ($reviews as $review): ?>
		<?php
		$review_id = $review->ID;
		$author = get_field('author', $review_id);
		$author_photo = wp_get_attachment_image( $author['photo'], 'full', false, array('class' => 'Author_photoImg') );
		$answer_on_questions = get_field('answer_on_questions', $review_id);

		$product_series = wp_get_post_terms( $review_id, 'customer_reviews_category', array('hide_empty' => false) );

		$product_series_data = implode(', ', array_map(function($item) {
			return $item->slug;
		}, $product_series));

		$product_series_str = implode(', ', array_map(function($item) {
			return $item->name;
		}, $product_series));
		?>

	<div class="Review Reviews_item FilterTabs_item" data-item-name="">
		<div class="Author Review_author">
		<?php if ($author_photo): ?>
			<div class="Author_photo">
				<?php echo $author_photo; ?>
			</div>
		<?php endif ?>

		<?php if ($author['info']['name']): ?>
			<div class="Author_name">
				<?php echo $author['info']['name']; ?>
			</div>
		<?php endif ?>

		<?php if ($product_series_str): ?>
			<div class="Author_productSeries">
				<?php echo $product_series_str ?>
			</div>
		<?php endif ?>

		<?php if ($author['info']): ?>
			<div class="Author_info">
				<?php if ($author['info']['location']): ?>
					<div class="Author_location">
						<?php echo $author['info']['location']; ?>
					</div>
				<?php endif ?>

				<div class="Author_date">
					<?php echo zager_time_ago(); ?>
				</div>
			</div>
		<?php endif ?>

		<?php if ($author['audio_file']): ?>
			<div class="Author_audio">
				<audio controls id="reviewaudio">
					<source src="<?php echo $author['audio_file']['url']; ?>" type="<?php echo $author['audio_file']['mime_type'] ?>">
				</audio>
			</div>
			</div>
		<?php else :
			$audio = get_audio_for_review();
			if ( !empty($audio) ) :
				?>
				<div class="Author_audio">
					<audio controls id="reviewaudio">
						<source src="<?=$audio;?>" type="audio/mpeg">
					</audio>
				</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ($answer_on_questions): ?>
			<div class="QA Review_qa">
				<div class="QA_items">
					<?php foreach ($answer_on_questions as $qa): ?>
						<div class="QA_item">
							<?php if ($qa['question']): ?>
								<div class="QA_question">
									<?php echo $qa['question'] ?>
								</div>
							<?php endif ?>

							<?php if ($qa['answer']): ?>
								<div class="QA_answer">
									<?php echo $qa['answer'] ?>
								</div>
							<?php endif ?>
						</div>
					<?php endforeach ?>
				</div>
				<div class="QA_moreLinkWrapper hidden-smPlus">
					<a class="ArrowLink QA_moreLink" href="#">read more</a>
				</div>
			</div>
		<?php endif ?>
		</div>
	<?php endforeach ?>
<?php endif; ?>
