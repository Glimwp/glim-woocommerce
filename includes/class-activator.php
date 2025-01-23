<?php
/**
 * Fired during plugin activation
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Activator
 */

namespace GLIM\EXT\WOO;


use GlimFSE\Admin\Notifications;
use GlimFSE\Admin\Notifications\Notification;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    IAmBican
 * @subpackage GLIM\EXT\WOO\Activator
 * @author     Bican Marian Valeriu <marianvaleriubican@gmail.com>
 */
class Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function run() {
		$errors = self::if_compatible();

		if ( count( $errors ) ) {
			deactivate_plugins( GLIM_WOO_EXT_BASE );
			wp_die( current( $errors ) );
		}

		if( ! glimfse_option( 'woocommerce' ) ) {
			glimfse_option( [
				'woocommerce' => [
					'remove_style'			=> true,
					'replace_select2_style' => true,
					'product_price_extra'	=> true,
					'product_rating_extra'	=> true,
					'customer_account_extra'=> false,
					'product_gallery_cols'	=> 5
				]
			] );
		}
	}

	/**
	 * Check if compatible
	 *
	 * @since    1.0.0
	 */
	public static function if_compatible() {
		$checks = [
			'theme' 	=> function_exists( 'glimfse' ),
			'plugin' 	=> glimfse_if( 'is_woocommerce_active' ),
		];

		$errors = [
			'theme' 	=> __( 'This extension requires GlimFSE Framework (or a skin) installed and active.', 'glim-woocommerce' ),
			'plugin' 	=> __( 'This extension requires WooCommerce plugin installed and active.', 'glim-woocommerce' ),
		];

		$checks = array_filter( $checks, function( $value ) {
			return (boolean) $value === false;
		} );

		return array_intersect_key( $errors, $checks );	
	}
}
