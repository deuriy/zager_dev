<?php

namespace BoltCheckout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://bolt.com
 * @since      1.0.0
 *
 * @package    Woocommerce_Bolt_Checkout
 * @subpackage Woocommerce_Bolt_Checkout/admin
 * @author     Bolt
 */
class Bolt_Checkout_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 *
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		$basename = WC_BOLT_CHECKOUT_MAIN_PATH;
		$prefix   = is_network_admin() ? 'network_admin_' : '';
		add_filter( "{$prefix}plugin_action_links_$basename", array( $this, 'add_bolt_setting_link' ), 10, 4 );

		//show Bolt Transaction Reference in billing address area
		add_action( 'woocommerce_admin_order_data_after_billing_address', array(
			$this,
			'show_transaction_reference'
		) );

		//show Bolt checkboxes in shipping address area
		add_action( 'woocommerce_admin_order_data_after_shipping_address', array(
			$this,
			'show_checkboxes'
		) );

		//show Bolt custom fields in shipping address area
		add_action( 'woocommerce_admin_order_data_after_shipping_address', array(
			$this,
			'show_custom_fields'
		) );

		//add link to Bolt merchant dashboard in admin order detail page, next to "Customer payment page" link
		add_action( 'woocommerce_admin_order_data_after_order_details', array( $this, 'insert_bolt_merchant_link' ) );

		//adds 'Bolt Transaction Reference' column header to 'Orders' page immediately after 'Date' column.
		add_filter( 'manage_edit-shop_order_columns', array( $this, 'add_bolt_transaction_column' ), 10 );

		//to populate data into 'Bolt Transaction Reference' column
		add_action( 'manage_shop_order_posts_custom_column', array(
			$this,
			'populate_data_into_bolt_transaction_column'
		), 10 );

		//adds action for order with status 'Bolt Rejected'
		add_filter( 'woocommerce_order_actions', array( $this, 'add_bolt_custom_actions' ), 10 );

		//adds action for force approve order
		add_action( 'woocommerce_order_action_wc_bolt_force_approve', array( $this, 'force_approve_order_action' ) );

		//adds action for force confirm order rejection
		add_action( 'woocommerce_order_action_wc_bolt_confirm_rejection', array( $this, 'confirm_rejection_action' ) );

		//add status "bolt-reject" to the list of statuses with which payment complete is allowed
		add_filter( 'woocommerce_valid_order_statuses_for_payment_complete', array(
			$this,
			'add_bolt_custom_order_status'
		), 10, 1 );

		if ( wc_bolt()->get_bolt_settings()->is_setting_enabled( Bolt_Settings::SETTING_NAME_SUBSCRIPTION ) ) {
			//add field 'is_subscription' to edit product page
			add_filter( 'product_type_options', array( $this, 'add_field_is_subscription' ) );

			//save field 'is_subscription' on edit product page
			add_action( 'woocommerce_process_product_meta', array( $this, 'save_field_is_subscription' ), 10 );
		}
	}

	/**
	 * Show Bolt Transaction Reference in billing address area of order metabox
	 *
	 * @param $order object WooCommerce order
	 *
	 * @since    1.0.11
	 *
	 */
	public function show_transaction_reference( $order ) {
		$bolt_transaction_reference_id = get_post_meta( $order->get_id(), BOLT_ORDER_META_TRANSACTION_REFERENCE_ID, true );
		$dashboard_url                 = wc_bolt()->get_bolt_settings()->get_merchant_dashboard_host() . '/transaction/' . $bolt_transaction_reference_id;
		if ( ! empty( $bolt_transaction_reference_id ) ) {
			echo '<div class="address">
                <p class="order_note">
                    <strong>Bolt Transaction Reference:</strong>
                    <a target="_blank" href="' . $dashboard_url . '">' . $bolt_transaction_reference_id . '</a>
                </p>
            </div>';
		}
	}

	/**
	 * Show Bolt Bolt checkboxes in shipping address area of order metabox
	 *
	 * @param $order object WooCommerce order
	 *
	 * @since 2.0.12
	 *
	 */
	public function show_checkboxes( $order ) {
		$bolt_checkboxes = get_post_meta( $order->get_id(), BOLT_ORDER_META_CHECKBOXES, true );
		if ( ! empty( $bolt_checkboxes ) ) {
			echo '<div class="address">
                    <p class="order_note">
                        <strong>Bolt Checkboxes:</strong>';

			foreach ( $bolt_checkboxes as $checkbox ) {
				if ( isset( $checkbox->is_custom_field ) && $checkbox->is_custom_field ) {
					continue;
				}

				echo $checkbox->text . ': ' . ( $checkbox->value ? "Yes" : "No" ) . "<br>";
			}

			echo '</p>
                 </div>';
		}
	}

	/**
	 * Show Bolt custom fields in shipping address area of order metabox
	 *
	 * @param $order object WooCommerce order
	 *
	 * @since 2.14.0
	 *
	 */
	public function show_custom_fields( $order ) {
		$bolt_custom_fields = get_post_meta( $order->get_id(), BOLT_ORDER_META_CUSTOM_FIELDS, true );
		if ( ! empty( $bolt_custom_fields ) ) {
			echo '<div class="address">
                    <p class="order_note">
                        <strong>Bolt Custom Fields:</strong>';

			foreach ( $bolt_custom_fields as $custom_field ) {
				switch ( $custom_field->type ) {
					case 'DROPDOWN':
						echo $custom_field->label . ': ' . $custom_field->value . "<br>";
						break;
					case 'CHECKBOX':
					default:
						echo $custom_field->label . ': ' . ( $custom_field->value ? "Yes" : "No" ) . "<br>";
						break;
				}
			}

			echo '</p>
                 </div>';
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, WC_BOLT_CHECKOUT_PLUGIN_URL . 'assets/css/bolt-payment-gateway-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Add bolt setting link in the plugins list table.
	 *
	 * @param $actions
	 * @param $plugin_file
	 * @param $plugin_data
	 * @param $context
	 *
	 * @return array
	 * @since 1.0.0
	 *
	 */
	public function add_bolt_setting_link( $actions, $plugin_file, $plugin_data, $context ) {
		$section_code   = BOLT_GATEWAY_NAME;
		$custom_actions = array(
			'configure' => sprintf( '<a href="%s">%s</a>', admin_url( '/admin.php?page=wc-settings&tab=checkout&section=' . $section_code ), __( 'Settings', 'bolt-checkout-woocommerce' ) ),
		);

		// add the links to the front of the actions list
		return array_merge( $custom_actions, $actions );
	}

	/**
	 * Add link to Bolt merchant dashboard in admin order detail page, next to "Customer payment page" link.
	 *
	 * @param $order
	 *
	 * @since    1.1.5
	 *
	 */
	public function insert_bolt_merchant_link( $order ) {
		$payment_method = $order->get_payment_method();
		if ( ( empty( $payment_method ) || $payment_method == BOLT_GATEWAY_NAME ) && $order->get_status( 'edit' ) == WC_ORDER_STATUS_PENDING ) {
			?>
            <script type="text/javascript">
                jQuery(document).ready(function (jQuery) {
                    if (jQuery('p.wc-order-status label').length > 0) {
                        jQuery('p.wc-order-status label').html(
                            jQuery('p.wc-order-status label').html()
                            + <?php
							printf(
								'"<a href=\'%s\' target=\'_blank\'>%s</a>"',
								esc_url( wc_bolt()->get_bolt_settings()->get_merchant_dashboard_host() ),
								__( 'Bolt dashboard to process payment &rarr;', 'woocommerce' )
							);
							?>
                        );
                    }
                });
            </script>
			<?php
		}
	}


	/**
	 * Adds 'Bolt Transaction Reference' column header to 'Orders' page immediately after 'Date' column.
	 *
	 * @param string[] $columns
	 *
	 * @return string[] $new_columns
	 * @since 1.1.5
	 * @access public
	 *
	 */
	public function add_bolt_transaction_column( $columns ) {

		$new_columns = array();

		foreach ( $columns as $column_name => $column_info ) {

			$new_columns[ $column_name ] = $column_info;

			if ( 'order_date' === $column_name ) {
				$new_columns['bolttransactionid'] = __( 'Bolt Transaction Reference', 'my-textdomain' );
			}
		}

		return $new_columns;

	}

	/**
	 * to populate data into 'Bolt Transaction Reference' column.
	 *
	 * @param string $column_name
	 *
	 * @since 1.1.5
	 * @access public
	 *
	 */
	public function populate_data_into_bolt_transaction_column( $column_name ) {
		global $post;

		switch ( $column_name ) {
			case 'bolttransactionid':
				$get_bolt_transaction_id = get_post_meta( $post->ID, BOLT_ORDER_META_TRANSACTION_REFERENCE_ID, true );
				echo ! empty( $get_bolt_transaction_id ) ? $get_bolt_transaction_id : '<span class="na">-</span>';
				break;
			default:
		}

	}

	/**
	 * to add action for order with status 'Bolt Rejected'
	 *
	 * @param string[] $actions
	 *
	 * @return string[] $actions
	 * @since 1.2.8
	 * @access public
	 *
	 */
	public function add_bolt_custom_actions( $actions ) {
		global $theorder;

		// only for order with status 'Bolt Rejected'
		if ( "bolt-reject" != $theorder->get_status() || empty( get_post_meta( $theorder->get_id(), BOLT_ORDER_META_TRANSACTION_REFERENCE_ID, true ) ) ) {
			return $actions;
		}

		// add custom action
		$actions['wc_bolt_force_approve']     = __( 'Force approve order', 'bolt-checkout-woocommerce' );
		$actions['wc_bolt_confirm_rejection'] = __( 'Confirm rejection', 'bolt-checkout-woocommerce' );

		return $actions;
	}

	/**
	 * send api request to override or confirm review decisions
	 *
	 * @param WC_Order $order
	 * @param string $decision - "approve" or "reject"
	 *
	 * @return string $status
	 * @since 1.2.8
	 * @access private
	 *
	 */
	private function send_api_request_to_bolt( $order, $decision ) {
		BugsnagHelper::initBugsnag();
		try {
			$transaction_id = get_post_meta( $order->get_id(), BOLT_ORDER_META_TRANSACTION_ID, true );
			$data           = array(
				BOLT_FIELD_NAME_TRANSACTION_ID => (string) $transaction_id,
				BOLT_FIELD_NAME_DECISION       => $decision,
			);

			$response_body = wc_bolt()->get_bolt_data_collector()->handle_api_request( 'transactions/review', $data );

			return $response_body->status;
		} catch ( \Exception $e ) {
			BugsnagHelper::notifyException( $e );
		}
	}

	/**
	 * add status "bolt-reject" to the list of statuses with which payment complete is allowed
	 *
	 * @param string[] $array
	 *
	 * @return string[] $array
	 *
	 * @since 1.2.8
	 * @access public
	 *
	 */
	public function add_bolt_custom_order_status( $array ) {
		$array[] = WC_ORDER_STATUS_BOLT_REJECT;

		return $array;
	}

	/**
	 * action to force approve order
	 *
	 * @param WC_Order $order
	 *
	 * @since 1.2.8
	 * @access public
	 *
	 */
	public function force_approve_order_action( $order ) {
		$status = $this->send_api_request_to_bolt( $order, "approve" );
		if ( BOLT_TRANSACTION_STATUS_COMPLETED == $status ) {
			$message = sprintf( __( 'Force approve order by %s.', 'bolt-checkout-woocommerce' ), wp_get_current_user()->display_name );
			$order->add_order_note( $message );
			$transaction_reference_id = get_post_meta( $order->get_id(), BOLT_ORDER_META_TRANSACTION_REFERENCE_ID, true );
			$order->payment_complete( $transaction_reference_id );
			$order->update_status( WC_ORDER_STATUS_PROCESSING );
		}
	}

	/**
	 * action to confirm order rejection
	 *
	 * @param WC_Order $order
	 *
	 * @since 1.2.8
	 * @access public
	 *
	 */
	public function confirm_rejection_action( $order ) {
		$status = $this->send_api_request_to_bolt( $order, 'reject' );
		if ( BOLT_TRANSACTION_STATUS_IRREVERSIBLE == $status ) {
			$message = sprintf( __( 'Confirm order rejection by %s.', 'bolt-checkout-woocommerce' ), wp_get_current_user()->display_name );
			$order->add_order_note( $message );
			$order->update_status( WC_ORDER_STATUS_FAILED );
		}
	}

	/**
	 * add field 'is_subscription' to edit product page
	 *
	 * @since 1.3.3
	 *
	 */
	public function add_field_is_subscription( $array ) {
		$array['is_subscription'] = array(
			'id'            => '_is_subscription',
			'wrapper_class' => 'show_if_simple show_if_variable',
			'label'         => 'Bolt subscription',
			'description'   => 'Product supports subscription',
			'default'       => 'no',
		);

		return $array;
	}

	/**
	 * save field 'is_subscription' on edit product page
	 *
	 * @since 1.3.3
	 *
	 */
	public function save_field_is_subscription( $post_id ) {
		$woocommerce_checkbox = isset( $_POST['_is_subscription'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_is_subscription', $woocommerce_checkbox );
	}
}