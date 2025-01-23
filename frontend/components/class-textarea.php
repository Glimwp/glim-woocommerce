<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\Textarea
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * Textarea Styles
 */
class Textarea extends Base {

    static $deps = [ 'text' ];

    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
        return [
            'woocommerce/checkout-order-note-block',
        ];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
            .wc-block-components-textarea {
                padding: var(--wc--input--padding);
            }
        ';
	}
}
