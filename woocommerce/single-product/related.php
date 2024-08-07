<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="tp-related-product related products pt-[139px] lg:pt-[100px] md:pt-[80px] sm:pt-[70px]">

		<?php
		$heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'metisse'));

		?>
		<div class="custom-container-fluid">

			<?php
			if ($heading) :
			?>
				<div class="section-title-box mb-8 text-center">
					<h2 class="section-title text-[16px] text-black text-center font-bold font-secondary tracking-[3.2px] uppercase"><?php echo esc_html($heading); ?></h2>
				</div>
			<?php endif; ?>

			<?php

			$related_class = count($related_products) > 4 ? 'tp-woo-related-product-related-active tp-shop-item-primary' : 'row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 tp-shop-item-primary';

			?>
			<div class="<?php echo esc_attr($related_class); ?> related-product-section-wrap">
				<?php woocommerce_product_loop_start(); ?>
				<?php foreach ($related_products as $related_product) : ?>

					<?php
					$post_object = get_post($related_product->get_id());

					setup_postdata($GLOBALS['post'] = &$post_object);

					wc_get_template_part('content', 'product');
					?>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>
			</div>
		</div>

	</section>
<?php
endif;

wp_reset_postdata();
