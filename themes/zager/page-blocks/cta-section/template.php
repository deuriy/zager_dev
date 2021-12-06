<?php
$image = wp_get_attachment_image( $field['image'], 'full', false, array('class' => 'CTASection_img') );
?>

<div class="CTASection">
  <div class="Container">
    <?php if ($field['title']): ?>
      <h2 class="SectionTitle CTASection_title">
        <?php echo $field['title'] ?>
      </h2>
    <?php endif ?>

    <?php if ($field['subtitle']): ?>
      <h3 class="CTASection_subTitle">
        <?php echo $field['subtitle'] ?>
      </h3>
    <?php endif ?>

    <?php if ($field['display_button'] === 'yes' && $field['button']['url'] && $field['button']['text']): ?>
      <?php
      $button_style_classes = [
        'filled' => 'BtnYellow',
        'outline' => 'BtnOutline',
        'black' => 'BtnBlack',
      ];

      $button_style_class = $button_style_classes[$field['button']['button_style']];
      $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
      $button_icon_class = ($field['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $field['button']['button_icon'] . ' ' : ' ';
      $button_classes = $button_style_class . $button_additional_class . $button_icon_class . 'CTASection_btn';
      ?>
      <div class="CTASection_btnWrapper">
        <a class="<?php echo $button_classes ?>" href="<?php echo $field['button']['url'] ?>">
          <?php echo $field['button']['text'] ?>
        </a>
      </div>
    <?php endif ?>
  </div>

  <?php if ($image): ?>
    <div class="CTASection_imgWrapper">
      <?php echo $image ?>
    </div>
  <?php endif ?>
</div>