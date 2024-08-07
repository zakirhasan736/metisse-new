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
	<?php wc_get_template_part('content', 'single-product'); ?>
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



<section class="product-category-section pb-[95px] lg:pb-[80px] sm:pb-[60px]">
	<div class="custom-container">
		<div class="section-title-box mb-8">
			<h2 class="section-title text-[16px] text-black text-center font-bold font-secondary tracking-[3.2px] uppercase">Categories</h2>
		</div>
		<div class="product-category-wrapper">
			<div class="grid grid-rows-2 grid-cols-12 gap-x-[33px] gap-y-[30px] md:gap-4">
				<?php
				// Get highlighted categories
				$highlighted_categories = get_field('highlighted_categories', 'option');

				// Loop through each highlighted category
				if ($highlighted_categories) :
					$displayed_categories_count = 0;
					foreach ($highlighted_categories as $category) :
						$displayed_categories_count++;
						if ($displayed_categories_count > 3) {
							break; // Exit the loop if three categories are displayed
						}
						// Determine row and column spans
						$row_span = ($displayed_categories_count === 1) ? 'row-span-2' : 'row-span-1';
						$col_span = 'col-span-6 sm:col-span-full';
				?>
						<div class="<?php echo $row_span; ?> <?php echo $col_span; ?> h-full">
							<div class="product-category-card-item relative h-full">
								<div class="category-img-box relative h-full">
									<?php
									// Get category thumbnail URL
									$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
									$image_src = wp_get_attachment_url($thumbnail_id);
									?>
									<img class="h-full w-full object-cover" src="<?php echo $image_src; ?>" alt="<?php echo $category->name; ?>">
									<div class="cat-image-overlyn absolute top-0 left-0 w-full h-full"></div>
								</div>
								<div class="category-content text-center absolute bottom-0 flex justify-end items-center flex-col p-10 md:p-[25px] left-0 right-0 mx-x-auto w-full h-full">
									<h3 class="cat-title <?php echo ($category->description) ? 'mb-[6px]' : 'mb-[14px]'; ?> leading-none text-[26px] md:text-[20px] sm:text-[18px] text-white opacity-80 font-accend font-bold capitalize text-center "><?php echo $category->name; ?></h3>
									<?php if ($category->description) : ?>
										<p class="cat-desc opacity-50 text-[12px] text-center font-primary font-medium text-white mb-[15px] block"><?php echo $category->description; ?></p>
									<?php endif; ?>

									<a href="<?php echo get_term_link($category); ?>" class="product-category-item py-[14px] px-[31px] bg-[#FFFFFFF2] text-[14px] text-center font-primary font-medium text-[#000] h-[45px] flex items-center justify-center">Shop Now</a>
								</div>
							</div>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

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

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
