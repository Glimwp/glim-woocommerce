<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

glimfse( 'styles' )->Utilities->load( [
	'text-uppercase',
	'fw-700',
	'm-0'
] );

?>
<div class="span-4 span-md-1">
	<?php do_action( 'woocommerce_before_account_navigation' ); ?>
	<nav class="woocommerce-MyAccount-navigation">
		<ul class="list-unstyled m-0">
			<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a class="fw-700 text-uppercase" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<?php do_action( 'woocommerce_after_account_navigation' ); ?>
</div>
