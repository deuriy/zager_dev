<?php
  switch ($field['block_type']) {
    case 'default_product':
      $icon_and_texts = get_field('icons_and_texts', 'option');
      break;
    default:
      $icon_and_texts = $field['icons_and_texts'];
      break;
  }
?>

<?php if ($icon_and_texts): ?>
  <div class="IconsAndTexts IconsAndTexts-brownBg IconsAndTexts-product">
    <div class="Container">
    <div class="IconsAndTexts_wrapper">
      <?php foreach ($icon_and_texts as $icon_and_text): ?>
        <div class="IconAndText IconsAndTexts_item">
          <?php if ($icon_and_text['icon']): ?>
            <div class="CircleIcon IconAndText_icon">
              <img class="CircleIcon_img" loading="lazy" src="<?php echo $icon_and_text['icon'] ?>" alt="Guitar">
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