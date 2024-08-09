<?php

/**
 * Template Name: Home
 * 
 */


get_header();
?>


<?php the_content(); ?>

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
<section class="home-product-cta-block-section">
    <?php
    // Get the Elementor template shortcode
    $elementor_template_shortcode = '[elementor-template id="1140"]';

    // Display the Elementor template using do_shortcode
    echo do_shortcode($elementor_template_shortcode);
    ?>
</section>[elementor-template id="1140"]
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
<style>
    .services-section {
        background: rgba(0, 0, 0, 0.05);
        padding-top: 46px;
        padding-bottom: 56px;
        padding-left: 35px;
        padding-right: 35px;
    }

    .services-cards-box {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 54px;
        width: 100%;
        max-width: 920px;
        justify-content: center;
        margin: 0 auto;
    }

    .services-card-item {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .services-card-item img {
        margin-left: auto;
        margin-right: auto;
    }

    .services-card-item:first-child img {
        margin-bottom: 13px;
    }

    .services-card-item:nth-child(2) img {
        margin-bottom: 21px;
    }

    .services-card-item:last-child img {
        margin-bottom: 19px;
    }

    .services-card-item h5 {
        color: #000;
        text-align: center;
        font-family: Lato;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
    }

    .services-card-item p {
        color: #000;
        text-align: center;
        font-family: Lato;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
    }

    @media screen and (max-width:1024px) {
        .services-cards-box {
            gap: 20px;
        }

        .services-card-item h5,
        .services-card-item p {
            font-size: 15px;
        }
    }

    @media screen and (max-width:767px) {
        .services-cards-box {
            display: flex;
            flex-direction: column;
            gap: 35px;
        }


        .services-section {
            padding-left: 15px;
            padding-right: 15px;
        }

        .services-card-item h5,
        .services-card-item p {
            font-size: 14px;
        }

        .services-card-item:first-child img {
            height: 60px;
        }

        .services-card-item:nth-child(2) img {
            height: 50px;
        }

        .services-card-item:last-child img {
            height: 52px;
        }

        .services-card-item img {
            max-width: 100%;
            width: 100%;
        }
    }
</style>
<section class="services-section">
    <div class="custom-container">
        <div class="services-cards-box">
            <div class="services-card-item text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fast 1.svg" alt="services icons image" class="services-icon-img">
                <h5 class="title">Fast shipment</h5>
                <p class="desc">UK Shipping within 4 Days</p>
            </div>
            <div class="services-card-item text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch 1.svg" alt="services icons image" class="services-icon-img">
                <h5 class="title">Custom Watches</h5>
                <p class="desc">Watch customisation available</p>
            </div>
            <div class="services-card-item text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/support 1.svg" alt="services icons image" class="services-icon-img">
                <h5 class="title">7 days support</h5>
                <p class="desc">Support centres are available all day</p>
            </div>
        </div>
    </div>
</section>
<section class="product-offer-section py-[139px] lg:py-[100px] md:py-[80px] sm:py-[60px]">
    <div class="custom-container">
        <div class="product-offer-wrapper">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 sm:col-span-full md:col-span-6">
                    <div class="product-offer-card relative h-[388px] w-full">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hot-deal-image-1.png" alt="product offer card" class="offer-product-image h-[388px] w-full object-cover">
                        <div class="product-offer-cont pt-[22px] pr-[27px] pb-[29px] pl-[23px] absolute top-0 left-0 w-full h-full">
                            <div class="offer-cont-wrap h-full relative">
                                <div class="contrast-cut w-full h-full">
                                    <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="318" height="337" viewBox="0 0 318 337" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 3.90725H314V333.093H194V337H318V0H0V279H4V3.90725Z" fill="white" />
                                    </svg>
                                </div>
                                <div class="offer-con-text-box absolute bottom-[-14px] left-0">
                                    <h5 class="subtitle text-[14px] sm:text-[10px] text-white font-primary font-medium leading-none opacity-60">Black Friday Sale</h5>
                                    <h3 class="offer-title opacity-90 text-white text-[30px] md:text-[24px] sm:text-[20px] font-medium font-accend">Flat 20% Off</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-full md:col-span-6">
                    <div class="product-offer-card relative h-[388px] w-full">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hot-deal-image-2.png" alt="product offer card" class="offer-product-image h-[388px] w-full object-cover">
                        <div class="product-offer-cont pt-[22px] pr-[27px] pb-[29px] pl-[23px] absolute top-0 left-0 w-full h-full">
                            <div class="offer-cont-wrap h-full relative">
                                <div class="contrast-cut w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="318" height="337" viewBox="0 0 318 337" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 3.90725H314V333.093H294V337H318V0H0V337H23V333.093H4V3.90725Z" fill="white" />
                                    </svg>
                                </div>
                                <div class="offer-con-text-box absolute bottom-[-14px] left-0 right-0 mx-auto text-center">
                                    <h5 class="subtitle text-[14px] sm:text-[10px] text-white font-primary font-medium leading-none opacity-60">Vintage Look</h5>
                                    <h3 class="offer-title opacity-90 text-white text-[30px] md:text-[24px] sm:text-[20px] font-medium font-accend">Starts from £100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-full md:col-span-6">
                    <div class="product-offer-card relative h-[388px] w-full">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hot-deal-image-3.png" alt="product offer card" class="offer-product-image h-[388px] w-full object-cover">
                        <div class="product-offer-cont pt-[22px] pr-[27px] pb-[29px] pl-[23px] absolute top-0 left-0 w-full h-full">
                            <div class="offer-cont-wrap h-full relative">
                                <div class="contrast-cut w-full h-full flex items-end justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="292" height="3" viewBox="0 0 292 3" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0H0V3H18V0ZM274 3H292V0H274V3Z" fill="white" />
                                    </svg>
                                </div>
                                <div class="offer-con-text-box absolute bottom-[-14px] left-0 text-center right-0 mx-auto">
                                    <h5 class="subtitle text-[14px] sm:text-[10px] text-white font-primary font-medium leading-none opacity-60">XMAS Collection</h5>
                                    <h3 class="offer-title opacity-90 text-white text-[30px] md:text-[24px] sm:text-[20px] font-medium font-accend">Starts From £300</h3>
                                    <div class="divider-line absolute bottom-0 w-full bg-[#fff] h-[3px] max-w-[90px] mx-auto left-0 right-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-feature-type-new-arrivel overflow-hidden pb-[139px] lg:pb-[100px] md:pb-[80px] sm:pb-[60px]">
    <div class="custom-container">
        <div class="section-title-box mb-[44px] sm:mb-[35px]">
            <h2 class="section-title text-[16px] text-black text-center font-bold font-secondary tracking-[3.2px] uppercase">New Arrival</h2>
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
                            'terms' => 'New Arrival', // Slug of the "featured" category
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