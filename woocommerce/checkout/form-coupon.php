<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;


?>


<form class="checkout_coupon woocommerce-form-coupon tp-return-customer" method="post" style="display:none">
	<div class="tp-return-customer-input">
			<input type="text" name="coupon_code" class="input-text !border-2 !border-[#000]" placeholder="<?php esc_attr_e( 'Coupon', 'metisse' ); ?>" id="coupon_code" value="" />
		</div>
		<button type="submit" class="tp-return-customer-btn tp-checkout-btn hover:!bg-[#000] h-[45px] button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'metisse' ); ?>"><?php esc_html_e( 'Apply', 'metisse' ); ?></button>

	<div class="clear"></div>
</form>