<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This class contains all of the plugin related settings.
 * Everything that is relevant data and used multiple times throughout 
 * the plugin.
 * 
 * To define the actual values, we recommend adding them as shown above
 * within the __construct() function as a class-wide variable. 
 * This variable is then used by the callable functions down below. 
 * These callable functions can be called everywhere within the plugin 
 * as followed using the get_plugin_name() as an example: 
 * 
 * CUSTOMEREM->settings->get_plugin_name();
 * 
 * HELPER COMMENT END
 */

/**
 * Class Customer_Email_Exporter_Based_On_Product_Purchase_Settings
 *
 * This class contains all of the plugin settings.
 * Here you can configure the whole plugin data.
 *
 * @package		CUSTOMEREM
 * @subpackage	Classes/Customer_Email_Exporter_Based_On_Product_Purchase_Settings
 * @author		George Nicolaou
 * @since		1.0.0
 */
class Customer_Email_Exporter_Based_On_Product_Purchase_Settings{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	private $plugin_name;

	/**
	 * Our Customer_Email_Exporter_Based_On_Product_Purchase_Settings constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){

		$this->plugin_name = CUSTOMEREM_NAME;
	}

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * Return the plugin name
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The plugin name
	 */
	public function get_plugin_name(){
		return apply_filters( 'CUSTOMEREM/settings/get_plugin_name', $this->plugin_name );
	}
}
