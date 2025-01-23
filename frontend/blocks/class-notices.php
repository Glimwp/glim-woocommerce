<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Notices
 */

namespace GLIM\EXT\WOO\Frontend\Blocks;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Store Notices block.
 */
class Notices extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'store-notices';

	/**
	 * Constructor.
	 *
	 * @return 	void
	 */
	public function init() {
		\add_filter( 'render_block_' . $this->get_block_type(), [ $this, 'render' ], 20, 1 );
	}

	/**
	 * Dynamically renders the `woocommerce/store-notices` block.
	 *
	 * @param 	string 	$content 	The block markup.
	 *
	 * @return 	string 	The block markup.
	 */
	public function render( string $content = '' ): string {

		return str_replace( [
			'alignwide  alignwide',
			'  align ',
		], [ 
			'alignwide',
			''
		], $content );
	}

	/**
	 * Block styles.
	 *
	 * @return 	string Block CSS.
	 */
	public function enqueue_styles() {
		parent::enqueue_styles();

		glimfse( 'assets' )->add_style( 'wc-blocks-style-notices', [
			'load'		=> function( $blocks ) {
				if( wp_style_is( 'wc-blocks-style-notices' ) || wp_style_is( $this->get_asset_handle() ) ) {
					return false;
				}

				if( count( array_intersect( $blocks, [
					'woocommerce/cart-order-summary-shipping-block',
					'woocommerce/checkout-shipping-methods-block',
					'woocommerce/checkout-payment-block'
				] ) ) ) {
					return true;
				}

				if( is_account_page() ) {
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
			:where(.wc-block-components-notices,.woocommerce-notices-wrapper):not(:empty),
			.wc-block-store-notices .components-notice {
				margin: 0 0 var(--wp--style--block-gap);
			}
			.woocommerce-notices-wrapper:empty {
				display: none;
			}
			.wc-block-store-notices + * {
				margin-top: 0!important;
			}
		';
	}
}
