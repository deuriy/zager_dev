<div class="ContactsSection">
  <div class="Container">
    <div class="ContactsSection_wrapper">
      <?php if ($field['title']): ?>
        <h2 class="SectionTitle ContactsSection_title">
          <?php echo $field['title'] ?>
        </h2>
      <?php endif ?>

      <?php if ($field['text']): ?>
        <div class="ContactsSection_text">
          <?php echo $field['text'] ?>
        </div>
      <?php endif ?>

      <div class="ContactInfo ContactsSection_info">
        <?php if ($field['location']): ?>
          <h4 class="ContactInfo_location">
            <?php echo $field['location'] ?>
          </h4>
        <?php endif ?>

        <?php if ($field['contact_items']): ?>
          <ul class="ContactInfo_list">
            <?php foreach ($field['contact_items'] as $contact_item): ?>
              <?php
                switch ($contact_item['type']) {
                  case 'phone':
                    $value = $contact_item['text_before'] . ' ' . '<a href="tel:' . $contact_item['value'] . '">' . $contact_item['value'] . '</a>';
                    break;
                  case 'email':
                    $value = '<a href="mailto:' . $contact_item['value'] . '">' . $contact_item['value'] . '</a>';
                    break;
                  case 'link':
                    $attributes = 'class="ContactInfo_link"';
                    $attributes .= $contact_item['use_as_fancybox_link'] == 'yes' ? ' data-fancybox' : '';
                    $value = '<a href="' . $contact_item['url'] . '"' . $attributes . '>' . $contact_item['value'] . '</a>';
                    break;
                }
              ?>
              <li class="ContactInfo_item">
                <?php echo $value ?>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </div>

      <div class="ContactsSection_formWrapper">
        <?php if ($field['ninja_form_shortcode']): ?>
          <?php echo do_shortcode( $field['ninja_form_shortcode'] ) ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>