<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\Quantity
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * Quantity Styles
 */
class Quantity extends Base {
    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
		// Global - mini cart
		return [];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
			.wc-block-components-quantity-selector {
				display: inline-flex;
			}
			.quantity .qty,
			.wc-block-components-quantity-selector__input,
			.wc-block-components-quantity-selector__button {
				min-width: 2.5em;
				min-height: 2.5em;
				padding: 0;
				background-color: transparent;
				border: 1px solid var(--wp--preset--color--accent);
				border-radius: 0;
				box-shadow: none;
				color: inherit;
				font-size: 1em;
				text-align: center;
				-webkit-appearance: none;
						appearance: none;
				outline: none;
			}
			.wc-block-components-quantity-selector__input {
				position: relative;
				font-size: 0.8em;
				max-width: 5rem;
				margin: 0 -1px;
				padding: 0;
				color: inherit;
				background-color: transparent;
				-moz-appearance: textfield;
			}
			.wc-block-components-quantity-selector__input::-webkit-inner-spin-button,
			.wc-block-components-quantity-selector__input::-webkit-outer-spin-button {
				margin: 0;
				-webkit-appearance: none;
						appearance: none;
			}
			.wc-block-components-quantity-selector__input:focus,
			.wc-block-components-quantity-selector__input:active {
				border-color: var(--wp--preset--color--primary);
				box-shadow: none;
			}
			.wc-block-components-quantity-selector__button {
				transition: ease background-color 300ms;
				cursor: pointer;
			}
			.wc-block-components-quantity-selector__button:hover,
			.wc-block-components-quantity-selector__button:focus {
				background-color: var(--wp--preset--color--accent);
			}
			.wc-block-components-quantity-selector__button--minus {
				order: -1;
			}     
        ';
	}
}
