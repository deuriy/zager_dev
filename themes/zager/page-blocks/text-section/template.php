<?php
$textsection_class = $field['background_color'] === 'lightbeige' ? ' TextSection-lightBeigeBg' : '';
?>

<div class="TextSection<?php echo $textsection_class ?>">
  <div class="Container">
    <div class="TextSection_wrapper">
      <?php if ($field['title']): ?>
        <h2 class="SectionTitle TextSection_title">
          <?php echo $field['title'] ?>
        </h2>
      <?php endif ?>
      <?php
      $button_is_display = !!($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']);
      if ($button_is_display):
        $button_style_class = '';

        switch ($field['button']['button_style']) {
          case 'filled':
          $button_style_class = 'BtnYellow';
          break;
          case 'outline':
          $button_style_class = 'BtnOutline';
          break;
          case 'black':
          $button_style_class = 'BtnBlack';
          break;
        }

        $button_text_class = $button_style_class === 'BtnOutline' ? 'BtnOutline-darkText ' : '';
        $button_icon_class = $button_style_class . '-' . $field['button']['button_icon'] . ' ';
        $button_classes = $button_style_class . ' ' . $button_text_class . $button_icon_class . $button_style_class . '-lightBeigeBg';
      endif
      ?>
      <?php if ($field['image']): ?>
        <div class="TextSection_imgWrapper">
          <img class="TextSection_img" loading="lazy" src="<?php echo $field['image'] ?>" alt="">
          <?php if ($button_is_display && $field['button']['position'] === 'over_image'): ?>
            <a class="<?php echo $button_classes ?> TextSection_mediaBtn" href="<?php echo $field['button']['url'] ?>" data-fancybox>
              <?php echo $field['button']['text'] ?>
            </a>
          <?php endif ?>
        </div>
      <?php endif ?>
      <?php if ($field['text']): ?>
        <div class="TextSection_text">
          <?php echo $field['text'] ?>
        </div>
      <?php endif ?>
      <?php if ($button_is_display && $field['button']['position'] === 'after_text'): ?>
        <a class="<?php echo $button_classes ?> TextSection_btn" href="<?php echo $field['button']['url'] ?>">
          <?php echo $field['button']['text'] ?>
        </a>
      <?php endif ?>
    </div>
  </div>
</div>