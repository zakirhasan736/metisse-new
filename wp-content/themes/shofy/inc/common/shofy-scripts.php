<?php

/**
 * shofy_scripts description
 * @return [type] [description]
 */
function shofy_scripts() {

    /**
     * all css files
    */

    wp_enqueue_style( 'shofy-fonts', shofy_fonts_url(), array(), time() );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', SHOFY_THEME_CSS_DIR.'bootstrap-rtl.css', array() );
        wp_enqueue_style( 'shofy-rtl', SHOFY_THEME_CSS_DIR.'shofy-rtl.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', SHOFY_THEME_CSS_DIR.'bootstrap.css', array() );
    }
    wp_enqueue_style( 'animate', SHOFY_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'slick', SHOFY_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'swiper-bundle', SHOFY_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'spacing', SHOFY_THEME_CSS_DIR . 'spacing.css', [] );
    wp_enqueue_style( 'font-awesome-pro', SHOFY_THEME_CSS_DIR . 'font-awesome-pro.css', [] );
    wp_enqueue_style( 'shofy-icon', SHOFY_THEME_CSS_DIR . 'shofyicon.css', [] );
    wp_enqueue_style( 'magnific-popup', SHOFY_THEME_CSS_DIR . 'magnific-popup.css', [] );

    wp_enqueue_style( 'shofy-core', SHOFY_THEME_CSS_DIR . 'shofy-core.css', [], time() );
    wp_enqueue_style( 'shofy-unit', SHOFY_THEME_CSS_DIR . 'shofy-unit.css', [], time() );
    wp_enqueue_style( 'shofy-custom', SHOFY_THEME_CSS_DIR . 'shofy-custom.css', [] );
    wp_enqueue_style( 'shofy-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'bootstrap-bundle', SHOFY_THEME_JS_DIR . 'bootstrap-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'waypoints', SHOFY_THEME_JS_DIR . 'waypoints.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'swiper-bundle', SHOFY_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick', SHOFY_THEME_JS_DIR . 'slick.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'purecounter', SHOFY_THEME_JS_DIR . 'purecounter.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'parallax', SHOFY_THEME_JS_DIR . 'parallax.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', SHOFY_THEME_JS_DIR . 'magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'nice-select', SHOFY_THEME_JS_DIR . 'nice-select.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'countdown', SHOFY_THEME_JS_DIR . 'countdown.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', SHOFY_THEME_JS_DIR . 'wow.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'isotope-pkgd', SHOFY_THEME_JS_DIR . 'isotope-pkgd.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'shofy-main', SHOFY_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'shofy_scripts' );

/*
Register Fonts
 */
function shofy_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'shofy' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Charm:wght@400;700&family=Jost:wght@300;400;500;600;700&family=Oregano&family=Roboto:wght@300;400;500;700;900&display=swap');
    }
    return $font_url;
}