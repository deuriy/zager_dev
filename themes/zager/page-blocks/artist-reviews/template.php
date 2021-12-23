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
					    $author = get_field('author', $review_id);
					    $subtitle = get_field('subtitle', $review_id);
					    $media_type = get_field('media_type', $review_id);
					    $text = get_field('text', $review_id);
		    		?>

		    		<div class="VideoReview VideoReviews_item" data-review-id="<?php echo $review_id ?>">
		    			<?php if ($media_type == 'yt_video'): ?>
		    				<?php
		    					$video_url = get_field('video_url', $review_id);
		    					$yt_video_id = substr($video_url, strpos($video_url, '?v=') + 3);
		    				?>

		    				<?php if ($yt_video_id): ?>
		    					<div class="VideoReview_videoWrapper">
			    					<div class="Video">
					    				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $yt_video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					    			</div>
			    				</div>
		    				<?php endif ?>		    				
		    			<?php elseif ($media_type == 'image'): ?>
		    				<?php
		    					$image_id = get_field('image', $review_id);
		    					$image = wp_get_attachment_image( $image_id, 'full', false, array('class' => 'VideoReview_img') );
		    				?>

		    				<?php if ($image): ?>
			    				<div class="VideoReview_imgWrapper">
			    					<?php echo $image ?>
			    				</div>
		    				<?php endif ?>
		    			<?php endif ?>

		    			<?php if ($author || $text): ?>
			    			<div class="VideoReview_textWrapper">
			    				<?php if ($author): ?>
				    				<div class="VideoReview_author">
				    					<?php echo $author ?>
				    				</div>
			    				<?php endif ?>

			    				<?php if ($text): ?>
				    				<div class="VideoReview_text">
				    					<?php echo $text ?>
				    				</div>
				    				<a href="javascript:;" class="VideoReview_moreLink">More</a>
			    				<?php endif ?>
			    			</div>
		    			<?php endif ?>
		    		</div>
		    	<?php endforeach ?>
		    </div>
	  	<?php endif ?>

	    <div class="LoadingPosts LoadingPosts-center">
	      <a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a>
	    </div>
	  </div>
	</div>
<?php endif ?>