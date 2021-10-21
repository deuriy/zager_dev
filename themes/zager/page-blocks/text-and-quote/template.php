<div class="TextAndQuote">
  <div class="Container">
    <div class="TextAndQuote_wrapper">
      <h2 class="SectionTitle TextAndQuote_title">You can try our guitars at your home, risk-free</h2>
      <?php
      $quote_block = $field['quote_block_type'] === 'default' ? get_field('quote_block', 'option') : $field['quote_block'];
      $quote_css_class = $quote_block['text_background_style'] === 'dark' ? ' Quote-greyBg' : '';
      ?>
      <div class="QuoteBlock QuoteBlock-textAndQuoteSection TextAndQuote_quoteBlock">
        <?php if ($quote_block['background_image']): ?>
          <img class="QuoteBlock_img" loading="lazy" src="<?php echo $quote_block['background_image']; ?>" alt="Guitar">
        <?php endif ?>
        <?php if ($quote_block['text'] || $quote_block['author']): ?>
          <div class="Quote Quote-textAndQuoteSection QuoteBlock_quote<?php echo $quote_css_class; ?>">
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
        <div class="TextAndQuote_text">
          <?php echo $field['text'] ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>