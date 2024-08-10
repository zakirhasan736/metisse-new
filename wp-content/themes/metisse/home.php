<?php

/**
 * Template Name: Home
 * 
 */


get_header();
?>


<?php the_content(); ?>
<section class="product-feature-type-featured-product overflow-hidden pt-[76px] sm:pt-[60px] pb-[114px] lg:pb-[90px] md:pb-[80px] sm:pb-[60px]">
    <div class="custom-container">
        <div class="section-title-box mb-[44px] sm:mb-[35px]">
            <h2 class="section-title text-[16px] text-black text-center font-bold font-secondary tracking-[3.2px] uppercase">Featured Products</h2>
        </div>
        <div class="product-feature-type-new-arrivel-wrap">
            <div class="grid grid-cols-12 gap-[16px] sm:gap-[12px]">
                <?php
                // Query to fetch all products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1, // Display all products
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat', // Taxonomy name
                            'field' => 'slug', // Select taxonomy term by slug
                            'terms' => 'Featured Products', // Slug of the "featured" category
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
        </div>
    </div>
</section>

<section class="home-product-type-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="1119"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>

<section class="home-product-cta-block-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="1126"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>
<section class="home-product-features-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="1140"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>

<section class="home-metisse-community-section">
    <?php
    // Get the Elementor template shortcode 
    $elementor_template_shortcode = '[elementor-template id="1155"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>
<section class="product-feature-type-featured-product featured-watches-section overflow-hidden pt-[32px] pb-[70px]">
    <div class="custom-container-new">
        <div class="section-title-box mb-14 flex justify-between items-center gap-4 border-b border-[#DCDCDC]">
            <h2 class="section-title text-[14px] text-[#5A5A5A] text-center font-semibold pb-[9px] font-secondary leading-normal uppercase border-b-[3px] border-b-[#717171]">Featured Watches</h2>
            <a href="/shop/" class="secondary-btn-view-all-btn text-[12px] font-normal leading-normal mb-[9px] font-secondary text-[#131313] flex justify-center items-center px-8 h-12 py-2 rounded-[4px] border border-[rgb(19,19,19, .6)]">View all</a>
        </div>
        <div class="product-feature-type-new-arrivel-wrap relative">
            <div class="product-slider !mb-0">
                <?php
                // Query to fetch all products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1, // Display all products
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat', // Taxonomy name
                            'field' => 'slug', // Select taxonomy term by slug
                            'terms' => 'Featured Products', // Slug of the "featured" category
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
            <!-- Custom arrows for slider navigation -->
            <button class="slick-prev-arrow custom-arrow custom-prev absolute top-1/2 left-[-20px] transform -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full shadow-lg">
                <i class="fa fa-angle-left text-lg text-[#131313]"></i>
            </button>
            <button class="slick-next-arrow custom-arrow custom-next absolute top-1/2 right-[-20px] transform -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full shadow-lg">
                <i class="fa fa-angle-right text-lg text-[#131313]"></i>
            </button>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.product-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            arrows: true,
            prevArrow: $('.custom-prev'),
            nextArrow: $('.custom-next'),
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
        $('.product-slider').on('setPosition', function() {
            $(this).find('.product--card-item').css('margin-right', '24px');
            $(this).find('.product--card-item:last-child').css('margin-right', '0');
        });
    });
</script>


<section class="home-cta-banner-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="1047"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>

<section class="blogs-and-article-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="168"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>




<?php get_footer(); ?>