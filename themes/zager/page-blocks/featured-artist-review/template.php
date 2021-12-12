<?php if ($field['title'] || $field['label'] || $field['artist_review']): ?>
  <?php
    $author = get_field('author', $field['artist_review']);
    $subtitle = get_field('subtitle', $field['artist_review']);
    $media_type = get_field('media_type', $field['artist_review']);
    $text = get_field('text', $field['artist_review']);
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

        <?php if ($author): ?>
          <div class="ArtistReview_author">
            <?php echo $author ?>
          </div>
        <?php endif ?>

        <?php if ($subtitle): ?>
          <div class="ArtistReview_subTitle">
            <?php echo $subtitle ?>
          </div>
        <?php endif ?>

          <?php if ($media_type == 'yt_video'): ?>
            <?php
              $video_url = get_field('video_url', $field['artist_review']);
              $yt_video_id = substr($video_url, strpos($video_url, '?v=') + 3);
            ?>

            <?php if ($yt_video_id): ?>
              <div class="ArtistReview_videoWrapper">
                <div class="Video">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $yt_video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            <?php endif ?>
          <?php elseif ($media_type == 'image'): ?>
            <?php
              $image_id = get_field('image', $field['artist_review']);
              $image = wp_get_attachment_image( $image_id, 'full', false, array('class' => 'VideoReview_img') );              
            ?>

            <?php if ($image): ?>
              <div class="ArtistReview_imgWrapper">
                <?php echo $image; ?>
              </div>
            <?php endif ?>
          <?php endif ?>

        <?php if ($text): ?>
          <div class="ArtistReview_text">
            <?php echo $text ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php endif ?>