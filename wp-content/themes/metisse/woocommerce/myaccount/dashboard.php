<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>


<p class="mt-[12px] text-[14px] font-normal font-secondary leading-[25px] text-[#000] my-account-info-details-wrap">
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	if (wc_shipping_enabled()) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	}
	printf(
		wp_kses($dashboard_desc, $allowed_html),
		esc_url(wc_get_endpoint_url('orders')),
		esc_url(wc_get_endpoint_url('edit-address')),
		esc_url(wc_get_endpoint_url('edit-account'))
	);
	?>
</p>
<div class="user-info-main mt-[80px] lg:mt-[60px] md:mt-[45px] sm:mt-[35px]">
	<div class="user-info-step-two">
		<div class="user-info-billing-address">
			<?php
			$billing_address = WC()->customer->get_billing_address();
			if (!empty($billing_address)) {
				echo '<div class="address-title-box flex justify-between items-center max-w-[440px] w-full">';
				echo '<p class="text-[14px] font-medium font-secondary leading-[1.5] text-[#717171] tracking-[1.4px] uppercase">' . __('Billing Address:', 'woocommerce') . '</p>';
				echo '<a class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313] !underline" href="' . esc_url(wc_get_account_endpoint_url('edit-address/billing')) . '">' . __('Edit', 'woocommerce') . '</a>';
				echo '</div>';
				echo '<p class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313]">' . wp_kses_post($billing_address) . '</p>';
			} else {
				echo '<p class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313]">' . __('Billing Address:', 'woocommerce') . '</p> ' . __('Not available', 'woocommerce');
			}
			?>
		</div>

		<div class="user-info-shipping-address mt-[25px]">
			<?php
			// Get the user's shipping address
			$shipping_address = WC()->customer->get_shipping_address();
			if (!empty($shipping_address)) {
				echo '<div class="address-title-box flex justify-between items-center max-w-[440px] w-full">';
				echo '<p class="text-[14px] font-medium font-secondary leading-[1.5] text-[#717171] tracking-[1.4px] uppercase">' . __('Shipping Address:', 'woocommerce') . '</p>';
				echo '<a class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313] !underline" href="' . esc_url(wc_get_account_endpoint_url('edit-address/shipping')) . '">' . __('Edit', 'woocommerce') . '</a>';
				echo '</div>';
				echo '<p class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313]" >' . wp_kses_post($shipping_address) . '</p>';
			} else {
				echo '<p class="text-[12px] font-normal font-secondary leading-[1.5] !text-[#131313]">' . __('Shipping Address:', 'woocommerce') . '</p> ' . __('Not available', 'woocommerce');
			}
			?>
		</div>
	</div>
</div>


<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
