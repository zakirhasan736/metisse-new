<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package shofy
 */

get_header();

$shofy_404_thumb = get_theme_mod('shofy_error_thumb', get_template_directory_uri().'/assets/img/error/error.png');
$shofy_error_title = get_theme_mod('shofy_error_title', __('Oops! Page not found', 'shofy'));
$shofy_error_link_text = get_theme_mod('shofy_error_link_text', __('Back To Home', 'shofy'));
$shofy_error_desc = get_theme_mod('shofy_error_desc', __('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'shofy'));

?>

   <section class="tp-error-area pt-110 pb-110">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
               <div class="tp-error-content text-center">

                  <?php if(!empty($shofy_404_thumb)) : ?>
                  <div class="tp-error-thumb">
                     <img src="<?php echo esc_url($shofy_404_thumb); ?>" alt="<?php print esc_attr__('Error 404','shofy'); ?>">
                  </div>
                  <?php endif; ?>

                  <?php if(!empty($shofy_error_title)) : ?>
                  <h3 class="tp-error-title"><?php print esc_html($shofy_error_title);?></h3>
                  <?php endif; ?>

                  <?php if(!empty($shofy_error_desc)) : ?>
                  <p><?php print esc_html($shofy_error_desc);?></p>
                  <?php endif; ?>

                  <?php if(!empty($shofy_error_link_text)) : ?>
                  <a href="<?php print esc_url(home_url('/'));?>" class="tp-error-btn"><?php print esc_html($shofy_error_link_text);?></a>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </section>

<?php
get_footer();
