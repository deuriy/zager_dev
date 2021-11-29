<?php if ($field['title'] || $field['text']): ?>
	<div class="TitleAndTextSection">
	  <div class="Container">
	    <div class="TitleAndTextSection_wrapper">
	    	<?php if ($field['title']): ?>
		      <h2 class="TitleAndTextSection_title">
		      	<?php echo $field['title'] ?>
		      </h2>
	    	<?php endif ?>

	    	<?php if ($field['text']): ?>
		      <div class="TitleAndTextSection_text">
		      	<?php echo $field['text'] ?>
		      </div>
	    	<?php endif ?>
	    </div>
	  </div>
	</div>
<?php endif ?>