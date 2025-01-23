<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\Checkbox
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * Checkbox Styles
 */
class Checkbox extends Base {
    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
        if( glimfse_if( 'is_woocommerce_archive' ) ) {
            return [];
        }

        return [
            'woocommerce/checkout-shipping-address-block',
            'woocommerce/checkout-order-note-block',
            'woocommerce/checkout-terms-block',
            'woocommerce/attribute-filter',
            'woocommerce/rating-filter',
            'woocommerce/stock-filter',
        ];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
            .wc-block-checkbox-list {
                padding-left: 0;
                list-style: none;
                margin: 0;
            }
            .wc-block-checkbox-list__checkbox {
                margin-top: 0.5rem;
            }
            .wc-block-components-checkbox__mark {
                position: absolute;
                fill: white;
                width: calc(.75 * var(--wc--checkbox--size));
                height: calc(.75 * var(--wc--checkbox--size));
                margin-left: calc(.15 * var(--wc--checkbox--size));
                margin-top: calc(.05 * var(--wc--checkbox--size));
                pointer-events: none;
            }
            .wc-block-components-checkbox label {
                position: relative;
                display: flex;
                align-items: flex-start;
            }
            .wc-block-components-checkbox input {
                position: static;
                margin: 0 var(--wc--input--padding-x) 0 0;
                height: var(--wc--checkbox--size);
                width: var(--wc--checkbox--size);
                min-height: var(--wc--checkbox--size);
                min-width: var(--wc--checkbox--size);
                background-color: transparent;
                border: var(--wc--input--border);
                border-radius: calc(var(--wc--input--border-radius) / 2);
                font-size: 1em;
                vertical-align: middle;
                overflow: hidden;
                outline: none;
                cursor: pointer;
                -webkit-appearance: none;
                        appearance: none;
            }
            .wc-block-components-checkbox input:not(:checked) + .wc-block-components-checkbox__mark {
                display: none;
            }
            .wc-block-components-checkbox input:checked {
                background-color: var(--wp--preset--color--primary);
                border-color: var(--wp--preset--color--primary);
            }
            .wc-block-components-checkbox input:focus {
                border-color: var(--wc--input--border-focus);
                box-shadow: 0 0 0 0.25rem var(--wp--preset--color--accent);
                outline: 0;
            }
            .wc-block-components-checkbox input:checked::before,
            .wc-block-components-checkbox input:checked::after {
                content: none;
            }
        ';
	}
}
