<?php if ($field['posts']): ?>
  <div class="Posts Posts-tabs Tabs_posts">
    <?php foreach ($field['posts'] as $post_obj): ?>
      <div class="Post Posts_item PostsSection_item">
        <?php
          $thumbnail = get_the_post_thumbnail( $post_obj->ID, 'full', array('class' => 'Post_img') );
          $post_content = $post_obj->post_excerpt != '' ? $post_obj->post_excerpt : $post_obj->post_content;
        ?>

        <?php if ($thumbnail): ?>
          <div class="Post_imgWrapper">
            <?php echo $thumbnail ?>
          </div>
        <?php endif ?>

        <?php if ($post_obj->post_title): ?>
          <h3 class="Post_title">
            <?php echo $post_obj->post_title ?>
          </h3>
        <?php endif ?>

        <?php if ($post_content): ?>
          <div class="Post_description">
            <?php echo wp_trim_words( $post_content, 40, '...' ); ?>
          </div>
        <?php endif ?>

      </div>
    <?php endforeach ?>
  </div>
<?php endif ?>
