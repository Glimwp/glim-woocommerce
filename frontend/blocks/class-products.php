<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Products
 */

namespace GLIM\EXT\WOO\Frontend\Blocks;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Products block.
 */
class Products extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'all-products';

	/**
	 * Block styles.
	 *
	 * @return 	string Block CSS.
	 */
	public function enqueue_styles() {
		parent::enqueue_styles();

		glimfse( 'assets' )->add_style( 'wc-blocks-style-products', [
			'load'		=> function( $blocks ) {
				if( wp_style_is( 'wc-blocks-style-products' ) || wp_style_is( $this->get_asset_handle() ) ) {
					return false;
				}

				if( Frontend\Blocks::has_products( $blocks ) ) {
					return true;
				}

				if( is_singular( 'product' ) ) {
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
		$inline = '
			.wc-block-grid__products {
				display: grid;
				grid-gap: 1rem;
				grid-template-columns: 1fr;
				padding-left: 0;
				list-style: none;
				margin-bottom: 0;
			}
			.editor-styles-wrapper :is(.wc-block-grid__products,.wc-block-grid__products li) {
				margin: 0!important;
			}
			.wc-block-grid__no-products {
				text-align: center;
			}
			.wc-block-grid__no-products svg {
				display: block;
				margin: 0 auto 1rem;
				width: 2rem;
				height: 2rem;
			}
			.wc-block-grid__no-products button {
				padding: 10px 25px;
				border: 1px solid transparent;
				border-radius: 50px;
				background-color: var(--wp--preset--color--secondary);
				color: var(--wp--preset--color--dark);
				font-weight: 700;
				-webkit-appearance: none;
						appearance: none;
			}
			:where(
				ul li.type-product,
				ul.products-block-post-template li.wp-block-post,
				ul.wc-block-product-template li.wc-block-product,
				ul.wp-block-query__products li.wp-block-post,
				.wc-block-grid__product,
				.cross-sells-product
			) {
				--wp--radius: 0.375rem;
				position: relative;
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				gap: 0.5rem;
				text-align: center;
				background-color: transparent;
				transition: border-color 0.5s cubic-bezier(0.075, 0.82, 0.165, 1), box-shadow 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
				border: 1px solid var(--wp--preset--color--accent);
				border-radius: var(--wp--radius);
				box-sizing: border-box;
			}
			:where(
				ul li.type-product,
				ul.products-block-post-template li.wp-block-post,
				ul.wc-block-product-template li.wc-block-product,
				ul.wp-block-query__products li.wp-block-post,
				.wc-block-grid__product,
				.cross-sells-product
			):hover {
				border-color: var(--wp--preset--color--primary);
				box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.05);
			}
			:where(
				ul li.type-product.is-loading,
				ul.wc-block-product-template li.wc-block-product.is-loading,
				ul.wp-block-query__products li.wp-block-post.is-loading,
				.wc-block-grid__product.is-loading,
				.cross-sells-product.is-loading
			) :where(
				.wp-block-button,
				.wc-block-grid__product-rating,
				.wc-block-grid__product-price,
				.wc-block-grid__product-title
			) {
				display: none;
			}
			
			:is(
				ul.wc-block-product-template .wp-block-post-title,
				ul.products-block-post-template .wp-block-post-title,
				ul li.type-product .wp-block-post-title,
				.wc-block-grid__product-title,
				.wc-block-components-product-title
			) {
				font-size: 1rem;
				font-weight: 700;
				text-transform: uppercase;
				margin: 0;
			}
			.wc-block-grid__product-image + :where(.wc-block-grid__product-title,.wp-block-post-title) {
				margin-top: .5rem;
			}

			.wc-block-pagination {
				margin: 3rem 0 0;
			}
			.wc-block-pagination-page {
				padding: 0.5rem 1rem;
				margin: 1px;
			}
			.wc-block-pagination-page:hover:not(:disabled),
			.wc-block-pagination-page--active {
				background-color: var(--wp--preset--color--primary);
				border-color: var(--wp--preset--color--primary);
				color: white !important;
			}
			.wc-block-pagination-page:disabled {
				color: var(--wp--gray-500);
				pointer-events: none;
			}
			@media (min-width: 576px) {
				.wc-block-grid__products {
					grid-template-columns: repeat(2, 1fr);
				}
			}
			@media (min-width: 1200px) {
				.has-3-columns .wc-block-grid__products {
					grid-template-columns: repeat(3, 1fr);
				}
				.has-4-columns .wc-block-grid__products {
					grid-template-columns: repeat(4, 1fr);
				}
				.has-5-columns .wc-block-grid__products {
					grid-template-columns: repeat(5, 1fr);
				}
				.has-6-columns .wc-block-grid__products {
					grid-template-columns: repeat(6, 1fr);
				}
			}
			/* Misc */
			.woocommerce-result-count {
				margin: 0;
			}
		';

		return $inline;
	}
}