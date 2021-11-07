<?php

/**
 * Rule.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit ; // Exit if accessed directly.
}

if ( ! class_exists( 'FGF_Rule' ) ) {

	/**
	 * FGF_Rule Class.
	 */
	class FGF_Rule extends FGF_Post {

		/**
		 * Post Type.
		 * 
		 * @var string
		 */
		protected $post_type = FGF_Register_Post_Types::RULES_POSTTYPE ;

		/**
		 * Post Status.
		 * 
		 * @var string
		 */
		protected $post_status = 'fgf_active' ;

		/**
		 * Name.
		 * 
		 * @var string
		 */
		protected $name ;

		/**
		 * Description.
		 * 
		 * @var string
		 */
		protected $description ;

		/**
		 * Created Date.
		 * 
		 * @var string
		 */
		protected $created_date ;

		/**
		 * Modified Date.
		 * 
		 * @var string
		 */
		protected $modified_date ;

		/**
		 * Meta data keys.
		 * 
		 * @var array
		 */
		protected $meta_data_keys = array(
			'fgf_rule_type'                      => '' ,
			'fgf_gift_type'                      => '' ,
			'fgf_gift_products'                  => array() ,
			'fgf_gift_categories'                => array() ,
			'fgf_bogo_gift_type'                 => '' ,
			'fgf_buy_product_type'               => '' ,
			'fgf_buy_product'                    => array() ,
			'fgf_buy_categories'                 => array() ,
			'fgf_buy_category_type'              => '1' ,
			'fgf_get_products'                   => array() ,
			'fgf_buy_product_count'              => '' ,
			'fgf_get_product_count'              => '' ,
			'fgf_bogo_gift_repeat'               => '' ,
			'fgf_bogo_gift_repeat_mode'          => '1' ,
			'fgf_bogo_gift_repeat_limit'         => '' ,
			'fgf_apply_coupon'                   => array() ,
			'fgf_coupon_gift_products'           => array() ,
			'fgf_coupon_gift_products_qty'       => '1' ,
			'fgf_rule_valid_from_date'           => '' ,
			'fgf_rule_valid_to_date'             => '' ,
			'fgf_rule_week_days_validation'      => array() ,
			'fgf_automatic_product_qty'          => '' ,
			'fgf_rule_gifts_count_per_order'     => '' ,
			'fgf_rule_usage_count'               => '' ,
			'fgf_rule_restriction_count'         => '' ,
			'fgf_rule_allowed_user_type'         => '1' ,
			'fgf_rule_allowed_user_count'        => '1' ,
			'fgf_rule_allowed_user_usage_count'  => array() ,
			'fgf_condition_type'                 => '' ,
			'fgf_total_type'                     => '' ,
			'fgf_cart_categories'                => array() ,
			'fgf_cart_subtotal_min_value'        => '' ,
			'fgf_cart_subtotal_max_value'        => '' ,
			'fgf_quantity_min_value'             => '' ,
			'fgf_quantity_max_value'             => '' ,
			'fgf_product_count_min_value'        => '' ,
			'fgf_product_count_max_value'        => '' ,
			'fgf_show_notice'                    => '' ,
			'fgf_notice'                         => '' ,
			'fgf_user_filter_type'               => '' ,
			'fgf_include_users'                  => array() ,
			'fgf_exclude_users'                  => array() ,
			'fgf_include_user_roles'             => array() ,
			'fgf_exclude_user_roles'             => array() ,
			'fgf_product_filter_type'            => '' ,
			'fgf_include_products'               => array() ,
			'fgf_include_product_count'          => '' ,
			'fgf_exclude_products'               => array() ,
			'fgf_applicable_products_type'       => '' ,
			'fgf_applicable_categories_type'     => '' ,
			'fgf_include_categories'             => array() ,
			'fgf_include_category_product_count' => '1' ,
			'fgf_exclude_categories'             => array() ,
				) ;

		/**
		 * Prepare extra post data.
		 */
		protected function load_extra_postdata() {
			$this->name          = $this->post->post_title ;
			$this->description   = $this->post->post_content ;
			$this->created_date  = $this->post->post_date_gmt ;
			$this->modified_date = $this->post->post_modified_gmt ;
		}

		/**
		 * Get the formatted created datetime.
		 * 
		 * @return string
		 */
		public function get_formatted_created_date() {

			return FGF_Date_Time::get_date_object_format_datetime( $this->get_created_date() ) ;
		}

		/**
		 * Get the formatted modified datetime.
		 * 
		 * @return string
		 */
		public function get_formatted_modified_date() {

			return FGF_Date_Time::get_date_object_format_datetime( $this->get_modified_date() ) ;
		}

		/**
		 * Setters and Getters
		 */

		/**
		 * Set Name.
		 */
		public function set_name( $value ) {
			$this->name = $value ;
		}

		/**
		 * Set Description
		 */
		public function set_description( $value ) {
			$this->description = $value ;
		}

		/**
		 * Set Created Date
		 */
		public function set_created_date( $value ) {
			$this->created_date = $value ;
		}

		/**
		 * Set Modified Date
		 */
		public function set_modified_date( $value ) {
			$this->modified_date = $value ;
		}

		/**
		 * Set rule type.
		 */
		public function set_rule_type( $value ) {
			$this->set_prop( 'fgf_rule_type' , $value ) ;
		}

		/**
		 * Set gift type
		 */
		public function set_gift_type( $value ) {
			$this->set_prop( 'fgf_gift_type' , $value ) ;
		}

		/**
		 * Set gift products.
		 */
		public function set_gift_products( $value ) {
			$this->set_prop( 'fgf_gift_products' , $value ) ;
		}

		/**
		 * Set gift categories.
		 */
		public function set_gift_categories( $value ) {
			$this->set_prop( 'fgf_gift_categories' , $value ) ;
		}

		/**
		 * Set BOGO gift type.
		 */
		public function set_bogo_gift_type( $value ) {
			$this->set_prop( 'fgf_bogo_gift_type' , $value ) ;
		}

		/**
		 * Set buy product type.
		 */
		public function set_buy_product_type( $value ) {
			$this->set_prop( 'fgf_buy_product_type' , $value ) ;
		}

		/**
		 * Set buy product.
		 */
		public function set_buy_product( $value ) {
			$this->set_prop( 'fgf_buy_product' , $value ) ;
		}

		/**
		 * Set buy categories.
		 */
		public function set_buy_categories( $value ) {
			$this->set_prop( 'fgf_buy_categories' , $value ) ;
		}

		/**
		 * Set buy category type.
		 */
		public function set_buy_category_type( $value ) {
			$this->set_prop( 'fgf_buy_category_type' , $value ) ;
		}

		/**
		 * Set get products.
		 */
		public function set_get_products( $value ) {
			$this->set_prop( 'fgf_get_products' , $value ) ;
		}

		/**
		 * Set buy product count.
		 */
		public function set_buy_product_count( $value ) {
			$this->set_prop( 'fgf_buy_product_count' , $value ) ;
		}

		/**
		 * Set get product count.
		 */
		public function set_get_product_count( $value ) {
			$this->set_prop( 'fgf_get_product_count' , $value ) ;
		}

		/**
		 * Set BOGO gift repeat.
		 */
		public function set_bogo_gift_repeat( $value ) {
			$this->set_prop( 'fgf_bogo_gift_repeat' , $value ) ;
		}

		/**
		 * Set BOGO gift repeat mode.
		 */
		public function set_bogo_gift_repeat_mode( $value ) {
			$this->set_prop( 'fgf_bogo_gift_repeat_mode' , $value ) ;
		}

		/**
		 * Set BOGO gift repeat limit.
		 */
		public function set_bogo_gift_repeat_limit( $value ) {
			$this->set_prop( 'fgf_bogo_gift_repeat_limit' , $value ) ;
		}

		/**
		 * Set apply coupon.
		 */
		public function set_apply_coupon( $value ) {
			$this->set_prop( 'fgf_apply_coupon' , $value ) ;
		}

		/**
		 * Set coupon gift products.
		 */
		public function set_coupon_gift_products( $value ) {
			$this->set_prop( 'fgf_coupon_gift_products' , $value ) ;
		}

		/**
		 * Set coupon gift products quantity.
		 */
		public function set_coupon_gift_products_qty( $value ) {
			$this->set_prop( 'fgf_coupon_gift_products_qty' , $value ) ;
		}

		/**
		 * Set rule valid from date
		 */
		public function set_rule_valid_from_date( $value ) {
			$this->set_prop( 'fgf_rule_valid_from_date' , $value ) ;
		}

		/**
		 * Set rule valid to date.
		 */
		public function set_rule_valid_to_date( $value ) {
			$this->set_prop( 'fgf_rule_valid_to_date' , $value ) ;
		}

		/**
		 * Set rule week days validation.
		 */
		public function set_rule_week_days_validation( $value ) {
			$this->set_prop( 'fgf_rule_week_days_validation' , $value ) ;
		}

		/**
		 * Set automatic product qty.
		 */
		public function set_automatic_product_qty( $value ) {
			$this->set_prop( 'fgf_automatic_product_qty' , $value ) ;
		}

		/**
		 * Set rule gifts count per order.
		 */
		public function set_rule_gifts_count_per_order( $value ) {
			$this->set_prop( 'fgf_rule_gifts_count_per_order' , $value ) ;
		}

		/**
		 * Set rule restriction count.
		 */
		public function set_rule_restriction_count( $value ) {
			$this->set_prop( 'fgf_rule_restriction_count' , $value ) ;
		}

		/**
		 * Set rule usage count.
		 */
		public function set_rule_usage_count( $value ) {
			$this->set_prop( 'fgf_rule_usage_count' , $value ) ;
		}

		/**
		 * Set rule allowed user type.
		 */
		public function set_rule_allowed_user_type( $value ) {
			$this->set_prop( 'fgf_rule_allowed_user_type' , $value ) ;
		}

		/**
		 * Set rule allowed user count.
		 */
		public function set_rule_allowed_user_count( $value ) {
			$this->set_prop( 'fgf_rule_allowed_user_count' , $value ) ;
		}

		/**
		 * Set rule allowed user usage count.
		 */
		public function set_rule_allowed_user_usage_count( $value ) {
			$this->set_prop( 'fgf_rule_allowed_user_usage_count' , $value ) ;
		}

		/**
		 * Set condition type.
		 */
		public function set_condition_type( $value ) {
			$this->set_prop( 'fgf_condition_type' , $value ) ;
		}

		/**
		 * Set total type.
		 */
		public function set_total_type( $value ) {
			$this->set_prop( 'fgf_total_type' , $value ) ;
		}

		/**
		 * Set cart categories.
		 */
		public function set_cart_categories( $value ) {
			$this->set_prop( 'fgf_cart_categories' , $value ) ;
		}

		/**
		 * Set cart subtotal minimum value.
		 */
		public function set_cart_subtotal_minimum_value( $value ) {
			$this->set_prop( 'fgf_cart_subtotal_min_value' , $value ) ;
		}

		/**
		 * Set cart subtotal maximum value.
		 */
		public function set_cart_subtotal_maximum_value( $value ) {
			$this->set_prop( 'fgf_cart_subtotal_max_value' , $value ) ;
		}

		/**
		 * Set quantity minimum value.
		 */
		public function set_quantity_minimum_value( $value ) {
			$this->set_prop( 'fgf_quantity_min_value' , $value ) ;
		}

		/**
		 * Set quantity maximum value.
		 */
		public function set_quantity_maximum_value( $value ) {
			$this->set_prop( 'fgf_quantity_min_value' , $value ) ;
		}

		/**
		 * Set product count minimum value.
		 */
		public function set_product_count_min_value( $value ) {
			$this->set_prop( 'fgf_product_count_min_value' , $value ) ;
		}

		/**
		 * Set product count maximum value.
		 */
		public function set_product_count_max_value( $value ) {
			$this->set_prop( 'fgf_product_count_max_value' , $value ) ;
		}

		/**
		 * Set show notice.
		 */
		public function set_show_notice( $value ) {
			$this->set_prop( 'fgf_show_notice' , $value ) ;
		}

		/**
		 * Set notice.
		 */
		public function set_notice( $value ) {
			$this->set_prop( 'fgf_notice' , $value ) ;
		}

		/**
		 * Set user filter type.
		 */
		public function set_user_filter_type( $value ) {
			$this->set_prop( 'fgf_user_filter_type' , $value ) ;
		}

		/**
		 * Set include users.
		 */
		public function set_include_users( $value ) {
			$this->set_prop( 'fgf_include_users' , $value ) ;
		}

		/**
		 * Set exclude users.
		 */
		public function set_exclude_users( $value ) {
			$this->set_prop( 'fgf_exclude_users' , $value ) ;
		}

		/**
		 * Set Include User Roles
		 */
		public function set_include_user_roles( $value ) {
			$this->set_prop( 'fgf_gift_type' , $value ) ;
			$this->fgf_include_user_roles = $value ;
		}

		/**
		 * Set exclude user roles.
		 */
		public function set_exclude_user_roles( $value ) {
			$this->set_prop( 'fgf_exclude_user_roles' , $value ) ;
		}

		/**
		 * Set product filter type.
		 */
		public function set_product_filter_type( $value ) {
			$this->set_prop( 'fgf_product_filter_type' , $value ) ;
		}

		/**
		 * Set include products.
		 */
		public function set_include_products( $value ) {
			$this->set_prop( 'fgf_include_products' , $value ) ;
		}

		/**
		 * Set exclude products.
		 */
		public function set_exclude_products( $value ) {
			$this->set_prop( 'fgf_exclude_products' , $value ) ;
		}

		/**
		 * Set applicable products type.
		 */
		public function set_applicable_products_type( $value ) {
			$this->set_prop( 'fgf_applicable_products_type' , $value ) ;
		}

		/**
		 * Set include product count.
		 */
		public function set_include_product_count( $value ) {
			$this->set_prop( 'fgf_include_product_count' , $value ) ;
		}

		/**
		 * Set applicable categories type.
		 */
		public function set_applicable_categories_type( $value ) {
			$this->set_prop( 'fgf_applicable_categories_type' , $value ) ;
		}

		/**
		 * Set include categories.
		 */
		public function set_include_categories( $value ) {
			$this->set_prop( 'fgf_include_categories' , $value ) ;
		}

		/**
		 * Set include categories product count.
		 */
		public function set_include_category_product_count( $value ) {
			$this->set_prop( 'fgf_include_category_product_count' , $value ) ;
		}

		/**
		 * Set exclude categories.
		 */
		public function set_exclude_categories( $value ) {
			$this->set_prop( 'fgf_exclude_categories' , $value ) ;
		}

		/**
		 * Get name.
		 */
		public function get_name() {
			return $this->name ;
		}

		/**
		 * Get description.
		 */
		public function get_description() {
			return $this->description ;
		}

		/**
		 * Get created date.
		 */
		public function get_created_date() {
			return $this->created_date ;
		}

		/**
		 * Get modified date.
		 */
		public function get_modified_date() {
			return $this->modified_date ;
		}

		/**
		 * Get rule type.
		 */
		public function get_rule_type() {
			return $this->get_prop( 'fgf_rule_type' ) ;
		}

		/**
		 * Get gift type.
		 */
		public function get_gift_type() {
			return $this->get_prop( 'fgf_gift_type' ) ;
		}

		/**
		 * Get gift products.
		 */
		public function get_gift_products() {
			return $this->get_prop( 'fgf_gift_products' ) ;
		}

		/**
		 * Get gift categories.
		 */
		public function get_gift_categories() {
			return $this->get_prop( 'fgf_gift_categories' ) ;
		}

		/**
		 * Get BOGO gift type.
		 */
		public function get_bogo_gift_type() {
			return $this->get_prop( 'fgf_bogo_gift_type' ) ;
		}

		/**
		 * Get buy product type.
		 */
		public function get_buy_product_type() {
			return $this->get_prop( 'fgf_buy_product_type' ) ;
		}

		/**
		 * Get buy product.
		 */
		public function get_buy_product() {
			return $this->get_prop( 'fgf_buy_product' ) ;
		}

		/**
		 * Get buy categories.
		 */
		public function get_buy_categories() {
			return $this->get_prop( 'fgf_buy_categories' ) ;
		}

		/**
		 * Get buy category type.
		 */
		public function get_buy_category_type() {
			return $this->get_prop( 'fgf_buy_category_type' ) ;
		}

		/**
		 * Get products.
		 */
		public function get_products() {
			return $this->get_prop( 'fgf_get_products' ) ;
		}

		/**
		 * Get buy product count.
		 */
		public function get_buy_product_count() {
			return $this->get_prop( 'fgf_buy_product_count' ) ;
		}

		/**
		 * Get product count.
		 */
		public function get_product_count() {
			return $this->get_prop( 'fgf_get_product_count' ) ;
		}

		/**
		 * Get BOGO gift repeat.
		 */
		public function get_bogo_gift_repeat() {
			return $this->get_prop( 'fgf_bogo_gift_repeat' ) ;
		}

		/**
		 * Get BOGO gift repeat mode.
		 */
		public function get_bogo_gift_repeat_mode() {
			return $this->get_prop( 'fgf_bogo_gift_repeat_mode' ) ;
		}

		/**
		 * Get BOGO gift repeat limit.
		 */
		public function get_bogo_gift_repeat_limit() {
			return $this->get_prop( 'fgf_bogo_gift_repeat_limit' ) ;
		}

		/**
		 * Get apply coupon.
		 */
		public function get_apply_coupon() {
			return $this->get_prop( 'fgf_apply_coupon' ) ;
		}

		/**
		 * Get coupon gift products.
		 */
		public function get_coupon_gift_products() {
			return $this->get_prop( 'fgf_coupon_gift_products' ) ;
		}

		/**
		 * Get coupon gift products quantity.
		 */
		public function get_coupon_gift_products_qty() {
			return $this->get_prop( 'fgf_coupon_gift_products_qty' ) ;
		}

		/**
		 * Get rule valid from date.
		 */
		public function get_rule_valid_from_date() {
			return $this->get_prop( 'fgf_rule_valid_from_date' ) ;
		}

		/**
		 * Get rule valid to date.
		 */
		public function get_rule_valid_to_date() {
			return $this->get_prop( 'fgf_rule_valid_to_date' ) ;
		}

		/**
		 * Get rule week days validation.
		 */
		public function get_rule_week_days_validation() {
			return $this->get_prop( 'fgf_rule_week_days_validation' ) ;
		}

		/**
		 * Get automatic product qty.
		 */
		public function get_automatic_product_qty() {
			return $this->get_prop( 'fgf_automatic_product_qty' ) ;
		}

		/**
		 * Get rule gifts count per order.
		 */
		public function get_rule_gifts_count_per_order() {
			return $this->get_prop( 'fgf_rule_gifts_count_per_order' ) ;
		}

		/**
		 * Get rule restriction count.
		 */
		public function get_rule_restriction_count() {
			return $this->get_prop( 'fgf_rule_restriction_count' ) ;
		}

		/**
		 * Get rule usage count.
		 */
		public function get_rule_usage_count() {
			return $this->get_prop( 'fgf_rule_usage_count' ) ;
		}

		/**
		 * Get rule allowed user type.
		 */
		public function get_rule_allowed_user_type() {
			return $this->get_prop( 'fgf_rule_allowed_user_type' ) ;
		}

		/**
		 * Get rule allowed user count.
		 */
		public function get_rule_allowed_user_count() {
			return $this->get_prop( 'fgf_rule_allowed_user_count' ) ;
		}

		/**
		 * Get rule allowed user usage count.
		 */
		public function get_rule_allowed_user_usage_count() {
			return $this->get_prop( 'fgf_rule_allowed_user_usage_count' ) ;
		}

		/**
		 * Get condition type.
		 */
		public function get_condition_type() {
			return $this->get_prop( 'fgf_condition_type' ) ;
		}

		/**
		 * Get total type.
		 * */
		public function get_total_type() {
			return $this->get_prop( 'fgf_total_type' ) ;
		}

		/**
		 * Get cart categories.
		 */
		public function get_cart_categories() {
			return $this->get_prop( 'fgf_cart_categories' ) ;
		}

		/**
		 * Get cart subtotal minimum value.
		 */
		public function get_cart_subtotal_minimum_value() {
			return $this->get_prop( 'fgf_cart_subtotal_min_value' ) ;
		}

		/**
		 * Get cart subtotal maximum value.
		 */
		public function get_cart_subtotal_maximum_value() {
			return $this->get_prop( 'fgf_cart_subtotal_max_value' ) ;
		}

		/**
		 * Get quantity minimum value.
		 */
		public function get_quantity_minimum_value() {
			return $this->get_prop( 'fgf_quantity_min_value' ) ;
		}

		/**
		 * Get quantity maximum value.
		 */
		public function get_quantity_maximum_value() {
			return $this->get_prop( 'fgf_quantity_max_value' ) ;
		}

		/**
		 * Get product count minimum value.
		 */
		public function get_product_count_min_value() {
			return $this->get_prop( 'fgf_product_count_min_value' ) ;
		}

		/**
		 * Get product count maximum value.
		 */
		public function get_product_count_max_value() {
			return $this->get_prop( 'fgf_product_count_max_value' ) ;
		}

		/**
		 * Get show notice.
		 */
		public function get_show_notice() {
			return $this->get_prop( 'fgf_show_notice' ) ;
		}

		/**
		 * Get notice.
		 */
		public function get_notice() {
			return $this->get_prop( 'fgf_notice' ) ;
		}

		/**
		 * Get user filter type.
		 */
		public function get_user_filter_type() {
			return $this->get_prop( 'fgf_user_filter_type' ) ;
		}

		/**
		 * Get include users.
		 */
		public function get_include_users() {
			return $this->get_prop( 'fgf_include_users' ) ;
		}

		/**
		 * Get exclude users.
		 */
		public function get_exclude_users() {
			return $this->get_prop( 'fgf_exclude_users' ) ;
		}

		/**
		 * Get include user roles.
		 */
		public function get_include_user_roles() {
			return $this->get_prop( 'fgf_include_user_roles' ) ;
		}

		/**
		 * Get exclude user roles.
		 */
		public function get_exclude_user_roles() {
			return $this->get_prop( 'fgf_exclude_user_roles' ) ;
		}

		/**
		 * Get product filter type.
		 */
		public function get_product_filter_type() {
			return $this->get_prop( 'fgf_product_filter_type' ) ;
		}

		/**
		 * Get include products.
		 */
		public function get_include_products() {
			return $this->get_prop( 'fgf_include_products' ) ;
		}

		/**
		 * Get products count.
		 */
		public function get_include_product_count() {
			return $this->get_prop( 'fgf_include_product_count' ) ;
		}

		/**
		 * Get exclude products.
		 */
		public function get_exclude_products() {
			return $this->get_prop( 'fgf_exclude_products' ) ;
		}

		/**
		 * Get applicable products type.
		 */
		public function get_applicable_products_type() {
			return $this->get_prop( 'fgf_applicable_products_type' ) ;
		}

		/**
		 * Get applicable categories type.
		 */
		public function get_applicable_categories_type() {
			return $this->get_prop( 'fgf_applicable_categories_type' ) ;
		}

		/**
		 * Get include categories.
		 */
		public function get_include_categories() {
			return $this->get_prop( 'fgf_include_categories' ) ;
		}

		/**
		 * Get include categories product count.
		 */
		public function get_include_category_product_count() {
			return $this->get_prop( 'fgf_include_category_product_count' ) ;
		}

		/**
		 * Get exclude categories.
		 */
		public function get_exclude_categories() {
			return $this->get_prop( 'fgf_exclude_categories' ) ;
		}

	}

}
