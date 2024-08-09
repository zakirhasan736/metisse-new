<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

// all for vertical tab view
/* check if product has thumbnails */
$product_id = new WC_product($product);
$attachment_ids = $product_id->get_gallery_image_ids();

$gallery_margin_pos = !empty($attachment_ids) ? 'is-vertical-tab-pl' : '';


$enable_vertical_tab_from_meta_field = function_exists('tpmeta_field') ? tpmeta_field('metisse_product_single_layout') : NULL;
$enable_single_vertical_tab_from_customizer = get_theme_mod('shop_single_layout');


if ($enable_vertical_tab_from_meta_field === "vertical") {
	$_is_vertical_tab = 'is-vertical-thumb ';
} elseif (!empty($_GET['singleLayout'])) {
	$_is_vertical_tab = ($_GET['singleLayout'] === "vertical") ? ('is-vertical-thumb ') : '';
} elseif ($enable_single_vertical_tab_from_customizer === "vertical") {
	$_is_vertical_tab = 'is-vertical-thumb ';
} else {
	$_is_vertical_tab = '';
}

$product_single_layout_from_meta_field = function_exists('tpmeta_field') ? tpmeta_field('metisse_product_single_layout') : NULL;

$product_single_layout_from_from_customizer = get_theme_mod('shop_single_layout');

if ($product_single_layout_from_meta_field === "carousel") {
	$_is_carousel_view = 'container-shop';
	$_carousel_left_col = 'col-lg-8';
	$_carousel_right_col = 'col-lg-4';
} elseif (!empty($_GET['singleLayout'])) {
	$_is_carousel_view = ($_GET['singleLayout'] === "carousel") ? 'container-shop' : '';
	$_carousel_left_col = 'col-lg-8';
	$_carousel_right_col = 'col-lg-4';
} elseif ($product_single_layout_from_from_customizer === "carousel") {
	$_is_carousel_view = 'container-shop';
	$_carousel_left_col = 'col-lg-8';
	$_carousel_right_col = 'col-lg-4';
} else {
	$_is_carousel_view = '';
	$_carousel_left_col = 'col-lg-6';
	$_carousel_right_col = 'col-lg-6';
}

?>
<div class="custom-container <?php echo esc_attr($_is_carousel_view); ?>">
	<div class="row">
		<div class="col-xl-12">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class('tp-woo-single-body', $product); ?>>
		<div class="tp-product-details-top">
			<div class="row  pb-[98px] md:pb-[60px]">
				<div class="<?php echo esc_attr($_carousel_left_col); ?>">
					<div class="tp-product-details-thumb-wrapper tp-tab p-relative tp-woo-single-thumb <?php echo esc_attr($_is_vertical_tab); ?>">
						<?php
						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action('woocommerce_before_single_product_summary');
						?>
					</div>
				</div>

				<div class="<?php echo esc_attr($_carousel_right_col); ?>">
					<div class="tp-product-details-wrapper tp-woo-single-wrapper summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action('woocommerce_single_product_summary');
						?>
					</div>
				</div>
				<?php
				/**
				 * Insert the "Group Offer" section here
				 */
				?>

			</div>
			<?php
			// Retrieve additional product ID from custom meta field
			$additional_product_id = get_post_meta(get_the_ID(), 'additional_product_id', true);

			if (!empty($additional_product_id)) {
				// Calculate total price
				$current_product_price = $product->get_price(); // Assuming $product is the current product object
				$additional_product_price = get_post_meta($additional_product_id, '_price', true); // Assuming the additional product price is stored as post meta
				$total_price = $current_product_price + $additional_product_price;
			?>
				<section class="group-product-offer-box  pb-[76px] md:pb-[45px]">
					<div class="custom-container-fluid">
						<div class="section-title-box mb-[16px]">
							<h2 class="section-title text-[16px] text-black text-left font-bold font-secondary tracking-[3.2px] uppercase">You might like this</h2>
						</div>
						<div class="group-product-wrapper border grid grid-cols-12 sm:grid-cols-6 gap-3 border-[#CCCCCC] pt-[30px] px-[27px] pb-[26px] sm:px-[16px]">
							<!-- Current Product -->
							<div class="group-product-offer-price col-span-3 sm:col-span-6">
								<div class="product-card-item border-2 border-[#0000001a] bg-white relative">
									<div class="product-card-main-cont">
										<div class="product-img-box h-[247px] relative mb-[24px] md:mb-5 sm:mb-4">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="product-img mb-[24px] md:mb-5 sm:mb-4 w-full h-[247px] object-cover">
										</div>
										<div class="product-card-cont px-[16.5px] pb-[22px]">
											<h3 class="product-title leading-none mb-[7px] text-[18px] text-center font-primary font-bold capitalize text-black"><?php echo get_the_title(); ?></h3>
											<p class="product-desc text-[16px] text-center font-primary font-normal leading-normal mb-[14px]"><?php echo wp_trim_words(get_the_excerpt(), 6); ?></p>
											<p class="product-price text-[18px] text-center font-primary font-bold capitalize text-black mb-[14px]"><?php echo wc_price($current_product_price); ?></p>
											<div class="product-verient-box">
												<p class="varient-title text-[10px] text-center text-black opacity-50 mb-[7px] font-secondary font-semibold tracking-[1.8px] uppercase leading-none">Colour Variants</p>
												<!-- <ul class="p-varient-lists flex items-center gap-[6px] justify-center">
													<li class="w-[18px] h-[18px] rounded-full bg-[#D9D9D9] border-2  border-[#000]"></li>
													<li class="w-[18px] h-[18px] rounded-full bg-[#FFE6E6] active:bg-[#D9D9D9] border-2 border-transparent active:border-[#000]"></li>
												</ul> -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Divider -->
							<div class="group-product-offer-price col-span-1  sm:col-span-6 flex items-center justify-center">
								<span><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
										<g opacity="0.3">
											<rect x="7" width="3" height="17" fill="black" />
											<rect y="10" width="3" height="17" transform="rotate(-90 0 10)" fill="black" />
										</g>
									</svg></span>
							</div>
							<!-- Additional Product/Offer -->
							<div class="group-product-offer-price col-span-3  sm:col-span-6">
								<div class="product-card-item border-2 border-[#0000001a] bg-white relative">
									<div class="product-card-main-cont">
										<div class="product-img-box h-[247px] relative mb-[24px] md:mb-5 sm:mb-4">
											<!-- Display additional product image -->
											<?php
											$additional_product_image = get_the_post_thumbnail_url($additional_product_id, 'full');
											if ($additional_product_image) {
												echo '<img src="' . $additional_product_image . '" alt="Additional Product Image" class="product-img mb-[24px] md:mb-5 sm:mb-4 w-full h-[247px] object-cover">';
											}
											?>

										</div>
										<div class="product-card-cont px-[16.5px] pb-[22px]">
											<!-- Display additional product title -->
											<h3 class="product-title leading-none mb-[7px] text-[18px] text-center font-primary font-bold capitalize text-black"><?php echo get_the_title($additional_product_id); ?></h3>
											<!-- Display additional product description -->
											<p class="product-desc text-[16px] text-center font-primary font-normal leading-normal mb-[14px]"><?php echo get_the_excerpt($additional_product_id); ?></p>
											<!-- Display additional product price -->
											<p class="product-price text-[18px] text-center font-primary font-bold capitalize text-black mb-[14px]"><?php echo wc_price($additional_product_price); ?></p>
											<!-- You can add more information about the additional product here -->
											<!-- <div class="product-verient-box">
												<p class="varient-title text-[10px] text-center text-black opacity-50 mb-[7px] font-secondary font-semibold tracking-[1.8px] uppercase leading-none">Colour Variants</p>
												<ul class="p-varient-lists flex items-center gap-[6px] justify-center">
													<li class="w-[18px] h-[18px] rounded-full bg-[#D9D9D9] border-2  border-[#000]"></li>
													<li class="w-[18px] h-[18px] rounded-full bg-[#FFE6E6] active:bg-[#D9D9D9] border-2 border-transparent active:border-[#000]"></li>
												</ul>
											</div> -->
										</div>
									</div>
								</div>
							</div>

							<!-- Total Price and Action Buttons -->
							<div class="group-product-offer-price col-span-5  sm:col-span-6 flex items-center justify-center w-full">
								<div class="group-product-price-box-action-btn-box w-full">
									<!-- Display Total Price -->
									<div class="group-product-total-price w-full mb-[18px] py-[10px]">
										<span class="price-title text-left font-primary text-[#000] font-bold text-[14px]">Total Price:</span>
										<span class="price text-left font-primary text-[#000] font-bold text-[18px]"><?php echo wc_price($total_price); ?></span>
									</div>
									<!-- Shop now/Buy Now Buttons -->
									<div class="product-card-checkout-btns text-center relative top-0 left-0 w-full h-full flex flex-col items-center justify-center">
										<?php
										// Calculate total price
										$current_product_price = $product->get_price();
										$additional_product_price = get_post_meta($additional_product_id, '_price', true);
										$total_price = $current_product_price + $additional_product_price;

										// Output "Shop now" button with the total price
										echo '<button class="add-to-cart-btn max-w-[208px] mx-auto flex items-center justify-center w-full whitespace-nowrap h-[45px] py-[14px] px-[20px] border-2 border-[#000000F2] capitalize text-black text-[14px] font-medium text-center mb-[5px] font-primary leading-[1.2] bg-white" data-total-price="' . $total_price . '">' . esc_html__('Shop now', 'metisse') . '</button>';
										?>

										<a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="buy-now-btn max-w-[208px] mx-auto flex items-center justify-center w-full whitespace-nowrap h-[45px] py-[14px] px-[20px] border-2 border-[#000000F2] capitalize text-white text-[14px] font-medium text-center font-primary leading-[1.2] bg-[#000000F2]"><?php echo esc_html__('Buy Now', 'metisse'); ?></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section>
			<?php
			}
			?>
		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>

<script>
	jQuery(document).ready(function($) {
		$('.add-to-cart-btn').on('click', function(e) {
			e.preventDefault();

			// Get the total price from the data attribute
			var totalPrice = parseFloat($(this).data('total-price'));

			// Get the product ID of the current product
			var productId = <?php echo json_encode(get_the_ID()); ?>;

			// Get the product ID of the additional product
			var additionalProductId = <?php echo json_encode($additional_product_id); ?>;

			// AJAX request to add both products to the cart
			$.ajax({
				type: 'POST',
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				data: {
					action: 'add_products_to_cart',
					product_id: productId,
					additional_product_id: additionalProductId
				},
				success: function(response) {
					// Refresh the page or update cart totals dynamically
					alert('Products added to cart successfully!');
					window.location.reload(); // Refresh page
				},
				error: function(xhr, status, error) {
					console.error(error);
					alert('Failed to add products to cart.');
				}
			});
		});
	});
</script>