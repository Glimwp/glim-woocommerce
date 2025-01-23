<?php
/**
 * Fired during plugin deactivation
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\DeActivator
 */

namespace GLIM\EXT\WOO;

use GlimFSE\Admin\Notifications;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\DeActivator
 * @author     Bican Marian Valeriu <marianvaleriubican@gmail.com>
 */
class Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function run() {
		if( ! function_exists( 'glimfse' ) ) {
			return;
		}
		
		Notifications::get_instance()->remove_notification_by_id( Admin::NOTICE_ID );
		delete_transient( Admin::NOTICE_ID );
		delete_transient( Admin::UPDATE_ID );
	}
}
