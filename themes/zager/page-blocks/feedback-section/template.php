<?php
	$cats = get_terms( 'customer_reviews_category', [
		'hide_empty' => true,
	] );

	$list = !empty($_REQUEST['list']) ? intval($_REQUEST['list']) : 1;
	$guitar = (!empty($_REQUEST['guitar']) && $_REQUEST['guitar'] !== 'all') ? $_REQUEST['guitar'] : false;

	$args = [
		'post_type' 	=> 'customer_review',
		'posts_per_page'=> REVIEW_STEP,
		'offset'		=> ( REVIEW_STEP * ($list - 1) ),
		'orderby'     	=> 'date',
		'order'       	=> 'DESC',
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
	$last = intval(floor($total / REVIEW_STEP));
?>
<div class="FeedbackSection reviews">
  <div id="reviews-container" class="Container">
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
              <div class="FilterTabsMenu_item <?=(empty($_REQUEST['guitar']) || $_REQUEST['guitar'] === 'all') ? 'FilterTabsMenu_item-active' : ''?>" data-filter="all">All reviews</div>
            </div>

            <?php foreach ($cats as $cat): ?>

              <div class="swiper-slide FilterTabsListSwiper_slide">
                <div class="FilterTabsMenu_item <?=($_REQUEST['guitar'] === $cat->slug) ? 'FilterTabsMenu_item-active' : ''?>" data-filter="<?php echo $cat->slug ?>">
                  <?php echo $cat->name ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="FilterTabsMenu FilterTabs_menu hidden-xs">
          <ul class="FilterTabsMenu_list">
            <li class="FilterTabsMenu_item <?=(empty($_REQUEST['guitar']) || $_REQUEST['guitar'] === 'all') ? 'FilterTabsMenu_item-active' : ''?>" data-filter="all">
				<a class="reviews-filter reviews-filter-guitar" data-guitar="all" href="?guitar=all">All reviews</a>
			</li>

            <?php
				foreach ($cats as $cat):
              ?>
              <li class="FilterTabsMenu_item <?=($guitar === $cat->slug) ? 'FilterTabsMenu_item-active' : ''?>" data-filter="<?php echo $cat->slug ?>" data-filter="<?php echo $cat->slug ?>">
				  <a class="reviews-filter reviews-filter-guitar" href="?guitar=<?php echo $cat->slug ?>"><?php echo $cat->name ?></a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>

	<div class="Reviews FilterTabs_items reviews-block">
		<?php include ZAGER_THEME_DIR . 'more-templates/reviews-guitar.php'; ?>
  	</div>

  	<div class="LoadingPosts reviews-pagination-block">
		<?php include ZAGER_THEME_DIR . 'more-templates/reviews-pagination.php'; ?>
  	</div>


            </div>
          </div>
        </div>
