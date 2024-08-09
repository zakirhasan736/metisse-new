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
                        <div class="col-span-3 md:col-span-4 sm:col-span-full">
                            <div class="product-card-item border-2 border-[#0000001a] bg-white relative">
                                <div class="product-card-main-cont">
                                    <div class="product-img-box h-[270px] relative mb-[24px] md:mb-5 sm:mb-4">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'product-img mb-[24px] md:mb-5 sm:mb-4 w-full h-[270px] object-cover')); ?></a>

                                        <div class="product-card-checkout-btns text-center absolute left-0 w-full h-full flex flex-col items-center justify-center">
                                            <button class="add-to-cart-btn max-w-[208px] mx-auto flex items-center justify-center w-full whitespace-nowrap h-[45px] py-[14px] px-[20px] border-2 border-[#000000F2] capitalize text-black text-[14px] font-medium text-center mb-[5px] font-primary leading-[1.2] bg-white"> <?php woocommerce_template_loop_add_to_cart('Add To Cart', 'metisse'); ?></button>
                                            <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="buy-now-btn max-w-[208px] mx-auto flex items-center justify-center w-full whitespace-nowrap h-[45px] py-[14px] px-[20px] border-2 border-[#000000F2] capitalize text-white text-[14px] font-medium text-center font-primary leading-[1.2] bg-[#000000F2]"><?php echo esc_html__('Buy Now', 'metisse'); ?></a>
                                        </div>
                                    </div>
                                    <div class="product-card-cont px-[16.5px] pb-[22px]">
                                        <h3 class="product-title leading-none mb-[7px] text-[18px] text-center font-primary font-bold capitalize text-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p class="product-desc text-[16px] text-center font-primary font-normal leading-normal mb-[14px]"><?php echo wp_trim_words(get_the_excerpt(), 6); ?></p>
                                        <p class="product-price text-[18px] text-center font-primary font-bold capitalize text-black mb-[14px]"><?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?></p>
                                        <div class="product-verient-box">
                                            <p class="varient-title text-[10px] text-center text-black opacity-50 mb-[7px] font-secondary font-semibold tracking-[1.8px] uppercase leading-none">Colour Variants</p>
                                            <ul class="p-varient-lists flex items-center gap-[6px] justify-center">
                                                <li class="w-[18px] h-[18px] rounded-full bg-[#D9D9D9] border-2  border-[#000]"></li>
                                                <li class="w-[18px] h-[18px] rounded-full bg-[#FFE6E6] active:bg-[#D9D9D9] border-2 border-transparent active:border-[#000]"></li>
                                            </ul>
                                        </div>
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
<section class="product-feature-type-featured-product featured-watches-section overflow-hidden pt-[76px] sm:pt-[60px] pb-[114px] lg:pb-[90px] md:pb-[80px] sm:pb-[60px]">
    <div class="custom-container-new">
        <div class="section-title-box mb-14 flex justify-between items-center gap-4 pt-8 border-b border-[#DCDCDC]">
            <h2 class="section-title text-[14px] text-[#5A5A5A] text-center font-semibold pb-[9px] font-secondary leading-normal uppercase border-b-[3px] border-b-[#717171]">Featured Watches</h2>
            <a href="/shope/" class="secondary-btn-view-all-btn text-[12px] font-normal leading-normal mb-[9px] font-secondary text-[#131313] flex justify-center items-center px-8 h-12 py-2 rounded-[4px] border border-[rgb(19,19,19, .6)]">View all</a>
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
                        <div class="col-span-3 md:col-span-4 sm:col-span-full">
                            <div class="product-card-item relative">
                                <div class="product-card-main-cont">
                                    <div class="product-img-box h-[286px] w-[163px] relative">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'product-img mb-[24px] md:mb-5 sm:mb-4 w-full h-[270px] object-cover')); ?></a>
                                    </div>
                                    <div class="product-card-cont">
                                        <h3 class="product-title leading-none mb-[7px] text-[18px] text-center font-primary font-bold capitalize text-black"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p class="product-desc text-[16px] text-center font-primary font-normal leading-normal mb-[14px]"><?php echo wp_trim_words(get_the_excerpt(), 6); ?></p>
                                        <div class="product-verient-box">
                                            <p class="varient-title text-[10px] text-center text-black opacity-50 mb-[7px] font-secondary font-semibold tracking-[1.8px] uppercase leading-none">Colour Variants</p>
                                            <ul class="p-varient-lists flex items-center gap-[6px] justify-center">
                                                <li class="w-[18px] h-[18px] rounded-full bg-[#D9D9D9] border-2  border-[#000]"></li>
                                                <li class="w-[18px] h-[18px] rounded-full bg-[#FFE6E6] active:bg-[#D9D9D9] border-2 border-transparent active:border-[#000]"></li>
                                            </ul>
                                        </div>
                                        <div class="product-features-watches-btn-box text-center relative left-0 w-full h-full flex flex-col items-center justify-center">
                                            <p class="product-price text-[18px] text-center font-primary font-bold capitalize text-black mb-[14px]"><?php echo get_woocommerce_currency_symbol() . get_post_meta(get_the_ID(), '_price', true); ?></p>
                                            <button class="add-to-cart-btn max-w-[208px] mx-auto flex items-center justify-center w-full whitespace-nowrap h-[45px] py-[14px] px-[20px] border-2 border-[#000000F2] capitalize text-black text-[14px] font-medium text-center mb-[5px] font-primary leading-[1.2] bg-white"> <?php woocommerce_template_loop_add_to_cart('Shop now', 'metisse'); ?></button>
                                        </div>
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