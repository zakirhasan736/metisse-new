<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined('ABSPATH') || exit;

$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>

<div class="tp-order-area woocommerce-order">
	<?php
	if ($order) :
		do_action('woocommerce_before_thankyou', $order->get_id());
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
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/steps-check.svg" alt="user checkout steps" class="w-full h-full">
					</span>
					<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000] sm:hidden  font-bold font-primary capitalize">Order completed</div>
					<div class="user-steps-item text-[16px] sm:text-[14px] text-[#000]  font-bold hidden sm:block font-primary capitalize">Completed</div>
				</div>
				<div class="divider-lin h-[1px] w-full bg-black absolute top-0 bottom-0 left-0 right-0 m-auto z-[-1]"></div>
			</div>
			<!-- user checkout steps status title -->
			<h1 class="user-steps-page-title text-center text-[34px] sm:text-[24px] md:text-[26px] font-normal font-primary capitalize text-[#000] mb-[41px]">Order Completed</h1>
			<!-- start here -->
			<div class="tp-order-inner">
				<div class="tp-order-bg"></div>
				<div class="row gx-0 align-items-center">
					<?php if ($order->has_status('failed')) : ?>

						<div class="col-xl-12">
							<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'metisse'); ?></p>

							<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
								<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'metisse'); ?></a>
								<?php if (is_user_logged_in()) : ?>
									<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'metisse'); ?></a>
								<?php endif; ?>
							</p>
						</div>

					<?php else : ?>
						<div class="col-lg-6">
							<div class="tp-order-details">
								<div class="tp-order-details-top text-center mb-70">
									<div class="tp-order-details-icon">
										<span>
											<svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M46 26V51H6V26" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M51 13.5H1V26H51V13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M26 51V13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M26 13.5H14.75C13.0924 13.5 11.5027 12.8415 10.3306 11.6694C9.15848 10.4973 8.5 8.9076 8.5 7.25C8.5 5.5924 9.15848 4.00269 10.3306 2.83058C11.5027 1.65848 13.0924 1 14.75 1C23.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M26 13.5H37.25C38.9076 13.5 40.4973 12.8415 41.6694 11.6694C42.8415 10.4973 43.5 8.9076 43.5 7.25C43.5 5.5924 42.8415 4.00269 41.6694 2.83058C40.4973 1.65848 38.9076 1 37.25 1C28.5 1 26 13.5 26 13.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</span>
									</div>
									<div class="tp-order-details-content">
										<h3 class="tp-order-details-title"><?php echo esc_html__('Your Order Confirmed', 'metisse'); ?></h3>
										<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', wp_kses_post('We will send you a shipping confirmation email as soon <br> as your order ships ', 'metisse'), $order); ?></p>
									</div>
								</div>

								<div class="woocommerce-order-overview woocommerce-thankyou-order-details order_details tp-order-details-item-wrapper">
									<div class="row">
										<div class="col-sm-6">
											<div class=" tp-order-details-item">
												<h4><?php echo esc_html__('Order Date:', 'metisse'); ?></h4>
												<p><?php echo wc_format_datetime($order->get_date_created()); ?></p>
											</div>
										</div>

										<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
											<div class="col-sm-6">
												<div class="woocommerce-order-overview__date date tp-order-details-item">
													<h4><?php echo esc_html__('Email:', 'metisse'); ?></h4>
													<p><?php echo esc_html($order->get_billing_email()); ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty($order->get_order_number())) : ?>
											<div class="col-sm-6">
												<div class="woocommerce-order-overview__order order tp-order-details-item">
													<h4><?php echo esc_html__('Order Number:', 'metisse'); ?></h4>
													<p><?php echo esc_html__('#', 'metisse');
														echo esc_html($order->get_order_number()); ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty($order->get_payment_method_title())) : ?>
											<div class="col-sm-6">
												<div class="woocommerce-order-overview__payment-method method tp-order-details-item">
													<h4><?php echo esc_html__('Payment Method:', 'metisse'); ?></h4>
													<p><?php echo wp_kses_post($order->get_payment_method_title()); ?></p>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="tp-order-info-wrapper">
								<?php do_action('woocommerce_thankyou', $order->get_id()); ?>
							</div>
						</div>
					<?php endif; ?>


				</div>
			</div>
			<!-- end here -->

			<!-- steps user bottom area -->
			<div class="checkout-steps-bottom-area  mt-[34px]">
				<p class="return-to-shop text-center">
					<a class="text-[18px] sm:text-[14px] capitalize font-bold !border-[3px] max-w-[240px]  !border-[#000] h-[55px] px-[23px] py-[14px] bg-white font-primary text-black bg-center wc-backward flex items-center gap-[3px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M9 14L4 9L9 4" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M20 20V13C20 11.9391 19.5786 10.9217 18.8284 10.1716C18.0783 9.42143 17.0609 9 16 9H4" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<?php
						/**
						 * Filter "Return To Shop" text.
						 *
						 * @since 4.6.0
						 * @param string $default_text Default text.
						 */
						echo esc_html(apply_filters('woocommerce_return_to_shop_text', __('Return to shopping', 'metisse')));
						?>
					</a>
				</p>
			</div>
		</div>


		<div class="tp-woo-order-payment-msg mt-40 mb-40">
			<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
		</div>


	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'metisse'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
?></p>

	<?php endif; ?>
</div>

<?php
if ($show_customer_details) {
	wc_get_template('order/order-details-customer.php', array('order' => $order));
}
?>