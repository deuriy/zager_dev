<?php
  switch ($field['block_type']) {
    case 'default_product':
      $icon_and_texts = get_field('product_page_blocks', 'option')['product_icons_and_texts'];
      break;
    default:
      $icon_and_texts = $field['icons_and_texts'];
      break;
  }

  $icons_and_texts_classes = $field['background'] == 'brown' ? ' IconsAndTexts-brownBg' : '';
  $icon_and_text_classes = $field['background'] == 'light' ? ' IconAndText-darkText' : '';
?>

<?php if ($icon_and_texts): ?>
  <div class="IconsAndTexts IconsAndTexts-product<?php echo $icons_and_texts_classes ?>">
    <div class="Container">
      <div class="IconsAndTexts_wrapper">
        <?php foreach ($icon_and_texts as $icon_and_text): ?>
          <?php
            $icon = wp_get_attachment_image( $icon_and_text['icon'], 'full', false, array('class' => 'CircleIcon_img') );
          ?>

          <div class="IconAndText IconsAndTexts_item<?php echo $icon_and_text_classes ?>">
            <?php if ($icon): ?>
              <div class="CircleIcon IconAndText_icon">
                <?php echo $icon ?>
              </div>
            <?php endif ?>

            <?php if ($icon_and_text['title']): ?>
              <h3 class="IconAndText_title">
                <?php echo $icon_and_text['title'] ?>
              </h3>
            <?php endif ?>

            <?php if ($icon_and_text['text']): ?>
              <div class="IconAndText_text">
                <?php echo $icon_and_text['text'] ?>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <?php endif ?>