<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop');

// Remove related products for this template
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');

$post_meta = get_post_meta(get_the_ID(), 'view_count', true);
$count = 1;
if (!empty($post_meta)) {
	$count += intval($post_meta);
}
update_post_meta(get_the_ID(), 'view_count', $count);
?>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>
	<?php _part('content', 'single-product'); ?>
<?php endwhile; // end of the loop. 
?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');
?>

<section class="product-feature-type-featured-product overflow-hidden pt-[76px] sm:pt-[60px] pb-[90px] lg:pb-[90px] md:pb-[80px] sm:pb-[60px]">
	<div class="custom-container-site-width">
		<div class="product-new-arrival-left-cont flex items-center pt-[114px] pb-[112px] justify-end pr-[115px] w-full max-w-full min-w-[442px]">
			<img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/company-brand-logo-black.svg" alt="product modal brand logo image">
		</div>
		<div class="new-arrival-product-feature-watches">
			<div class="product-feature-watches-type-new-arrivel-wrap relative w-full">
				<div class="product-new-arrival-slider w-full !mb-0">
					<?php
					// Query to fetch all products
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1, // Display all products
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat', // Taxonomy name
								'field' => 'slug', // Select taxonomy term by slug
								'terms' => 'New Arrival', // Slug of the "featured" category
							),
						),
					);
					$products_query = new WP_Query($args);

					if ($products_query->have_posts()) :
						while ($products_query->have_posts()) : $products_query->the_post();
					?>
							<div class="product--card-item relative" style="margin-right: 24px;">
								<div class="product--card-main-cont flex items-start gap-[20px]">
									<div class="product--img-box h-[286px] w-[163px] relative">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'product-img mb-[24px] md:mb-5 sm:mb-4 w-full h-[270px] object-cover')); ?></a>
									</div>
									<div class="product--card-cont pt-5 pb-[22px]">
										<h3 class="product-title leading-none mb-[7px] text-[14px] text-left font-primary font-normal tracking-[1.4px] uppercase text-[#131313]"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p class="product-desc text-[12px] text-left font-secondary font-normal leading-normal mb-[29px]"><?php echo wp_trim_words(get_the_excerpt(), 6); ?></p>
										<div class="product-verient-box mb-[42px]">
											<ul class="p-varient-lists flex items-center gap-[6px] justify-start">
												<li class="w-[16px] h-[16px] rounded-full bg-[#D9D9D9] border-2 border-[#000]"></li>
												<li class="w-[16px] h-[16px] rounded-full bg-[#FFE6E6] active:bg-[#D9D9D9] border-2 border-transparent active:border-[#000]"></li>
											</ul>
										</div>
										<div class="product--features-watches-btn-box text-left relative left-0 w-full h-full flex flex-col items-start justify-start">
											<p class="product-price text-[29px] text-left font-secondary font-normal capitalize text-black mb-[14px]"><?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?></p>
											<button class="add-to-cart-btn mx-auto flex items-center justify-center w-full whitespace-nowrap h-[40px] py-2 px-[0px] border-0 capitalize text-[#BD7048] text-[12px] font-semibold text-center font-secondary leading-[1.2]"> <?php woocommerce_template_loop_add_to_cart('Shop now', 'metisse'); ?></button>
										</div>
									</div>
								</div>
							</div>
					<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
				<div class="product-slider-arrow-box relative mt-10">
					<button class="slick-prev-arrow custom-arrow custom-prev-new-arrv custom-prev absolute bottom-0 right-[54px] transform z-10 w-10 h-10 flex items-center justify-center">
						<i class="fa fa-angle-left text-lg text-[#131313]"></i>
					</button>
					<button class="slick-next-arrow custom-arrow custom-next-new-arrv custom-next absolute bottom-0 right-[0px] transform z-10 w-10 h-10 flex items-center justify-center">
						<i class="fa fa-angle-right text-lg text-[#131313]"></i>
					</button>
				</div>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Ensure the slider is initialized after the DOM is fully loaded and arrows are properly placed
		setTimeout(function() {
			$('.product-new-arrival-slider').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false,
				arrows: true,
				prevArrow: $('.custom-prev-new-arrv'),
				nextArrow: $('.custom-next-new-arrv'),
				responsive: [{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							infinite: true,
							dots: true
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			});

			// Remove the right margin on the last item to prevent overflow
			$('.product-new-arrival-slider').on('setPosition', function() {
				$(this).find('.product--card-item').css('margin-right', '24px');
				$(this).find('.product--card-item:last-child').css('margin-right', '0');
			});
		}, 300); // Adding delay to ensure everything is rendered properly
	});
</script>>


<?php
get_footer('shop');
