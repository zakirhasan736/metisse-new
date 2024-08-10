<?php

/**
 * metisse functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package metisse
 */

function metisse_theme_setup()
{
    load_theme_textdomain("metisse");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("post-formats", array("image", "gallery", "quote", "audio", "video", "link"));
    add_editor_style("/assets/css/editor-style.css");

    register_nav_menu("topmenu", __("Top Menu", "metisse"));
    add_image_size("metisse-home-square", 400, 400, true);


    /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on metisse, use a find and replace
         * to change 'metisse' to the name of your theme in all the template files.
         */
    load_theme_textdomain('metisse', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
    add_theme_support('title-tag');

    /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'main-menu' => esc_html__('Main Menu', 'metisse'),
        'category-menu' => esc_html__('Category Menu', 'metisse'),
        'grocery-menu' => esc_html__('Grocery Menu', 'metisse'),
        'footer-menu' => esc_html__('Footer Menu', 'metisse'),
    ]);

    /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('metisse_custom_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    //Enable custom header
    add_theme_support('custom-header');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    function enqueue_slick_slider_assets()
    {

        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'enqueue_slick_slider_assets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    remove_theme_support('widgets-block-editor');

    // Add support for woocommerce.
    add_theme_support('woocommerce');

    // Remove woocommerce defauly styles
    add_filter('woocommerce_enqueue_styles', '__return_false');

    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 200,
        'gallery_thumbnail_image_width' => 200,
    ));
}

add_action("after_setup_theme", "metisse_theme_setup");

/**
 * Enqueue scripts and styles.
 */

define('metisse_THEME_DIR', get_template_directory());
define('metisse_THEME_URI', get_template_directory_uri());
define('metisse_THEME_CSS_DIR', metisse_THEME_URI . '/assets/css/');
define('metisse_THEME_JS_DIR', metisse_THEME_URI . '/assets/js/');
define('metisse_THEME_INC', metisse_THEME_DIR . '/inc/');


// wp_body_open
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Implement the Custom Header feature.
 */
require metisse_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require metisse_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require metisse_THEME_INC . 'template-helper.php';




/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require metisse_THEME_INC . 'jetpack.php';
}


/**
 * include metisse functions file
 */
require_once metisse_THEME_INC . 'class-navwalker.php';
require_once metisse_THEME_INC . 'class-tgm-plugin-activation.php';
require_once metisse_THEME_INC . 'add_plugin.php';
require_once metisse_THEME_INC . '/common/metisse-breadcrumb.php';
require_once metisse_THEME_INC . '/common/metisse-scripts.php';
require_once metisse_THEME_INC . '/common/metisse-widgets.php';
if (class_exists('WooCommerce')) {
    require_once metisse_THEME_INC . '/woocommerce/tp-woocommerce.php';
}
if (function_exists('tpmeta_kick')) {
    require_once metisse_THEME_INC . 'tp-metabox.php';
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function metisse_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'metisse_pingback_header');



// metisse_comment 
if (!function_exists('metisse_comment')) {
    function metisse_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box tp-postbox-details-comment-box d-sm-flex align-items-start">
                <div class="tp-postbox-details-comment-thumb">
                    <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                </div>
                <div class="tp-postbox-details-comment-content">
                    <div class="tp-postbox-details-comment-top d-flex justify-content-between align-items-start">
                        <div class="tp-postbox-details-comment-avater">
                            <h4 class="tp-postbox-details-comment-avater-title"><?php print get_comment_author_link(); ?></h4>
                            <span class="tp-postbox-details-avater-meta"><?php comment_time(get_option('date_format')); ?></span>
                        </div>
                        <div class="tp-postbox-details-comment-reply">
                            <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                        </div>
                    </div>

                    <?php comment_text(); ?>

                </div>
            </div>
        </li>
    <?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter('the_content', 'metisse_shortcode_extra_content_remove');
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function metisse_shortcode_extra_content_remove($content)
{

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr($content, $array);
}

// metisse_search_filter_form
if (!function_exists('metisse_search_filter_form')) {
    function metisse_search_filter_form($form)
    {

        $form = sprintf(
            '<div class="sidebar__widget-px salim"><div class="search-px">
                    <form class="sidebar__search p-relative" action="%s" method="get">
                        <div class="tp-sidebar-search-input">
                            <input type="text" value="%s" required name="s" placeholder="%s">
                            <button type="submit">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'metisse')
        );

        return $form;
    }
    add_filter('get_search_form', 'metisse_search_filter_form');
}

// Add meta box to product edit page
function add_additional_product_meta_box()
{
    add_meta_box(
        'additional_product_meta_box',
        'Select Additional Product',
        'render_additional_product_meta_box',
        'product',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_additional_product_meta_box');

// Render meta box content
function render_additional_product_meta_box($post)
{
    $selected_product_id = get_post_meta($post->ID, 'additional_product_id', true);
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    $products = new WP_Query($args);
    ?>
    <select name="additional_product_id">
        <option value="">Select Additional Product</option>
        <?php
        while ($products->have_posts()) : $products->the_post();
            $product_id = get_the_ID();
            $selected = ($product_id == $selected_product_id) ? 'selected' : '';
            echo '<option value="' . $product_id . '" ' . $selected . '>' . get_the_title() . '</option>';
        endwhile;
        wp_reset_postdata();
        ?>
    </select>
<?php
}
// Save meta box value
function save_additional_product_meta_box($post_id)
{
    if (isset($_POST['additional_product_id'])) {
        $additional_product_id = sanitize_text_field($_POST['additional_product_id']);
        update_post_meta($post_id, 'additional_product_id', $additional_product_id);
    }
}
add_action('save_post', 'save_additional_product_meta_box');

add_action('wp_ajax_add_products_to_cart', 'add_products_to_cart');
add_action('wp_ajax_nopriv_add_products_to_cart', 'add_products_to_cart');
function add_products_to_cart()
{
    if (isset($_POST['product_id'], $_POST['additional_product_id'])) {
        $product_id = intval($_POST['product_id']);
        $additional_product_id = intval($_POST['additional_product_id']);

        // Add the current product to the cart
        WC()->cart->add_to_cart($product_id);

        // Add the additional product to the cart
        WC()->cart->add_to_cart($additional_product_id);

        wp_die();
    }
}


add_action('woocommerce_register_form_start', 'wtwh_add_name_woo_account_registration');

function wtwh_add_name_woo_account_registration()
{
?>

    <div class="user-data-name-box flex items-center md:flex-col gap-x-[30px] sm:gap-0 w-full">
        <p class="form-row form-row-first  mb-[30px] sm:mb-[15px] w-full">
            <label for="reg_billing_first_name" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php _e('First name', 'woocommerce'); ?> <span class="required">*</span></label>
            <input type="text" placeholder="First Name" class="input-text   text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
        </p>

        <p class="form-row form-row-last  mb-[30px] sm:mb-[15px] w-full">
            <label for="reg_billing_last_name" class="text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px]"><?php _e('Last name', 'woocommerce'); ?> <span class="required">*</span></label>
            <input type="text" placeholder="Last Name" class="input-text   text-[18px] sm:text-[14px] font-semibold font-primary leading-[25px] !py-[16px] !px-[20px] placeholder:opacity-50 !border-2 !border-[#000]" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
        </p>

    </div>
    <div class="clear"></div>

    <?php
}

// 2. VALIDATE FIELDS

add_filter('woocommerce_registration_errors', 'wtwh_validate_name_fields', 10, 3);

function wtwh_validate_name_fields($errors, $username, $email)
{
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    return $errors;
}

// 3. SAVE FIELDS
add_action('woocommerce_created_customer', 'wtwh_save_name_fields');

function wtwh_save_name_fields($customer_id)
{
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    if (isset($_POST['billing_last_name'])) {
        update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }
}

add_shortcode('wc_reg_form_metisse', 'metisse_separate_registration_form');
function metisse_separate_registration_form()
{
    if (is_user_logged_in()) return '<p class="text-[28px] text-center sm:text-[24px] font-semibold font-primary leading-[25px]  !text-[#000] mb-[12px]">You are already registered.</p>
    <a href="/my-account/" class="text-[18px] text-center sm:text-[14px] font-medium font-primary leading-[25px] !text-[#000] block !underline" >My Account</a>';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    $html = wc_get_template_html('myaccount/form-registration.php');
    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    @$dom->loadHTML(utf8_decode($html)); // Use error suppression to ignore any HTML parsing warnings
    $xpath = new DOMXPath($dom);
    $form = $xpath->query('//div[contains(@class, "register-auth")]')->item(0); // Corrected query selector and removed unnecessary variable assignment
    if ($form) {
        echo $dom->saveXML($form);
    } else {
        echo '<p>Registration form not found.</p>';
    }
    return ob_get_clean();
}

add_shortcode('tp_header_login', 'tp_header_login_shortcode');
function tp_header_login_shortcode()
{
    ob_start();

    if (class_exists('WooCommerce') && is_user_logged_in()) {
        $current_user = wp_get_current_user();
    ?>
        <div class="user-auth-box flex items-center gap-[12px]">
            <div class="tp-header-login sm:hidden">
                <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="d-flex align-items-center justify-end">
                    <div class="user-avatar">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4 21V20C4 16.6863 6.68629 14 10 14H14C17.3137 14 20 16.6863 20 20V21" stroke="black" stroke-width="2" stroke-linecap="round" />
                                <path d="M12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7C16 9.20914 14.2091 11 12 11Z" stroke="black" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>

                </a>
            </div>
        </div>

    <?php
    } elseif (class_exists('WooCommerce')) {
    ?>
        <div class="user-suth-box-header flex items-center gap-[30px] lg:gap-[20px] md:gap-[16px] md:hidden">
            <div class="tp-header-login ">
                <a href="/my-account/" class="d-flex capitalize align-items-center text-[16px] text-[#000] font-medium font-primary leading-none">
                    <h5 class="tp-header-login-title text-[16px] text-[#000] font-medium font-primary leading-none capitalize"><?php esc_html_e('Login', 'metisse'); ?></h5>
                </a>
            </div>
            <div class="auth-user-register-">
                <a href="/signup/" class="register-page-target-button  text-[16px] capitalize  text-white !bg-[#000000f2] py-[14px] px-[24px] font-medium font-primary leading-none">SignUp</a>
            </div>

        </div>
        <div class="user-suth-box-header items-center gap-[30px] lg:gap-[20px] md:gap-[16px] hidden md:block sm:hidden">
            <div class="tp-header-login ">
                <a href="/my-account/" class="d-flex capitalize align-items-center text-[16px] text-[#000] font-medium font-primary leading-none">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4 21V20C4 16.6863 6.68629 14 10 14H14C17.3137 14 20 16.6863 20 20V21" stroke="black" stroke-width="2" stroke-linecap="round" />
                            <path d="M12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7C16 9.20914 14.2091 11 12 11Z" stroke="black" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
<?php
    }

    return ob_get_clean();
}


