<?php
$style = $field['background_image'] ? ' style="background-image: url(\''. $field['background_image'] .'\');"' : '';
$icon_and_texts = $field['icons_and_texts_type'] === 'default' ? get_field('icons_and_texts', 'option') : $field['icons_and_texts'];
?>

<div class="NewsLetter"<?php echo $style ?>>
  <div class="Container">
    <?php if ($field['title']): ?>
      <h2 class="SectionTitle SectionTitle-lightBeige SectionTitle-center NewsLetter_title">
        <?php echo $field['title'] ?>
      </h2>
    <?php endif ?>

    <form class="SubscribeForm NewsLetter_form">
      <input class="FormText SubscribeForm_textInput" type="email" name="email" placeholder="Email address">
      <button class="BtnYellow BtnYellow-email SubscribeForm_submitBtn" type="submit">Join</button>
    </form>

    <?php if ($icon_and_texts): ?>
      <div class="IconsAndTexts NewsLetter_iconsAndTexts">
        <div class="IconsAndTexts_wrapper">
          <?php foreach ($icon_and_texts as $icon_and_text): ?>
            <?php
              $icon = wp_get_attachment_image( $icon_and_text['icon'], 'full', false, array('class' => 'CircleIcon_img') );
            ?>

            <div class="IconAndText IconsAndTexts_item">
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
    <?php endif ?>
  </div>
</div>