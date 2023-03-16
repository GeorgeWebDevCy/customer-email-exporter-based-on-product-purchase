<?php
/**
 * customer email exporter based on product purchase
 *
 * @package       CUSTOMEREM
 * @author        George Nicolaou
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   customer email exporter based on product purchase
 * Plugin URI:    https://www.georgenicolaou.me/plugins/customer-email-exporter-based-on-product-purchase
 * Description:   A plugin to exporter customer email if they purchased a specific product
 * Version:       1.0.0
 * Author:        George Nicolaou
 * Author URI:    https://www.georgenicolaou.me/
 * Text Domain:   customer-email-exporter-based-on-product-purchase
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with customer email exporter based on product purchase. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function CUSTOMEREM() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'CUSTOMEREM_NAME',			'customer email exporter based on product purchase' );

// Plugin version
define( 'CUSTOMEREM_VERSION',		'1.0.0' );

// Plugin Root File
define( 'CUSTOMEREM_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'CUSTOMEREM_PLUGIN_BASE',	plugin_basename( CUSTOMEREM_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'CUSTOMEREM_PLUGIN_DIR',	plugin_dir_path( CUSTOMEREM_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'CUSTOMEREM_PLUGIN_URL',	plugin_dir_url( CUSTOMEREM_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once CUSTOMEREM_PLUGIN_DIR . 'core/class-customer-email-exporter-based-on-product-purchase.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  George Nicolaou
 * @since   1.0.0
 * @return  object|Customer_Email_Exporter_Based_On_Product_Purchase
 */
function CUSTOMEREM() {
	return Customer_Email_Exporter_Based_On_Product_Purchase::instance();
}

CUSTOMEREM();
