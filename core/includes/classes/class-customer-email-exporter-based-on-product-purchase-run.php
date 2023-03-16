<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This class is used to bring your plugin to life. 
 * All the other registered classed bring features which are
 * controlled and managed by this class.
 * 
 * Within the add_hooks() function, you can register all of 
 * your WordPress related actions and filters as followed:
 * 
 * add_action( 'my_action_hook_to_call', array( $this, 'the_action_hook_callback', 10, 1 ) );
 * or
 * add_filter( 'my_filter_hook_to_call', array( $this, 'the_filter_hook_callback', 10, 1 ) );
 * or
 * add_shortcode( 'my_shortcode_tag', array( $this, 'the_shortcode_callback', 10 ) );
 * 
 * Once added, you can create the callback function, within this class, as followed: 
 * 
 * public function the_action_hook_callback( $some_variable ){}
 * or
 * public function the_filter_hook_callback( $some_variable ){}
 * or
 * public function the_shortcode_callback( $attributes = array(), $content = '' ){}
 * 
 * 
 * HELPER COMMENT END
 */

/**
 * Class Customer_Email_Exporter_Based_On_Product_Purchase_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		CUSTOMEREM
 * @subpackage	Classes/Customer_Email_Exporter_Based_On_Product_Purchase_Run
 * @author		George Nicolaou
 * @since		1.0.0
 */
class Customer_Email_Exporter_Based_On_Product_Purchase_Run{

	/**
	 * Our Customer_Email_Exporter_Based_On_Product_Purchase_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'customerem-backend-styles', CUSTOMEREM_PLUGIN_URL . 'core/includes/assets/css/backend-styles.css', array(), CUSTOMEREM_VERSION, 'all' );
		wp_enqueue_script( 'customerem-backend-scripts', CUSTOMEREM_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), CUSTOMEREM_VERSION, false );
		wp_localize_script( 'customerem-backend-scripts', 'customerem', array(
			'plugin_name'   	=> __( CUSTOMEREM_NAME, 'customer-email-exporter-based-on-product-purchase' ),
		));
	}

}
