<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Order\Confirmation\Totals
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Order\Confirmation;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Order Confirmation Totals block.
 */
class Totals extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'order-confirmation-totals';

	/**
	 * Init.
	 */
	public function init() {
		\add_filter( 'render_block_' . $this->get_block_type(),	[ $this, 'render' ], 20, 2 );
    }

	/**
	 * Block styles.
	 *
	 * @return 	string Block CSS.
	 */
	public function enqueue_styles() {
		parent::enqueue_styles();

		glimfse( 'assets' )->add_style( 'wp-block-table-dep', [
			'load'		=> fn() => ! wp_style_is( 'wp-block-table' ),
			'inline'	=> glimfse( 'blocks' )->get( 'core/table' )::get_instance()->styles()
		] );
	}

	/**
	 * Dynamically renders the `woocommerce/order-confirmation-totals` block.
	 * 
	 * @param 	string 	$content 		The block markup.
	 *
	 * @return 	string 	The block markup.
	 */
	public function render( string $content = '' ): string {
		$content 	= new \WP_HTML_Tag_Processor( $content );
		
		if( $content->next_tag( [
			'tag_name' 		=> 'table',
			'class_name' 	=> 'wc-block-order-confirmation-totals__table'
		] ) ) {
			$content->add_class( 'table table-bordered table-hover' );
		}
		
		while ( $content->next_tag( [
			'class_name' => 'wc-block-order-confirmation-totals__total'
		] ) ) {
			$content->add_class( 'has-text-align-right' );
		}
	
		return (string) $content->get_updated_html();
	}

	/**
	 * Block styles
	 *
	 * @return 	string 	The block styles.
	 */
	public function styles(): string {
		return '
			.wc-block-order-confirmation-totals__table {
				table-layout: fixed;
				width: 100%;
			}
			.wc-block-order-confirmation-totals__product a {
				font-weight: bold;
			}
			.wc-block-order-confirmation-totals__table tfoot .woocommerce-Price-amount {
				font-weight: bold;
			}
			.product-purchase-note {
				font-size: var(--wp--preset--font-size--small);
				opacity: .75;
			}
		';
	}
}
