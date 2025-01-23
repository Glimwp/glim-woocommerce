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
 * Gutenberg Stock Filter block.
 */
class Stock extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'stock-filter';

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return Frontend::get_loading_css( '.wc-block-stock-filter.is-loading ul > li' );
	}
}