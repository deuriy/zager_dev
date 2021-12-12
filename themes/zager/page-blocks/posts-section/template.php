<?php if ($field['posts'] || $field['title']): ?>
	<div class="PostsSection">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h2 class="SectionTitle PostsSection_title">
		    	<?php echo $field['title'] ?>
		    </h2>
	  	<?php endif ?>

	    <?php if ($field['posts']): ?>
		    <div class="Posts PostsSection_items">
		    	<?php foreach ($field['posts'] as $post_id): ?>
		    		<?php
		    			$post = get_post($post_id);
		    			$thumbnail = get_the_post_thumbnail( $post_id, 'full', array('class' => 'Post_img') );
		    			$post_content = $post->post_excerpt != '' ? $post->post_excerpt : $post->post_content;
		    		?>

			      <div class="Post Posts_item PostsSection_item">
			      	<?php if ($thumbnail): ?>
				        <div class="Post_imgWrapper">
				        	<?php echo $thumbnail ?>
				        </div>
			      	<?php endif ?>

			      	<?php if ($post->post_title): ?>
				        <h3 class="Post_title">
				        	<?php echo $post->post_title ?>
				        </h3>
			      	<?php endif ?>

			      	<?php if ($post_content): ?>
				        <div class="Post_description">
				          <?php echo wpautop(wp_trim_words( $post_content, 60, '...' )); ?>
				        </div>
			      	<?php endif ?>
			      </div>
		    	<?php endforeach ?>
		    </div>
	    <?php endif ?>

	    <?php
	    	$button_is_display = !!($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']);
	      if ($button_is_display):
	        $button_style_classes = [
	          'filled' => 'BtnYellow',
	          'outline' => 'BtnOutline',
	          'black' => 'BtnBlack',
	        ];

	        $button_style_class = $button_style_classes[$field['button']['button_style']];
	        $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
	        $button_additional_class .= $button_style_class === 'BtnYellow' ? ' BtnYellow-postsSection ' : ' ';
	        $button_icon_class = ($field['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $field['button']['button_icon'] : '';
	        $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
	    ?>
	    	<a class="<?php echo $button_classes ?> PostsSection_viewAllBtn hidden-smPlus" href="<?php echo $field['button']['url'] ?>"<?php echo $field['button']['open_in_fancybox'] === 'yes' ? 'data-fancybox' : '' ?>>
          <?php echo $field['button']['text'] ?>
        </a>
	    <?php endif ?>
	  </div>
	</div>
<?php endif ?>