<?php
    $author_data = get_the_author_meta( 'description', get_query_var( 'author' ) );
    $author_name = get_the_author_meta( 'shofy_write_by');
    $facebook_url = get_the_author_meta( 'shofy_facebook' );
    $twitter_url = get_the_author_meta( 'shofy_twitter' );
    $linkedin_url = get_the_author_meta( 'shofy_linkedin' );
    $instagram_url = get_the_author_meta( 'shofy_instagram' );
    $shofy_url = get_the_author_meta( 'shofy_youtube' );
    $shofy_write_by = get_the_author_meta( 'shofy_write_by' );
    $author_bio_avatar_size = 180;


    $categories = get_the_terms( $post->ID, 'category' );
    $shofy_blog_date = get_theme_mod( 'shofy_blog_date', true );
    $shofy_blog_comments = get_theme_mod( 'shofy_blog_comments', true );
    $shofy_blog_author = get_theme_mod( 'shofy_blog_author', true );
    $shofy_blog_cat = get_theme_mod( 'shofy_blog_cat', false );
    $shofy_blog_view = get_theme_mod( 'shofy_blog_view', false );

    if(function_exists('setPostViews')){
        setPostViews(get_the_ID());
    }
?>

    <div class="tp-blog-grid-meta">
        <?php if ( !empty($shofy_blog_date) ): ?>
        <span>
            <span>
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 8.5C15 12.364 11.864 15.5 8 15.5C4.136 15.5 1 12.364 1 8.5C1 4.636 4.136 1.5 8 1.5C11.864 1.5 15 4.636 15 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.5972 10.7259L8.42715 9.43093C8.04915 9.20693 7.74115 8.66793 7.74115 8.22693V5.35693" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <?php the_time( get_option('date_format') ); ?>
        </span>
        <?php endif;?>

        <?php if ( !empty($shofy_blog_comments) ): ?>
        <span>
            <span>
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5289 11.881L12.8019 14.093C12.8719 14.674 12.2489 15.08 11.7519 14.779L8.81888 13.036C8.49688 13.036 8.18189 13.015 7.87389 12.973C8.39189 12.364 8.69988 11.594 8.69988 10.761C8.69988 8.77299 6.97788 7.16302 4.84988 7.16302C4.03788 7.16302 3.28888 7.394 2.66588 7.8C2.64488 7.625 2.63788 7.44999 2.63788 7.26799C2.63788 4.08299 5.40288 1.5 8.81888 1.5C12.2349 1.5 14.9999 4.08299 14.9999 7.26799C14.9999 9.15799 14.0269 10.831 12.5289 11.881Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M8.7 10.7611C8.7 11.5941 8.39201 12.3641 7.87401 12.9731C7.18101 13.8131 6.082 14.3521 4.85 14.3521L3.023 15.437C2.715 15.626 2.323 15.3671 2.365 15.0101L2.54 13.6311C1.602 12.9801 1 11.9371 1 10.7611C1 9.52905 1.658 8.44407 2.666 7.80007C3.289 7.39407 4.038 7.16309 4.85 7.16309C6.978 7.16309 8.7 8.77305 8.7 10.7611Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <a href="<?php comments_link();?>"><?php echo esc_html__('Comments (', 'shofy') ?><?php echo get_comments_number();?><?php echo esc_html__(')', 'shofy') ?></a>
        </span>
        <?php endif;?>

    </div>

