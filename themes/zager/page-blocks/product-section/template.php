<?php
$testimonials = $field['testimonials_type'] === 'default' ? get_field('default_page_blocks', 'option')['testimonials'] : $field['testimonials'];
?>

<?php
if ($field['product'] || $testimonials):
  $id = $field['product'];
  $product = wc_get_product($id);
  $product_image = $product->get_image('full', array('class' => 'ProductCard_img'));
  $product_images_ids = $product->get_gallery_image_ids();
  $product_attributes = $product->get_attributes();
  $product_url = get_permalink($id);
  $additional_labels = get_field('additional_labels', $id);

  $product_left_blocks = get_field('after_product_left', $id);
  $product_layouts_names = array_unique(array_column($product_left_blocks, 'customer_reviews'));
  $reviews = array_unique(array_column($product_layouts_names, 'customer_reviews'));
  $reviews_count = count($reviews[0]);
?>

<div class="ProductSection">
  <div class="Container">
    <div class="ProductSection_salePeriod">On sale for the next 23hrs 22 min</div>
    <div class="ProductSection_wrapper">
      <?php if ($product_images_ids || $product_image): ?>
        <div class="ProductSection_left">
          <div class="ProductSectionImg">
            <div class="ProductSectionImgSwiper ProductSectionImg_swiper swiper">
              <div class="swiper-wrapper">
                <?php foreach ($product_images_ids as $product_image_id): ?>
                  <?php
                    $image = wp_get_attachment_image( $product_image_id, 'full', false, array('class' => 'ProductSectionImgSwiper_img') );
                  ?>
                  <div class="swiper-slide ProductSectionImgSwiper_slide">
                    <div class="ProductSectionImgSwiper_imgWrapper">
                      <?php echo $image ?>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="SwiperPagination SwiperPagination-lightBeige SwiperPagination-center ProductSectionImgSwiper_pagination hidden-xs"></div>
            </div>
            <button class="SwiperBtn SwiperBtn-prev SwiperBtn-transparentDarkBg ProductSectionImg_prev" type="button"></button>
            <button class="SwiperBtn SwiperBtn-next SwiperBtn-transparentDarkBg ProductSectionImg_next" type="button"></button>

            <div class="Label ProductSectionImg_label">special edition</div>
            <div class="Tag Tag-stars ProductSectionImg_tag">On sale</div>

            <a class="BtnBlack BtnBlack-transparent BtnBlack-fullScreen ProductSectionImg_fullScreenBtn" href="javascript:;" data-fancybox>full screen</a>
          </div>
        </div>
      <?php endif ?>

      <div class="ProductSection_right">
        <a class="ProductSection_recommendation" href="<?php echo $product_url; ?>#ReviewsSection">
          <span class="HighlightedText">#1 Recommended</span> Guitar. <span class="UnderlinedText"><?php echo $reviews_count != 0 ? $reviews_count : '' ?> reviews</span>
        </a>
        <h2 class="ProductSection_title">
          <?php echo $product->get_name() ?>
        </h2>

        <div class="ProductSection_description">
          <?php
            if ($product->get_short_description()) {
              echo $product->get_short_description();
            } else {
              echo wp_trim_words($product->get_description(), 18, '...');
            }
          ?>
        </div>

        <?php if ($product_attributes): ?>
          <ul class="ProductSection_categoryTags">
            <?php foreach ($product_attributes as $key => $value): ?>
              <?php foreach (wc_get_product_terms($id, $key) as $term): ?>
                <li class="ProductSection_categoryTag">
                  <span class="CategoryTag">
                    <?php echo $term->name; ?>
                  </span>
                </li>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif ?>

        <div class="ProductSection_prices">
          <?php echo $product->get_price_html() ?>
        </div>

        <ul class="ProductSection_buttons">
          <li class="ProductSection_btnItem">
            <a class="BtnOutline BtnOutline-product ProductSection_btn" href="<?php echo $product_url ?>">View options and features</a>
          </li>
          <li class="ProductSection_btnItem">
            <a class="BtnYellow BtnYellow-product ProductSection_btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>">View total with shipping and case</a>
          </li>
        </ul>
      </div>
    </div>

    <?php if ($field['display_testimonials'] == 'yes' && $testimonials): ?>
      <div class="Testimonials hidden-xs">
        <div class="Testimonials_items">
          <?php foreach ($testimonials as $testimonial): ?>
            <?php
              $icon = wp_get_attachment_image( $testimonial['source_icon'], 'full' );
            ?>

            <div class="Testimonial Testimonials_item">
              <?php if ($testimonial['text']): ?>
                <div class="Testimonial_text">
                  <?php echo $testimonial['text'] ?>
                </div>
              <?php endif ?>

              <?php if ($testimonial['author'] || $testimonial['source_icon']): ?>
                <div class="Testimonial_info">
                  <?php if ($testimonial['author']): ?>
                    <div class="Testimonial_author">
                      <?php echo $testimonial['author'] ?>
                    </div>
                  <?php endif ?>

                  <?php if ($icon): ?>
                    <div class="Testimonial_source">
                      <?php echo $icon ?>
                    </div>
                  <?php endif ?>
                </div>
              <?php endif ?>
            </div>
          <?php endforeach ?>
        </div>
      </div>

      <div class="TestimonialsSwiper ProductSection_testimonialsSwiper swiper hidden-smPlus">
        <div class="swiper-wrapper">
          <?php foreach ($testimonials as $testimonial): ?>
            <?php
              $icon = wp_get_attachment_image( $testimonial['source_icon'], 'full' );
            ?>

            <div class="swiper-slide TestimonialsSwiper_slide">
              <div class="Testimonial Testimonial-small TestimonialsSwiper_item">
                <?php if ($icon): ?>
                  <div class="Testimonial_source">
                    <?php echo $icon ?>
                  </div>
                <?php endif ?>

                <?php if ($testimonial['text']): ?>
                  <div class="Testimonial_text">
                    <?php echo $testimonial['text'] ?>
                  </div>
                <?php endif ?>

                <?php if ($testimonial['author']): ?>
                  <div class="Testimonial_info">
                    <div class="Testimonial_author">
                      <?php echo $testimonial['author'] ?>
                    </div>
                  </div>
                <?php endif ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
<?php endif ?>