<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package metisse
 */

/** 
 *
 * metisse header
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

function metisse_check_header() {
    $tp_header_tabs = function_exists('tpmeta_field')? tpmeta_field('metisse_header_tabs') : false;
    $tp_header_style_meta = function_exists('tpmeta_field')? tpmeta_field('metisse_header_style') : '';
    $elementor_header_template_meta = function_exists('tpmeta_field')? tpmeta_field('metisse_header_templates') : false;


    $metisse_header_option_switch = get_theme_mod('metisse_header_elementor_switch', false);
    $header_default_style_kirki = get_theme_mod( 'header_layout_custom', 'header_1' );
    $elementor_header_templates_kirki = get_theme_mod( 'metisse_header_templates' );
    
    if($tp_header_tabs == 'default'){
        if($metisse_header_option_switch){
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
        if($metisse_header_option_switch){

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
add_action( 'metisse_header_style', 'metisse_check_header', 10 );


/* metisse offcanvas */

function metisse_check_offcanvas() {
    $metisse_offcanvas_style = function_exists( 'tpmeta_field' ) ? tpmeta_field( 'metisse_offcanvas_style' ) : NULL;
    $metisse_default_offcanvas_style = get_theme_mod( 'choose_default_offcanvas', 'offcanvas-style-1' );

    if ( $metisse_offcanvas_style == 'offcanvas-style-1' ) {
        get_template_part( 'template-parts/offcanvas/offcanvas-1' );

    }
    elseif($metisse_offcanvas_style == 'offcanvas-style-2' ){
        get_template_part( 'template-parts/offcanvas/offcanvas-2' );
    }

    
    else{
        if ( $metisse_default_offcanvas_style == 'offcanvas-style-2' ) {
            get_template_part( 'template-parts/offcanvas/offcanvas-2' );
        } 

        else {
            get_template_part( 'template-parts/offcanvas/offcanvas-1' );
        }
    }
}

add_action( 'metisse_offcanvas_style', 'metisse_check_offcanvas', 10 );




/**
 * [metisse_header_lang description]
 * @return [type] [description]
 */
function metisse_header_lang_defualt() {
   ?>

    <div class="tp-header-top-menu-item tp-header-lang">
        <span class="tp-header-lang-toggle" id="tp-header-lang-toggle"><?php print esc_html__( 'English', 'metisse' );?></span>
        <?php do_action( 'metisse_language' );?>
    </div>
<?php
}

/**
 * [metisse_language_list description]
 * @return [type] [description]
 */
function _metisse_language( $mar ) {
    return $mar;
}
function metisse_language_list() {

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
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'metisse' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _metisse_language( $mar );
}
add_action( 'metisse_language', 'metisse_language_list' );





/**
 * [metisse_offcanvas_language description]
 * @return [type] [description]
 */


 /**
 * [metisse_header_lang description]
 * @return [type] [description]
 */
function metisse_offcanvas_lang_defualt() {
    ?>
  
     <div class="offcanvas__select language">
         <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
             <div class="offcanvas__lang-img mr-15">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/language-flag.png" alt="<?php echo esc_attr__('language', 'metisse'); ?>">
             </div>
 
             <div class="offcanvas__lang-wrapper">
                 <span class="offcanvas__lang-selected-lang tp-lang-toggle" id="tp-offcanvas-lang-toggle"><?php echo esc_html__('English', 'metisse'); ?></span> 
                 <?php do_action( 'metisse_offcanvas_language' );?>
             </div>
         </div>
     </div>
 <?php
 }
function _metisse_offcanvas_language( $mar ) {
    return $mar;
}
function metisse_offcanvas_language_list() {

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
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'metisse' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _metisse_language( $mar );
}
add_action( 'metisse_offcanvas_language', 'metisse_offcanvas_language_list' );



/**
 * [metisse_language_list description]
 * @return [type] [description]
 */
function _metisse_footer_language( $mar ) {
    return $mar;
}
function metisse_footer_language_list() {
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
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'metisse' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'metisse' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _metisse_footer_language( $mar );
}
add_action( 'metisse_footer_language', 'metisse_footer_language_list' );



// header logo
function metisse_header_logo() { ?>
        <?php
            $metisse_logo_on = function_exists('tpmeta_field')? tpmeta_field('metisse_en_secondary_logo') : NULL;
            $metisse_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
            $metisse_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.svg';

            $metisse_site_logo_width = get_theme_mod( 'metisse_logo_width', '135');

            $metisse_site_logo = get_theme_mod( 'header_logo', $metisse_logo );
            $metisse_secondary_logo = get_theme_mod( 'header_secondary_logo', $metisse_logo_white );
        ?>
    
        <?php if ( $metisse_logo_on == 'on' ) : ?>
        <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" src="<?php print esc_url( $metisse_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>" />
        </a>
        <?php else : ?>
        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" src="<?php print esc_url( $metisse_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>" />
        </a>
        <?php endif; ?>
<?php
}

// header logo
function metisse_header_double_logo() { ?>
    <?php
        $metisse_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $metisse_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.svg';

        $metisse_site_logo_width = get_theme_mod( 'metisse_logo_width', '135');

        $metisse_site_logo = get_theme_mod( 'header_logo', $metisse_logo );
        $metisse_logo_white = get_theme_mod( 'header_secondary_logo', $metisse_logo_white );

        ?>
    
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $metisse_logo_white ); ?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $metisse_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>">
        </a>
<?php
}


// metisse_footer_logo
function metisse_footer_logo() { ?>
      <?php
        $metisse_foooter_logo = function_exists( 'get_field' ) ? get_field( 'metisse_footer_logo' ) : NULL;

        $metisse_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';

        $metisse_footer_logo_default = get_theme_mod( 'metisse_footer_logo', $metisse_logo );
        $metisse_site_logo_width = get_theme_mod( 'metisse_logo_width', '120');
      ?>

      <?php if ( !empty( $metisse_foooter_logo ) ) : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" src="<?php print esc_url( $metisse_foooter_logo );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>" />
         </a>
      <?php else : ?>
         <a href="<?php print esc_url( home_url( '/' ) );?>">
             <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" src="<?php print esc_url( $metisse_footer_logo_default );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>" />
         </a>
      <?php endif; ?>
   <?php
}


// header logo
function metisse_header_sticky_logo() {?>
    <?php
        $metisse_sticky_logo = function_exists( 'get_field' ) ? get_field( 'metisse_sticky_logo' ) : NULL;
        $metisse_logo = get_theme_mod( 'metisse_sticky_logo', get_template_directory_uri() . '/assets/img/logo/logo-black-solid.svg' );
        $metisse_secondary_logo = get_theme_mod( 'seconday_logo',  get_template_directory_uri() . '/assets/img/logo/logo.svg');
        $metisse_site_logo_width = get_theme_mod( 'metisse_logo_width', '120');
    ?>
        <?php if ( !empty( $metisse_sticky_logo ) ) : ?>
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $metisse_sticky_logo );?>" alt="logo">
        </a>
        <?php else : ?>
            <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" class="logo-dark" src="<?php print esc_url( $metisse_logo );?>" alt="logo">
            <img data-width="<?php echo esc_attr($metisse_site_logo_width); ?>" height="auto" class="logo-light" src="<?php print esc_url( $metisse_secondary_logo );?>" alt="logo">
        </a>
        <?php endif; ?>
    <?php
}

function metisse_mobile_logo() {
    // side info
    $metisse_mobile_logo_hide = get_theme_mod( 'metisse_mobile_logo_hide', false );

    $metisse_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $metisse_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $metisse_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'metisse' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [metisse_header_social_profiles description]
 * @return [type] [description]
 */
function metisse_header_social_profiles() {
    $metisse_topbar_fb_url = get_theme_mod( 'metisse_topbar_fb_url', __( '#', 'metisse' ) );
    $metisse_topbar_twitter_url = get_theme_mod( 'metisse_topbar_twitter_url', __( '#', 'metisse' ) );
    $metisse_topbar_instagram_url = get_theme_mod( 'metisse_topbar_instagram_url', __( '#', 'metisse' ) );
    $metisse_topbar_linkedin_url = get_theme_mod( 'metisse_topbar_linkedin_url', __( '#', 'metisse' ) );
    $metisse_topbar_youtube_url = get_theme_mod( 'metisse_topbar_youtube_url', __( '#', 'metisse' ) );
    ?>
        <ul>
        <?php if ( !empty( $metisse_topbar_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $metisse_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $metisse_topbar_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $metisse_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $metisse_topbar_instagram_url ) ): ?>
            <li><a href="<?php print esc_url( $metisse_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $metisse_topbar_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $metisse_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $metisse_topbar_youtube_url ) ): ?>
            <li><a href="<?php print esc_url( $metisse_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif;?>
        </ul>

<?php
}

/**
 * [metisse_offcanvas_social_profiles description]
 * @return [type] [description]
 */
function metisse_offcanvas_social_profiles() {

    $metisse_offcanvas_fb_url = get_theme_mod( 'metisse_offcanvas_fb_url', __( '#', 'metisse' ) );
    $metisse_offcanvas_twitter_url = get_theme_mod( 'metisse_offcanvas_twitter_url', __( '#', 'metisse' ) );
    $metisse_offcanvas_instagram_url = get_theme_mod( 'metisse_offcanvas_instagram_url', __( '#', 'metisse' ) );
    $metisse_offcanvas_linkedin_url = get_theme_mod( 'metisse_offcanvas_linkedin_url', __( '#', 'metisse' ) );
    $metisse_offcanvas_youtube_url = get_theme_mod( 'metisse_offcanvas_youtube_url', __( '#', 'metisse' ) );
    ?>
        <?php if ( !empty( $metisse_offcanvas_fb_url ) ): ?>
            <a href="<?php print esc_url( $metisse_offcanvas_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $metisse_offcanvas_twitter_url ) ): ?>
            <a href="<?php print esc_url( $metisse_offcanvas_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $metisse_offcanvas_instagram_url ) ): ?>
            <a href="<?php print esc_url( $metisse_offcanvas_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $metisse_offcanvas_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $metisse_offcanvas_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $metisse_offcanvas_youtube_url ) ): ?>
            <a href="<?php print esc_url( $metisse_offcanvas_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
        <?php endif;?>
<?php
}

function metisse_footer_social_profiles() {
    $metisse_footer_fb_url = get_theme_mod( 'metisse_footer_fb_url', __( '#', 'metisse' ) );
    $metisse_footer_twitter_url = get_theme_mod( 'metisse_footer_twitter_url', __( '#', 'metisse' ) );
    $metisse_footer_instagram_url = get_theme_mod( 'metisse_footer_instagram_url', __( '#', 'metisse' ) );
    $metisse_footer_linkedin_url = get_theme_mod( 'metisse_footer_linkedin_url', __( '#', 'metisse' ) );
    $metisse_footer_youtube_url = get_theme_mod( 'metisse_footer_youtube_url', __( '#', 'metisse' ) );
    ?>

        <?php if ( !empty( $metisse_footer_fb_url ) ): ?>
            <a href="<?php print esc_url( $metisse_footer_fb_url );?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $metisse_footer_twitter_url ) ): ?>
            <a href="<?php print esc_url( $metisse_footer_twitter_url );?>">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $metisse_footer_instagram_url ) ): ?>
            <a href="<?php print esc_url( $metisse_footer_instagram_url );?>">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $metisse_footer_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $metisse_footer_linkedin_url );?>">
                <i class="fab fa-linkedin"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $metisse_footer_youtube_url ) ): ?>
            <a href="<?php print esc_url( $metisse_footer_youtube_url );?>">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif;?>
<?php
}


/**
 * [metisse_header_menu description]
 * @return [type] [description]
 */
function metisse_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [metisse_category_menu description]
 * @return [type] [description]
 */
function metisse_category_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'category-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [metisse_grocery_menu description]
 * @return [type] [description]
 */
function metisse_grocery_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'grocery-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [metisse_search_menu description]
 * @return [type] [description]
 */
function metisse_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
            'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [metisse_footer_menu description]
 * @return [type] [description]
 */
function metisse_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0 footer-list-inline-3',
        'container'      => '',
        'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
    ] );
}

/**
 * [metisse_offcanvas_default_menu description]
 * @return [type] [description]
 */
function metisse_offcanvas_default_menu() {
    wp_nav_menu( [
        'theme_location' => 'offcanvas-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'metisse_Navwalker_Class::fallback',
        'walker'         => new \TPCore\Widgets\metisse_Navwalker_Class,
    ] );
}

/**
 *
 * metisse footer
 */
add_action( 'metisse_footer_style', 'metisse_check_footer', 10 );

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

function metisse_check_footer() {
    $tp_footer_tabs = function_exists('tpmeta_field')? tpmeta_field('metisse_footer_tabs') : false;
    $tp_footer_style_meta = function_exists('tpmeta_field')? tpmeta_field('metisse_footer_style') : '';
    $elementor_footer_template_meta = function_exists('tpmeta_field')? tpmeta_field('metisse_footer_templates') : false;

    
    $metisse_footer_option_switch = get_theme_mod('metisse_footer_elementor_switch', false);
    $footer_default_style_kirki = get_theme_mod( 'footer_layout_custom', 'footer_1' );
    $elementor_footer_templates_kirki = get_theme_mod( 'metisse_footer_templates' );
    
    if($tp_footer_tabs == 'default'){
        if($metisse_footer_option_switch){
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
        if($metisse_footer_option_switch){

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

// metisse_copyright_text
function metisse_copyright_text() {
   print get_theme_mod( 'metisse_copyright', esc_html__( '© 2023 All Rights Reserved | WordPress Theme by Themepure', 'metisse' ) );
}



/**
 *
 * pagination
 */
if ( !function_exists( 'metisse_pagination' ) ) {

    function _metisse_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function metisse_pagination( $prev, $next, $pages, $args ) {
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

        print _metisse_pagi_callback( $pagi );
    }
}


// header top bg color
function metisse_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'metisse_breadcrumb_bg_color', '#e1e1e1' );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'metisse-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_breadcrumb_bg_color' );

// breadcrumb-spacing top
function metisse_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'metisse_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'metisse-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function metisse_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'metisse_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'metisse-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_breadcrumb_bottom_spacing' );

// scrollup
function metisse_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'metisse_scrollup_switch', false );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'metisse-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_scrollup_switch' );

// theme color
function metisse_custom_color() {
    $color_code_primary          = get_theme_mod( 'metisse_color_option_primary', '#0989FF' );
    $color_code_secondary = get_theme_mod( 'metisse_color_option_secondary', '#821F40' );
    $color_code_brown     = get_theme_mod( 'metisse_color_option_brown', '#BD844C' );
    $color_code_green     = get_theme_mod( 'metisse_color_option_green', '#678E61' );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( ($color_code_primary != '') || ($color_code_secondary != '') || ($color_code_brown != '') || ($color_code_green != '') ) {
        $custom_css = '';
        $custom_css .= "html:root { --tp-theme-primary : " . $color_code_primary . "}";
        $custom_css .= "html:root { --tp-theme-secondary : " . $color_code_secondary . "}";
        $custom_css .= "html:root { --tp-theme-brown : " . $color_code_brown . "}";
        $custom_css .= "html:root { --tp-theme-green : " . $color_code_green . "}";

        wp_add_inline_style( 'metisse-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_custom_color' );


// scroll to top color
function metisse_custom_color_scrollup() {
    $color_code = get_theme_mod( 'metisse_color_scrollup', '#03041C' );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'metisse-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html .back-to-top-btn { background-color: " . $color_code . "}";
        wp_add_inline_style( 'metisse-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_custom_color_scrollup' );


// metisse_kses_intermediate
function metisse_kses_intermediate( $string = '' ) {
    return wp_kses( $string, metisse_get_allowed_html_tags( 'intermediate' ) );
}

function metisse_get_allowed_html_tags( $level = 'basic' ) {
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
function metisse_kses($raw){

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
add_filter( 'get_archives_link', 'metisse_archive_count_span' );
function metisse_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'metisse_cat_count_span');
function metisse_cat_count_span($links) {
  $links = str_replace('</a> (', '<span> (', $links);
  $links = str_replace(')', ')</span></a>', $links);
  return $links;
}