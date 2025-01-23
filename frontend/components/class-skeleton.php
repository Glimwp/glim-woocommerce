<?php
/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Frontend\Components\Skeleton
 */

namespace GLIM\EXT\WOO\Frontend\Components;

use GLIM\EXT\WOO\Frontend\Components\Base;

/**
 * Skeleton Styles
 */
class Skeleton extends Base {
    /**
     * Component blocks.
     *
     * @return 	array
     */
	public static function blocks(): array {
        return [
            'woocommerce/order-confirmation-additional-information',
        ];
	}

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	public static function styles(): string {
		return '
			.wc-block-components-skeleton {
				display: flex;
				flex-direction: column;
				gap: 1rem;
				width: 100%;
				margin-top: 0;
			}
			.wc-block-components-skeleton-text-line {
				position: relative;
				height: 0.85em;
				width: 100%;
				background: hsla(0,0%,7%,.115);
				border-radius: 4px;
			}
			.wc-block-components-skeleton-text-line:last-child {
				width: 80%;
			}
        ';
	}
}
