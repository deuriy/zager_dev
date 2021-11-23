<div class="TextAndVideo">
  <div class="Container">
    <div class="TextAndVideo_wrapper">
    	<?php if ($field['title']): ?>
    		<h2 class="SectionTitle SectionTitle-lightBeige TextAndVideo_title">
    			<?php echo $field['title'] ?>
    		</h2>
    	<?php endif ?>

    	<?php if ($field['video_url'] && $field['video_thumbnail']): ?>
    		<?php
    			$video_thumbnail = wp_get_attachment_image( $field['video_thumbnail'], 'full', false, array('class' => 'TextAndVideo_img') );
    		?>
    		
    		<div class="TextAndVideo_imgWrapper">
	      	<a href="<?php echo $field['video_url'] ?>" data-fancybox>
	      		<?php echo $video_thumbnail ?>
	      	</a>
	      </div>
    	<?php endif ?>
      
      <?php
      	if ($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']):
		      $button_style_classes = [
		        'filled' => 'BtnYellow',
		        'outline' => 'BtnOutline',
		        'black' => 'BtnBlack',
		      ];

		      $button_style_class = $button_style_classes[$field['button']['button_style']];
		      $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
		      $button_icon_class = ($field['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $field['button']['button_icon'] . ' ' : ' ';
		      $button_classes = $button_style_class . $button_additional_class . $button_icon_class . 'TextAndVideo_btn';
	      ?>
        <a class="<?php echo $button_classes ?>" href="<?php echo $field['button']['url'] ?>">
          <?php echo $field['button']['text'] ?>
        </a>
	    <?php endif ?>
    </div>
  </div>
</div>