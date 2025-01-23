<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Checkout\Address
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Checkout\Address;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Summary Coupon block.
 */
class Billing extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'checkout-billing-address-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wp-block-woocommerce-checkout-billing-address-block {
				box-sizing: border-box;
			}
		';
	}
}
