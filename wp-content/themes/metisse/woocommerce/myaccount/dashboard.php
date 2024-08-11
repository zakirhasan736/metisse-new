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

<div class="user-info-box flex gap-[28px] items-center">
	<span>
		<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
			<path d="M6.6665 35V33.3333C6.6665 27.8105 11.1437 23.3333 16.6665 23.3333H23.3332C28.856 23.3333 33.3332 27.8105 33.3332 33.3333V35" stroke="black" stroke-width="2" stroke-linecap="round" />
			<path d="M19.9997 18.3333C16.3178 18.3333 13.333 15.3486 13.333 11.6667C13.333 7.98477 16.3178 5 19.9997 5C23.6815 5 26.6663 7.98477 26.6663 11.6667C26.6663 15.3486 23.6815 18.3333 19.9997 18.3333Z" stroke="black" stroke-width="2" stroke-linecap="round" />
		</svg>
	</span>
	<div class="user-info-main">
		<div class="user-info">
			<p class="text-[28px] md:text-[24px] sm:text-[20px] font-semibold font-primary capitalize leading-none text-[#000]">
				<?php
				printf(
					/* translators: 1: user display name */
					esc_html__('Welcome back, %s', 'woocommerce'),
					'<strong>' . esc_html($current_user->display_name) . '</strong>'
				);
				?>
			</p>
			<p class="text-[16px] md:text-[14px] sm:text-[12px] font-medium font-primary leading-[25px] text-[#000]">
				<?php
				printf(
					/* translators: 1: user email */
					// esc_html__('Email: %s', 'woocommerce'),
					'<strong>' . esc_html($current_user->user_email) . '</strong>'
				);
				?>
			</p>
		</div>

	</div>

</div>

<p class="mt-[12px] text-[16px] sm:text-[12px] font-medium font-primary leading-[25px] text-[#000] my-account-info-details-wrap">
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
				echo '<p class="text-[16px] sm:text-[14px] font-bold font-primary leading-[25px] text-[#000] opacity-50 tracking-[3.2px] uppercase">' . __('Billing Address:', 'woocommerce') . '</p>';
				echo '<a class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#AA834C] !underline" href="' . esc_url(wc_get_account_endpoint_url('edit-address/billing')) . '">' . __('Edit', 'woocommerce') . '</a>';
				echo '</div>';
				echo '<p class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#000]">' . wp_kses_post($billing_address) . '</p>';
			} else {
				echo '<p class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#000]">' . __('Billing Address:', 'woocommerce') . '</p> ' . __('Not available', 'woocommerce');
			}
			?>
		</div>

		<div class="user-info-shipping-address mt-[25px]">
			<?php
			// Get the user's shipping address
			$shipping_address = WC()->customer->get_shipping_address();
			if (!empty($shipping_address)) {
				echo '<div class="address-title-box flex justify-between items-center max-w-[440px] w-full">';
				echo '<p class="text-[16px] sm:text-[14px] font-bold font-primary leading-[25px] text-[#000] opacity-50 tracking-[3.2px] uppercase">' . __('Shipping Address:', 'woocommerce') . '</p>';
				echo '<a class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#AA834C] !underline" href="' . esc_url(wc_get_account_endpoint_url('edit-address/shipping')) . '">' . __('Edit', 'woocommerce') . '</a>';
				echo '</div>';
				echo '<p class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#000]" >' . wp_kses_post($shipping_address) . '</p>';
			} else {
				echo '<p class="text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] !text-[#000]">' . __('Shipping Address:', 'woocommerce') . '</p> ' . __('Not available', 'woocommerce');
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
