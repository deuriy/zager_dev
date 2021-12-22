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
$rating = 0;

$product_models = get_the_terms($product->get_id(), 'customer_reviews_category');
$guitar = [];

$list = !empty($_REQUEST['list']) ? intval($_REQUEST['list']) : 1;

if ( !empty($product_models) ) {
	foreach ( $product_models as $product_model ) {
		$guitar[] = $product_model->slug;
	}
}

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
			'terms' => $guitar
		]
	];
}

$query = new WP_Query ($args);

$reviews = $query->posts;

$total = $query->found_posts;
$last = intval(ceil($total / REVIEW_STEP));

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
    <div id="reviews-container" class="ReviewsSectionGroup ReviewsSection_group">
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
        <br class="hidden-smPlus">(based on <?php echo $total ?> reviews)
      </div>

      <?php if ($field['description']): ?>
        <div class="ReviewsSectionGroup_description hidden-mdPlus">
          <?php echo $field['description']; ?>
        </div>
      <?php endif ?>

      <?php if ($field['customer_reviews']['customer_reviews']): ?>
        <div class="Reviews ReviewsSectionGroup_reviews">

			<div class="reviews-block" data-review-type="single">
				<?php include ZAGER_THEME_DIR . 'more-templates/reviews-single-guitar.php'; ?>
			</div>

			<div class="LoadingPosts reviews-pagination-block">
				<?php include ZAGER_THEME_DIR . 'more-templates/reviews-pagination.php'; ?>
			</div>

          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
