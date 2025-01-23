<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\More
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * More Styles
 */
class More extends Base {
    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
        return [
            'woocommerce/reviews-by-category',
            'woocommerce/reviews-by-product',
			'woocommerce/all-reviews',
        ];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
			.wc-block-components-load-more .wp-block-button__link {
				font-size: .65rem;
				background-color: var(--wp--preset--color--accent);
				border-color: var(--wp--preset--color--primary);
				color: var(--wp--preset--color--primary);
				padding: .35em 1em;
			}
        ';
	}
}
