<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package metisse
 */

get_header();

$metisse_404_thumb = get_theme_mod('metisse_error_thumb', get_template_directory_uri() . '/assets/img/error/error.png');
$metisse_error_title = get_theme_mod('metisse_error_title', __('Oops! Page not found', 'metisse'));
$metisse_error_link_text = get_theme_mod('metisse_error_link_text', __('Back To Home', 'metisse'));
$metisse_error_desc = get_theme_mod('metisse_error_desc', __('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'metisse'));

?>

<section class="tp-error-area py-[120px]">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="tp-error-content text-center">

                    <?php if (!empty($metisse_404_thumb)) : ?>
                        <div class="tp-error-thumb">
                            <img src="<?php echo esc_url($metisse_404_thumb); ?>" alt="<?php print esc_attr__('Error 404', 'metisse'); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($metisse_error_title)) : ?>
                        <h3 class="tp-error-title text-[34px] sm:text-[24px] md:text-[28px] font-primary font-normal capitalize text-[#000]"><?php print esc_html($metisse_error_title); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($metisse_error_desc)) : ?>
                        <p class="text-[18px] sm:text-[14px] font-medium font-primary leading-normal"><?php print esc_html($metisse_error_desc); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($metisse_error_link_text)) : ?>
                        <a href="<?php print esc_url(home_url('/')); ?>" class="tp-error-btn  !text-[14px] !text-[#fff] h-[52px] !font-primary !font-medium !bg-[#000] !py-[14px] !leading-[1.1] w-[197px]"><?php print esc_html($metisse_error_link_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
