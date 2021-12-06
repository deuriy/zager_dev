<?php
$quote_block = $field['quote_block_type'] === 'default' ? get_field('quote_block', 'option') : $field['quote_block'];
$quote_css_class = $quote_block['text_background_style'] === 'dark' ? ' Quote-greyBg' : '';
$image = wp_get_attachment_image( $quote_block['background_image'], 'full', false, array('class' => 'QuoteBlock_img') );
?>

<div class="Intro">
  <div class="Container">
    <div class="Intro_wrapper">
      <?php if ($field['emphasis']): ?>
        <div class="Intro_emphasis">
          <?php echo $field['emphasis'] ?>
        </div>
      <?php endif ?>
      
      <div class="QuoteBlock Intro_quoteBlock">
        <?php if ($image): ?>
          <?php echo $image ?>
        <?php endif ?>

        <?php if ($quote_block['text'] || $quote_block['author']): ?>
          <div class="Quote QuoteBlock_quote<?php echo $quote_css_class; ?>">
            <?php if ($quote_block['text']): ?>
              <div class="Quote_text">
                <?php echo $quote_block['text'] ?>
              </div>
            <?php endif ?>

            <?php if ($quote_block['author']): ?>
              <div class="Quote_author">
                <?php echo $quote_block['author'] ?>
              </div>
            <?php endif ?>
          </div>
        <?php endif ?>
      </div>

      <?php if ($field['text']): ?>
        <div class="Intro_text">
          <?php echo $field['text'] ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>