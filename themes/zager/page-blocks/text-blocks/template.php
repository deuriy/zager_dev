<div class="TextBlocks">
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
            $text_block_class = ($key % 2) != 0 ? ' TextBlock-reverse' : '';
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
            <?php if ($text_block['image']): ?>
              <div class="TextBlock_imgWrapper">
                <img class="TextBlock_img" loading="lazy" src="<?php echo $text_block['image'] ?>" alt="">
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
</div>