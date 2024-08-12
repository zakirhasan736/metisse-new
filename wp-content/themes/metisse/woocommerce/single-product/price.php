<?php

/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>
<div class="tp-product-details-price-wrapper tp-woo-single-price d-flex align-items-center">
    <div class="!text-[24px] !md:text-[20px] !sm:text-[18px] !font-bold !font-secondary !text-[#131313] !leading-[1.2] tracking-[.24] <?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo wp_kses_post($product->get_price_html()); ?></div>
    <?php echo metisse_sale_percentage(); ?>
</div>