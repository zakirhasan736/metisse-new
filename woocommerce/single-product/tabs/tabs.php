  <?php

/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */


// Check if there are product tabs
$product_tabs = apply_filters('woocommerce_product_tabs', array());
if (!empty($product_tabs)) :
?>
<div class="tp-product-details-bottom">
    <div class="custom-container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-product-details-tab-nav tp-tab">
                    <nav>
                        <div class="accordion" id="accordionPresentationTab">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-description">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-description" aria-expanded="false" aria-controls="collapse-description">
                                       product description
                                       <span class="plus-icons">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13.7775 8H7.95697V14H6.0168V8H0.196289V6H6.0168V0H7.95697V6H13.7775V8Z" fill="#303030"/>
</svg>
</span>
<span class="minus-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="5" viewBox="0 0 14 5" fill="none">
  <path d="M13.7775 4.10937H0.196289V0.224976H13.7775V4.10937Z" fill="black"/>
</svg>
</span>
                                    </button>
                                </h2>
                                <div id="collapse-description" class="accordion-collapse collapse" aria-labelledby="heading-description" data-bs-parent="#accordionPresentationTab">
                                    <div class="accordion-body">
                                        <div class="tp-product-details-desc-wrapper">
                                            <?php
// Get the ACF WYSIWYG editor field value
$acf_wysiwyg_field = get_field('product_details_description'); 

// Convert newlines to HTML line breaks
$plain_text_content_with_br = nl2br($acf_wysiwyg_field);

// Output the content with preserved line breaks
echo $plain_text_content_with_br;
?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-details">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-details" aria-expanded="false" aria-controls="collapse-details">
                                        DETAILS
                                        <span class="plus-icons">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13.7775 8H7.95697V14H6.0168V8H0.196289V6H6.0168V0H7.95697V6H13.7775V8Z" fill="#303030"/>
</svg>
</span>
<span class="minus-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="5" viewBox="0 0 14 5" fill="none">
  <path d="M13.7775 4.10937H0.196289V0.224976H13.7775V4.10937Z" fill="black"/>
</svg>
</span>
                                    </button>
                                </h2>
                                <div id="collapse-details" class="accordion-collapse collapse" aria-labelledby="heading-details" data-bs-parent="#accordionPresentationTab">
                                    <div class="accordion-body">
                                      <div class="product-details-box-wrap">
    <h6 class="product-details-title">Watch Design</h6>
    <ul class="product-details-info-table">
        <?php if (have_rows('peoduct_details_info')) : ?>
            <?php while (have_rows('peoduct_details_info')) : the_row(); ?>
                <li class="product-details-inf-list">
                    <p class="product-details-info-list-title"><?php the_sub_field('details_info_title'); ?></p>
                    <p class="product-details-info-list-desc"><?php the_sub_field('details_info_description'); ?></p>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-shipping">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-shipping" aria-expanded="false" aria-controls="collapse-shipping">
                                       SHIPPING, RETURNS, AND WARRANTY
                                       <span class="plus-icons">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13.7775 8H7.95697V14H6.0168V8H0.196289V6H6.0168V0H7.95697V6H13.7775V8Z" fill="#303030"/>
</svg>
</span>
<span class="minus-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="5" viewBox="0 0 14 5" fill="none">
  <path d="M13.7775 4.10937H0.196289V0.224976H13.7775V4.10937Z" fill="black"/>
</svg>
</span>
                                    </button>
                                </h2>
                                <div id="collapse-shipping" class="accordion-collapse collapse" aria-labelledby="heading-shipping" data-bs-parent="#accordionPresentationTab">
                                    <div class="accordion-body">
                                        
                                                                                    <?php
// Get the ACF WYSIWYG editor field value
$acf_wysiwyg_field_shiping = get_field('shiping_returns_info'); 

// Convert newlines to HTML line breaks
$plain_text_content_with_br_shiping = nl2br($acf_wysiwyg_field_shiping);

// Output the content with preserved line breaks
echo $plain_text_content_with_br_shiping;
?>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-review">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-review" aria-expanded="false" aria-controls="collapse-review">
                                       reviews and ratings
                                       <span class="plus-icons">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
  <path d="M13.7775 8H7.95697V14H6.0168V8H0.196289V6H6.0168V0H7.95697V6H13.7775V8Z" fill="#303030"/>
</svg>
</span>
<span class="minus-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="5" viewBox="0 0 14 5" fill="none">
  <path d="M13.7775 4.10937H0.196289V0.224976H13.7775V4.10937Z" fill="black"/>
</svg>
</span>
                                    </button>
                                </h2>
                                <div id="collapse-review" class="accordion-collapse collapse" aria-labelledby="heading-review" data-bs-parent="#accordionPresentationTab">
                                    <div class="accordion-body">
                                        <style>
                                              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                                        </style>
                                      	<div class="review-retings-section">

<div class="swiper mySwiper review-rating-slider-box">
    <div class="swiper-wrapper">
        <?php if (have_rows('reviews_and_ratings_cards')) : ?>
            <?php while (have_rows('reviews_and_ratings_cards')) : the_row(); ?>
                <div class="swiper-slide">
                    <div class="review-retings-card-item">
<ul class="retings-items">
    <?php
    // Output review ratings
    if (have_rows('review_ratings')) :
        while (have_rows('review_ratings')) : the_row();
            // Get the rating value
            $rating_value = get_sub_field('rating');

            // Calculate the number of filled stars
            $filled_stars = floor($rating_value);

            // Check if there's a half star
            $has_half_star = ($rating_value - $filled_stars) >= 0.5;

            // Output the review ratings
            // Output filled stars
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $filled_stars) {
                    echo '<li class="retings"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="#FDA429"><path d="M3.825 19L5.45 11.975L0 7.25L7.2 6.625L10 0L12.8 6.625L20 7.25L14.55 11.975L16.175 19L10 15.275L3.825 19Z"/></svg></li>';
                } elseif ($i == ($filled_stars + 1) && $has_half_star) {
                    echo '<li class="retings"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="#FDA429"><path d="M14.1687 16.2583L13.0771 11.4971L16.7489 8.32292L11.9193 7.89308L10.0007 3.39635V13.7124L14.1687 16.2583ZM3.81475 19L5.45551 11.9732L0 7.25031L7.18624 6.62606L10.0007 0L12.8151 6.62606L20 7.25031L14.5445 11.9719L16.1866 19L10.0007 15.269L3.81475 19Z"/></svg></li>';
                } elseif ($i > $rating_value) {
                    echo '<li class="retings">
                   <svg xmlns="http://www.w3.org/2000/svg" class="outline-stars" width="28" height="28" viewBox="0 0 28 28" fill="none">
  <path d="M16.708 10.0792C16.8535 10.3741 17.1347 10.5785 17.46 10.6261L23.5179 11.5115L19.1353 15.7802C18.8994 16.01 18.7917 16.3411 18.8474 16.6656L19.8815 22.6949L14.4651 19.8465C14.1737 19.6933 13.8256 19.6933 13.5342 19.8465L8.11786 22.6949L9.15195 16.6656C9.20761 16.3411 9.09995 16.01 8.86407 15.7802L4.48142 11.5115L10.5393 10.6261C10.8647 10.5785 11.1458 10.3741 11.2914 10.0792L13.9997 4.59251L16.708 10.0792Z" fill="white" stroke="#FFBD3E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    </li>';
                } else {
                    echo '<li class="retings"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="#FDA429"><path d="M3.825 19L5.45 11.975L0 7.25L7.2 6.625L10 0L12.8 6.625L20 7.25L14.55 11.975L16.175 19L10 15.275L3.825 19Z"/></svg></li>';
                }
            }
        endwhile;
    endif;
    ?>
</ul>


                        <h4 class="review-title"><?php the_sub_field('review_title'); ?></h4>
                        <p class="review-qute-text"><?php the_sub_field('review_quote_text'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>

			<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script>
    var swiper = new Swiper(".mySwiper", {
        // slidesPerView: 3,
        // spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000, // Auto play delay in milliseconds (3 seconds)
            disableOnInteraction: false, // Allow manual navigation while autoplay
        },
        breakpoints: {
         640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                  },
                  768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                  },
                  992: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                  },
                  1199: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                  },
        },
    });
</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
