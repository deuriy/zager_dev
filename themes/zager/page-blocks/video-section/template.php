<?php
switch ($field['video_section_type']) {
  case 'default':
    $video_section = get_field('video_section', 'option');
    break;
  
  case 'default_product':
    $video_section = get_field('product_video_section', 'option');
    break;
  
  default:
    $video_section = $field;
    break;
}

$video_section_class = is_product() ? ' VideoSection-product' : '';
$video_section_container_class = is_product() ? ' Container-videoSectionProduct' : '';
?>

<div class="VideoSection<?php echo $video_section_class; ?>">
  <div class="Container<?php echo $video_section_container_class; ?>">
    <?php if ($video_section['title']): ?>
      <h2 class="SectionTitle SectionTitle-lightBeige VideoSection_title">
        <?php echo $video_section['title'] ?>
      </h2>
    <?php endif ?>
    <?php if ($video_section['video_blocks']): ?>
      <div class="VideoSection_swiperWrapper">
        <div class="VideoSwiper VideoSection_swiper swiper">
          <div class="swiper-wrapper">
            <?php foreach ($video_section['video_blocks'] as $videoblock): ?>
              <div class="swiper-slide VideoSwiper_slide">
                <div class="VideoBlock">
                  <?php if ($videoblock['thumbnail'] && $videoblock['youtube_video_url']): ?>
                    <a class="VideoBlock_videoThumb" href="<?php echo $videoblock['youtube_video_url']; ?>" data-fancybox="gallery">
                      <img loading="lazy" src="<?php echo $videoblock['thumbnail']; ?>" alt="">
                    </a>
                  <?php endif ?>
                  <?php if ($videoblock['title']): ?>
                    <h3 class="VideoBlock_title"><?php echo $videoblock['title'] ?></h3>
                  <?php endif ?>
                  <?php if ($videoblock['description']): ?>
                    <h3 class="VideoBlock_description"><?php echo $videoblock['description'] ?></h3>
                  <?php endif ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <button class="SwiperBtn SwiperBtn-next VideoSection_next hidden-xs" type="button"></button>
      </div>
    <?php endif ?>
    <div class="SwiperControls">
      <div class="SwiperPagination SwiperControls_pagination"></div>
      <?php if ($video_section['button'] && $video_section['display_button'] === 'yes' && $video_section['button']['url'] && $video_section['button']['text']): ?>
        <?php
        $button_style_classes = [
          'filled' => 'BtnYellow',
          'outline' => 'BtnOutline',
          'black' => 'BtnBlack',
        ];

        $button_style_class = $button_style_classes[$video_section['button']['button_style']];
        $button_icon_class = ($video_section['button']['button_icon'] !== 'no_icon') ? ' ' . $button_style_class . '-' . $video_section['button']['button_icon'] . ' ' : ' ';
        $button_classes = $button_style_class . $button_icon_class;
        ?>
        <a class="<?php echo $button_classes ?>" href="<?php echo $video_section['button']['url'] ?>"><?php echo $video_section['button']['text'] ?></a>
      <?php endif ?>
    </div>
  </div>
</div>