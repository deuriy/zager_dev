<?php
$image = wp_get_attachment_image( $field['image'], 'full', false, array('class' => 'TextAndImage_img') );
?>

<div class="TextAndImage">
  <div class="Container Container-textAndImage">
    <div class="TextAndImage_wrapper">
      <?php if ($field['text'] || ($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text'])): ?>
        <div class="TextAndImage_left">
          <div class="TextAndImage_textWrapper">
            <?php if ($field['text']): ?>
              <div class="SectionTitle TextAndImage_text">
                <?php echo $field['text'] ?>
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
              $button_classes = $button_style_class . $button_additional_class . $button_icon_class . 'TextAndImage_btn';
              ?>
              <a class="<?php echo $button_classes ?>" href="<?php echo $field['button']['url'] ?>">
                <?php echo $field['button']['text'] ?>
              </a>
            <?php endif ?>
          </div>
        </div>
      <?php endif ?>

      <?php if ($image): ?>
        <div class="TextAndImage_right">
          <div class="TextAndImage_imgWrapper">
            <?php echo $image ?>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>