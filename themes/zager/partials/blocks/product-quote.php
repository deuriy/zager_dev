<?php
if (!get_field('product_quote') || get_field('product_quote')['block_display'] === 'no') {
  return;
}

$product_quote = get_field('product_quote')['quote_block_type'] == 'product_default' ? get_field('quote_product_default', 'option') : get_field('product_quote');
?>

<?php if ($product_quote['author'] || $product_quote['text']): ?>
  <div class="Quote Quote-product Product_quote">
    <?php if ($product_quote['text']): ?>
      <div class="Quote_text">
        <?php echo $product_quote['text']; ?>
      </div>
    <?php endif ?>

    <?php if ($product_quote['author']): ?>
      <div class="Quote_author">
        <?php echo $product_quote['author']; ?>
      </div>
    <?php endif ?>
  </div>
<?php endif ?>