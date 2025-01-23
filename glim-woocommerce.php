<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.glimfse.com/
 * @since             1.0.0
 * @package           GLIM\EXT\WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       GLIM: WooCommerce
 * Plugin URI:        https://github.com/Glimwp/glim-woocommerce
 * Description:       GLIM WooCommerce extension for GlimFSE Framework theme.
 * Version:           1.3.0
 * Author:            Bican Marian Valeriu
 * Author URI:        https://www.glimfse.com/about/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       glim-woocommerce
 * Domain Path:       /languages
 * Requires at least:       6.5
 * Requires PHP:            7.4
 * WC requires at least:    8.0
 * WC tested up to:         9.5.2
 * Requires Plugins: woocommerce
 */
namespace GLIM\EXT\WOO;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GLIM_WOO_EXT',	    __FILE__ );
define( 'GLIM_WOO_EXT_VER', 	get_file_data( GLIM_WOO_EXT, [ 'Version' ] )[0] ); // phpcs:ignore
define( 'GLIM_WOO_EXT_DIR', 	plugin_dir_path( GLIM_WOO_EXT ) );
define( 'GLIM_WOO_EXT_URL', 	plugin_dir_url( GLIM_WOO_EXT ) );
define( 'GLIM_WOO_EXT_BASE',	plugin_basename( GLIM_WOO_EXT ) );

require_once( GLIM_WOO_EXT_DIR . '/includes/class-autoloader.php' );

new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/admin' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/includes' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/conditions' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/components' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/templates' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/cart' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/cart/widget' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/filters' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/account' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/product' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/checkout' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/checkout/address' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/featured' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/order' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/order/confirmation' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/order/confirmation/address' );
new Autoloader( 'GLIM\EXT\WOO', GLIM_WOO_EXT_DIR . '/frontend/blocks/order/confirmation/wrappers' );

// Activation/Deactivation Hooks
register_activation_hook( GLIM_WOO_EXT, [ Activator::class, 'run' ] );
register_deactivation_hook( GLIM_WOO_EXT, [ Deactivator::class, 'run' ] );

/**
 * Hook the extension after GlimFSE is Loaded
 */
add_action( 'glimfse/theme/loaded', fn() => glimfse( 'integrations' )->register( 'plugin/woocommerce', __NAMESPACE__ ) );
