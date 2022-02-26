<?php
$series_section = $field['type'] === 'default' ? get_field('default_page_blocks', 'option')['series_section'] : $field;
$series_section_classes = $series_section['style'] == 'lightbeige' ? ' SeriesSection-lightBeige' : '';
$series_section_classes .= $series_section['style'] == 'gradient' ? ' SeriesSection-gradientBg' : '';
$series_block_text_classes = $series_section['style'] == 'lightbeige' ? ' SeriesBlock_textWrapper-greyBgMob' : '';

$series_blocks_styles = array_column($series_section['series_blocks'], 'style');
$is_extended_section = array_search('extended', $series_blocks_styles) !== false;
$series_section_classes .= $is_extended_section ? ' SeriesSection-extended' : '';
?>

<div class="SeriesSection<?php echo $series_section_classes ?>">
  <div class="Container">
    <?php if ($series_section['title']): ?>
      <h2 class="SectionTitle SectionTitle-center SectionTitle-seriesSection SeriesSection_title">
        <?php echo $series_section['title'] ?>
      </h2>
    <?php endif ?>

    <?php if ($series_section['series_blocks']): ?>
      <?php if ($is_extended_section): ?>
        <div class="SeriesSwiper SeriesSection_swiper swiper hidden-mdPlus">
          <div class="swiper-wrapper">
            <?php foreach ($series_section['series_blocks'] as $series_block): ?>
              <?php
                $series_block_classes = $series_block['style'] == 'extended' ? ' SeriesBlock-extended' : '';
                $image = wp_get_attachment_image( $series_block['image'], 'full', false, array('class' => 'SeriesBlock_img') );
              ?>

              <div class="swiper-slide SeriesSwiper_slide">
                <div class="SeriesBlock<?php echo $series_block_classes ?>">
                  <?php if ($series_block['label']): ?>
                    <div class="Label Label-seriesBlock SeriesBlock_label">
                      <?php echo $series_block['label'] ?>
                    </div>
                  <?php endif ?>

                  <?php if ($series_block['title']): ?>
                    <h3 class="SeriesBlock_title">
                      <?php echo $series_block['title'] ?>
                    </h3>
                  <?php endif ?>

                  <?php if ($image): ?>
                    <div class="SeriesBlock_imgWrapper">
                      <?php echo $image ?>
                    </div>
                  <?php endif ?>

                  <?php if ($series_block['description']): ?>
                    <div class="SeriesBlock_textWrapper<?php echo $series_block_text_classes ?>">
                      <div class="SeriesBlock_description">
                        <?php echo $series_block['description'] ?>
                      </div>

                      <?php if ($series_block['style'] == 'extended'): ?>
                        <?php if ($series_block['price_from']): ?>
                          <div class="SeriesBlock_price">
                            <?php echo 'from $' . $series_block['price_from'] ?>
                          </div>
                        <?php endif ?>

                        <?php
                          $button_is_display = !!($series_block['display_button'] === 'yes' && $series_block['button']['url'] && $series_block['button']['text']);
                          if ($button_is_display):
                            $button_style_classes = [
                              'filled' => 'BtnYellow',
                              'outline' => 'BtnOutline',
                              'black' => 'BtnBlack',
                            ];

                            $button_style_class = $button_style_classes[$series_block['button']['button_style']];
                            $button_additional_class = $button_style_class === 'BtnYellow' ? ' BtnYellow-seriesBlock ' : '';
                            $button_additional_class .= $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : '';
                            $button_icon_class = ($series_block['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $series_block['button']['button_icon'] : '';
                            $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
                        ?>
                          <a class="<?php echo $button_classes ?> SeriesBlock_btn" href="<?php echo $series_block['button']['url'] ?>">
                            <?php echo $series_block['button']['text'] ?>
                          </a>
                        <?php endif ?>
                      <?php endif ?>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif ?>

      <div class="SeriesSection_items<?php echo $is_extended_section ? ' hidden-smMinus' : '' ?>">
        <?php foreach ($series_section['series_blocks'] as $series_block): ?>
          <?php
            $series_block_classes = $series_block['style'] == 'extended' ? ' SeriesBlock-extended' : '';
            $image = wp_get_attachment_image( $series_block['image'], 'full', false, array('class' => 'SeriesBlock_img') );
          ?>

          <div class="SeriesBlock SeriesSection_item<?php echo $series_block_classes ?>">
            <?php if ($series_block['label']): ?>
              <div class="Label Label-seriesBlock SeriesBlock_label">
                <?php echo $series_block['label'] ?>
              </div>
            <?php endif ?>

            <?php if ($series_block['title']): ?>
              <h3 class="SeriesBlock_title">
                <?php echo $series_block['title'] ?>
              </h3>
            <?php endif ?>

            <?php if ($image): ?>
              <div class="SeriesBlock_imgWrapper">
                <?php echo $image ?>
              </div>
            <?php endif ?>

            <?php if ($series_block['description']): ?>
              <div class="SeriesBlock_textWrapper<?php echo $series_block_text_classes ?>">
                <div class="SeriesBlock_description">
                  <?php echo $series_block['description'] ?>
                </div>

                <?php if ($series_block['style'] == 'extended'): ?>
                  <?php if ($series_block['price_from']): ?>
                    <div class="SeriesBlock_price">
                      <?php echo 'from $' . $series_block['price_from'] ?>
                    </div>
                  <?php endif ?>

                  <?php
                    $button_is_display = !!($series_block['display_button'] === 'yes' && $series_block['button']['url'] && $series_block['button']['text']);
                    if ($button_is_display):
                      $button_style_classes = [
                        'filled' => 'BtnYellow',
                        'outline' => 'BtnOutline',
                        'black' => 'BtnBlack',
                      ];

                      $button_style_class = $button_style_classes[$series_block['button']['button_style']];
                      $button_additional_class = $button_style_class === 'BtnYellow' ? ' BtnYellow-seriesBlock ' : '';
                      $button_additional_class .= $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : '';
                      $button_icon_class = ($series_block['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $series_block['button']['button_icon'] : '';
                      $button_classes = $button_style_class . $button_additional_class . $button_icon_class;
                  ?>
                    <a class="<?php echo $button_classes ?> SeriesBlock_btn" href="<?php echo $series_block['button']['url'] ?>">
                      <?php echo $series_block['button']['text'] ?>
                    </a>
                  <?php endif ?>
                <?php endif ?>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <?php if ($series_section['buttons']): ?>
      <ul class="SeriesSection_buttons">
        <?php
        foreach($series_section['buttons'] as $button):
          $button_style_classes = [
            'filled' => 'BtnYellow',
            'outline' => 'BtnOutline',
            'black' => 'BtnBlack',
          ];

          $button_style_class = $button_style_classes[$button['button_style']];
          $button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
          $button_icon_class = ($button['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $button['button_icon'] . ' ' : ' ';
          $button_classes = $button_style_class . $button_additional_class . $button_icon_class . $button_style_class . '-seriesSection SeriesSection_btn';
          ?>
          <li class="SeriesSection_btnItem">
            <a class="<?php echo $button_classes; ?>" href="<?php echo $button['url'] ?>">
              <?php echo $button['text'] ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif ?>
  </div>
</div>