<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.glimfse.com/
 * @since      1.0.0
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Admin
 */

namespace GLIM\EXT\WOO;

use GlimFSE\Config\Traits\Asset;
use GlimFSE\Admin\Request;
use GlimFSE\Admin\Notifications;
use GlimFSE\Admin\Notifications\Notification;
use GLIM\EXT\WOO\Frontend\Templates;
use function GlimFSE\Functions\get_prop;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    GLIM\EXT\WOO
 * @subpackage GLIM\EXT\WOO\Admin
 * @author     Bican Marian Valeriu <marianvaleriubican@gmail.com>
 */
class Admin {

	use Asset;

	const NOTICE_ID 	= 'glimfse/plugin/woocommerce/notice';
	const UPDATE_ID		= 'glimfse/plugin/woocommerce/update';
	const REPOSITORY 	= 'Glimwp/glim-woocommerce';

	/**
	 * The ID of this plugin.
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @var		string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since	1.0.0
	 * @version	1.0.0
	 *
	 * @var		string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The config of this plugin.
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @var		mixed    $config    The config of this plugin.
	 */
	private $config;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @param	string    $plugin_name	The name of this plugin.
	 * @param	string    $version    	The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $config ) {
		$this->plugin_name	= $plugin_name;
		$this->version 		= $version;
		$this->config 		= $config;
	}

	/**
	 * Declare HPOS compatability
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 */
	public function hpos_compat() {
		if ( ! class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			return;
		}
		
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', GLIM_WOO_EXT, true );	
	}
    
    /**
	 * Check if active
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 */
	public function if_active() {
		$message = sprintf(
			'<h3 class="notice__heading" style="margin-bottom:0px">%1$s</h3>
			<div class="notice__content">
				<p>%2$s</p>
				<p><a href="%3$s" class="button button-primary">%4$s</a></p>
			</div>',
			esc_html__( 'Awesome, GLIM: WooCommerce extension is activated!', 'glim-woocommerce' ),
			esc_html__( 'Go to Theme Options in order to setup your preferences.', 'glim-woocommerce' ),
			esc_url( admin_url( '/themes.php?page=glimfse&tab=plugins#glim-woocommerce' ) ),
			esc_html__( 'Show me the options!', 'glim-woocommerce' )
		);

		$notification = new Notification( $message, [
			'id'			=> self::NOTICE_ID,
			'type'     		=> Notification::INFO,
			'priority' 		=> 1,
			'class'			=> 'notice is-dismissible',
			'capabilities' 	=> 'activate_plugins',
		] );

		if( get_user_option( self::NOTICE_ID ) === 'seen' ) {
			Notifications::get_instance()->remove_notification( $notification );
			set_transient( self::NOTICE_ID, true, WEEK_IN_SECONDS );
			return;
		}
		
		if( get_transient( self::NOTICE_ID ) === false ) {
			Notifications::get_instance()->add_notification( $notification );
		}
	}

	/**
	 * Admin Assets
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 */
	public function assets() {
		// Only if user is administrator.
		if( ! current_user_can( 'administrator' ) ) {
			return;
		}

		$path = glimfse_if( 'is_dev_mode' ) ? 'unminified' : 'minified';
		$name = glimfse_if( 'is_dev_mode' ) ? 'admin' : 'admin.min';
		$data = [
			'version' 		=> $this->version,
			'dependencies'	=> [ 'glimfse-admin' ],
		];

		wp_register_script( 
			$this->make_handle(),
			sprintf( '%s/assets/%s/js/%s.js', untrailingslashit( GLIM_WOO_EXT_URL ), $path, $name ),
			$data['dependencies'], 
			$data['version'], 
			true 
		);

		wp_enqueue_script( $this->make_handle() );

		wp_set_script_translations( $this->make_handle(), 'glim-woocommerce', untrailingslashit( GLIM_WOO_EXT_DIR ) . '/languages' );
	}

	/**
	 * Editor Assets
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 */
	public function editor_assets() {
		$path = glimfse_if( 'is_dev_mode' ) ? 'unminified' : 'minified';
		$name = glimfse_if( 'is_dev_mode' ) ? 'gutenberg' : 'gutenberg.min';
		$data = [
			'version' 		=> $this->version,
			'dependencies'	=> [ 'wp-i18n', 'wp-blocks' ] ,
		];

		wp_register_script( 
			$this->make_handle( 'gutenberg' ),
			sprintf( '%s/assets/%s/js/%s.js', untrailingslashit( GLIM_WOO_EXT_URL ), $path, $name ),
			$data['dependencies'], 
			$data['version'], 
			true 
		);

		wp_enqueue_script( $this->make_handle( 'gutenberg' ) );
	}

	/**
	 * Upgrader/Updater
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @param 	boolean $true       always true
	 * @param 	mixed   $hook_extra not used
	 * @param 	array   $result     the result of the move
	 *
	 * @return 	array 	$result the result of the move
	 */
	public function install( $true, $hook_extra, $result ) {
		global $wp_filesystem;

		// Move & Activate
		$wp_filesystem->move( $result['destination'], GLIM_WOO_EXT_DIR );
		$result['destination'] 	= GLIM_WOO_EXT_DIR;
		$activate 				= activate_plugin( GLIM_WOO_EXT_BASE );

		// Output the update message
		echo is_wp_error( $activate ) ?
			esc_html__( 'The plugin has been updated, but could not be reactivated. Please reactivate it manually.', 'glim-woocommerce' ) :
			esc_html__( 'Plugin reactivated successfully.', 'glim-woocommerce' );

		return $result;
	}

	/**
	 * Update
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 */
	public function update( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}
		
		$latest 	= self::get_github_data();
		$tag_name 	= get_prop( $latest, 'tag_name', 'v1.0.0' );
		$version 	= str_replace( 'v', '', $tag_name );

		$response 				= new \stdClass;
		$response->new_version 	= $version;
		$response->slug 		= dirname( GLIM_WOO_EXT_BASE );
		$response->plugin 		= GLIM_WOO_EXT_BASE;
		$response->id 			= GLIM_WOO_EXT_BASE;
		$response->tested 		= '6.5.0';
		$response->url 			= sprintf( 'https://github.com/%s', self::REPOSITORY );
		$response->package 		= sprintf( 'https://api.github.com/repos/%s/zipball/%s', self::REPOSITORY, $tag_name );

		if ( 1 === version_compare( $version, $this->version ) ) {
			$transient->response[ GLIM_WOO_EXT_BASE ] = $response;
		} else {
			$transient->no_update[ GLIM_WOO_EXT_BASE ] = $response;
		}

		$transient->last_checked	= time();
		$transient->checked[ GLIM_WOO_EXT_BASE ] = GLIM_WOO_EXT_VER;
		
		return $transient;
	}

	/**
	 * Get Plugin info
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @param 	bool    $false  always false
	 * @param 	string  $action the API function being performed
	 * @param 	object  $args   plugin arguments
	 *
	 * @return 	object $response the plugin info
	 */
	public function info( $false, $action, $response ) {
		if ( 'plugin_information' !== $action ) {
			return $false;
		}

		// Check if this call API is for the right plugin
		if ( ! isset( $response->slug ) || $response->slug !== dirname( GLIM_WOO_EXT_BASE ) ) {
			return $false;
		}

		$plugin		= self::get_plugin_data();
		$latest 	= self::get_github_data();
		$tag_name 	= get_prop( $latest, 'tag_name', 'v1.0.0' );
		$published  = get_prop( $latest, 'published_at' );

		$response->slug 		= dirname( GLIM_WOO_EXT_BASE );
		$response->version 		= str_replace( 'v', '', $tag_name );
		$response->id 			= GLIM_WOO_EXT_BASE;
		$response->plugin_name 	= $plugin['Name'];
		$response->author 		= $plugin['Author'];
		$response->homepage		= $plugin['PluginURI'];
		$response->requires 	= $plugin['RequiresWP'];
		$response->requires_php	= $plugin['RequiresPHP'];
		$response->downloaded   = 0;
		$response->last_updated = date( 'Y-m-d', strtotime( $published ) );
		$response->sections		= [
			'changelog' 	=> sprintf(
				__( 'To read the change history for the latest plugin release, please go to the %s.', 'glim-woocommerce' ),
				sprintf(
					'<a href="%s" target="_blank">%s</a>',
					esc_url( sprintf( 'https://github.com/%s/releases/latest', self::REPOSITORY ) ),
					esc_html__( 'release page', 'glim-woocommerce' )
				)
			),
			'description' 	=> $plugin['Description'],
		];
		$response->donate_link 		= 'https://www.paypal.com/donate?hosted_button_id=PV9A4JDX84Z3W';
		$response->download_link 	= sprintf( 'https://api.github.com/repos/%s/zipball/%s', self::REPOSITORY, $tag_name );

		if ( ! isset( $response->plugin ) ) {
			$response->plugin = GLIM_WOO_EXT_BASE;
		}

		return $response;
	}

	/**
	 * Meta
	 *
	 * @since	1.0.0
	 * @version	1.0.0
	 */
	public function meta( $links, $file ) {
		// If we are not on the correct plugin, abort.
		if( GLIM_WOO_EXT_BASE !== $file ) {
			return $links;
		}

		$review  = '<a href="' . esc_url( sprintf( 'https://github.com/%s', self::REPOSITORY ) ) . '" aria-label="' . esc_attr__( 'Give it a star on GitHub', 'glim-woocommerce' ) . '" target="_blank">';
		$review .= esc_html__( 'Star on GitHub', 'glim-woocommerce' );
		$review .= '</a>';

		return array_merge( $links, [
			'review' => $review,
		] );
	}

	/**
	 * Links
	 *
	 * @since	1.0.0
	 * @version	1.0.0
	 */
	public function links( $links, $file ) {
		// If we are not on the correct plugin, abort.
		if ( GLIM_WOO_EXT_BASE !== $file ) {
			return $links;
		}

		$settings  = '<a href="' . esc_url( admin_url( '/themes.php?page=glimfse&tab=plugins#glim-woocommerce' ) ) . '" aria-label="' . esc_attr__( 'Navigate to the extension settings.', 'glim-woocommerce' ) . '">';
		$settings .= esc_html__( 'Settings', 'glim-woocommerce' );
		$settings .= '</a>';

		array_unshift( $links, $settings );

		return $links;
	}

	/**
	 * Get Github Data
	 *
	 * @since	1.0.0
	 * @version	1.0.0
	 *
	 * @return 	array
	 */
	public static function get_github_data() {
		$api_url	= sprintf( 'https://api.github.com/repos/%s/releases/latest', self::REPOSITORY );

		if ( false === ( $response = get_transient( self::UPDATE_ID ) ) ) {
			$request	= new Request( $api_url, [] );
			$request->send( $request::METHOD_GET );
			$response = $request->get_response_body( true );
			set_transient( self::UPDATE_ID, $response, 12 * HOUR_IN_SECONDS );
		}

		return $response;			
	}

	/**
	 * Get Plugin data
	 *
	 * @since 	1.0.0
	 * @version	1.0.0
	 *
	 * @return 	object $data the data
	 */
	public static function get_plugin_data() {
		include_once ABSPATH . '/wp-admin/includes/plugin.php';

		return get_plugin_data( WP_PLUGIN_DIR . '/' . GLIM_WOO_EXT_BASE );
	}
}
