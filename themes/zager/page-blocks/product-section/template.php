<?php
opcache_reset();
// print '<pre>';
// print_r($field);
// print '</pre>';
?>

<?php
$testimonials = $field['testimonials_type'] === 'default' ? get_field('testimonials', 'option') : $field['testimonials'];
?>

<?php if ($field['product'] || $testimonials): ?>
<?php
  $product = wc_get_product($field['product']);
  $product_image = $product->get_image('full', array('class' => 'ProductCard_img'));
  $product_images_ids = $product->get_gallery_image_ids();
  $product_attributes = $product->get_attributes();
  $product_url = get_permalink($field['product']);
  $additional_labels = get_field('additional_labels', $field['product']);
  $additional_classes = $product->get_type() == 'variable' ? ' ProductCard-extended' : '';

  print '<pre>';
  print_r($product_images_ids);
  print '</pre>';
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
        <a class="ProductSection_recommendation" href="#">
          <span class="HighlightedText">#1 Recommended</span> Guitar. <span class="UnderlinedText">345 reviews</span>
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
            <a class="BtnOutline BtnOutline-product ProductSection_btn" href="#">View options and features</a>
          </li>
          <li class="ProductSection_btnItem">
            <a class="BtnYellow BtnYellow-product ProductSection_btn" href="#">View total with shipping and case</a>
          </li>
        </ul>
      </div>
    </div>

    <?php if ($testimonials): ?>
      <div class="Testimonials hidden-xs">
        <div class="Testimonials_items">
          <?php foreach ($testimonials as $testimonial): ?>
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
                  <?php if ($testimonial['source_icon']): ?>
                    <div class="Testimonial_source">
                      <img loading="lazy" src="<?php echo $testimonial['source_icon'] ?>" alt="Reseller Ratings">
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
            <div class="swiper-slide TestimonialsSwiper_slide">
              <div class="Testimonial Testimonial-small TestimonialsSwiper_item">
                <?php if ($testimonial['source_icon']): ?>
                  <div class="Testimonial_source">
                    <img loading="lazy" src="<?php echo $testimonial['source_icon'] ?>" alt="Reseller Ratings">
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    let productSectionImgFullScreenBtn = document.querySelector('.ProductSectionImg_fullScreenBtn');
    let productSectionImgSwiper = new Swiper('.ProductSectionImgSwiper', {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      // autoHeight: true,

      pagination: {
        el: '.ProductSectionImgSwiper_pagination',
        clickable: true,
        bulletClass: 'SwiperPagination_bullet',
        bulletActiveClass: 'SwiperPagination_bullet-active',
      },

      navigation: {
        prevEl: '.ProductSectionImg_prev',
        nextEl: '.ProductSectionImg_next',
      },

      on: {
        init: function () {
          let productImgActiveSlide = document.querySelector(`.ProductSectionImgSwiper .swiper-slide-active`);
          productSectionImgFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
        }
      }
    });

    productSectionImgSwiper.on('slideChange', function () {
      setTimeout(() => {
        let productImgActiveSlide = document.querySelector(`.ProductSectionImgSwiper .swiper-slide-active`);
        productSectionImgFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
      }, 0);
    });

    new Swiper('.TestimonialsSwiper', {
      slidesPerView: 'auto',
      spaceBetween: 20,
      autoHeight: true,
    });
  });
</script>