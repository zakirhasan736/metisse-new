<?php

/**
 * metisse_scripts description
 * @return [type] [description]
 */
function metisse_scripts() {

    /**
     * all css files
    */


    wp_enqueue_style( 'metisse-fonts', metisse_fonts_url(), array(), time() );
    if( is_rtl() ){
        
    }else{
        wp_enqueue_style( 'bootstrap', metisse_THEME_CSS_DIR.'bootstrap.css', array() );
    }
        wp_enqueue_style('slick', metisse_THEME_CSS_DIR . 'slick.css', []);
    wp_enqueue_style('swiper-bundle', metisse_THEME_CSS_DIR . 'swiper-bundle.css', []);
    wp_enqueue_style('font-awesome-pro', metisse_THEME_CSS_DIR . 'font-awesome-pro.css', []);
    wp_enqueue_style('magnific-popup', metisse_THEME_CSS_DIR . 'magnific-popup.css', []);
    wp_enqueue_style( 'metisse-icon', metisse_THEME_CSS_DIR . 'metisseicon.css', [] );

    wp_enqueue_style( 'metisse-core', metisse_THEME_CSS_DIR . 'metisse-core.css', [], time() );
    wp_enqueue_style( 'metisse-main-style', metisse_THEME_CSS_DIR . 'metisse-style.css', [], time() );
    wp_enqueue_style( 'metisse-custom', metisse_THEME_CSS_DIR . 'editor-style.css', [] );
    wp_enqueue_style( 'metisse-style', get_stylesheet_uri() , [], time() );

    // all js
    wp_enqueue_script( 'bootstrap-bundle', metisse_THEME_JS_DIR . 'bootstrap-bundle.js', [ 'jquery' ], '', true );
    wp_enqueue_script('waypoints', metisse_THEME_JS_DIR . 'waypoints.js', ['jquery'], false, true);
    wp_enqueue_script('swiper-bundle', metisse_THEME_JS_DIR . 'swiper-bundle.js', ['jquery'], false, true);
    wp_enqueue_script('purecounter', metisse_THEME_JS_DIR . 'purecounter.js', ['jquery'], false, true);
    wp_enqueue_script('magnific-popup', metisse_THEME_JS_DIR . 'magnific-popup.js', ['jquery'], '', true);
    wp_enqueue_script('nice-select', metisse_THEME_JS_DIR . 'nice-select.js', ['jquery'], '', true);
    wp_enqueue_script('countdown', metisse_THEME_JS_DIR . 'countdown.js', ['jquery'], '', true);
    wp_enqueue_script( 'slick', metisse_THEME_JS_DIR . 'slick.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'metisse-main', metisse_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'metisse_scripts' );

/*
Register Fonts
 */
function metisse_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'metisse' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Charm:wght@400;700&family=Jost:wght@300;400;500;600;700&family=Oregano&family=Roboto:wght@300;400;500;700;900&display=swap');
    }
    return $font_url;
}