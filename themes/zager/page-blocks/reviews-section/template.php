<?php
global $product;

$ratings_arr = [
  'one' => '1.0',
  'two' => '2.0',
  'three' => '3.0',
  'four' => '4.0',
  'five' => '5.0'
];

$reviews_count = count($field['customer_reviews']['customer_reviews']);
?>

<div class="ReviewsSection" id="ReviewsSection">
  <div class="Container Container-reviewsSectionProduct">
    <div class="ReviewsSectionGroup ReviewsSection_group ReviewsSection_group-independentReviews">
      <?php if ($field['title']): ?>
        <h3 class="SectionTitle SectionTitle-reviewsGroup ReviewsSectionGroup_title">
          <?php echo $field['title']; ?>
        </h3>
      <?php endif ?>

      <?php if ($field['description']): ?>
        <div class="ReviewsSectionGroup_description">
          <?php echo $field['description']; ?>
        </div>
      <?php endif ?>

      <?php if ($field['rating_tiles']): ?>
        <div class="RatingTiles">
          <?php foreach ($field['rating_tiles'] as $rating_tile): ?>
            <a class="RatingTile RatingTiles_item" href="<?php echo $rating_tile['url'] ?>">
              <div class="Rating RatingTile_rating">
                <?php echo $ratings_arr[$rating_tile['rating']]; ?>
              </div>

              <?php if ($rating_tile['text_wrapper']['label']): ?>
                <div class="RatingTile_label">
                  <?php echo $rating_tile['text_wrapper']['label']; ?>
                </div>
              <?php endif ?>

              <?php if ($rating_tile['text_wrapper']['text']): ?>
                <div class="RatingTile_text">
                  <?php echo $rating_tile['text_wrapper']['text']; ?>
                </div>
              <?php endif ?>
            </a>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
    <div class="ReviewsSectionGroup ReviewsSection_group">
      <?php
      $customer_reviews_title = $field['customer_reviews']['override_customer_reviews_title'] === 'yes' ? $field['customer_reviews_title'] : 'Customer reviews for the ' . $product->get_title();
      ?>

      <?php if ($customer_reviews_title): ?>
        <h3 class="SectionTitle SectionTitle-reviewsGroup ReviewsSectionGroup_title">
          <?php echo $customer_reviews_title; ?>
        </h3>
      <?php endif ?>
      
      <div class="ReviewsSectionGroup_subTitle">
        <span class="ReviewsSectionGroup_result">4.7 out of 5</span> 
        <span class="ReviewsSectionGroup_resultLabel">service rating</span>
        <br class="hidden-smPlus">(based on <?php echo $reviews_count ?> reviews)
      </div>

      <?php if ($field['description']): ?>
        <div class="ReviewsSectionGroup_description hidden-mdPlus">
          <?php echo $field['description']; ?>
        </div>
      <?php endif ?>

      <?php if ($field['customer_reviews']['customer_reviews']): ?>
        <div class="Reviews ReviewsSectionGroup_reviews">
          <?php foreach ($field['customer_reviews']['customer_reviews'] as $review_id): ?>
            <div class="Review Review-customer Reviews_item">
              <?php
              $customer_review = get_post($review_id);

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

              <div class="Author Author-customerReview Review_author">
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
                  <div class="Author_productSeries hidden-smPlus">
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
                  <div class="QA QA-customerReview Review_qa">
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
                    <div class="QA_moreLinkWrapper">
                      <a class="ArrowLink QA_moreLink hidden-smPlus" href="#">read more</a>
                      <a class="BtnYellow BtnYellow-qaMoreLink QA_moreLink hidden-xs" href="#">read more</a>
                    </div>
                  </div>
                <?php endif ?>
              </div>
            <?php endforeach ?>
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
        <?php endif ?>
      </div>
    </div>
  </div>