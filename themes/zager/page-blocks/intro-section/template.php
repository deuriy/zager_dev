<div class="Intro">
  <div class="Container">
    <div class="Intro_wrapper">
      <?php if ($field['emphasis']): ?>
        <div class="Intro_emphasis">
          <?php echo $field['emphasis'] ?>
        </div>
      <?php endif ?>
      <?php
      $quote_block = $field['quote_block_type'] === 'default_quoteblock' ? get_field('default_quote_block', 'option') : $field['quote_block'];
      $quote_text_css_class = $quote_block['text_background_style'] === 'dark' ? ' Quote_text-greyBg' : '';
      ?>
      <div class="QuoteBlock Intro_quoteBlock">
        <?php if ($quote_block['background_image']): ?>
          <img class="QuoteBlock_img" loading="lazy" src="<?php echo $quote_block['background_image']; ?>" alt="Guitar">
        <?php endif ?>
        <?php if ($quote_block['text'] || $quote_block['author']): ?>
          <div class="Quote QuoteBlock_quote">
            <?php if ($quote_block['text']): ?>
              <div class="Quote_text<?php echo $quote_text_css_class; ?>">
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