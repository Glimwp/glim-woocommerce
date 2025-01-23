<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\Validation
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * Validation Styles
 */
class Validation extends Base {
    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
        return [
            'woocommerce/checkout',
			'woocommerce/cart',
        ];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
			:is(
				.wc-block-components-combobox,
				.wc-block-components-checkbox,
				.wc-block-components-textarea,
				.wc-block-components-text-input,
			).has-error input {
				border-color: var(--wc--input--border-error);
			}
			.wc-block-components-validation-error {
				position: absolute;
				left: 0;
				right: 0;
				top: 100%;
				color: var(--wp--preset--color--danger);
				font-size: .65rem;
				font-style: italic;
			}
			.wc-block-components-validation-error p:only-child {
				margin: 0;
			} 
        ';
	}
}
