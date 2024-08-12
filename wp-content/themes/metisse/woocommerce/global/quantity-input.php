<?php

/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.3.0
 */

defined('ABSPATH') || exit;

if ($max_value && $min_value === $max_value) {
?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr($input_id); ?>" class="qty" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($min_value); ?>" />
	</div>
<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'shofy'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity s', 'shofy');
?>
	<div class="tp-product-details-quantity">
		<div class="quantity tp-product-quantity !m-0">
			<?php do_action('woocommerce_before_quantity_input_field'); ?>
			<label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label>
			<span class="qty_button minus tp-cart-minus">
				<svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</span>
			<input
				type="text"
				class="!h-10 !text-center"
				id="<?php echo esc_attr($input_id); ?>"
				class="<?php echo esc_attr(join(' tp-cart-input ', (array) $classes)); ?>"
				step="<?php echo esc_attr($step); ?>"
				min="<?php echo esc_attr($min_value); ?>"
				max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>"
				name="<?php echo esc_attr($input_name); ?>"
				value="<?php echo esc_attr($input_value); ?>"
				title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'shofy'); ?>"
				size="4"
				placeholder="<?php echo esc_attr($placeholder); ?>"
				inputmode="<?php echo esc_attr($inputmode); ?>"
				autocomplete="<?php echo esc_attr(isset($autocomplete) ? $autocomplete : 'on'); ?>" />
			<?php do_action('woocommerce_after_quantity_input_field'); ?>
			<span class="qty_button plus tp-cart-plus">
				<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</span>

		</div>
	</div>
<?php
}
