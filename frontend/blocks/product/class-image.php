<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Product\Image
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Product;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

use function add_filter;
use function apply_filters;
use function str_replace;
use function GlimFSE\Functions\get_prop;

/**
 * Gutenberg Product Image block.
 */
class Image extends Base {

	use Singleton;
	
	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'product-image';

	/**
	 * Block styles.
	 *
	 * @return 	string Block CSS.
	 */
	public function enqueue_styles() {
		parent::enqueue_styles();

		glimfse( 'assets' )->add_style( 'wc-blocks-style-product-thumb', [
			'load'		=> function( $blocks ) {
				if( wp_style_is( 'wc-blocks-style-product-thumb' ) || wp_style_is( $this->get_asset_handle() ) ) {
					return false;
				}

				// Products
				if( Frontend\Blocks::has_products( $blocks ) ) {
					return true;
				}
			},
			'inline'	=> glimfse( 'blocks' )->get( $this->get_block_type() )::get_instance()->styles()
		] );
	}

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			:is(.wc-block-grid__product-image,.wc-block-components-product-image) {
				position: relative;
				z-index: 2;
				margin: 0;
			}
			:is(.wc-block-grid__product-image,.wc-block-components-product-image) img {
				display: block;
				width: 100%;
				object-fit: cover;
				border-radius: var(--wp--radius);
			}
			:is(.wc-block-grid__product-image,.wc-block-components-product-image) img:is(:only-child,:last-child,:last-of-type) {
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}
			.is-loading :is(.wc-block-grid__product-image,.wc-block-components-product-image) img {
				border-radius: var(--wp--radius);
			}
		';
	}
}
