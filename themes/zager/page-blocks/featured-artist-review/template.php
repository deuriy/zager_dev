<?php if ($field['title'] || $field['label'] || $field['artist_review']): ?>
  <?php
    $review_text_wrapper = get_field('text_wrapper', $field['artist_review']);
    $review_image_wrapper = get_field('image_wrapper', $field['artist_review']);
  ?>
  <div class="ArtistReview">
    <div class="Container">
      <?php if ($field['title']): ?>
        <h2 class="SectionTitle ArtistReview_title">
          <?php echo $field['title'] ?>
        </h2>
      <?php endif ?>
      
      <div class="ArtistReview_inner">
        <?php if ($field['label']): ?>
          <span class="Tag Tag-artistReview ArtistReview_tag">
            <?php echo $field['label'] ?>
          </span>
        <?php endif ?>

        <?php if ($review_text_wrapper['author']): ?>
          <div class="ArtistReview_author">
            <?php echo $review_text_wrapper['author'] ?>
          </div>
        <?php endif ?>

        <?php if ($review_text_wrapper['subtitle']): ?>
          <div class="ArtistReview_subTitle">
            <?php echo $review_text_wrapper['subtitle'] ?>
          </div>
        <?php endif ?>

        <?php if ($review_image_wrapper['review_link'] && $review_image_wrapper['image']): ?>
          <?php
            $review_image = wp_get_attachment_image( $review_image_wrapper['image'], 'full', false, array('class' => 'ArtistReview_img') );
          ?>

          <div class="ArtistReview_imgWrapper">
            <a href="<?php echo $review_image_wrapper['review_link'] ?>"<?php echo $review_image_wrapper['use_review_link_as_fancybox'] == 'yes' ? ' data-fancybox' : '' ?>>
              <?php echo $review_image ?>
            </a>
          </div>
        <?php endif ?>

        <?php if ($review_text_wrapper['description']): ?>
          <div class="ArtistReview_text">
            <?php echo $review_text_wrapper['description'] ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php endif ?>