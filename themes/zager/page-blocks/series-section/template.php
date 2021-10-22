<?php
$series_section = $field['type'] === 'default' ? get_field('series_section', 'option') : $field;
?>

<div class="SeriesSection">
  <div class="Container">
    <?php if ($series_section['title']): ?>
      <h2 class="SectionTitle SectionTitle-center SectionTitle-seriesSection SeriesSection_title">
        <?php echo $series_section['title'] ?>
      </h2>
    <?php endif ?>
    <?php if ($series_section['series_blocks']): ?>
      <div class="SeriesSection_items">
        <?php foreach ($series_section['series_blocks'] as $series_block): ?>
          <div class="SeriesBlock SeriesSection_item">
            <?php if ($series_block['label']): ?>
              <div class="Label Label-seriesBlock SeriesBlock_label"><?php echo $series_block['label'] ?></div>
            <?php endif ?>
            <?php if ($series_block['title']): ?>
              <h3 class="SeriesBlock_title">
                <?php echo $series_block['title'] ?>
              </h3>
            <?php endif ?>
            <?php if ($series_block['image']): ?>
              <div class="SeriesBlock_imgWrapper">
                <img class="SeriesBlock_img" loading="lazy" src="<?php echo $series_block['image'] ?>" alt="ZAD 900">
              </div>
            <?php endif ?>
            <?php if ($series_block['description']): ?>
              <div class="SeriesBlock_textWrapper">
                <div class="SeriesBlock_description"><?php echo $series_block['description'] ?></div>
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