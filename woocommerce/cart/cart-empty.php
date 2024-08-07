<?php

/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;
?>
<div class="empty-cart-area-box pt-[43px] pb-[123px] md:pb-[80px] sm:pb-[60px]">
	<div class="mettise-empty-cart-page-area">
		<?php
		/*
 * @hooked wc_empty_cart_message - 10
 */
		do_action('woocommerce_cart_is_empty');
		?>
	</div>
	<?php
	if (wc_get_page_id('shop') > 0) : ?>
		<div class="tp-woo-empty-cart max-w-[550px] mx-auto">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/empty-cart.svg' ?>" alt="<?php echo esc_attr__('empty-cart', 'metisse'); ?>">
		</div>
		<p class="return-to-shop text-center mt-[34px]">
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
	<?php endif; ?>
</div>