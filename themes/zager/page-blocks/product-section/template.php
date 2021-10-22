<div class="ProductSection">
  <div class="Container">
    <div class="ProductSection_salePeriod">On sale for the next 23hrs 22 min</div>
    <div class="ProductSection_wrapper">
      <div class="ProductSection_left">
        <div class="ProductSectionImg">
          <div class="ProductSectionImgSwiper ProductSectionImg_swiper swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide ProductSectionImgSwiper_slide">
                <div class="ProductSectionImgSwiper_imgWrapper"><img class="ProductSectionImgSwiper_img" loading="lazy" src="img/product.webp" alt="Guitar product"></div>
              </div>
              <div class="swiper-slide ProductSectionImgSwiper_slide">
                <div class="ProductSectionImgSwiper_imgWrapper"><img class="ProductSectionImgSwiper_img" loading="lazy" src="img/product.webp" alt="Guitar product"></div>
              </div>
              <div class="swiper-slide ProductSectionImgSwiper_slide">
                <div class="ProductSectionImgSwiper_imgWrapper"><img class="ProductSectionImgSwiper_img" loading="lazy" src="img/guitar.jpg" alt="Guitar product"></div>
              </div>
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
      <div class="ProductSection_right">
        <a class="ProductSection_recommendation" href="#">
          <span class="HighlightedText">#1 Recommended</span> Guitar. <span class="UnderlinedText">345 reviews</span>
        </a>
        <h2 class="ProductSection_title">50th Anniversary Tobacco Sunburst edition ZAD 900</h2>
        <div class="ProductSection_description">
          <p>Our flagship guitar. Customers have asking Mr. Zager to build this instrument for such a long time that he finally gave in and designed</p>
        </div>
        <ul class="ProductSection_categoryTags">
          <li class="ProductSection_categoryTag">
            <a class="CategoryTag" href="#">Accostic Electric</a>
          </li>
          <li class="ProductSection_categoryTag">
            <a class="CategoryTag" href="#">Full size</a>
          </li>
        </ul>
        <div class="ProductSection_prices">
          <div class="OldPrice">$2395.00</div>
          <div class="Price">$1995.00</div>
        </div>
        <ul class="ProductSection_buttons">
          <li class="ProductSection_btnItem">
            <a class="BtnOutline BtnOutline-product ProductSection_btn" href="#">View options and features</a></li>
          <li class="ProductSection_btnItem">
            <a class="BtnYellow BtnYellow-product ProductSection_btn" href="#">View total with shipping and case</a>
          </li>
        </ul>
      </div>
    </div>
    <?php
    $testimonials = $field['testimonials_type'] === 'default' ? get_field('testimonials', 'option') : $field['testimonials'];
    ?>
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