<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shofy
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>


    <?php
        $shofy_preloader = get_theme_mod( 'shofy_preloader_switch', false );
        $shofy_preloader_text = get_theme_mod( 'shofy_preloader_text', __( 'Shofy', 'shofy' ) );
        $shofy_preloader_loading_text = get_theme_mod( 'shofy_preloader_loading_text', __( 'Loading', 'shofy' ) );
        $shofy_preloader_logo = get_theme_mod( 'shofy_preloader_logo', get_template_directory_uri() . '/assets/img/logo/preloader/preloader-icon.svg' );

        $shofy_backtotop = get_theme_mod( 'shofy_backtotop', false );
    ?>

    <?php if(!empty($shofy_preloader)) :?>
      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <!-- loading content here -->
               <div class="tp-preloader-content">
                  <div class="tp-preloader-logo">
                     <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle> 
                           <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle> 
                       </svg>
                     </div>
                    <?php if(!empty($shofy_preloader_logo )) :?>
                     <img src="<?php echo esc_url($shofy_preloader_logo); ?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>">
                     <?php endif; ?>
                  </div>

                  <?php if(!empty($shofy_preloader_text)) :?>
                  <h3 class="tp-preloader-title"><?php echo esc_html($shofy_preloader_text); ?></h3>
                  <?php endif; ?>

                  <?php if(!empty($shofy_preloader_loading_text)) :?>
                  <p class="tp-preloader-subtitle"><?php echo esc_html($shofy_preloader_loading_text); ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </div>  
      </div>
      <!-- pre loader area end -->
      <?php endif; ?>

      <?php if(!empty($shofy_backtotop)) :?>
        <!-- back to top start -->
        <div class="back-to-top-wrapper">
            <button id="back_to_top" type="button" class="back-to-top-btn">
                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>               
            </button>
        </div>
        <!-- back to top end -->
    <?php endif; ?>

    <!-- header start -->
    <?php do_action( 'shofy_header_style' );?>
    <!-- header end -->
    
    <!-- wrapper-box start -->
    <?php do_action( 'shofy_before_main_content' );?>