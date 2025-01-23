<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Order\Confirmation\Downloads
 */

namespace GLIM\EXT\WOO\Frontend\Blocks\Order\Confirmation;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

/**
 * Gutenberg Order Confirmation Downloads block.
 */
class Downloads extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'order-confirmation-downloads';

	/**
	 * Init.
	 */
	public function init() {
		\add_filter( 'render_block_' . $this->get_block_type(),	[ $this, 'render' ], 20, 2 );
    }

	/**
	 * Block args.
	 *
	 * @return 	array
	 */
	public function block_type_args(): array {
		return [
			'style'	=> [ 'wp-block-table', $this->get_asset_handle() ]
		];
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
			'class_name' 	=> 'wc-block-order-confirmation-downloads__table'
		] ) ) {
			$content->add_class( 'table table-bordered table-hover' );
		}
		
		while ( $content->next_tag( [
			'class_name' => 'download-file'
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
			.wc-block-order-confirmation-downloads__table {
				width: 100%;
			}
		';
	}
}
