<?php
$textblocks_class = $field['background_color'] === 'lightbeige' ? ' TextBlocks-lightBeigeBg' : '';
?>

<div class="TextBlocks<?php echo $textblocks_class ?>">
  <div class="Container">
    <?php if ($field['title']): ?>
      <h2 class="SectionTitle SectionTitle-textBlocks SectionTitle-center TextBlocks_title">
        <?php echo $field['title'] ?>
      </h2>
    <?php endif ?>
    <?php if ($field['description']): ?>
      <div class="TextBlocks_description">
        <?php echo $field['description'] ?>
      </div>
    <?php endif ?>
    <?php if ($field['text_blocks']): ?>
      <div class="TextBlocks_items">
        <?php foreach ($field['text_blocks'] as $key => $text_block): ?>
          <?php
          $text_block_is_extended = !!($text_block['button'] && $text_block['display_button'] === 'yes' && $text_block['button']['url'] && $text_block['button']['text']);

          $text_block_class = ($key % 2) != 0 ? ' TextBlock-reverse' : '';
          $text_block_class .= $text_block_is_extended ? ' TextBlock-extended' : '';
          $image = wp_get_attachment_image( $text_block['image'], 'full', false, array('class' => 'TextBlock_img') );
          ?>
          <div class="TextBlock<?php echo $text_block_class ?> TextBlocks_item">
            <?php if ($text_block['title']): ?>
              <h3 class="TextBlock_title">
                <?php echo $text_block['title'] ?>
              </h3>
            <?php endif ?>
            <?php if ($text_block['text']): ?>
              <div class="TextBlock_text">
                <?php echo $text_block['text'] ?>
              </div>
            <?php endif ?>
            <?php if ($text_block_is_extended): ?>
              <?php
              $button_style_classes = [
                'filled' => 'BtnYellow',
                'outline' => 'BtnOutline',
                'black' => 'BtnBlack',
              ];

              $button_style_class = $button_style_classes[$text_block['button']['button_style']];
              $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : '';
              $button_icon_class = ($text_block['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $text_block['button']['button_icon'] : '';
              $button_classes = $button_style_class . $button_additional_class . $button_icon_class . ' TextBlock_btn';
              ?>
              <a class="<?php echo $button_classes ?>" href="<?php echo $text_block['button']['url'] ?>">
                <?php echo $text_block['button']['text'] ?>
              </a>
            <?php endif ?>
            <?php if ($image): ?>
              <div class="TextBlock_imgWrapper">
                <?php echo $image ?>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
</div>