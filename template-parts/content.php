<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shofy
 */

 $shofy_audio_url = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'shofy_post_audio' ) : NULL;
 $gallery_images = function_exists('tpmeta_gallery_field') ? tpmeta_gallery_field('shofy_post_gallery') : '';
 $shofy_video_url = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'shofy_post_video' ) : NULL;



$shofy_blog_single_social = get_theme_mod( 'shofy_blog_single_social', true );
$blog_tag_col = $shofy_blog_single_social ? 'col-xl-8 col-lg-6' : 'col-xl-12';


if ( is_single() ) : ?>
    <!-- details start -->
    <article id="post-<?php the_ID();?>" <?php post_class( 'tp-postbox-details-article' );?>>
        <div class="tp-postbox-details-article-inner">
        <!-- content start -->            
            <?php the_content();?>

            <?php
                wp_link_pages( [
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'shofy' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ] );
            ?>
        </div>

            <?php if(has_tag() OR $shofy_blog_single_social) :?>
            <div class="tp-postbox-details-share-wrapper">
                <div class="row">
                    <div class="<?php echo esc_attr($blog_tag_col); ?>">
                        <div class="tp-postbox-details-tags tagcloud">
                            <?php print shofy_get_tag(); ?> 
                        </div>
                    </div>

                    <?php if(!empty($shofy_blog_single_social)) :?>
                    <div class="col-xl-4 col-lg-6">
                        <div class="tp-postbox-details-share text-md-end">
                            <?php if(function_exists('shofy_blog_single_social')): ?>
                                <?php print shofy_blog_single_social(); ?> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif ?>
                               
    </article>
    <!-- details end -->
<?php else: ?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'tp-postbox-item format-image mb-50 transition-3' );?> >
        
        <!-- if post has thumbnail -->
        <?php if ( has_post_format('image') ): ?>  
            <?php if ( has_post_thumbnail() ): ?>   
                <div class="tp-postbox-thumb">
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                    </a>
                </div>
            <?php endif; ?>

        <!-- if post has video -->
        <?php elseif ( has_post_format('video') ): ?> 
            <?php if ( has_post_thumbnail() ): ?> 
            <div class="tp-postbox-thumb tp-postbox-video p-relative">

                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                </a>
                
                <?php if(!empty($shofy_video_url)) : ?>
                    <a href="<?php print esc_url( $shofy_video_url );?>" class="tp-postbox-video-btn popup-video"><i class="fas fa-play"></i></a>
                <?php endif; ?>

            </div>
            <?php endif; ?>

        <!-- if post has audio -->
        <?php elseif ( has_post_format('audio') ): ?> 

            <?php if ( !empty( $shofy_audio_url ) ): ?>
            <div class="tp-postbox-thumb tp-postbox-audio p-relative">
                <?php echo wp_oembed_get( $shofy_audio_url ); ?>
            </div>
            <?php endif; ?>
        
            <!-- if post has gallery -->
            <?php elseif ( has_post_format('gallery') ): ?> 
                <?php if ( !empty( $gallery_images ) ): ?>
                <div class="tp-postbox-thumb tp-postbox-slider swiper-container p-relative">
                    <div class="swiper-wrapper">
                        <?php foreach ( $gallery_images as $key => $image ): ?>
                        <div class="tp-postbox-slider-item swiper-slide">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="tp-postbox-nav">
                        <button class="tp-postbox-slider-button-next"><i class="fal fa-arrow-right"></i></button>
                        <button class="tp-postbox-slider-button-prev"><i class="fal fa-arrow-left"></i></button>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <?php if ( has_post_thumbnail() ): ?>   
            <div class="tp-postbox-thumb">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                </a>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="tp-postbox-content">
            <!-- blog meta -->
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

            <h3 class="tp-postbox-title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <div class="tp-postbox-text">
                <?php the_excerpt();?>
            </div>

            <!-- blog btn -->
            <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>
        </div>

    </article>
<?php endif;?>