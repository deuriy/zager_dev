<?php

namespace BoltCheckout;

/**
 * Handle various data for the Bolt Payment Gateway.
 *
 * @package Woocommerce_Bolt_Checkout/Classes
 * @version 1.0.0
 * @since   1.2.8
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_Bolt_Data_Manager Class.
 */
class WC_Bolt_Data_Manager {

	/**
	 * @var object The single instance of WC_Bolt_Data_Manager
	 */
	private static $_instance;

	/**
	 * @var string Bolt session table name
	 */
	protected $_session_table;

	/**
	 * Get the instance and use the functions inside it.
	 *
	 * This plugin utilises the PHP singleton design pattern.
	 *
	 * @return object self::$_instance Instance
	 *
	 * @since     1.2.8
	 * @static
	 * @access    public
	 *
	 */
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since  1.2.8
	 * @access public
	 *
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'bolt-checkout-woocommerce' ), '1.0' );
	}

	/**
	 * Disable Unserialize of the class.
	 *
	 * @since  1.2.8
	 * @access public
	 */
	public function __wakeup() {
		// Unserialize instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'bolt-checkout-woocommerce' ), '1.0' );
	}

	/**
	 * Reset the instance of the class
	 *
	 * @since  1.2.8
	 * @access public
	 */
	public static function reset() {
		self::$_instance = null;
	}

	/**
	 * Constructor for this class.
	 */
	public function __construct() {
		self::$_instance = $this;
		$this->init();
	}

	/**
	 * Init WC_Bolt_Data_Manager class.
	 *
	 * @since  1.2.8
	 * @access public
	 */
	public function init() {
		$this->_session_table = $GLOBALS['wpdb']->prefix . 'woocommerce_bolt_checkout_sessions';
	}

	/**
	 * Return the bolt session data.
	 *
	 * @param string $session_key Session key.
	 * @param mixed $default Default value to return if the session does not exist.
	 *                             If an empty $session_key provided, just ignore any default value and return false
	 *
	 * @return string|array|boolean
	 * @since  1.2.8
	 * @access public
	 *
	 */
	public function get_session( $session_key, $default = false ) {
		if ( empty( $session_key ) ) {
			return false;
		}

		global $wpdb;

		$value = $wpdb->get_var( $wpdb->prepare( "SELECT session_value FROM {$this->_session_table} WHERE session_key = %s", $session_key ) );

		if ( is_null( $value ) ) {
			$value = get_option( $session_key, $default ); // Backwards compatibility
		}

		return maybe_unserialize( $value );
	}

	/**
	 * Update the session data if the session key exists and the session value changes,
	 * if the session key does not exist, then it will be added with the session value.
	 *
	 * @param string $session_key Session key.
	 * @param mixed $session_value Session value.
	 *
	 * @return bool  False if session is not updated and true if session is updated.
	 * @since  1.2.8
	 * @access public
	 *
	 */
	public function update_session( $session_key, $session_value ) {
		if ( empty( $session_key ) ) {
			return false;
		}

		global $wpdb;

		// Update a session row in table if it exists or insert a session row into table if the row does not already exist.
		$result = $wpdb->query(
			$wpdb->prepare(
				"INSERT INTO {$this->_session_table} (`session_key`, `session_value`, `created_at`, `updated_at`) VALUES (%s, %s, %d, %d)
				ON DUPLICATE KEY UPDATE `session_value` = VALUES(`session_value`), `updated_at` = VALUES(`updated_at`)",
				$session_key,
				maybe_serialize( $session_value ),
				time(),
				time()
			)
		);

		return ( $result !== false );
	}

	/**
	 * Update field update_at for session row to prevent its deleting due cleanup
	 * Do nothing if key doesn't exist
	 *
	 * @param string $session_key Session key.
	 *
	 * @since  2.5.0
	 * @access public
	 *
	 */
	public function update_session_time( $session_key ) {
		if ( empty( $session_key ) ) {
			return;
		}

		global $wpdb;

		$wpdb->query(
			$wpdb->prepare(
				"UPDATE {$this->_session_table} set `updated_at`=%d where `session_key`=%s",
				time(),
				$session_key
			)
		);
	}

	/**
	 * Delete bolt session from the database.
	 *
	 * @param string $session_key Session key.
	 *
	 * @return bool  False if session is not deleted and true if session is deleted.
	 * @since  1.2.8
	 * @access public
	 *
	 */
	public function delete_session( $session_key ) {
		if ( empty( $session_key ) ) {
			return false;
		}

		global $wpdb;

		$result = $wpdb->delete(
			$this->_session_table,
			array(
				'session_key' => $session_key,
			),
			array(
				'%s',
			)
		);

		return ( $result !== false );
	}

	/**
	 * Clear expired bolt sessions.
	 *
	 * @since  1.2.8
	 * @access public
	 *
	 */
	public function cleanup_expired_session() {

		BugsnagHelper::initBugsnag();
		try {
			ignore_user_abort( true );
			set_time_limit( BOLT_MAX_EXECUTION_SECONDS );
			Bolt_HTTP_Handler::close_connection();
			$session_life_hours = abs( intval( wc_bolt()->get_settings()['clean_up_bolt_session_period'] ) );
			// If merchant set this parameter to zero we use default value
			if ( ! $session_life_hours ) {
				$session_life_hours = wc_bolt()->get_bolt_settings()->get_default_settings()['clean_up_bolt_session_period'];
			}

			global $wpdb;

			// For new session storage
			// Delete bolt resources if X hours grace period has passed
			$minimum_valid_session_time = time() - ( HOUR_IN_SECONDS * $session_life_hours );
			$wpdb->query( "DELETE FROM {$this->_session_table} WHERE `updated_at` < $minimum_valid_session_time" );

			$this->cleanup_historic_expired_session( $session_life_hours );
		} catch ( \Exception $e ) {
			BugsnagHelper::notifyException( $e );
		}
	}

	/**
	 * Clear expired bolt sessions (created by bolt version 1.2.7 and below)
	 *
	 * @param $session_life_hours
	 *
	 * @since  2.0.8
	 * @access public
	 *
	 */
	public function cleanup_historic_expired_session( $session_life_hours ) {
		global $wpdb;
		// Check if we should delete data
		if ( ! get_option( 'bolt_should_delete_historic_session' ) ) {
			return;
		}
		$time_to_delete = get_option( 'bolt_delete_historic_session_time_to_delete' );

		// If we run cleaning in new version first time, then we wait $session_lifetime hours before deleting
		if ( ! $time_to_delete ) {
			update_option( 'bolt_delete_historic_session_time_to_delete', time() + HOUR_IN_SECONDS * $session_life_hours );

			return;
		}
		if ( $time_to_delete > time() ) {
			$wpdb->query( "UPDATE {$wpdb->options} SET autoload='no' WHERE option_name LIKE 'session_data_BLT%'" );
			$wpdb->query( "UPDATE {$wpdb->options} SET autoload='no' WHERE option_name LIKE 'session_posteddata_BLT%'" );
			$wpdb->query( "UPDATE {$wpdb->options} SET autoload='no' WHERE option_name LIKE 'shipping_and_tax_BLT%'" );

			return;
		}

		// It's time to delete old data. We do it only once
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'permanently_cancelled_order_%'" );
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'quick_buy_product_BLT%'" );
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'session_data_BLT%'" );
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'session_posteddata_BLT%'" );
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'shipping_and_tax_BLT%'" );

		delete_option( 'delete_bolt_quick_buy_product_resources' );
		delete_option( 'delete_bolt_resources_registered_time' );
		delete_option( 'delete_bolt_resources_time' );
		delete_option( 'delete_bolt_session_data_resources' );
		delete_option( 'delete_bolt_session_posteddata_resources' );
		delete_option( 'delete_bolt_shipping_and_tax_resources' );
		delete_option( 'has_initiated_clearing_historic_bolt_resources' );

		delete_option( 'bolt_should_delete_historic_session' );
		delete_option( 'bolt_delete_historic_session_time_to_delete' );
	}

	/**
	 * Insert the session data
	 * if the session key is already exist, then return false.
	 *
	 * @param string $session_key Session key.
	 * @param mixed $session_value Session value.
	 *
	 * @return bool  True if session is inserted and false if not
	 * @since  2.0.0
	 * @access public
	 *
	 */
	public function insert_session( $session_key, $session_value ) {
		if ( empty( $session_key ) ) {
			return false;
		}

		global $wpdb;

		$result = $wpdb->insert(
			$this->_session_table,
			array(
				'session_key'   => $session_key,
				'session_value' => maybe_serialize( $session_value ),
				'created_at'    => time(),
				'updated_at'    => time()
			),
			array(
				'%s',
				'%s',
				'%d',
				'%d'
			)
		);

		return ( $result !== false );
	}

	/**
	 * Return time when the bolt session data was created.
	 *
	 * @param string $session_key Session key.
	 *
	 * @return integer|false
	 * @since  2.0.8
	 * @access public
	 *
	 */
	public function get_session_created_at_time( $session_key ) {
		if ( empty( $session_key ) ) {
			return false;
		}

		global $wpdb;

		$value = $wpdb->get_var( $wpdb->prepare( "SELECT created_at FROM {$this->_session_table} WHERE session_key = %s", $session_key ) );

		return $value;
	}


	/**
	 * Returns the meta results for a given meta key and meta value
	 *
	 * @param string $meta_key Meta Key
	 * @param string $meta_value Meta Value
	 *
	 * @return array
	 * @since 2.0.12
	 *
	 * @access public
	 *
	 */
	public function get_bolt_post_meta( $meta_key, $meta_value ) {
		global $wpdb;
		$query      = "SELECT * FROM `{$wpdb->prefix}postmeta` WHERE meta_key = '$meta_key' AND meta_value = '$meta_value'";
		$result_arr = $wpdb->get_results( $query );

		return $result_arr;
	}

	/**
	 * Returns the order id
	 *
	 * @param string $reference_id Bolt transaction reference id
	 *
	 * @return int | \WP_Error
	 * @since 2.0.12
	 *
	 * @access public
	 *
	 */
	public function get_order_id_by_reference( $reference_id ) {
		$result_arr = self::get_bolt_post_meta( BOLT_ORDER_META_TRANSACTION_REFERENCE_ID, $reference_id );
		if ( sizeof( $result_arr ) === 0 ) {
			return new \WP_Error( 'no_results_found', __( "No results found for the given reference Id", "bolt-checkout-woocommerce" ) );
		}
		$order_id = $result_arr[0]->post_id;

		return $order_id;
	}


	/**
	 * See how much stock is being held in pending orders.
	 *
	 * @param WC_Product $product Product to check.
	 * @param integer $exclude_order_id Order ID to exclude.
	 *
	 * @return int
	 * @since 2.0.12
	 *
	 * @access public
	 *
	 */
	public function get_held_qty( $product, $exclude_order_id = "" ) {
		global $wpdb;

		return $wpdb->get_var(
			$wpdb->prepare(
				"
					SELECT SUM( order_item_meta.meta_value ) AS held_qty
					FROM {$wpdb->posts} AS posts
					LEFT JOIN {$wpdb->prefix}woocommerce_order_items as order_items ON posts.ID = order_items.order_id
					LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta ON order_items.order_item_id = order_item_meta.order_item_id
					LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta2 ON order_items.order_item_id = order_item_meta2.order_item_id
					WHERE 	order_item_meta.meta_key    = '_qty'
					AND 	order_item_meta2.meta_key   = %s
					AND 	order_item_meta2.meta_value = %d
					AND 	posts.post_type             IN ( '" . implode( "','", wc_get_order_types() ) . "' )
					AND 	posts.post_status           = 'wc-pending'
					AND		posts.ID                    != %d;",
				'variation' === get_post_type( $product->get_stock_managed_by_id() ) ? '_variation_id' : '_product_id',
				$product->get_stock_managed_by_id(),
				$exclude_order_id
			)
		);
	}

	/**
	 * Get bolt sessions schema Table schema.
	 *
	 * @return string
	 * @since 1.2.8
	 * @static
	 * @access private
	 *
	 */
	public function get_bolt_sessions_schema() {
		global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}

		$tables = "
CREATE TABLE {$wpdb->prefix}woocommerce_bolt_checkout_sessions (
  ID BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  session_key varchar(191) NOT NULL,
  session_value longtext NOT NULL,
  created_at BIGINT UNSIGNED NOT NULL,
  updated_at BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY  (session_key),
  UNIQUE KEY ID (ID)
) $collate;
		";

		return $tables;
	}

	/**
	 * Set up the database tables which the plugin needs to function.
	 *
	 * @since 2.0.12
	 * @static
	 * @access public
	 */
	public function create_bolt_sessions_table() {
		/**
		 *
		 * Tables:
		 *      woocommerce_bolt_sessions - Table for storing various sessions in bolt plugin
		 */
		global $wpdb;
		$wpdb->hide_errors();

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( wc_bolt_data()->get_bolt_sessions_schema() );
	}

}

/**
 * Returns the instance of WC_Bolt_Data_Manager to use globally.
 *
 * @return WC_Bolt_Data_Manager
 * @since  1.2.8
 *
 */
function wc_bolt_data() {
	return WC_Bolt_Data_Manager::get_instance();
}

?>