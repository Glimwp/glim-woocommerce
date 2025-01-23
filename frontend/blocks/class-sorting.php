<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks\Sorting
 */

namespace GLIM\EXT\WOO\Frontend\Blocks;

defined( 'ABSPATH' ) || exit();

use GlimFSE\Singleton;
use GLIM\EXT\WOO\Frontend\Blocks\Base;

use function add_filter;
use function GlimFSE\Functions\get_prop;

/**
 * Gutenberg Sorting block.
 */
class Sorting extends Base {

	use Singleton;

	/**
	 * Block name.
	 *
	 * @var string
	 */
	protected $block_name = 'catalog-sorting';

	/**
	 * Block init.
	 *
	 * @return 	array
	 */
	public function init() {
		add_filter( 'render_block_' . $this->get_block_type(), 	[ $this, 'filter_render' 	], 20, 1 );
	}

	/**
	 * Dynamically renders the block.
	 *
	 * @param 	array 	$block 		The parsed block.
	 * @param 	string 	$content 	The block markup.
	 *
	 * @return 	string 	The block markup.
	 */
	public function filter_render( string $content = '', array $attributes = [] ): string {
		$processor = new \WP_HTML_Tag_Processor( $content );
		$processor->next_tag();
	
		// Clean empty class
		if( $class = $processor->get_attribute( 'class' ) ) {
			$processor->set_attribute( 'class', rtrim( $class ) );
		}

		// Add form-select class
		$processor->next_tag( [ 'tag_name' => 'select' ] );
		$processor->add_class( 'form-select form-select-sm' );

		// Load a fake select for styles
		$fake_select = glimfse_input( 'select', [], false );
	
		return $processor->get_updated_html();
	}
}
