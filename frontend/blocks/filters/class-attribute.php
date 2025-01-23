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
use GLIM\EXT\WOO\Frontend\Blocks\Base;
use GLIM\EXT\WOO\Frontend;

/**
 * Gutenberg Attribute Filter block.
 */
class Attribute extends Base {

	use Singleton;

	/**
	 * Block namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'woocommerce';

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'attribute-filter';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		$inline = '';
		
		$inline .= '
			.wc-block-attribute-filter.style-dropdown .is-loading {
				min-height: 50px;
			}
		';

		$inline .= Frontend::get_loading_css( '.wc-block-attribute-filter .is-loading' );

		return $inline;
	}
}