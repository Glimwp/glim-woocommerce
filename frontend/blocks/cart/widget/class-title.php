<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget\Title
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Cart\Widget;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Summary block.
 */
class Title extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'mini-cart-title-block';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			h2.wc-block-mini-cart__title {
				display: flex;
				gap: .75rem;
				font-size: var(--wp--preset--font-size--normal);
				font-weight: 700;
				background-color: var(--wp--preset--color--accent);
				padding: var(--wp--custom--gutter, 1rem);
				margin: 0;
			}
		';
	}
}
