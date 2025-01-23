<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Filters
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Filters;

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Rating Filter block.
 */
class Rating extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'rating-filter';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		$inline = '
			.wc-block-rating-filter .wc-block-components-product-rating {
				display: flex;
				align-items: center;
			}
			.wc-block-rating-filter .wc-block-components-product-rating__stars {
				margin: 0;
			}
			.wc-block-rating-filter .wc-block-components-product-rating-count {
				margin-left: 0.5rem;
			}
		';

		$inline .= Frontend::get_loading_css( '.wc-block-rating-filter .is-loading li', 'min-height: 1.25em;' );

		return $inline;
	}
}
