<?php
opcache_reset();
$textsection_class = $field['background_color'] === 'lightbeige' ? ' TextSection-lightBeigeBg' : '';
$textsection_class .= $field['block_type'] === 'reverse' ? ' TextSection-reverse' : '';
$textsection_class .= $field['title_position'] === 'top' ? ' TextSection-titleTop' : '';
$title_class = $field['dekstop_title_size'] != 'large' ? ' SectionTitle-' . $field['dekstop_title_size'] . 'Desktop' : '';
$title_class .= $field['title_position'] == 'top' ? ' SectionTitle-center SectionTitle-alignLeftXS' : '';
?>

<div class="TextSection<?php echo $textsection_class ?>">
  <div class="Container">
    <div class="TextSection_wrapper">
      <?php if ($field['title']): ?>
        <h2 class="SectionTitle TextSection_title<?php echo $title_class ?>">
          <?php echo $field['title'] ?>
        </h2>
      <?php endif ?>

      <?php
      $image = wp_get_attachment_image( $field['image'], 'full', false, array('class' => 'TextSection_img') );
      $button_is_display = !!($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']);
      if ($button_is_display):
        $button_style_classes = [
          'filled' => 'BtnYellow',
          'outline' => 'BtnOutline',
          'black' => 'BtnBlack',
        ];

        $button_style_class = $button_style_classes[$field['button']['button_style']];
        $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
        $button_icon_class = ($field['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $field['button']['button_icon'] : '';
        $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
      endif
      ?>
      <?php if ($image): ?>
        <div class="TextSection_imgWrapper">
          <?php echo $image ?>
          <?php if ($button_is_display && $field['button']['position'] === 'over_image'): ?>
            <a class="<?php echo $button_classes ?> TextSection_mediaBtn" href="<?php echo $field['button']['url'] ?>"<?php echo $field['button']['use_as_fancybox_link'] == 'yes' ? ' data-fancybox' : '' ?>>
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