<?php if ($field['title'] || $field['logos']): ?>
	<div class="Logos">
	  <div class="Container">
	  	<?php if ($field['title']): ?>
		    <h3 class="Logos_title">
		    	<?php echo $field['title'] ?>
		    </h3>
	  	<?php endif ?>

	  	<?php if ($field['logos']): ?>
		    <div class="Logos_items">
		    	<?php foreach ($field['logos'] as $logo_id): ?>
		    		<?php
		    			$logo = wp_get_attachment_image( $logo_id, 'full', false, array('class' => 'Logos_img') );
		    			echo $logo;
		    		?>
		    	<?php endforeach ?>
		    </div>
	  	<?php endif ?>
	  </div>
	</div>
<?php endif ?>
