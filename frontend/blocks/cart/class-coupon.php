<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Cart\Summary\Coupon
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Cart\Summary;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Summary Coupon block.
 */
class Coupon extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'cart-order-summary-coupon-form-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wp-block-woocommerce-cart-order-summary-coupon-form-block {
				box-sizing: border-box;
			}
		';
	}
}
