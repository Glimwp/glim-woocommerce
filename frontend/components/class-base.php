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

/**
 * Components Styles
 */
abstract class Base {
    /**
     * Component's Style Deps.
     *
     * @var     array
     */
    static $deps = [];

    /**
	 * Component blocks.
	 *
	 * @return 	array
	 */
	abstract public static function blocks(): array;

    /**
	 * Component styles.
	 *
	 * @return 	string
	 */
	abstract public static function styles(): string;
}
