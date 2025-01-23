<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Featured
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Featured;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;
use function GlimFSE\Functions\get_prop;

/**
 * Gutenberg Featured Category block.
 */
class Category extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'featured-category';

	/**
	 * Block args.
	 *
	 * @return 	array
	 */
	public function block_type_args(): array {
		return [
			'style'	=> [ $this->get_asset_handle(), 'wc-blocks-style-featured-product' ]
		];
	}

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wp-block.wp-block:is(.wp-block-woocommerce-featured-category) {
				background: none!important;
			}
		';
	}
}