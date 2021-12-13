<?php
  $cats = get_terms( 'customer_reviews_category', [
      'hide_empty' => true,
  ] );

  $step = 5;

  $list = !empty($_GET['list']) ? intval($_GET['list']) : 1;
  $guitar = (!empty($_GET['guitar']) && $_GET['guitar'] !== 'all') ? $_GET['guitar'] : false;

  $args = [
      'post_type'   => 'customer_review',
      'posts_per_page'=> $step,
      'offset'    => ( $step * ($list - 1) ),
      'orderby'       => 'date',
      'order'         => 'DESC',
  ];

  if ( !empty($guitar) ) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'customer_reviews_category',
        'field' => 'slug',
        'terms' => [$guitar]
      ]
    ];
  }

  $query = new WP_Query ($args);
  $reviews = $query->posts;

  $total = $query->found_posts;
  $last = intval(floor($total/$step));
?>
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
      <?php if ($cats): ?>
        <div class="FilterTabsListSwiper swiper FilterTabsMenu FilterTabs_menu FilterTabs_menu-swiper hidden-smPlus">
          <div class="swiper-wrapper">
            <div class="swiper-slide FilterTabsListSwiper_slide">
              <div class="FilterTabsMenu_item <?=(empty($_GET['guitar']) || $_GET['guitar'] === 'all') ? 'FilterTabsMenu_item-active' : ''?>" data-filter="all">All reviews</div>
            </div>

            <?php foreach ($cats as $cat): ?>

              <div class="swiper-slide FilterTabsListSwiper_slide">
                <div class="FilterTabsMenu_item <?=($_GET['guitar'] === $cat->slug) ? 'FilterTabsMenu_item-active' : ''?>" data-filter="<?php echo $cat->slug ?>">
                  <?php echo $cat->name ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="FilterTabsMenu FilterTabs_menu hidden-xs">
          <ul class="FilterTabsMenu_list">
            <li class="FilterTabsMenu_item <?=(empty($_GET['guitar']) || $_GET['guitar'] === 'all') ? 'FilterTabsMenu_item-active' : ''?>" data-filter="all">
        <a href="?guitar=all">All reviews</a>
      </li>

            <?php
        foreach ($cats as $cat):
              ?>
              <li class="FilterTabsMenu_item <?=($_GET['guitar'] === $cat->slug) ? 'FilterTabsMenu_item-active' : ''?>" data-filter="<?php echo $cat->slug ?>" data-filter="<?php echo $cat->slug ?>">
          <a href="?guitar=<?php echo $cat->slug ?>"><?php echo $cat->name ?></a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>

      <?php if ($reviews): ?>
        <div class="Reviews FilterTabs_items">
          <?php foreach ($reviews as $review): ?>
            <?php
      $review_id = $review->ID;
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
        <?php else :
          $audio = get_audio_for_review();
          if ( !empty($audio) ) :
          ?>
          <div class="Author_audio">
            <audio controls id="reviewaudio">
              <source src="<?=$audio;?>" type="audio/mpeg">
            </audio>
          </div>
        </div>
      <?php endif; ?>
      <?php endif; ?>

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

              <div class="LoadingPosts">
                <div class="Pagination hidden-smMinus">
          <?php if ($list <= 1) : ?>
            <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft BtnOutline-disabled Pagination_prev" href="#">Previous</a>
          <?php else : ?>
            <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowLeft Pagination_prev" href="?list=<?=($list - 1)?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?>">Previous</a>
          <?php endif; ?>


                  <ul class="Pagination_list">
            <?php for ($i = 1; $i <= $last; $i++) : ?>
              <?php if ($i === 1 || $i === $last || $i === $list || $i === ($list - 1) || $i === ($list + 1)) : ?>
                        <li class="Pagination_item <?=($list === $i) ? 'Pagination_item-current' : '';?>"><a class="Pagination_link" href="?list=<?=$i;?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?>"><?=$i;?></a></li>
              <?php elseif ( $i === ($list - 2) || $i === ($list + 2) ) : ?>
                <li class="Pagination_item-more">...</li>
              <?php endif; ?>
            <?php endfor; ?>
                  </ul>


          <?php if ($list >= $last) : ?>
            <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next BtnOutline-disabled" href="#">Next</a>
          <?php else : ?>
            <a class="BtnOutline BtnOutline-darkText BtnOutline-lightBeigeBg BtnOutline-arrowRight Pagination_next" href="?list=<?=($list + 1)?><?=!(empty($guitar)) ? '&guitar=' . $guitar : ''?>">Next</a>
          <?php endif; ?>
                </div>
               <!-- <a class="BtnYellow BtnYellow-loadMore LoadingPosts_btn" href="#">Load more</a>-->
              </div>


            </div>
          </div>
        </div>
