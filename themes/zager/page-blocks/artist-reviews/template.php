<?php if ($field['title'] || $field['artist_reviews']): ?>
	<div class="VideoReviews">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h3 class="VideoReviews_title">
		    	<?php echo $field['title'] ?>
		    </h3>
	  	<?php endif ?>

	  	<?php if ($field['artist_reviews']): ?>
		    <div class="VideoReviews_items">
		    	<?php foreach ($field['artist_reviews'] as $review_id): ?>
		    		<?php
					    $review_text_wrapper = get_field('text_wrapper', $review_id);
					    $review_image_wrapper = get_field('image_wrapper', $review_id);

					    $review_image = wp_get_attachment_image( $review_image_wrapper['image'], 'full', false, array('class' => 'VideoReview_img') );
		    		?>
		    		<div class="VideoReview VideoReviews_item">
		    			<?php if ($review_image_wrapper['review_link'] && $review_image_wrapper['image']): ?>
		    				<a href="<?php echo $review_image_wrapper['review_link'] ?>"<?php echo $review_image_wrapper['use_review_link_as_fancybox'] == 'yes' ? ' data-fancybox' : '' ?>>
			    				<?php echo $review_image ?>
			    			</a>
		    			<?php endif ?>

		    			<?php if ($review_text_wrapper['author'] || $review_text_wrapper['subtitle']): ?>
		    			<div class="VideoReview_textWrapper">
		    				<?php if ($review_text_wrapper['author']): ?>
			    				<div class="VideoReview_author">
			    					<?php echo $review_text_wrapper['author'] ?>
			    				</div>
		    				<?php endif ?>

		    				<?php if ($review_text_wrapper['subtitle']): ?>
			    				<div class="VideoReview_text">
			    					<?php echo $review_text_wrapper['subtitle'] ?>
			    				</div>
		    				<?php endif ?>
		    			</div>
		    			<?php endif ?>
		    		</div>
		    	<?php endforeach ?>
		    </div>
	  	<?php endif ?>

	    <!-- <div class="LoadingPosts">
	      <div class="Pagination hidden-smMinus"><a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft BtnOutline-disabled Pagination_prev" href="#">Previous</a>
	        <ul class="Pagination_list">
	          <li class="Pagination_item Pagination_item-current"><a class="Pagination_link" href="#">1</a></li>
	          <li class="Pagination_item"><a class="Pagination_link" href="#">2</a></li>
	          <li class="Pagination_item"><a class="Pagination_link" href="#">3</a></li>
	          <li class="Pagination_item-more">...</li>
	          <li class="Pagination_item"><a class="Pagination_link" href="#">35</a></li>
	        </ul><a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next" href="#">next</a>
	      </div><a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a>
	    </div> -->
	  </div>
	</div>
<?php endif ?>