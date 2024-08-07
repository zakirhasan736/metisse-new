<?php


new \Kirki\Panel(
    'panel_id',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'metisse Customizer', 'metisse' ),
        'description' => esc_html__( 'metisse Customizer Description.', 'metisse' ),
    ]
);

// header_top_section
function header_top_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_top_section',
        [
            'title'       => esc_html__( 'Header Topbar Settings', 'metisse' ),
            'description' => esc_html__( 'Header Topbar Controls.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_topbar_switch',
            'label'       => esc_html__( 'Header Topbar Switch', 'metisse' ),
            'description' => esc_html__( 'Header Topbar switch On/Off', 'metisse' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );    
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'enable_bottom_menu',
            'label'       => esc_html__( 'Enable Bottom Menu Switch', 'metisse' ),
            'description' => esc_html__( 'Enable Bottom Menu On/Off', 'metisse' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );    

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_lang',
            'label'       => esc_html__( 'Header Language Switch', 'metisse' ),
            'description' => esc_html__( 'Header Language On/Off', 'metisse' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_currency',
            'label'       => esc_html__( 'Header Currency Switch', 'metisse' ),
            'description' => esc_html__( 'Header Currency On/Off', 'metisse' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],  
        ]
    ); 
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_multicurrency_shortcode',
            'label'    => esc_html__( 'Multi Currency Shortcode', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '[your_short_code]', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting'  => 'metisse_header_currency',
                    'operator' => '==',
                    'value'    => true,
                ]
            ],
        ]
    );
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_account',
            'label'       => esc_html__( 'Header Account Switch', 'metisse' ),
            'description' => esc_html__( 'Header Account On/Off', 'metisse' ),
            'section'     => 'header_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 


    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_welcome_text',
            'label'    => esc_html__( 'Welcome Text', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( 'FREE Express Shipping On Orders $570+', 'metisse' ),
            'priority' => 10,
        ]
    );    
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_tel_subtitle',
            'label'    => esc_html__( 'Phone Subtitle', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( 'Hotline: ', 'metisse' ),
            'priority' => 10,
        ]
    );    
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_tel_text',
            'label'    => esc_html__( 'Phone Number', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '+(402) 763 282 46 ', 'metisse' ),
            'priority' => 10,
        ]
    );    

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_tel_link',
            'label'    => esc_html__( 'Phone Number URL', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '402-763-282-46 ', 'metisse' ),
            'priority' => 10,
        ]
    );    

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_fb_text',
            'label'    => esc_html__( 'Facebook Text', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( '7500k Followers ', 'metisse' ),
            'priority' => 10,
        ]
    );    
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_fb_link',
            'label'    => esc_html__( 'Facebook Link', 'metisse' ),
            'section'  => 'header_top_section',
            'default'  => esc_html__( 'mybook.com', 'metisse' ),
            'priority' => 10,
        ]
    );    
}
header_top_section();

function header_main_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'header_main_section',
        [
            'title'       => esc_html__( 'Header Main Settings', 'metisse' ),
            'description' => esc_html__( 'Header Main Controls.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );
    // header_top_bar section 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_elementor_switch',
            'label'       => esc_html__( 'Header Custom/Elementor Switch', 'metisse' ),
            'description' => esc_html__( 'Header Custom/Elementor On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Radio_Image(
        [
            'settings'    => 'header_layout_custom',
            'label'       => esc_html__( 'Chose Header Style', 'metisse' ),
            'section'     => 'header_main_section',
            'priority'    => 10,
            'choices'     => [
                'header_1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
                'header_2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
                'header_3'  => get_template_directory_uri() . '/inc/img/header/header-3.png',
                'header_4'  => get_template_directory_uri() . '/inc/img/header/header-4.png',
                'header_5'  => get_template_directory_uri() . '/inc/img/header/header-5.png',
                'header_6'  => get_template_directory_uri() . '/inc/img/header/header-6.png',
            ],
            'default'     => 'header_1',
            'active_callback' => [
                [
                    'setting' => 'metisse_header_elementor_switch',
                    'operator' => '==',
                    'value' => false
                ]
            ]
        ]
    );

    $header_posttype = array(
        'post_type'      => 'tp-header',
        'posts_per_page' => -1,
    );
    $header_posttype_loop = get_posts($header_posttype);

    $header_post_obj_arr = array();
    foreach($header_posttype_loop as $post){
        $header_post_obj_arr[$post->ID] = $post->post_title;
    }


    wp_reset_query();


    new \Kirki\Field\Select(
        [
            'settings'    => 'metisse_header_templates',
            'label'       => esc_html__( 'Elementor Header Template', 'metisse' ),
            'section'     => 'header_main_section',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => $header_post_obj_arr,
            'active_callback' => [
                [
                    'setting' => 'metisse_header_elementor_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
   
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_right_switch',
            'label'       => esc_html__( 'Header Right Switch', 'metisse' ),
            'description' => esc_html__( 'Header Right On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_hamburger',
            'label'       => esc_html__( 'Header Hamburger Switch', 'metisse' ),
            'description' => esc_html__( 'Header Hamburger On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_category',
            'label'       => esc_html__( 'Header Category Switch', 'metisse' ),
            'description' => esc_html__( 'Header Category On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_search',
            'label'       => esc_html__( 'Header Search Switch', 'metisse' ),
            'description' => esc_html__( 'Header Search On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_compare',
            'label'       => esc_html__( 'Header Compare Switch', 'metisse' ),
            'description' => esc_html__( 'Header Compare On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_wishlist',
            'label'       => esc_html__( 'Header Wishlist Switch', 'metisse' ),
            'description' => esc_html__( 'Header Wishlist On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_cart',
            'label'       => esc_html__( 'Header Cart Switch', 'metisse' ),
            'description' => esc_html__( 'Header Cart On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_header_login',
            'label'       => esc_html__( 'Header Login Switch', 'metisse' ),
            'description' => esc_html__( 'Header Login On/Off', 'metisse' ),
            'section'     => 'header_main_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );    
}
header_main_section();

function preloader_section(){

    new \Kirki\Section(
        'preloader_section',
        [
            'title'       => esc_html__( 'Preloader Settings', 'metisse' ),
            'description' => esc_html__( 'Preloader Controls.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_preloader_switch',
            'label'       => esc_html__( 'Preloader Switch', 'metisse' ),
            'description' => esc_html__( 'Preloader On/Off', 'metisse' ),
            'section'     => 'preloader_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

     new \Kirki\Field\Text(
        [
            'settings' => 'metisse_preloader_text',
            'label'    => esc_html__( 'Preloader Text', 'metisse' ),
            'section'  => 'preloader_section',
            'default'  => esc_html__( 'metisse', 'metisse' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_preloader_loading_text',
            'label'    => esc_html__( 'Preloader Loading Text', 'metisse' ),
            'section'  => 'preloader_section',
            'default'  => esc_html__( 'Loading', 'metisse' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'metisse_preloader_logo',
            'label'       => esc_html__( 'Preloader Logo Icon', 'metisse' ),
            'description' => esc_html__( 'Preloader Logo Here', 'metisse' ),
            'section'     => 'preloader_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/preloader/preloader-icon.svg',
        ]
    );   
}

preloader_section();

function back_to_top_section(){

    new \Kirki\Section(
        'back_to_top_section',
        [
            'title'       => esc_html__( 'Back To Top Settings', 'metisse' ),
            'description' => esc_html__( 'Back To Top Controls.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 100,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_backtotop',
            'label'       => esc_html__( 'Preloader Switch', 'metisse' ),
            'description' => esc_html__( 'Preloader On/Off', 'metisse' ),
            'section'     => 'back_to_top_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 
}

back_to_top_section();

// shop_section
function shop_settings(){
    
    new \Kirki\Section(
        'shop_settings',
        [
            'title'       => esc_html__( 'Shop Settings', 'metisse' ),
            'description' => esc_html__( 'Shop Settings', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 101,
        ]
    );

    new \Kirki\Field\Select(
        [
            'settings'    => 'shop_layout',
            'label'       => esc_html__( 'Shop Layout', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'default',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'default' => esc_html__( 'Default', 'metisse' ),
                'right_sidebar' => esc_html__( 'Right Sidebar', 'metisse' ),
                'left_sidebar' => esc_html__( 'Left Sidebar', 'metisse' ),
                'no_sidebar' => esc_html__( 'No Sidebar', 'metisse' ),
                'full' => esc_html__( 'Full Layout', 'metisse' ),
                '1600px' => esc_html__( '1600px Layout', 'metisse' ),
            ],
        ]
    );

    new \Kirki\Field\Select(
        [
            'settings'    => 'shop_grid_layout',
            'label'       => esc_html__( 'Shop Grid Layout', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'default',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'default' => esc_html__( 'Default', 'metisse' ),
                '2' => esc_html__( 'Layout 2', 'metisse' ),
                '3' => esc_html__( 'Layout 3', 'metisse' ),
                '4' => esc_html__( 'Layout 4', 'metisse' ),
                '5' => esc_html__( 'Layout 5', 'metisse' ),
                '6' => esc_html__( 'Layout 6', 'metisse' ),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_sale_countdown_switch',
            'label'       => esc_html__( 'Enable Countdown', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'on',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'enable_trending_badge',
            'label'       => esc_html__( 'Enable Trending Badge', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'off',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );

    // badge settings
    new \Kirki\Field\Select(
        [
            'settings'    => 'trending_badge_showing_condition',
            'label'       => esc_html__( 'Trending Badge Showing', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'sales',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'sales' => esc_html__( 'Based On Sales', 'metisse' ),
                'rating' => esc_html__( 'Based On Rating', 'metisse' ),
                'review' => esc_html__( 'Based On Review', 'metisse' ),
                'views' => esc_html__( 'Based On Views', 'metisse' ),
            ],
            'active_callback' => [
                [
                    'setting' => 'enable_trending_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'sale_count_to_show',
            'label'    => esc_html__( 'Sales Count', 'metisse' ),
            'section'  => 'shop_settings',
            'default'  => esc_html__( '2', 'metisse' ),
            'description' => esc_html__( 'How many sales are need to show this badge', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'trending_badge_showing_condition',
                    'operator' => '==',
                    'value' => 'sales'
                ],
                [
                    'setting' => 'enable_trending_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'rating_count_to_show',
            'label'    => esc_html__( 'Rating Count', 'metisse' ),
            'section'  => 'shop_settings',
            'default'  => esc_html__( '4', 'metisse' ),
            'description' => esc_html__( 'How many rating are need to show this badge', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'trending_badge_showing_condition',
                    'operator' => '==',
                    'value' => 'rating'
                ],
                [
                    'setting' => 'enable_trending_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'review_count_to_show',
            'label'    => esc_html__( 'Review Count', 'metisse' ),
            'section'  => 'shop_settings',
            'default'  => esc_html__( '3', 'metisse' ),
            'description' => esc_html__( 'How many review are need to show this badge', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'trending_badge_showing_condition',
                    'operator' => '==',
                    'value' => 'review'
                ],
                [
                    'setting' => 'enable_trending_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
    new \Kirki\Field\Text(
        [
            'settings' => 'view_count_to_show',
            'label'    => esc_html__( 'View Count', 'metisse' ),
            'section'  => 'shop_settings',
            'default'  => esc_html__( '5', 'metisse' ),
            'description' => esc_html__( 'How many views are need to show this badge', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'trending_badge_showing_condition',
                    'operator' => '==',
                    'value' => 'views'
                ],
                [
                    'setting' => 'enable_trending_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'enable_hot_badge',
            'label'       => esc_html__( 'Enable Hot Badge', 'metisse' ),
            'section'     => 'shop_settings',
            'default'     => 'off',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );


    new \Kirki\Field\Text(
        [
            'settings' => 'date_diff_to_show',
            'label'    => esc_html__( 'Date Differcence Count', 'metisse' ),
            'section'  => 'shop_settings',
            'default'  => esc_html__( '10', 'metisse' ),
            'description' => esc_html__( 'How many days are showing this badge from upload date', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'enable_hot_badge',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

}
shop_settings();

function shop_single_settinges(){
    new \Kirki\Section(
        'shop_single_settinges',
        [
            'title'       => esc_html__( 'Product Single', 'metisse' ),
            'description' => esc_html__( 'Product Single Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 102,
        ]
    );

    new \Kirki\Field\Select(
        [
            'settings'    => 'shop_single_layout',
            'label'       => esc_html__( 'Product Signle Layout', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'default',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'default' => esc_html__( 'Default', 'metisse' ),
                'list' => esc_html__( 'List View', 'metisse' ),
                'grid' => esc_html__( 'Grid View', 'metisse' ),
                'vertical' => esc_html__( 'Vertical Tab View', 'metisse' ),
                'carousel' => esc_html__( 'Carousel View', 'metisse' ),
            ],
        ]
    );
    
    // category switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_category_switch',
            'label'       => esc_html__( 'Category Switch', 'metisse' ),
            'description' => esc_html__( 'Category On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 
    
    // category switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_buy_now_switch',
            'label'       => esc_html__( 'Buy Now Button Switch', 'metisse' ),
            'description' => esc_html__( 'Buy Now On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 

    // Stock switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_in_stock_switch',
            'label'       => esc_html__( 'Stock Switch', 'metisse' ),
            'description' => esc_html__( 'Stock On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 

    // flash sale switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_flash_sale_switch',
            'label'       => esc_html__( 'Flash Sale Switch', 'metisse' ),
            'description' => esc_html__( 'Flash Sale On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 
    // sale text
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_product_single_flash_sale_text',
            'label'    => esc_html__( 'Sale Text', 'metisse' ),
            'section'  => 'shop_single_settinges',
            'default'  => esc_html__( 'Flash Sale end in: ', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'metisse_product_single_flash_sale_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

    // Stock Left switch
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_stock_left_switch',
            'label'       => esc_html__( 'Stock Left Switch', 'metisse' ),
            'description' => esc_html__( 'Stock Left On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 
    // sale text
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_product_single_stock_left_count',
            'label'    => esc_html__( 'Stock Left Text', 'metisse' ),
            'description' => esc_html__( 'How many items are left when you want to show it', 'metisse' ),
            'default'  => esc_html__( '49', 'metisse' ),
            'section'  => 'shop_single_settinges',
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'metisse_product_single_stock_left_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

     // Compare Hide switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_compare_switch',
            'label'       => esc_html__( 'Compare Switch', 'metisse' ),
            'description' => esc_html__( 'Compare On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

     // Wishlist Hide switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_wishlist_switch',
            'label'       => esc_html__( 'Wishlist Switch', 'metisse' ),
            'description' => esc_html__( 'Wishlist On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

     // sku Hide switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_sku_switch',
            'label'       => esc_html__( 'SKU Switch', 'metisse' ),
            'description' => esc_html__( 'SKU On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

     // Categories switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_categories_switch',
            'label'       => esc_html__( 'Categories Switch', 'metisse' ),
            'description' => esc_html__( 'Categories On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

     // Tags switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_tags_switch',
            'label'       => esc_html__( 'Tags Switch', 'metisse' ),
            'description' => esc_html__( 'Tags On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

     // Social switch
     new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_social_switch',
            'label'       => esc_html__( 'Social Switch', 'metisse' ),
            'description' => esc_html__( 'Social On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    );

    
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_product_single_payment_switch',
            'label'       => esc_html__( 'Payment Info Switch', 'metisse' ),
            'description' => esc_html__( 'Payment Info On/Off', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 

    // product single payment text
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_product_single_payment_text',
            'label'    => esc_html__( 'Payment Text', 'metisse' ),
            'section'  => 'shop_single_settinges',
            'default'  => esc_html__( 'Guaranteed safe & secure checkout', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'metisse_product_single_payment_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );

    // product single payment
    new \Kirki\Field\Image(
        [
            'settings'    => 'metisse_product_single_payment_img',
            'label'       => esc_html__( 'Payment Image', 'metisse' ),
            'description' => esc_html__( 'Payment Image add/remove', 'metisse' ),
            'section'     => 'shop_single_settinges',
            'active_callback' => [
                [
                    'setting' => 'metisse_product_single_payment_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
}
shop_single_settinges();


function free_shipping_settings(){
    new \Kirki\Section(
        'free_shipping_settings',
        [
            'title'       => esc_html__( 'Free Shipping Settings', 'metisse' ),
            'description' => esc_html__( 'Free Shipping Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 102,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'enable_free_shipping_bar',
            'label'       => esc_html__( 'Shipping Bar Switch', 'metisse' ),
            'description' => esc_html__( 'Shipping Bar On/Off', 'metisse' ),
            'section'     => 'free_shipping_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 


    new \Kirki\Field\Text(
        [
            'settings' => 'shipping_progress_bar_amount',
            'label' => esc_attr__( 'Goal Amount', 'metisse' ),
            'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'metisse' ),
            'section'  => 'free_shipping_settings',
            'default'  => '100',
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'shipping_progress_bar_location_mini_cart',
            'label'       => esc_html__( 'Cartmini Switch', 'metisse' ),
            'description' => esc_html__( 'Enable For Cartmini', 'metisse' ),
            'section'     => 'free_shipping_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'shipping_progress_bar_location_card_page',
            'label'       => esc_html__( 'Cart Page Switch', 'metisse' ),
            'description' => esc_html__( 'Enable For Cart Page', 'metisse' ),
            'section'     => 'free_shipping_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    ); 

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'shipping_progress_bar_location_checkout',
            'label'       => esc_html__( 'Checkout Page Switch', 'metisse' ),
            'description' => esc_html__( 'Enable For Checkout Page', 'metisse' ),
            'section'     => 'free_shipping_settings',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    ); 

    new \Kirki\Field\Textarea(
        [
            'settings' => 'shipping_progress_bar_message_initial',
            'label'    => esc_html__( 'Initial Message', 'metisse' ),
            'section'  => 'free_shipping_settings',
            'default' => 'Add [remainder] to cart and get free shipping!',
            'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );
    new \Kirki\Field\Textarea(
        [
            'settings' => 'shipping_progress_bar_message_success',
            'label'    => esc_html__( 'Success message', 'metisse' ),
            'section'  => 'free_shipping_settings',
            'default' => 'Your order qualifies for free shipping!',
            'description' => esc_attr__( 'Message to show after reaching 100%.', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'enable_free_shipping_bar',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );


}
free_shipping_settings();


// offcanvas_side_section
function offcanvas_side_section(){
    // header_top_bar section 
    new \Kirki\Section(
        'offcanvas_side_section',
        [
            'title'       => esc_html__( 'Offcanvas Info', 'metisse' ),
            'description' => esc_html__( 'Offcanvas Information.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 110,
        ]
    );

    new \Kirki\Field\Select(
        [
            'settings'    => 'metisse_offcanvas_style',
            'label'       => esc_html__( 'Choose Offcanvas Style', 'metisse' ),
            'section'     => 'offcanvas_side_section',
            'default'     => 'default',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                'default' => esc_html__( 'Default', 'metisse' ),
                'dark_brown' => esc_html__( 'Dark Brown', 'metisse' ),
                'brown' => esc_html__( 'Brown', 'metisse' ),
                'green' => esc_html__( 'Green', 'metisse' ),
            ],
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'metisse_offcanvas_logo',
            'label'       => esc_html__( 'Offcanvas Logo', 'metisse' ),
            'description' => esc_html__( 'Offcanvas Logo Here', 'metisse' ),
            'section'     => 'offcanvas_side_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
        ]
    );   

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_offcanvas_category_menu_switch',
            'label'       => esc_html__( 'Category Menu Switch', 'metisse' ),
            'description' => esc_html__( 'Category Menu On/Off', 'metisse' ),
            'section'     => 'offcanvas_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_offcanvas_btn_text',
            'label'    => esc_html__( 'Button Text', 'metisse' ),
            'section'  => 'offcanvas_side_section',
            'default'  => esc_html__( 'Contact Us', 'metisse' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\URL(
        [
            'settings' => 'metisse_offcanvas_btn_url',
            'label'    => esc_html__( 'Button URL', 'metisse' ),
            'section'  => 'offcanvas_side_section',
            'default'  => '#',
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_offcanvas_lang_switch',
            'label'       => esc_html__( 'Language Switch', 'metisse' ),
            'description' => esc_html__( 'Language On/Off', 'metisse' ),
            'section'     => 'offcanvas_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_offcanvas_multicurrency_switch',
            'label'       => esc_html__( 'Currency Switch', 'metisse' ),
            'description' => esc_html__( 'Currency On/Off', 'metisse' ),
            'section'     => 'offcanvas_side_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_offcanvas_multicurrency_shortcode',
            'label'    => esc_html__( 'Your Shortcode', 'metisse' ),
            'section'  => 'offcanvas_side_section',
            'default'  => esc_html__( '[shortcode]', 'metisse' ),
            'priority' => 10,
            'active_callback' => [
                [
                    'setting' => 'metisse_offcanvas_multicurrency_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]

        ]
    );
}
offcanvas_side_section();


// header_logo_section
function header_logo_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_logo_section',
        [
            'title'       => esc_html__( 'Header Logo', 'metisse' ),
            'description' => esc_html__( 'Header Logo Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 130,
        ]
    );

    // header_logo_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_logo',
            'label'       => esc_html__( 'Header Logo', 'metisse' ),
            'description' => esc_html__( 'Theme Default/Primary Logo Here', 'metisse' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
        ]
    );
    new \Kirki\Field\Image(
        [
            'settings'    => 'header_secondary_logo',
            'label'       => esc_html__( 'Header Secondary Logo', 'metisse' ),
            'description' => esc_html__( 'Theme Secondary Logo Here', 'metisse' ),
            'section'     => 'header_logo_section',
            'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.svg',
        ]
    );

    // Contacts Text 
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_logo_width',
            'label'    => esc_html__( 'Logo Width', 'metisse' ),
            'section'  => 'header_logo_section',
            'default'  => esc_html__( '135', 'metisse' ),
            'priority' => 10,
        ]
    );
}
header_logo_section();


// header_logo_section
function header_breadcrumb_section(){
    // header_logo_section section 
    new \Kirki\Section(
        'header_breadcrumb_section',
        [
            'title'       => esc_html__( 'Breadcrumb', 'metisse' ),
            'description' => esc_html__( 'Breadcrumb Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'breadcrumb_switch',
            'label'       => esc_html__( 'Breadcrumb Switch', 'metisse' ),
            'description' => esc_html__( 'Breadcrumb On/Off', 'metisse' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
            
        ]
    ); 

    // header_logo_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'breadcrumb_image',
            'label'       => esc_html__( 'Breadcrumb Image', 'metisse' ),
            'description' => esc_html__( 'Breadcrumb Image add/remove', 'metisse' ),
            'section'     => 'header_breadcrumb_section',
        ]
    );
    new \Kirki\Field\Color(
        [
            'settings'    => 'breadcrumb_bg_color',
            'label'       => __( 'Breadcrumb BG Color', 'metisse' ),
            'description' => esc_html__( 'You can change breadcrumb bg color from here.', 'metisse' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => '#f3fbfe',
        ]
    );

    new \Kirki\Field\Dimensions(
        [
            'settings'    => 'breadcrumb_padding',
            'label'       => esc_html__( 'Padding Control', 'metisse' ),
            'description' => esc_html__( 'Padding', 'metisse' ),
            'section'     => 'header_breadcrumb_section',
            'default'     => [
                'padding-top'  => '',
                'padding-bottom' => '',
            ],
        ]
    );
    new \Kirki\Field\Typography(
        [
            'settings'    => 'breadcrumb_typography',
            'label'       => esc_html__( 'Typography Control', 'metisse' ),
            'description' => esc_html__( 'The full set of options.', 'metisse' ),
            'section'     => 'header_breadcrumb_section',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => '.tpbreadcrumb-title',
                ],
            ],
        ]
    );


}
header_breadcrumb_section();

function full_site_typography(){
    // header_logo_section section 
    new \Kirki\Section(
        'full_site_typography',
        [
            'title'       => esc_html__( 'Typography', 'metisse' ),
            'description' => esc_html__( 'Typography Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );

    new \Kirki\Field\Typography(
        [
            'settings'    => 'full_site_typography_settings',
            'label'       => esc_html__( 'Typography Control', 'metisse' ),
            'description' => esc_html__( 'The full set of options.', 'metisse' ),
            'section'     => 'full_site_typography',
            'priority'    => 10,
            'transport'   => 'auto',
            'default'     => [
                'font-family'     => '',
                'variant'         => '',
                'color'           => '',
                'font-size'       => '',
                'line-height'     => '',
                'text-align'      => '',
            ],
            'output'      => [
                [
                    'element' => '.tpbreadcrumb-title',
                ],
            ],
        ]
    );
}
full_site_typography();


function metisse_theme_colors(){
    new \Kirki\Section(
        'metisse_theme_color_section',
        [
            'title'       => esc_html__( 'Theme Colors', 'metisse' ),
            'description' => esc_html__( 'Theme Color Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'metisse_color_option_primary',
            'label'       => __( 'Primary Color', 'metisse' ),
            'description' => esc_html__( 'Choose Your Color', 'metisse' ),
            'section'     => 'metisse_theme_color_section',
            'default'     => '#0989FF',
        ]
    ); 

    new \Kirki\Field\Color(
        [
            'settings'    => 'metisse_color_option_secondary',
            'label'       => __( 'Secondary Color', 'metisse' ),
            'description' => esc_html__( 'Choose Your Color', 'metisse' ),
            'section'     => 'metisse_theme_color_section',
            'default'     => '#821F40',
        ]
    ); 

    new \Kirki\Field\Color(
        [
            'settings'    => 'metisse_color_option_brown',
            'label'       => __( 'Theme Brown Color', 'metisse' ),
            'description' => esc_html__( 'Choose Your Color', 'metisse' ),
            'section'     => 'metisse_theme_color_section',
            'default'     => '#BD844C',
        ]
    ); 

    new \Kirki\Field\Color(
        [
            'settings'    => 'metisse_color_option_green',
            'label'       => __( 'Theme Green Color', 'metisse' ),
            'description' => esc_html__( 'Choose Your Color', 'metisse' ),
            'section'     => 'metisse_theme_color_section',
            'default'     => '#678E61',
        ]
    ); 
}

metisse_theme_colors();

// footer layout
function footer_layout_section(){

    new \Kirki\Section(
        'footer_layout_section',
        [
            'title'       => esc_html__( 'Footer', 'metisse' ),
            'description' => esc_html__( 'Footer Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 190,
        ]
    );
    // footer_widget_number section 
    new \Kirki\Field\Select(
        [
            'settings'    => 'footer_widget_number',
            'label'       => esc_html__( 'Footer Widget Number', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => '4',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => [
                '1' => esc_html__( '1', 'metisse' ),
                '2' => esc_html__( '2', 'metisse' ),
                '3' => esc_html__( '3', 'metisse' ),
                '4' => esc_html__( '4', 'metisse' ),
            ],
        ]
    );


    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_footer_elementor_switch',
            'label'       => esc_html__( 'Footer Custom/Elementor Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Custom/Elementor On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    ); 

    new \Kirki\Field\Radio_Image(
        [
            'settings'    => 'footer_layout_custom',
            'label'       => esc_html__( 'Footer Layout Control', 'metisse' ),
            'section'     => 'footer_layout_section',
            'priority'    => 10,
            'choices'     => [
                'footer_1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
                'footer_2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
                'footer_3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
                'footer_4' => get_template_directory_uri() . '/inc/img/footer/footer-4.png',
                'footer_5' => get_template_directory_uri() . '/inc/img/footer/footer-5.png',
                'footer_6' => get_template_directory_uri() . '/inc/img/footer/footer-6.png',
            ],
            'default'     => 'footer_1',
            'active_callback' => [
                [
                    'setting' => 'metisse_footer_elementor_switch',
                    'operator' => '==',
                    'value' => false
                ]
            ]
        ]
    );

    $footer_posttype = array(
        'post_type'      => 'tp-footer',
        'posts_per_page' => -1,
    );
    $footer_posttype_loop = get_posts($footer_posttype);
    $footer_post_obj_arr = array();
    foreach($footer_posttype_loop as $post){
        $footer_post_obj_arr[$post->ID] = $post->post_title;
    }

    wp_reset_postdata();

    new \Kirki\Field\Select(
        [
            'settings'    => 'metisse_footer_templates',
            'label'       => esc_html__( 'Elementor Footer Template', 'metisse' ),
            'section'     => 'footer_layout_section',
            'placeholder' => esc_html__( 'Choose an option', 'metisse' ),
            'choices'     => $footer_post_obj_arr,
            'active_callback' => [
                [
                    'setting' => 'metisse_footer_elementor_switch',
                    'operator' => '==',
                    'value' => true
                ]
            ]
        ]
    );



    // footer_layout_section section 
    new \Kirki\Field\Image(
        [
            'settings'    => 'footer_payment_img',
            'label'       => esc_html__( 'Footer Payment Image', 'metisse' ),
            'description' => esc_html__( 'Footer Payment Image add/remove', 'metisse' ),
            'section'     => 'footer_layout_section',
        ]
    );

    new \Kirki\Field\Color(
        [
            'settings'    => 'metisse_footer_bg_color',
            'label'       => __( 'Footer BG Color', 'metisse' ),
            'description' => esc_html__( 'You can change footer bg color from here.', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => '#F4F7F9',
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_style_2_switch',
            'label'       => esc_html__( 'Footer Style 2 Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Style 2 On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );      
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_style_3_switch',
            'label'       => esc_html__( 'Footer Style 3 Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Style 3 On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );      
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_style_4_switch',
            'label'       => esc_html__( 'Footer Style 4 Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Style 4 On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );      
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_style_5_switch',
            'label'       => esc_html__( 'Footer Style 5 Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Style 5 On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );      
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'footer_style_6_switch',
            'label'       => esc_html__( 'Footer Style 6 Switch', 'metisse' ),
            'description' => esc_html__( 'Footer Style 6 On/Off', 'metisse' ),
            'section'     => 'footer_layout_section',
            'default'     => 'off',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'metisse' ),
                'off' => esc_html__( 'Disable', 'metisse' ),
            ],
        ]
    );      

    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_copyright',
            'label'    => esc_html__( 'Footer Copyright', 'metisse' ),
            'section'  => 'footer_layout_section',
            'default'  => esc_html__( '© 2023 All Rights Reserved | WordPress Theme by Themepure', 'metisse' ),
            'priority' => 10,
        ]
    );  
}
footer_layout_section();


// blog_section
function blog_section(){
    // blog_section section 
    new \Kirki\Section(
        'blog_section',
        [
            'title'       => esc_html__( 'Blog Section', 'metisse' ),
            'description' => esc_html__( 'Blog Section Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'metisse_blog_btn_switch',
            'label'       => esc_html__( 'Blog BTN On/Off', 'metisse' ),
            'section'     => 'blog_section',
            'default'     => true,
            'priority' => 10,
        ]
    ); 

    // blog_section BTN 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'metisse_blog_cat',
            'label'    => esc_html__( 'Blog Category Meta On/Off', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => false,
            'priority' => 10,
        ]
    );

    // blog_section Author Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'metisse_blog_author',
            'label'    => esc_html__( 'Blog Author Meta On/Off', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );
    // blog_section Date Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'metisse_blog_date',
            'label'    => esc_html__( 'Blog Date Meta On/Off', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );

    // blog_section Comments Meta 
    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'metisse_blog_comments',
            'label'    => esc_html__( 'Blog Comments Meta On/Off', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => true,
            'priority' => 10,
        ]
    );


    // blog_section Blog BTN text 
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_blog_btn',
            'label'    => esc_html__( 'Blog Button Text', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => "Read More",
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings' => 'metisse_blog_single_social',
            'label'    => esc_html__( 'Single Blog Social Share', 'metisse' ),
            'section'  => 'blog_section',
            'default'  => false,
            'priority' => 10,
        ]
    );

}
blog_section();


// 404 section
function error_404_section(){
    // 404_section section 
    new \Kirki\Section(
        'error_404_section',
        [
            'title'       => esc_html__( '404 Page', 'metisse' ),
            'description' => esc_html__( '404 Page Settings.', 'metisse' ),
            'panel'       => 'panel_id',
            'priority'    => 150,
        ]
    );

    new \Kirki\Field\Image(
        [
            'settings'    => 'metisse_error_thumb',
            'label'       => esc_html__( 'Error Image', 'metisse' ),
            'description' => esc_html__( 'rror Image Here', 'metisse' ),
            'section'     => 'error_404_section',
            'default'     => get_template_directory_uri() . '/assets/img/error/error.png',
        ]
    );  

    // 404_section 
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_error_title',
            'label'    => esc_html__( 'Not Found Title', 'metisse' ),
            'section'  => 'error_404_section',
            'default'  => "Oops! Page not found",
            'priority' => 10,
        ]
    );

    // 404_section description
    new \Kirki\Field\Textarea(
        [
            'settings' => 'metisse_error_desc',
            'label'    => esc_html__( 'Not Found description', 'metisse' ),
            'section'  => 'error_404_section',
            'default'  => "Whoops, this is embarassing. Looks like the page you were looking for was not found.",
            'priority' => 10,
        ]
    );

    // 404_section description
    new \Kirki\Field\Text(
        [
            'settings' => 'metisse_error_link_text',
            'label'    => esc_html__( 'Error Link Text', 'metisse' ),
            'section'  => 'error_404_section',
            'default'  => "Back To Home",
            'priority' => 10,
        ]
    );
}
error_404_section();