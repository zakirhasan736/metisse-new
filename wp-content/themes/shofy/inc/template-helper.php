<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package shofy
 */

/** 
 *
 * shofy header
 */
function get_header_style($style){
    if ( $style == 'header_2'  ) {
        get_template_part( 'template-parts/header/header-2' );
    }elseif ( $style == 'header_3'  ) {
        get_template_part( 'template-parts/header/header-3' );
    }elseif ( $style == 'header_4' ) {
        get_template_part( 'template-parts/header/header-4' );
    }elseif ( $style == 'header_5' ) {
        get_template_part( 'template-parts/header/header-5' );
    }elseif ( $style == 'header_6' ) {
        get_template_part( 'template-parts/header/header-6' );
    }
    else{
        get_template_part( 'template-parts/header/header-1');
    }
}

function shofy_check_header() {
    $tp_header_tabs = function_exists('tpmeta_field')? tpmeta_field('shofy_header_tabs') : false;
    $tp_header_style_meta = function_exists('tpmeta_field')? tpmeta_field('shofy_header_style') : '';
    $elementor_header_template_meta = function_exists('tpmeta_field')? tpmeta_field('shofy_header_templates') : false;


    $shofy_header_option_switch = get_theme_mod('shofy_header_elementor_switch', false);
    $header_default_style_kirki = get_theme_mod( 'header_layout_custom', 'header_1' );
    $elementor_header_templates_kirki = get_theme_mod( 'shofy_header_templates' );
    
    if($tp_header_tabs == 'default'){
        if($shofy_header_option_switch){
            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }
        }else{ 
            if($header_default_style_kirki){
                get_header_style($header_default_style_kirki);
            }else{
                get_template_part( 'template-parts/header/header-1' );
            }
        }
    }elseif($tp_header_tabs == 'custom'){
        if ($tp_header_style_meta) {
            get_header_style($tp_header_style_meta);
        }else{
            get_header_style($header_default_style_kirki);
        }  
    }elseif($tp_header_tabs == 'elementor'){
        if($elementor_header_template_meta){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_template_meta);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
        }
    }else{
        if($shofy_header_option_switch){

            if($elementor_header_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }else{
                get_template_part( 'template-parts/header/header-1' );
            }
        }else{
            get_header_style($header_default_style_kirki);

        }
        
    }

}
add_action( 'shofy_header_style', 'shofy_check_header', 10 );


/* shofy offcanvas */

function shofy_check_offcanvas() {
    $shofy_offcanvas_style = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'shofy_offcanvas_style' ) : NULL;
    $shofy_default_offcanvas_style = get_theme_mod( 'choose_default_offcanvas', 'offcanvas-style-1' );

    if ( $shofy_offcanvas_style == 'offcanvas-style-1' ) {
        get_template_part( 'template-parts/offcanvas/offcanvas-1' );

    }
    elseif($shofy_offcanvas_style == 'offcanvas-style-2' ){
        get_template_part( 'template-parts/offcanvas/offcanvas-2' );
    }

    
    else{
        if ( $shofy_default_offcanvas_style == 'offcanvas-style-2' ) {
            get_template_part( 'template-parts/offcanvas/offcanvas-2' );
        } 

        else {
            get_template_part( 'template-parts/offcanvas/offcanvas-1' );
        }
    }
}

add_action( 'shofy_offcanvas_style', 'shofy_check_offcanvas', 10 );




/**
 * [shofy_header_lang description]
 * @return [type] [description]
 */
function shofy_header_lang_defualt() {
   ?>

    <div class="tp-header-top-menu-item tp-header-lang">
        <span class="tp-header-lang-toggle" id="tp-header-lang-toggle"><?php print esc_html__( 'English', 'shofy' );?></span>
        <?php do_action( 'shofy_language' );?>
    </div>
<?php
}

/**
 * [shofy_language_list description]
 * @return [type] [description]
 */
function _shofy_language( $mar ) {
    return $mar;
}
function shofy_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'shofy' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _shofy_language( $mar );
}
add_action( 'shofy_language', 'shofy_language_list' );





/**
 * [shofy_offcanvas_language description]
 * @return [type] [description]
 */


 /**
 * [shofy_header_lang description]
 * @return [type] [description]
 */
function shofy_offcanvas_lang_defualt() {
    ?>
  
     <div class="offcanvas__select language">
         <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
             <div class="offcanvas__lang-img mr-15">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/language-flag.png" alt="<?php echo esc_attr__('language', 'shofy'); ?>">
             </div>
 
             <div class="offcanvas__lang-wrapper">
                 <span class="offcanvas__lang-selected-lang tp-lang-toggle" id="tp-offcanvas-lang-toggle"><?php echo esc_html__('English', 'shofy'); ?></span> 
                 <?php do_action( 'shofy_offcanvas_language' );?>
             </div>
         </div>
     </div>
 <?php
 }
function _shofy_offcanvas_language( $mar ) {
    return $mar;
}
function shofy_offcanvas_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="offcanvas__lang-list tp-lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="offcanvas__lang-list tp-lang-list">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'shofy' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _shofy_language( $mar );
}
add_action( 'shofy_offcanvas_language', 'shofy_offcanvas_language_list' );



/**
 * [shofy_language_list description]
 * @return [type] [description]
 */
function _shofy_footer_language( $mar ) {
    return $mar;
}
function shofy_footer_language_list() {
    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="footer__lang-list tp-lang-list-2">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="footer__lang-list tp-lang-list-2">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'shofy' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'shofy' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _shofy_footer_language( $mar );
}
add_action( 'shofy_footer_language', 'shofy_footer_language_list' );



// header logo
function shofy_header_logo() { ?>
        <?php
            $shofy_logo_on = function_exists('tpmeta_field')? tpmeta_field('shofy_en_secondary_logo') : NULL;
            $shofy_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
            $shofy_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.svg';

            $shofy_site_logo_width = get_theme_mod( 'shofy_logo_width', '135');

            $shofy_site_logo = get_theme_mod( 'header_logo', $shofy_logo );
            $shofy_secondary_logo = get_theme_mod( 'header_secondary_logo', $shofy_logo_white );
        ?>
    
        <?php if ( $shofy_logo_on == 'on' ) : ?>
        <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" src="<?php print esc_url( $shofy_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>" />
        </a>
        <?php else : ?>
        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" src="<?php print esc_url( $shofy_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>" />
        </a>
        <?php endif; ?>
<?php
}

// header logo
function shofy_header_double_logo() { ?>
    <?php
        $shofy_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $shofy_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.svg';

        $shofy_site_logo_width = get_theme_mod( 'shofy_logo_width', '135');

        $shofy_site_logo = get_theme_mod( 'header_logo', $shofy_logo );
        $shofy_logo_white = get_theme_mod( 'header_secondary_logo', $shofy_logo_white );

        ?>
    
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $shofy_logo_white ); ?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $shofy_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>">
        </a>
<?php
}


// shofy_footer_logo
function shofy_footer_logo() { ?>
      <?php
        $shofy_foooter_logo = function_exists( 'get_field' ) ? get_field( 'shofy_footer_logo' ) : NULL;

        $shofy_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';

        $shofy_footer_logo_default = get_theme_mod( 'shofy_footer_logo', $shofy_logo );
        $shofy_site_logo_width = get_theme_mod( 'shofy_logo_width', '120');
      ?>

      <?php if ( !empty( $shofy_foooter_logo ) ) : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" src="<?php print esc_url( $shofy_foooter_logo );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>" />
         </a>
      <?php else : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" src="<?php print esc_url( $shofy_footer_logo_default );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>" />
         </a>
      <?php endif; ?>
   <?php
}


// header logo
function shofy_header_sticky_logo() {?>
    <?php
        $shofy_sticky_logo = function_exists( 'get_field' ) ? get_field( 'shofy_sticky_logo' ) : NULL;
        $shofy_logo = get_theme_mod( 'shofy_sticky_logo', get_template_directory_uri() . '/assets/img/logo/logo-black-solid.svg' );
        $shofy_secondary_logo = get_theme_mod( 'seconday_logo',  get_template_directory_uri() . '/assets/img/logo/logo.svg');
        $shofy_site_logo_width = get_theme_mod( 'shofy_logo_width', '120');
    ?>
        <?php if ( !empty( $shofy_sticky_logo ) ) : ?>
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $shofy_sticky_logo );?>" alt="logo">
        </a>
        <?php else : ?>
            <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $shofy_logo );?>" alt="logo">
            <img data-width="<?php echo esc_attr($shofy_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $shofy_secondary_logo );?>" alt="logo">
        </a>
        <?php endif; ?>
    <?php
}

function shofy_mobile_logo() {
    // side info
    $shofy_mobile_logo_hide = get_theme_mod( 'shofy_mobile_logo_hide', false );

    $shofy_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $shofy_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $shofy_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'shofy' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [shofy_header_social_profiles description]
 * @return [type] [description]
 */
function shofy_header_social_profiles() {
    $shofy_topbar_fb_url = get_theme_mod( 'shofy_topbar_fb_url', __( '#', 'shofy' ) );
    $shofy_topbar_twitter_url = get_theme_mod( 'shofy_topbar_twitter_url', __( '#', 'shofy' ) );
    $shofy_topbar_instagram_url = get_theme_mod( 'shofy_topbar_instagram_url', __( '#', 'shofy' ) );
    $shofy_topbar_linkedin_url = get_theme_mod( 'shofy_topbar_linkedin_url', __( '#', 'shofy' ) );
    $shofy_topbar_youtube_url = get_theme_mod( 'shofy_topbar_youtube_url', __( '#', 'shofy' ) );
    ?>
        <ul>
        <?php if ( !empty( $shofy_topbar_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $shofy_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $shofy_topbar_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $shofy_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $shofy_topbar_instagram_url ) ): ?>
            <li><a href="<?php print esc_url( $shofy_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $shofy_topbar_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $shofy_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $shofy_topbar_youtube_url ) ): ?>
            <li><a href="<?php print esc_url( $shofy_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif;?>
        </ul>

<?php
}

/**
 * [shofy_offcanvas_social_profiles description]
 * @return [type] [description]
 */
function shofy_offcanvas_social_profiles() {

    $shofy_offcanvas_fb_url = get_theme_mod( 'shofy_offcanvas_fb_url', __( '#', 'shofy' ) );
    $shofy_offcanvas_twitter_url = get_theme_mod( 'shofy_offcanvas_twitter_url', __( '#', 'shofy' ) );
    $shofy_offcanvas_instagram_url = get_theme_mod( 'shofy_offcanvas_instagram_url', __( '#', 'shofy' ) );
    $shofy_offcanvas_linkedin_url = get_theme_mod( 'shofy_offcanvas_linkedin_url', __( '#', 'shofy' ) );
    $shofy_offcanvas_youtube_url = get_theme_mod( 'shofy_offcanvas_youtube_url', __( '#', 'shofy' ) );
    ?>
        <?php if ( !empty( $shofy_offcanvas_fb_url ) ): ?>
            <a href="<?php print esc_url( $shofy_offcanvas_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $shofy_offcanvas_twitter_url ) ): ?>
            <a href="<?php print esc_url( $shofy_offcanvas_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $shofy_offcanvas_instagram_url ) ): ?>
            <a href="<?php print esc_url( $shofy_offcanvas_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $shofy_offcanvas_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $shofy_offcanvas_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $shofy_offcanvas_youtube_url ) ): ?>
            <a href="<?php print esc_url( $shofy_offcanvas_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
        <?php endif;?>
<?php
}

function shofy_footer_social_profiles() {
    $shofy_footer_fb_url = get_theme_mod( 'shofy_footer_fb_url', __( '#', 'shofy' ) );
    $shofy_footer_twitter_url = get_theme_mod( 'shofy_footer_twitter_url', __( '#', 'shofy' ) );
    $shofy_footer_instagram_url = get_theme_mod( 'shofy_footer_instagram_url', __( '#', 'shofy' ) );
    $shofy_footer_linkedin_url = get_theme_mod( 'shofy_footer_linkedin_url', __( '#', 'shofy' ) );
    $shofy_footer_youtube_url = get_theme_mod( 'shofy_footer_youtube_url', __( '#', 'shofy' ) );
    ?>

        <?php if ( !empty( $shofy_footer_fb_url ) ): ?>
            <a href="<?php print esc_url( $shofy_footer_fb_url );?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $shofy_footer_twitter_url ) ): ?>
            <a href="<?php print esc_url( $shofy_footer_twitter_url );?>">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $shofy_footer_instagram_url ) ): ?>
            <a href="<?php print esc_url( $shofy_footer_instagram_url );?>">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $shofy_footer_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $shofy_footer_linkedin_url );?>">
                <i class="fab fa-linkedin"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $shofy_footer_youtube_url ) ): ?>
            <a href="<?php print esc_url( $shofy_footer_youtube_url );?>">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif;?>
<?php
}


/**
 * [shofy_header_menu description]
 * @return [type] [description]
 */
function shofy_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [shofy_category_menu description]
 * @return [type] [description]
 */
function shofy_category_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'category-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [shofy_grocery_menu description]
 * @return [type] [description]
 */
function shofy_grocery_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'grocery-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [shofy_search_menu description]
 * @return [type] [description]
 */
function shofy_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [shofy_footer_menu description]
 * @return [type] [description]
 */
function shofy_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0 footer-list-inline-3',
        'container'      => '',
        'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
    ] );
}

/**
 * [shofy_offcanvas_default_menu description]
 * @return [type] [description]
 */
function shofy_offcanvas_default_menu() {
    wp_nav_menu( [
        'theme_location' => 'offcanvas-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Shofy_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\Shofy_Navwalker_Class,
    ] );
}

/**
 *
 * shofy footer
 */
add_action( 'shofy_footer_style', 'shofy_check_footer', 10 );

function get_footer_style($style){
    if ( $style == 'footer_2'  ) {
        get_template_part( 'template-parts/footer/footer-2' );
    }elseif ( $style == 'footer_3'  ) {
        get_template_part( 'template-parts/footer/footer-3' );
    }elseif ( $style == 'footer_4' ) {
        get_template_part( 'template-parts/footer/footer-4' );
    }elseif ( $style == 'footer_5' ) {
        get_template_part( 'template-parts/footer/footer-5' );
    }elseif ( $style == 'footer_6' ) {
        get_template_part( 'template-parts/footer/footer-6' );
    }
    else{
        get_template_part( 'template-parts/footer/footer-1');
    }
}

function shofy_check_footer() {
    $tp_footer_tabs = function_exists('tpmeta_field')? tpmeta_field('shofy_footer_tabs') : false;
    $tp_footer_style_meta = function_exists('tpmeta_field')? tpmeta_field('shofy_footer_style') : '';
    $elementor_footer_template_meta = function_exists('tpmeta_field')? tpmeta_field('shofy_footer_templates') : false;

    
    $shofy_footer_option_switch = get_theme_mod('shofy_footer_elementor_switch', false);
    $footer_default_style_kirki = get_theme_mod( 'footer_layout_custom', 'footer_1' );
    $elementor_footer_templates_kirki = get_theme_mod( 'shofy_footer_templates' );
    
    if($tp_footer_tabs == 'default'){
        if($shofy_footer_option_switch){
            if($elementor_footer_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            }
        }else{ 
            if($footer_default_style_kirki){
                get_footer_style($footer_default_style_kirki);
            }else{
                get_template_part( 'template-parts/footer/footer-1' );
            }
        }
    }elseif($tp_footer_tabs == 'custom'){
        if ($tp_footer_style_meta) {
            get_footer_style($tp_footer_style_meta);
        }else{
            get_footer_style($footer_default_style_kirki);
        }  
    }elseif($tp_footer_tabs == 'elementor'){
        if($elementor_footer_template_meta){
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template_meta);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
        }
    }else{
        if($shofy_footer_option_switch){

            if($elementor_footer_templates_kirki){
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            }else{
                get_template_part( 'template-parts/footer/footer-1' );
            }
        }else{
            get_footer_style($footer_default_style_kirki);

        }
        
    }

}

// shofy_copyright_text
function shofy_copyright_text() {
   print get_theme_mod( 'shofy_copyright', esc_html__( '© 2023 All Rights Reserved | WordPress Theme by Themepure', 'shofy' ) );
}



/**
 *
 * pagination
 */
if ( !function_exists( 'shofy_pagination' ) ) {

    function _shofy_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function shofy_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];

            
        }     

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _shofy_pagi_callback( $pagi );
    }
}


// header top bg color
function shofy_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'shofy_breadcrumb_bg_color', '#e1e1e1' );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'shofy-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_breadcrumb_bg_color' );

// breadcrumb-spacing top
function shofy_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'shofy_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'shofy-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function shofy_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'shofy_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'shofy-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_breadcrumb_bottom_spacing' );

// scrollup
function shofy_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'shofy_scrollup_switch', false );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'shofy-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_scrollup_switch' );

// theme color
function shofy_custom_color() {
    $color_code_primary          = get_theme_mod( 'shofy_color_option_primary', '#0989FF' );
    $color_code_secondary = get_theme_mod( 'shofy_color_option_secondary', '#821F40' );
    $color_code_brown     = get_theme_mod( 'shofy_color_option_brown', '#BD844C' );
    $color_code_green     = get_theme_mod( 'shofy_color_option_green', '#678E61' );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( ($color_code_primary != '') || ($color_code_secondary != '') || ($color_code_brown != '') || ($color_code_green != '') ) {
        $custom_css = '';
        $custom_css .= "html:root { --tp-theme-primary : " . $color_code_primary . "}";
        $custom_css .= "html:root { --tp-theme-secondary : " . $color_code_secondary . "}";
        $custom_css .= "html:root { --tp-theme-brown : " . $color_code_brown . "}";
        $custom_css .= "html:root { --tp-theme-green : " . $color_code_green . "}";

        wp_add_inline_style( 'shofy-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_custom_color' );


// scroll to top color
function shofy_custom_color_scrollup() {
    $color_code = get_theme_mod( 'shofy_color_scrollup', '#03041C' );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html .back-to-top-btn { background-color: " . $color_code . "}";
        wp_add_inline_style( 'shofy-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_custom_color_scrollup' );


// shofy_kses_intermediate
function shofy_kses_intermediate( $string = '' ) {
    return wp_kses( $string, shofy_get_allowed_html_tags( 'intermediate' ) );
}

function shofy_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function shofy_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}

// / This code filters the Archive widget to include the post count inside the link /
add_filter( 'get_archives_link', 'shofy_archive_count_span' );
function shofy_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'shofy_cat_count_span');
function shofy_cat_count_span($links) {
  $links = str_replace('</a> (', '<span> (', $links);
  $links = str_replace(')', ')</span></a>', $links);
  return $links;
}