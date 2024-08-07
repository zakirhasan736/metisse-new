<?php
/**
 * Breadcrumbs for metisse theme.
 *
 * @package     metisse
 * @author      Theme_Pure
 * @copyright   Copyright (c) 2023, Theme_Pure
 * @link        https://www.wphix.com
 * @since       metisse 1.0.0
 */

function metisse_breadcrumb_func() {
    global $post;  
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','metisse'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif ( is_front_page() ) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog','metisse'));
        $breadcrumb_show = 0;
    }
    elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts') );
        }
    }
    elseif ( is_single() && 'post' == get_post_type() ) {
      $title = get_the_title();
    } 
    elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'metisse' ) );
    } 
    elseif ( is_single() && 'courses' == get_post_type() ) {
      $title = esc_html__( 'Course Details', 'metisse' );
    } 
    elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'metisse' ) . get_search_query();
    } 
    elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'metisse' );
    } 
    elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } 
    else {
        $title = get_the_title();
    }
 

    $_id = get_the_ID();

    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = $post->ID;
    } 
    elseif ( function_exists("is_shop") AND is_shop()  ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }

    $is_breadcrumb = function_exists('tpmeta_field')? tpmeta_field('metisse_check_bredcrumb', $_id) : 'on';

    $con1 = $is_breadcrumb && ($is_breadcrumb== 'on') && $breadcrumb_show == 1;
    $breadcrumb_from_customizer = get_theme_mod('breadcrumb_switch', true);
    
      if (  $con1 && $breadcrumb_from_customizer) {
            $bg_img_from_page = function_exists('tpmeta_image_field')? tpmeta_image_field('metisse_breadcrumb_bg') : '';
            $hide_bg_img = function_exists('tpmeta_image_field')? tpmeta_image_field('metisse_check_bredcrumb_img') : 'on';

            // get_theme_mod
            $bg_img = get_theme_mod( 'breadcrumb_image' );
            $breadcrumb_padding = get_theme_mod( 'breadcrumb_padding' );
            $breadcrumb_bg_color = get_theme_mod( 'breadcrumb_bg_color', '#f3fbfe' );

            if ( $hide_bg_img == 'off' ) {
                $bg_main_img = '';
            }else{  
                $bg_main_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
            }
            
            
            $breadcrumb_padding_top = !empty($breadcrumb_padding['padding-top']) ? $breadcrumb_padding['padding-top'] : '';
            $breadcrumb_padding_bottom = !empty($breadcrumb_padding['padding-bottom']) ? $breadcrumb_padding['padding-bottom'] : '';
           
        ?>


         <!-- breadcrumb area start -->
         <section
         data-padding-top="<?php print esc_attr( $breadcrumb_padding_top );?>" 
         data-padding-bottom="<?php print esc_attr( $breadcrumb_padding_bottom );?>"
         class="breadcrumb__area include-bg pt-150 pb-150 breadcrumb__overlay breadcrumb__style-3 <?php print esc_attr( $breadcrumb_class );?>" 
         data-background="<?php print esc_attr($bg_main_img);?>">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                        <div class="breadcrumb__content text-center p-relative z-index-1">
                            <h3 class="breadcrumb__title"><?php echo metisse_kses( $title ); ?></h3>
                            <div class="breadcrumb__list">
                                <?php 
                                    if(function_exists('bcn_display')){
                                        bcn_display(); 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

<?php
    }
}

add_action( 'metisse_before_main_content', 'metisse_breadcrumb_func' );

// metisse_search_form
function metisse_search_form() { ?>

<!-- search area start -->
<div class="tp-search-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-search-form">
                    <div class="tp-search-close text-center mb-20">
                        <button class="tp-search-close-btn tp-search-close-btn"></button>
                    </div>
                    <form action="<?php print esc_url( home_url( '/shop' ) );?>">
                        <div class="tp-search-input mb-10">
                            <input class="search-input-field" type="text" placeholder="<?php print esc_attr__( 'Search for product...', 'metisse' );?>" name="s" value="<?php print esc_attr( get_search_query() )?>">
                            <button type="submit"><i class="flaticon-search-1"></i></button>
                        </div>
                        <?php if(class_exists('WooCommerce')) : 
                            $categories = get_terms('product_cat');
                        ?>
                        <div class="tp-search-category">
                            <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                            <span><?php echo esc_html__('Search by :', 'metisse'); ?> </span>

                            <?php foreach ($categories as $key => $category) : 
                                
                                    $category_link = get_term_link($category);

                                    $comma = $key == array_key_last($categories) ? '' : ',';
                                ?>
                                    <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a><?php echo esc_html($comma); ?>
                                <?php endforeach; ?>
                            
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search area end -->
<?php
}
add_action( 'metisse_before_main_content', 'metisse_search_form' );
