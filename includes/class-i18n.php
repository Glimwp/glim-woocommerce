<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\I18N
 */

namespace GLIM\EXT\WOO;

use GlimFSE\Singleton;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\I18N
 * @author     Bican Marian Valeriu <marianvaleriubican@gmail.com>
 */
class I18N {

	use Singleton;
	
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'glim-woocommerce', false, dirname( GLIM_WOO_EXT_BASE ) . '/languages' );
	}
}
