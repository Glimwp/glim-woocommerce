<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Blocks
 */

namespace GLIM\EXT\WOO\Frontend\Blocks;

use GlimFSE\Singleton;
use GlimFSE\Config\Traits\Asset;
use GlimFSE\Gutenberg\Blocks\Dynamic;

/**
 * Block
 */
class Base extends Dynamic {

	/**
	 * Block namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'woocommerce';

    /**
	 * Get block asset handle.
	 *
	 * @return string
	 */
	public function get_asset_handle(): string {		
		return 'wc-blocks-style-' . $this->block_name;
	}
}
