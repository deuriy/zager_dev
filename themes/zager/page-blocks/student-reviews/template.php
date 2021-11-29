<?php
	$ratings_arr = [
	  'one' => 1,
	  'two' => 2,
	  'three' => 3,
	  'four' => 4,
	  'five' => 5
	];
?>

<?php if ($field['title'] || $field['reviews']): ?>
	<div class="StudentReviewsSection">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h2 class="SectionTitle SectionTitle-center SectionTitle-alignLeftXS StudentReviewsSection_title">
		    	<?php echo $field['title'] ?>
		    </h2>
	  	<?php endif ?>

	  	<?php if ($field['reviews']): ?>
		    <div class="StudentReviewsSection_items">
		    	<?php foreach ($field['reviews'] as $review_id): ?>
		    		<?php
		    			$review = get_post( $review_id );
		    			$review_excerpt = $review->post_excerpt != '' ? $review->post_excerpt : $review->post_content;
		    			$student_review = get_field('student_review', $review_id);
		    			$author_photo = wp_get_attachment_image( $student_review['author_photo'], 'full', false, array('class' => 'Author_photoImg') );
		    			$rating = $ratings_arr[$student_review['info']['rating']];

		    	// 		print '<br>';
							// print($rating);
							// print '</br>';
		    		?>

			      <div class="StudentReview StudentReviewsSection_item">
			      	<?php if ($rating): ?>
			      		<div class="RatingStars StudentReview_ratingStars">
				          <ul class="RatingStars_list">
				          	<?php for ($i = 1; $i <= 5; $i++) : ?>
				            	<li class="RatingStars_item<?php echo $i <= $rating ? ' RatingStars_item-filled' : '' ?>"></li>
			      				<?php endfor ?>
				          </ul>
				        </div>
			      	<?php endif ?>			        

			        <?php if ($review->post_content): ?>
				        <div class="StudentReview_text">
				          <div class="StudentReview_excerpt">
				          	<?php echo wpautop( $review_excerpt ) ?>
				          </div>

				          <a href="#" class="StudentReview_moreLink">Read more</a>

				          <div class="StudentReview_fullText">
				          	<?php echo wpautop( $review->post_content ) ?>
				          </div>
			        </div>
			        <?php endif ?>

			        <div class="Author Author-studentReview StudentReview_author">
			        	<?php if ($author_photo): ?>
			        		<div class="Author_photo">
			        			<?php echo $author_photo ?>
			        		</div>
			        	<?php endif ?>
			          
			          <?php if ($student_review['info']['student_name']): ?>
				          <div class="Author_name">
				          	<?php echo $student_review['info']['student_name'] ?>
				          </div>
			          <?php endif ?>

			          <div class="Author_date">
			          	<?php echo zager_time_ago(); ?>
			          </div>
			        </div>
			      </div>
		    	<?php endforeach ?>
		    </div>

		    <!-- <div class="StudentReviewsSection_bottom">
		    	<a class="BtnYellow BtnYellow-loadMore StudentReviewsSection_btn" href="#">Load more</a>
		    </div> -->
	  	<?php endif ?>
	  </div>
	</div>
<?php endif ?>