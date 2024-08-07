<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

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
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/remaining-steps-check.svg" alt="user checkout steps" class="w-full h-full">
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
	<h1 class="user-steps-page-title text-center text-[34px] sm:text-[24px] md:text-[26px] font-normal font-primary capitalize text-[#000] mb-[41px]">My Shopping Cart</h1>

	<!-- checkoput cart area main start here -->
	<div class="row shoppong-car-wrap">
		<div class="col-xl-9 col-lg-8">
			<form class="tp-woo-cart-table woocommerce-cart-form mb-25 mr-30" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
				<?php do_action('woocommerce_before_cart_table'); ?>

				<div class="tp-woo-cart-table-list">
					<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
						<thead>
							<tr>

								<th class="product-name  !pl-0 !text-[16px] !font-bold font-secondary leading-[1.2] !tracking-[3.2px] text-[#000000] opacity-50 uppercase" colspan="2"><?php esc_html_e('Product', 'metisse'); ?></th>
								<th class="product-price !text-[16px] !font-bold font-secondary leading-[1.2] !tracking-[3.2px] text-[#000000] opacity-50 uppercase"><?php esc_html_e('Price', 'metisse'); ?></th>
								<th class="product-quantity !text-[16px] !font-bold font-secondary leading-[1.2] !tracking-[3.2px] text-[#000000] opacity-50 uppercase"><?php esc_html_e('Qty', 'metisse'); ?></th>
								<th class="product-subtotal !text-[16px] !font-bold font-secondary leading-[1.2] !tracking-[3.2px] text-[#000000] opacity-50 uppercase"><?php esc_html_e('Subtotal', 'metisse'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php do_action('woocommerce_before_cart_contents'); ?>

							<?php
							foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
								$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
								$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

								if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
									$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
							?>
									<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">


										<td class="product-thumbnail">
											<?php
											$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

											if (!$product_permalink) {
												echo esc_html($thumbnail); // PHPCS: XSS ok.
											} else {
												printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
											}
											?>
											<?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove text-[18px] sm:text-[16px] font-semibold font-primary block !mt-[13px] !text-[#FF0000] !underline" aria-label="%s" data-product_id="%s" data-product_sku="%s"></i> ' . esc_html__('Remove', 'metisse') . ' </a>',
													esc_url(wc_get_cart_remove_url($cart_item_key)),
													esc_html__('Remove this item', 'metisse'),
													esc_attr($product_id),
													esc_attr($_product->get_sku())
												),
												$cart_item_key
											);
											?>
										</td>

										<td class="product-name" data-title="<?php esc_attr_e('Product', 'metisse'); ?>">
											<?php
											if (!$product_permalink) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
											} else {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
											}

											do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

											// Meta data.
											echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

											// Backorder notification.
											if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'metisse') . '</p>', $product_id));
											}
											?>
										</td>

										<td class="product-price" data-title="<?php esc_attr_e('Price', 'metisse'); ?>">
											<?php
											echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
											?>
										</td>

										<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'metisse'); ?>">
											<?php
											if ($_product->is_sold_individually()) {
												$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
											} else {
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
											}

											echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
											?>
										</td>

										<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'metisse'); ?>">
											<?php
											echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
											?>
										</td>

									</tr>
							<?php
								}
							}
							?>

							<?php do_action('woocommerce_cart_contents'); ?>

							<?php do_action('woocommerce_after_cart_contents'); ?>
						</tbody>
					</table>
				</div>

				<div class="tp-woo-cart-coupon mt-[20px]">
					<?php if (wc_coupons_enabled()) : ?>
						<div class="tp-cart-coupon">
							<div class="tp-cart-coupon-input-box coupon">
								<div class="tp-cart-coupon-input d-flex align-items-center">
									<input type="text" name="coupon_code" class="input-text !h-[46px] !border-2 !border-[#000]" id="coupon_code" value="" placeholder="<?php esc_attr_e('Enter Coupon Code', 'metisse'); ?>" />
									<button type="submit" class="button !h-[46px] text-[16px] text-[#fff] font-medium font-primary hover:!bg-[#000] !bg-[#000] !py-[14px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : 'tp-btn'); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'metisse'); ?>"><?php esc_attr_e('Apply', 'metisse'); ?></button>
									<?php do_action('woocommerce_cart_coupon'); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="tp-cart-update text-md-end">
						<button type="submit" class="tp-cart-update-btn button text-[18px] sm:text-[16px] h-[45px] !cursor-pointer font-medium font-primary leading-[1.2] !bg-[#000] !text-[#fff] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'metisse'); ?>"><?php esc_html_e('Update cart', 'metisse'); ?></button>
					</div>

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

				</div>

				<?php do_action('woocommerce_after_cart_table'); ?>
			</form>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6">
			<?php do_action('woocommerce_before_cart_collaterals'); ?>

			<div class="tp-woo-cart-checkout tp-cart-checkout-wrapper">
				<div class="cart-collaterals">
					<?php
					/**
					 * Cart collaterals hook.
					 *
					 * @hooked woocommerce_cross_sell_display
					 * @hooked woocommerce_cart_totals - 10
					 */
					do_action('woocommerce_cart_collaterals');
					?>
				</div>
			</div>
		</div>
	</div>
	<?php do_action('woocommerce_after_cart'); ?>

	<!-- checkout cart  area end -->

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