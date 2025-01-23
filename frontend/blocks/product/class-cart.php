<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Product\Cart
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Product;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Product Add to Cart Form block.
 */
class Cart extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'add-to-cart-form';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			form.cart .woocommerce-variations *[class*="woocommerce-variation-"] {
				margin-top: 1rem;
			}
			form.cart .woocommerce-variations *[class*="woocommerce-variation-"]:empty {
				display: none;
			}
			form.cart .woocommerce-variation-price {
				line-height: 1;
			}
			form.cart a.reset_variations {
				position: absolute;
				bottom: 100%;
				right: 0;
			}
			.single-product .wp-block-post-excerpt__text {
				margin-bottom: 0;
			}
		';
	}
}
