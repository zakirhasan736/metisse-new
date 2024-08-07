<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<div class="user-actione-steps-wrapper pt-[43px] pb-[123px] md:pb-[80px] sm:pb-[60px]">
	<!-- user checkout staps -->
	<div class="user-action-step-header max-w-[706px] mx-auto flex items-center gap-[56px] justify-between relative z-[3] mb-[33px]">
		<div class="first-steps user-action-step-item px-[10px] flex items-center sm:flex-col sm:justify-center gap-[7px] bg-[#ffffff]">
			<span class="steps-status-indicator w-[44px] h-[44px] sm:w-[30px] sm:h-[30px] block rounded-full">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/steps-check.svg" alt="user checkout steps" class="w-full h-full">
			</span>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000] sm:hidden  font-bold font-primary capitalize">My Shopping Cart</div>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000]  font-bold hidden sm:block font-primary capitalize">Cart</div>
		</div>
		<div class="second-steps user-action-step-item px-[10px] sm:flex-col sm:justify-center flex items-center gap-[7px] bg-[#ffffff]">
			<span class="steps-status-indicator w-[44px] h-[44px] sm:w-[30px] sm:h-[30px] block rounded-full">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/steps-check.svg" alt="user checkout steps" class="w-full h-full">
			</span>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000] sm:hidden  font-bold font-primary capitalize">Checkout details</div>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000]  font-bold hidden sm:block font-primary capitalize">Checkout</div>
		</div>
		<div class="third-steps user-action-step-item px-[10px] sm:flex-col sm:justify-center flex items-center gap-[7px] bg-[#ffffff]">
			<span class="steps-status-indicator w-[44px] h-[44px] sm:w-[30px] sm:h-[30px] block rounded-full">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/remaining-steps-check.svg" alt="user checkout steps" class="w-full h-full">
			</span>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000] sm:hidden  font-bold font-primary capitalize">Order completed</div>
			<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000]  font-bold hidden sm:block font-primary capitalize">Completed</div>
		</div>
		<div class="divider-lin h-[1px] w-full bg-black absolute top-0 bottom-0 left-0 right-0 m-auto z-[-1]"></div>
	</div>
	<!-- user checkout steps status title -->
	<h1 class="user-steps-page-title text-center text-[34px] sm:text-[24px] md:text-[26px] font-normal font-primary capitalize text-[#000] mb-[41px]">
		Checkout Details</h1>

	<!-- checkout main area start here -->

	<?php
	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
		echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'metisse')));
		return;
	}

	?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout tp-woo-checkout-wrapper tp-woo-input-field" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

		<?php if ($checkout->get_checkout_fields()) : ?>

			<div class="row">
				<div class="col-lg-7">
					<?php do_action('woocommerce_checkout_before_customer_details'); ?>
				</div>
			</div>

			<div class="row" id="customer_details">
				<div class="col-lg-7">
					<div class="tp-woo-checkout-customer-details mb-30" id="customer_form_details">
						<?php do_action('woocommerce_checkout_billing'); ?>
						<?php do_action('woocommerce_checkout_shipping'); ?>
					</div>
				</div>

				<div class="col-lg-5">
					<div class="tp-woo-checkout-order-details white-bg cart-wrapper mb-30 sm:!mt-[35px]">
						<div class="order-review-wrapper">
							<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

							<h3 class="!text-[16px] md:!text-[16px] sm:!text-[16px] sm:tracking-[1.4px] font-primary font-normal tracking-[3.2px] !uppercase opacity-50 leading-[1.2] text-[#000]" id="order_review_heading"><?php esc_html_e('Your order', 'metisse'); ?></h3>

							<?php do_action('woocommerce_checkout_before_order_review'); ?>

							<?php do_action('woocommerce_before_checkout_form', $checkout); ?>

							<div id="order_review" class="woocommerce-checkout-review-order">
								<?php do_action('woocommerce_checkout_order_review'); ?>
							</div>

							<?php do_action('woocommerce_checkout_after_order_review'); ?>
						</div>
					</div>
				</div>
			</div>

			<?php do_action('woocommerce_checkout_after_customer_details'); ?>

		<?php endif; ?>

	</form>

	<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
	<!-- checkout main area end here -->

	<!-- steps user bottom area -->
	<div class="checkout-steps-bottom-area  mt-[34px]">

	</div>
</div>