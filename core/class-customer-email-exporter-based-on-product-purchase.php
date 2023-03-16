<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Customer_Email_Exporter_Based_On_Product_Purchase_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( 'Customer_Email_Exporter_Based_On_Product_Purchase' ) ) :

	/**
	 * Main Customer_Email_Exporter_Based_On_Product_Purchase Class.
	 *
	 * @package		CUSTOMEREM
	 * @subpackage	Classes/Customer_Email_Exporter_Based_On_Product_Purchase
	 * @since		1.0.0
	 * @author		George Nicolaou
	 */
	final class Customer_Email_Exporter_Based_On_Product_Purchase {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Customer_Email_Exporter_Based_On_Product_Purchase
		 */
		private static $instance;

		/**
		 * CUSTOMEREM helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Customer_Email_Exporter_Based_On_Product_Purchase_Helpers
		 */
		public $helpers;

		/**
		 * CUSTOMEREM settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Customer_Email_Exporter_Based_On_Product_Purchase_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'customer-email-exporter-based-on-product-purchase' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'customer-email-exporter-based-on-product-purchase' ), '1.0.0' );
		}

		/**
		 * Main Customer_Email_Exporter_Based_On_Product_Purchase Instance.
		 *
		 * Insures that only one instance of Customer_Email_Exporter_Based_On_Product_Purchase exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Customer_Email_Exporter_Based_On_Product_Purchase	The one true Customer_Email_Exporter_Based_On_Product_Purchase
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Customer_Email_Exporter_Based_On_Product_Purchase ) ) {
				self::$instance					= new Customer_Email_Exporter_Based_On_Product_Purchase;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Customer_Email_Exporter_Based_On_Product_Purchase_Helpers();
				self::$instance->settings		= new Customer_Email_Exporter_Based_On_Product_Purchase_Settings();

				//Fire the plugin logic
				new Customer_Email_Exporter_Based_On_Product_Purchase_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'CUSTOMEREM/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once CUSTOMEREM_PLUGIN_DIR . 'core/includes/classes/class-customer-email-exporter-based-on-product-purchase-helpers.php';
			require_once CUSTOMEREM_PLUGIN_DIR . 'core/includes/classes/class-customer-email-exporter-based-on-product-purchase-settings.php';

			require_once CUSTOMEREM_PLUGIN_DIR . 'core/includes/classes/class-customer-email-exporter-based-on-product-purchase-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'customer-email-exporter-based-on-product-purchase', FALSE, dirname( plugin_basename( CUSTOMEREM_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.