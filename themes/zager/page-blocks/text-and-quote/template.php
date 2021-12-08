<?php
$quote_block = $field['quote_block_type'] === 'default' ? get_field('default_page_blocks', 'option')['quote_block'] : $field['quote_block'];
$quote_css_class = $quote_block['text_background_style'] === 'dark' ? ' Quote-greyBg' : '';
$image = wp_get_attachment_image( $quote_block['background_image'], 'full', false, array('class' => 'QuoteBlock_img') );
?>

<div class="TextAndQuote" id="TextAndQuote<?php echo $field_key ?>">
  <div class="Container">
    <div class="TextAndQuote_wrapper">
      <?php if ($field['title']): ?>
        <h2 class="SectionTitle TextAndQuote_title">
          <?php echo $field['title'] ?>
        </h2>
      <?php endif ?>

      <div class="QuoteBlock QuoteBlock-textAndQuoteSection TextAndQuote_quoteBlock">
        <?php if ($image): ?>
          <?php echo $image ?>
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