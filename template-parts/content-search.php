<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shofy
 */

if ( is_single() ) : ?>
    <article id="post-<?php the_ID();?>" <?php post_class( 'tp-blog-search-item mb-30' );?> >
        <div class="tp-blog-grid-item p-relative mb-30">
    
            <?php if ( has_post_format('image') ): ?>
            <div class="tp-blog-grid-thumb w-img fix mb-30">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
            </div>
            <?php endif;?>

            <?php $img_space = has_post_format('image') ? 'has-img' : 'no-img'; ?>

            <div class="tp-blog-grid-content <?php echo esc_attr($img_space) ?>">
    
                <?php get_template_part( 'template-parts/blog/search-result-meta' ); ?>
    
                <h3 class="tp-blog-grid-title"><?php the_title();?> </h3>
    
                <?php the_content();?>

                <?php
                    wp_link_pages( [
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'shofy' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ] );
                ?>
    
                <?php print shofy_get_tag();?>
            </div>
        </div>
    </article>
<?php else: ?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'tp-blog-search-item mb-30' );?>>
        <div class="tp-blog-grid-item p-relative mb-30">
    
            <?php if ( has_post_format('image') ): ?>
            <div class="tp-blog-grid-thumb w-img fix mb-30">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                </a>
            </div>
            <?php endif;?>

            <?php $img_space = has_post_format('image') ? 'has-img' : 'no-img'; ?>

            <div class="tp-blog-grid-content <?php echo esc_attr($img_space) ?>">
    
                <?php get_template_part( 'template-parts/blog/search-result-meta' ); ?>
    
                <h3 class="tp-blog-grid-title">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                </h3>
    
                <?php the_excerpt();?>
    
                <?php get_template_part( 'template-parts/blog/blog-search-btn' ); ?>
    
            </div>
        </div>
    </article>  
    
    
    
<?php endif;?>