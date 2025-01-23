<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget\Items
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Mini Cart Contents block.
 */
class Contents extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'mini-cart-contents';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wc-block-mini-cart__template-part,
			.wp-block-woocommerce-mini-cart-contents {
				height: 100%;
			}
			.wp-block-woocommerce-empty-mini-cart-contents-block,
			.wp-block-woocommerce-filled-mini-cart-contents-block {
				display: flex;
				flex-direction: column;
				height: 100%;
				max-height: -moz-available;
    			max-height: fill-available;
			}
			.wp-block-woocommerce-empty-mini-cart-contents-block {
				justify-content: center;
			}
			.wp-block-woocommerce-filled-mini-cart-contents-block {
				justify-content: space-between;
			}
		';
	}
}
