<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

do_action('woocommerce_before_main_content');

$shop_layout = get_theme_mod('shop_layout');
$product_col = !empty($_GET['pcol']) ? $_GET['pcol'] : wc_get_loop_prop('columns');
$product_sidebar = !empty($_GET['sidebar']) ? $_GET['sidebar'] : '';

// Define sidebar variables dynamically
$_sidebar = '';
$_sidebar_margin = '';

if ($product_sidebar === "right" || $shop_layout === "right_sidebar") {
	$_sidebar = 'col-xl-3 col-lg-4 order-last';
	$_sidebar_margin = 'ml-10 tp-woo-shop-sidebar-on-right';
	$shop_col = 'col-xl-9 col-lg-8 order-first';
} else {
	$_sidebar = "col-xl-3 col-lg-4";
	$_sidebar_margin = 'mr-10 tp-woo-shop-sidebar-on-left';
	$shop_col = 'col-xl-9 col-lg-8';
}

$shop_full_width = !empty($_GET['layout']) ? $_GET['layout'] : '';

if ($shop_full_width === "full" ||  $shop_layout === "full") {
	$container_class = 'container-fluid tp-shop-full-width-padding';
} else {
	$container_class = 'custom-container-fluids';
}

$sixteen_layout = !empty($_GET['layout']) ? $_GET['layout'] : '';

if ($sixteen_layout === "1600px" || $shop_layout === "1600px") {
	$sixteen_container = 'container-shop';
	$_sidebar = "col-xl-2 col-lg-3";
	$shop_col = 'col-xl-10 col-lg-9';
} else {
	$sixteen_container = '';
}

$list_layout = !empty($_GET['tab']) ? $_GET['tab'] : '';

if (!empty($_GET['tab']) && (($_GET['tab'] == 'grid') || ($_GET['tab'] == 'list'))) {
	$tab_active = '';
	$nav_active = '';
} else {
	$tab_active = 'show active';
	$nav_active = 'active';
}

$grid_active = ('grid' === $list_layout) ? 'show active' : '';
$list_active = ('list' === $list_layout) ? 'show active' : '';

$grid_nav_active = ('grid' === $list_layout) ? 'active' : '';
$list_nav_active = ('list' === $list_layout) ? 'active' : '';

// Get price filter data
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// Get category filter data
$category = isset($_GET['category']) ? $_GET['category'] : '';

?>
<div class="<?php echo esc_attr($container_class); ?> <?php echo esc_attr($sixteen_container); ?>">
	<div class="grid grid-cols-12">
		<div class="col-span-full">
			<div class="custom-container-fluid">
				<header class="woocommerce-products-header">
					<div class="woocpmmerce-product-header-top-content py-[50px] md:py-[30px] bg-[#0000000d]">
						<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
							<h1 class="woocommerce-products-header__title page-title text-center text-[34px] md:text-[26px] sm:text-[22px] text-black font-primary font-normal leading-none tp-woo-shop-page-title"><?php woocommerce_page_title(); ?></h1>
						<?php endif; ?>
					</div>
					<div class="custom-container">

						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action('woocommerce_archive_description');
						?>
					</div>
				</header>
			</div>
			<div class="custom-container">
				<?php
				if (woocommerce_product_loop()) {
				?>
					<div class="tp-shop-main shop__main">
						<div class="grid grid-cols-12 gap-[30px]">
							<div class="col-span-3 lg:col-span-4 md:col-span-full">
								<div class="tp-shop-sidebar  tp-woo-shop-sidebar md:grid md:grid-cols-12 md:gap-[30px]">
									<!-- Category Filter -->
									<div class="category-filter p-[20px] border border-[#ccc] mb-[15px] md:col-span-6 sm:col-span-full">
										<h2 class="text-[16px] pb-4 text-[#000] font-bold font-secondary tracking-[3.2px] leading-none opacity-50 uppercase">All Categories</h2>
										<ul>
											<li class="py-[10px] border-b border-b-[#ccc]">
												<a href="/shop/" class="grid grid-cols-12 gap-[5px]">
													<span class="col-span-8 text-[16px] sm:text-[14px] flex items-center gap-[3px] font-medium font-primary leading-[25px] text-[#121212]">All <span><svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
																<path d="M1 1L4.5 4.88889L1 8.77778" stroke="black" stroke-width="2" stroke-linecap="round" />
															</svg></span></span>
													<span class="col-span-4 text-right text-[14px] sm:text-[12px] opacity-50 font-medium font-primary leading-[25px] text-[#000000]"><?php echo esc_html(wp_count_posts('product')->publish); ?> <span>Products</span></span>
												</a>
											</li>
											<?php
											$categories = get_categories(array(
												'taxonomy' => 'product_cat',
												'orderby' => 'name',
												'order'   => 'ASC',
											));
											foreach ($categories as $cat) {
												$args = array(
													'post_type' => 'product',
													'posts_per_page' => -1,
													'tax_query' => array(
														array(
															'taxonomy' => 'product_cat',
															'field' => 'slug',
															'terms' => $cat->slug,
														),
													),
												);
												$products = new WP_Query($args);
											?>
												<li class="py-[7px]">
													<a href="/product-category/<?php echo esc_attr($cat->slug); ?>" class="grid grid-cols-12 gap-[5px]">
														<span class="col-span-8 text-[16px] sm:text-[14px] font-medium font-primary leading-[25px] text-[#333]"><?php echo esc_html($cat->name); ?></span>
														<span class="col-span-4 text-[14px] sm:text-[12px] font-medium font-primary leading-[25px] text-[#000] opacity-50"><?php echo esc_html($products->found_posts); ?> <span>Products</span></span>
													</a>
												</li>
											<?php } ?>
										</ul>
									</div>

									<?php
									// Initialize maximum price variable for all products
									$max_price_all = 0;

									// Query all products to find the maximum price among all products
									$args_all = array(
										'post_type'      => 'product',
										'posts_per_page' => -1,
									);

									$query_all = new WP_Query($args_all);

									// Loop through all products to find the maximum price
									if ($query_all->have_posts()) {
										while ($query_all->have_posts()) {
											$query_all->the_post();
											global $product;
											$product_price = $product->get_price();

											// Update maximum price among all products if the current product's price is higher
											if ($product_price > $max_price_all) {
												$max_price_all = $product_price;
											}
										}
										wp_reset_postdata();
									}

									// Set the maximum price for the "All" category
									$max_price = $max_price_all;
									?>

									<div class="price-range-filter p-[20px] border border-[#ccc] md:col-span-6 sm:col-span-full">
										<h2 class="text-[16px] mb-[15px] text-[#000] font-bold font-secondary tracking-[3.2px] leading-none opacity-50 uppercase">Price Range</h2>
										<form method="get">
											<input type="hidden" name="post_type" value="product">

											<div class="range-price-updates flex items-center gap-[7px] mb-[10px]">
												<div class="min-price-box">
													<label class="text-[12px] text-[#000]  !font-primary font-bold uppercase mb-[5px]" for="min_price">Min Price:</label>
													<input class="text-[12px] font-bold !font-primary text-[#000] !p-[10px] text-center !h-[35px]" type="text" name="min_price" id="min_price" value="0" readonly>
												</div>
												<div class="max-price-box">
													<label class="text-[12px] text-[#000]  !font-primary font-bold uppercase mb-[5px]" for="max_price">Max Price:</label>
													<input class="text-[12px] font-bold !font-primary text-[#000] !p-[10px] text-center !h-[35px]" type="text" name="max_price" id="max_price" value="<?php echo esc_attr($max_price); ?>" readonly>
												</div>
											</div>
											<input type="range" class="range-input mb-[10px]" min="0" max="<?php echo esc_attr($max_price); ?>" step="1" value="<?php echo esc_attr($max_price); ?>">
											<button class="filter-btn" type="submit">Filter</button>
										</form>
									</div>

									<script>
										window.addEventListener('DOMContentLoaded', function() {
											var rangeInput = document.querySelector('.range-input');
											var maxPriceInput = document.getElementById('max_price');

											rangeInput.addEventListener('input', function() {
												maxPriceInput.value = this.value;
											});

											maxPriceInput.addEventListener('input', function() {
												rangeInput.value = this.value;
											});
										});
									</script>


								</div>
							</div>
							<div class="col-span-9 lg:col-span-8 md:col-span-full">
								<div class="tp-shop-main-wrapper">
									<div class="tp-shop-top mb-[20px]">
										<div class="grid grid-cols-12 gap-[30px]">
											<div class="col-span-6 sm:col-span-full">
												<div class="tp-shop-top-left d-flex align-items-center sm:justify-between w-full flex-wrap">
													<div class="tp-shop-top-tab tp-tab">
														<ul class="nav nav-tabs" id="productTab" role="tablist">
															<li class="nav-item" role="presentation">
																<button class="nav-link !flex !items-center !justify-center !pt-[3px] <?php echo esc_attr($nav_active);
																																		echo esc_attr($grid_nav_active); ?>" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
																	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																	</svg>
																</button>
															</li>
															<li class="nav-item" role="presentation">
																<button class="nav-link !flex !items-center !justify-center !pt-[3px] <?php echo esc_attr($list_nav_active); ?>" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">
																	<svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M15 7.11108H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																	</svg>
																</button>
															</li>
														</ul>
													</div>

													<div class="tp-shop-top-right flex items-center md:!mt-0 justify-end">
														<div class="tp-shop-top-select text-center">
															<?php woocommerce_catalog_ordering(); ?>
														</div>
													</div>
												</div>
											</div>
											<div class="col-span-6 sm:col-span-full">
												<div class="tp-shop-top-result">
													<?php
													/**
													 * Hook: woocommerce_before_shop_loop.
													 *
													 * @hooked woocommerce_output_all_notices - 10
													 * @hooked woocommerce_result_count - 20
													 * @hooked woocommerce_catalog_ordering - 30
													 */
													do_action('woocommerce_before_shop_loop');
													?>
												</div>
											</div>
										</div>
									</div>

									<div class="tp-shop-items-wrapper tp-shop-item-primary">
										<div class="tab-content" id="productTabContent">
											<div class="tab-pane fade <?php echo esc_attr($tab_active);
																		echo esc_attr($grid_active); ?>" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
												<?php
												print '<div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1">';
												woocommerce_product_loop_start();
												if (wc_get_loop_prop('total')) {
													while (have_posts()) {
														the_post(); ?>

												<?php

														print '<div class="tp-product-grid-item-wrapper">';

														/**
														 * Hook: woocommerce_shop_loop.
														 */
														do_action('woocommerce_shop_loop');

														wc_get_template_part('content', 'product');
														print '</div>';
													}
												}
												woocommerce_product_loop_end();
												print '</div>';
												?>
											</div>
											<div class="tab-pane fade <?php echo esc_attr($list_active); ?>" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
												<div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
													<div class="row">
														<?php
														if (wc_get_loop_prop('total')) {
															while (have_posts()) {
																the_post(); ?>

														<?php

																print '<div class="col-lg-12">';

																/**
																 * Hook: woocommerce_shop_loop.
																 */
																do_action('woocommerce_shop_loop');

																wc_get_template_part('content', 'product-list');
																print '</div>';
															}
														}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> <!-- main close -->
								<?php
								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action('woocommerce_after_shop_loop');
								?>
							</div>
						</div>
					</div>
			</div>

		<?php
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
		?>
		</div>


		<?php
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');

		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
		?>

	</div>

</div>
</div>
<section class="blogs-and-article-section">
	<?php
	// Get the Elementor template shortcode
	$elementor_template_shortcode = '[elementor-template id="168"]';

	// Display the Elementor template using do_shortcode
	echo do_shortcode($elementor_template_shortcode);
	?>
</section>
<?php

get_footer('shop');
