<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Checkout\Summary\Items
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Checkout\Summary;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Items block.
 */
class Items extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'checkout-order-summary-cart-items-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wc-block-components-order-summary-item {
				display: flex;
				padding: 2rem 0 1rem;
			}
			.wc-block-components-order-summary-item + .wc-block-components-order-summary-item {
				border-top: 1px solid var(--wp--preset--color--accent);
			}
			.wc-block-components-order-summary-item .wc-block-components-product-name,
			.wc-block-components-order-summary-item .wc-block-components-product-price {
				display: block;
			}
			.wc-block-components-order-summary-item .wc-block-components-product-name {
				font-weight: 500;
			}
			.wc-block-components-order-summary-item .wc-block-components-product-price {
				margin-bottom: 0.5rem;
			}
			.wc-block-components-order-summary-item .wc-block-components-product-metadata {
				display: none;
				font-size: var(--wp--preset--font-size--small);
			}
			.wc-block-components-order-summary-item .wc-block-components-product-metadata p {
				line-height: 1.3;
				margin-bottom: 0;
			}
			.wc-block-components-order-summary-item__image {
				position: relative;
				flex: 0 0 50px;
			}
			.wc-block-components-order-summary-item__image img {
				border: 1px solid var(--wp--preset--color--accent);
			}
			.wc-block-components-order-summary-item__quantity {
				position: absolute;
				top: -1rem;
				right: -1rem;
				padding: 5px;
				background-color: var(--wp--preset--color--primary);
				border: 3px solid var(--wp--preset--color--accent);
				color: white;
				border-radius: 9999px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: var(--wp--preset--font-size--small);
				line-height: 1;
				min-width: 25px;
				height: 25px;
				z-index: 11;
			}
			.wc-block-components-order-summary-item__individual-price {
				font-size: var(--wp--preset--font-size--small);
			}
			.wc-block-components-order-summary-item__total-price {
				flex: 0 0 100px;
				text-align: right;
			}
			.wc-block-components-order-summary-item__description {
				flex: 1 1 auto;
				padding: 0 1rem;
			}
		';
	}
}
