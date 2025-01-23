<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Condition\Archive
 */

namespace GLIM\EXT\WOO\Frontend\Conditions;

defined( 'ABSPATH' ) || exit(); 

use GlimFSE\Conditional\Interfaces\ConditionalInterface;

/**
 * Conditional that is only met when in the front page.
 */
class Archive implements ConditionalInterface {

	/**
	 * @inheritdoc
	 */
	public function is_met(): bool {
		if ( glimfse_if( 'is_woocommerce_active' ) ) {
			if ( \is_shop() || \is_product_taxonomy() || \is_product_category() || \is_product_tag() ) {
				return true;
			}
		}

		return false;
	}
}