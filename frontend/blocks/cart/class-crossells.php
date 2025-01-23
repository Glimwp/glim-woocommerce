<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Cart\Crossells
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Cart;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Cart Cross Sells block.
 */
class Crossells extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'cart-cross-sells-products-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			/* Admin */
			.wp-block-woocommerce-cart-cross-sells-products-block > * > div {
				display: grid;
				grid-gap: 1rem;
				grid-template-columns: repeat(3, 1fr);
			}
			/* Frontend */
			.woocommerce-cart .wp-block-woocommerce-cart-cross-sells-block > div {
				display: grid;
				grid-gap: 1rem;
				grid-template-columns: 1fr;
			}
			.woocommerce-cart .cross-sells-product > div {
				display: inherit;
				gap: inherit;
				flex-direction: inherit;
				justify-content: inherit;
			}
			.woocommerce-cart .is-medium .wp-block-woocommerce-cart-cross-sells-block > div {
				grid-template-columns: repeat(2, 1fr);
			}
			.woocommerce-cart .is-large .wp-block-woocommerce-cart-cross-sells-block > div {
				grid-template-columns: repeat(3, 1fr);
			}
		';
	}
}
