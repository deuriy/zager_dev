<?php if (is_product() || is_cart()): ?>
  <div class="Sidebar Sidebar-product Product_sidebar hidden-smMinus">
    <?php
      global $product;
      if ($product->is_type( 'variable' )) {
        woocommerce_variable_add_to_cart();
      } else {
        woocommerce_simple_add_to_cart();
      }
    ?>
  </div>
<?php elseif (is_shop() || is_product_category()): ?>
  <?php
    $shop_pages_settings = get_field('shop_pages', 'option');

    if (is_shop()) {
      $page_settings = $shop_pages_settings['default_shop_page'];
      $pageType = 'shop';
    } elseif (is_product_category('accessories')) {
      $page_settings = $shop_pages_settings['accessories_default_shop_page'];
      $pageType = 'accessories';
    }
  ?>

  <div class="Sidebar Sidebar-extendedFilter ProductsWrapper_sidebar hidden-xs">
    <div class="Filter Sidebar_filter Sidebar_filter-extended" id="Filter" data-page-type="<?php echo $pageType ?>">
      <?php if ($page_settings['filter_title']): ?>
        <h3 class="Filter_title">
          <?php echo $page_settings['filter_title'] ?>
        </h3>
      <?php endif ?>

      <?php if ($page_settings['filter_elements']): ?>
        <?php foreach ($page_settings['filter_elements'] as $filter_element): ?>
          <div class="FilterElement Filter_item<?php echo $filter_element['acf_fc_layout'] == 'price_range' ? ' FilterElement-rangeSlider' : '' ?>">
            <?php if ($filter_element['title'] || ($filter_element['popup'] || $filter_element['link_title'])): ?>
              <div class="FilterElement_header">
                <?php if ($filter_element['title']): ?>
                  <h4 class="FilterElement_label">
                    <?php echo $filter_element['title'] ?>
                  </h4>
                <?php endif ?>

                <?php if ($filter_element['popup'] || $filter_element['link_title']): ?>
                  <a class="FancyboxPopupLink FilterElement_link" href="#" data-src="#FancyboxPopup-<?php echo $filter_element['popup'] ?>">
                    <?php echo $filter_element['link_title'] ?>
                  </a>
                <?php endif ?>
              </div>
            <?php endif ?>

            <?php if ($filter_element['acf_fc_layout'] == 'price_range'): ?>
              <div class="RangeSliderWrapper">
                <div class="RangeSlider"></div>
                <div class="RangeSliderWrapper_numbers">
                  <div class="RangeSliderWrapper_number RangeSliderWrapper_number-from">
                    <?php echo get_min_range_price() ?>
                  </div>
                  <div class="RangeSliderWrapper_number RangeSliderWrapper_number-to">
                    <?php echo get_max_range_price() ?>
                  </div>
                </div>
              </div>
            <?php elseif ($filter_element['acf_fc_layout'] == 'product_attribute'): ?>
              <?php
                if ($filter_element['entity_type'] == 'attribute') {
                  $taxonomy_slug = 'pa_' . $filter_element['attribute'];
                  $terms = get_terms( [
                    'taxonomy' => $taxonomy_slug,
                    'hide_empty' => false
                  ]);
                } elseif ($filter_element['entity_type'] == 'category') {
                  $taxonomy_slug = 'product_cat';
                  $terms = $filter_element['category'];
                }
              ?>

              <?php if ($terms): ?>
                <div class="FilterElement_content">
                  <div class="CheckboxList">
                    <?php foreach ($terms as $term): ?>
                      <div class="Checkbox CheckboxList_item">
                        <input class="Checkbox_input" type="checkbox" name="<?php echo $taxonomy_slug ?>" value="<?php echo $term->slug ?>" id="<?php echo $term->slug ?>">
                        <label class="Checkbox_label" for="<?php echo $term->slug ?>">
                          <?php echo $term->name ?>
                        </label>
                        <div class="Checkbox_number">
                          <?php echo get_products_count_by_term($taxonomy_slug, $term->slug) ?>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              <?php endif ?>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      <?php endif ?>

      <div class="Filter_actions hidden-smPlus">
        <button class="BtnYellow Filter_applyBtn" type="submit">Apply</button>
        <button class="Filter_resetBtn" type="reset">Cancel</button>
      </div>
    </div>
  </div>
<?php endif ?>