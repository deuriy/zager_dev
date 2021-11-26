<div class="FeedbackSection">
  <div class="Container">
    <?php if ($field['title']): ?>
      <h2 class="SectionTitle SectionTitle-center SectionTitle-feedbackSection FeedbackSection_title">
        <?php echo $field['title'] ?>
      </h2>
    <?php endif ?>

    <?php if ($field['description']): ?>
      <div class="FeedbackSection_description">
        <?php echo $field['description'] ?>
      </div>
    <?php endif ?>

    <div class="FilterTabs">
      <?php if ($field['category_tabs']): ?>
        <div class="FilterTabsListSwiper swiper FilterTabsMenu FilterTabs_menu FilterTabs_menu-swiper hidden-smPlus">
          <div class="swiper-wrapper">
            <div class="swiper-slide FilterTabsListSwiper_slide">
              <div class="FilterTabsMenu_item FilterTabsMenu_item-active" data-filter="all">All reviews</div>
            </div>

            <?php foreach ($field['category_tabs'] as $cat_id): ?>
              <?php
                $tab_category = get_term( $cat_id );
              ?>

              <div class="swiper-slide FilterTabsListSwiper_slide">
                <div class="FilterTabsMenu_item" data-filter="<?php echo $tab_category->slug ?>">
                  <?php echo $tab_category->name ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="FilterTabsMenu FilterTabs_menu hidden-xs">
          <ul class="FilterTabsMenu_list">
            <li class="FilterTabsMenu_item FilterTabsMenu_item-active" data-filter="all">All reviews</li>

            <?php foreach ($field['category_tabs'] as $cat_id): ?>
              <?php
                $tab_category = get_term( $cat_id );
              ?>
              <li class="FilterTabsMenu_item" data-filter="<?php echo $tab_category->slug ?>">
                <?php echo $tab_category->name ?>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>

      <?php if ($field['customer_reviews']): ?>
        <div class="Reviews FilterTabs_items">
          <?php foreach ($field['customer_reviews'] as $review_id): ?>
            <?php
            $review = get_post($review_id);
            $author = get_field('author', $review_id);
            $author_photo = wp_get_attachment_image( $author['photo'], 'full', false, array('class' => 'Author_photoImg') );
            $answer_on_questions = get_field('answer_on_questions', $review_id);

            $product_series = wp_get_post_terms( $review_id, 'customer_reviews_category', array('hide_empty' => false) );

            $product_series_data = implode(', ', array_map(function($item) {
              return $item->slug;
            }, $product_series));

            $product_series_str = implode(', ', array_map(function($item) {
              return $item->name;
            }, $product_series));
            ?>

          <div class="Review Reviews_item FilterTabs_item" data-item-name="<?php echo $product_series_data ?>">
            <div class="Author Review_author">
              <?php if ($author_photo): ?>
                <div class="Author_photo">
                  <?php echo $author_photo; ?>
                </div>
              <?php endif ?>

              <?php if ($author['info']['name']): ?>
                <div class="Author_name">
                  <?php echo $author['info']['name']; ?>
                </div>
              <?php endif ?>

              <?php if ($product_series_str): ?>
                <div class="Author_productSeries">
                  <?php echo $product_series_str ?>
                </div>
              <?php endif ?>

              <?php if ($author['info']): ?>
                <div class="Author_info">
                  <?php if ($author['info']['location']): ?>
                    <div class="Author_location">
                      <?php echo $author['info']['location']; ?>
                    </div>
                  <?php endif ?>

                  <div class="Author_date">
                    <?php echo zager_time_ago(); ?>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($author['audio_file']): ?>
                <div class="Author_audio">
                  <audio controls id="reviewaudio">
                    <source src="<?php echo $author['audio_file']['url']; ?>" type="<?php echo $author['audio_file']['mime_type'] ?>">
                    </audio>
                  </div>
                </div>
              <?php endif ?>

              <?php if ($answer_on_questions): ?>
                <div class="QA Review_qa">
                  <div class="QA_items">
                    <?php foreach ($answer_on_questions as $qa): ?>
                      <div class="QA_item">
                        <?php if ($qa['question']): ?>
                          <div class="QA_question">
                            <?php echo $qa['question'] ?>
                          </div>
                        <?php endif ?>

                        <?php if ($qa['answer']): ?>
                          <div class="QA_answer">
                            <?php echo $qa['answer'] ?>
                          </div>
                        <?php endif ?>
                      </div>
                    <?php endforeach ?>
                  </div>
                  <div class="QA_moreLinkWrapper hidden-smPlus">
                    <a class="ArrowLink QA_moreLink" href="#">read more</a>
                  </div>
                </div>
              <?php endif ?>
            </div>
          <?php endforeach ?>
          </div>
      <?php endif ?>
              <!-- <div class="LoadingPosts">
                <div class="Pagination hidden-smMinus">
                  <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft BtnOutline-disabled Pagination_prev" href="#">Previous</a>
                  <ul class="Pagination_list">
                    <li class="Pagination_item Pagination_item-current"><a class="Pagination_link" href="#">1</a></li>
                    <li class="Pagination_item"><a class="Pagination_link" href="#">2</a></li>
                    <li class="Pagination_item"><a class="Pagination_link" href="#">3</a></li>
                    <li class="Pagination_item-more">...</li>
                    <li class="Pagination_item"><a class="Pagination_link" href="#">35</a></li>
                  </ul>
                  <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next" href="#">next</a>
                </div>
                <a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a>
              </div> -->
            </div>
          </div>
        </div>