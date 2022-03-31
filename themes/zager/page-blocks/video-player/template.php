<?php if ($field['title'] || $field['most_viewed_videos']): ?>
	<div class="VideoPlayerSection">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h2 class="SectionTitle SectionTitle-center SectionTitle-videoPlayerSection VideoPlayerSection_title">
		    	<?php echo $field['title'] ?>
		    </h2>
	  	<?php endif ?>

	    <div class="VideoPlayer">
	    	<?php if ($field['display_most_viewed_videos'] == 'yes'): ?>
		      <div class="VideoTiles VideoPlayer_tiles">
		      	<?php if ($field['most_viewed_videos']['title']): ?>
			        <h3 class="VideoTiles_title">
			        	<?php echo $field['most_viewed_videos']['title'] ?>
			        </h3>
		      	<?php endif ?>

		        <div class="VideoTilesSwiper VideoTiles_swiper swiper hidden-mdPlus">
		        	<div class="swiper-wrapper">
		        		<?php foreach ($field['playlist'] as $index => $video_id): ?>
		        			<?php
		        				if ($index == $field['most_viewed_videos']['number_of_videos']) break;

		        				$video = get_post($video_id);
			      				$video_url = get_field('video_url', $video_id);
			      				$yt_video_id = substr($video_url, strpos($video_url, '?v=') + 3);
		        			?>
			        		<div class="swiper-slide VideoTilesSwiper_slide">
			        			<a class="VideoTile" href="#<?php echo $yt_video_id ?>" data-action="playVideo">
			        				<div class="VideoTile_imgWrapper">
			        					<img class="VideoTile_img" src="https://img.youtube.com/vi/<?php echo $yt_video_id ?>/default.jpg" alt="">
			        					<div class="VideoTile_duration">03:12</div>
			        				</div>
			        				<h4 class="VideoTile_title">
			        					<?php echo $video->post_title ?>
			        				</h4>
			        			</a>
			        		</div>
		        		<?php endforeach ?>
		        	</div>
		        </div>

		        <div class="VideoTiles_items hidden-smMinus">
		        	<?php foreach ($field['playlist'] as $index => $video_id): ?>
			        	<?php
			        		if ($index == $field['most_viewed_videos']['number_of_videos']) break;

		      				$video = get_post($video_id);
		      				$video_url = get_field('video_url', $video_id);
		      				$yt_video_id = substr($video_url, strpos($video_url, '?v=') + 3);
			        	?>

			        	<a class="VideoTile VideoTiles_item" href="#<?php echo $yt_video_id ?>" data-action="playVideo">
			        		<div class="VideoTile_imgWrapper">
			        			<img class="VideoTile_img" src="https://img.youtube.com/vi/<?php echo $yt_video_id ?>/default.jpg" alt="">
			        			<div class="VideoTile_duration">03:12</div>
			        		</div>
			        		<h4 class="VideoTile_title">
			        			<?php echo $video->post_title ?>
			        		</h4>
			        	</a>
		        	<?php endforeach ?>
		        </div>
		      </div>
	    	<?php endif ?>

	    	<?php if ($field['playlist']): ?>
	    		<?php
						$first_video_id = get_post($field['playlist'][0]);
						$first_video_url = get_field('video_url', $first_video_id);
						$yt_video_id = substr($first_video_url, strpos($first_video_url, '?v=') + 3);
					?>

		      <div class="VideoPlayer_wrapper">
		        <div class="VideoPlayer_video">
		          <div class="Video">
		          	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $yt_video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		          </div>
		        </div>
		        <div class="VideoPlaylist VideoPlayer_playlist">
		        	<?php if ($field['playlist_title']): ?>
			          <h4 class="VideoPlaylist_title">
			          	<?php echo $field['playlist_title'] ?>
			          </h4>
		        	<?php endif ?>

		          <div class="VideoPlaylist_itemsWrapper">
		          	<div class="VideoPlaylist_items">
		          		<?php foreach ($field['playlist'] as $index => $video_id): ?>
		          			<?php
		          				$video = get_post($video_id);
		          				$video_url = get_field('video_url', $video_id);
		          				$yt_video_id = substr($video_url, strpos($video_url, '?v=') + 3);
		          			?>

			          		<a class="VideoTile VideoTile-playlist VideoPlaylist_item<?php echo $index == 0 ? ' VideoTile-active' : '' ?>" href="#<?php echo $yt_video_id ?>" data-action="playVideo">
			          			<div class="VideoTile_imgWrapper">
			          				<img class="VideoTile_img" src="https://img.youtube.com/vi/<?php echo $yt_video_id ?>/default.jpg" alt="">
			          				<div class="VideoTile_duration">03:12</div>
			          			</div>
			          			<h4 class="VideoTile_title">
			          				<?php echo $video->post_title ?>
			          			</h4>
			          		</a>
		          		<?php endforeach ?>
		          	</div>
		          </div>
		        </div>
		      </div>
	    	<?php endif ?>
	    </div>
	  </div>
	</div>
<?php endif ?>