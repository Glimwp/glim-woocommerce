<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Conditions\Page
 */

namespace GLIM\EXT\WOO\Frontend\Conditions;

defined( 'ABSPATH' ) || exit(); 

use GlimFSE\Conditional\Interfaces\ConditionalInterface;

/**
 * Conditional that is only met when in the Woo Pages.
 */
class Page implements ConditionalInterface {

	/**
	 * @inheritdoc
	 */
	public function is_met(): bool {
		if ( glimfse_if( 'is_woocommerce_active' ) ) {
			if ( \is_woocommerce() || \is_cart() || \is_checkout() || \is_account_page() ) {
				return true;
			}
		}
		
		return false;
	}
}