<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget\Button
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Mini Cart Button block.
 */
class Button extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'mini-cart-shopping-button-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wp-block-woocommerce-mini-cart-shopping-button-block.wp-element-button {
				border-radius: 50px;
				background-color: var(--wp--preset--color--primary);
				color: var(--wp--preset--color--white);
			}
		';
	}
}
