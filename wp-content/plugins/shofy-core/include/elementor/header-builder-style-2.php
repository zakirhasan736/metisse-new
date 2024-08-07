<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Header_02 extends Widget_Base {

    use \TPCore\Widgets\TPCoreElementFunctions;

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tp-header-style-2';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Header Builder Style 2', 'tpcore' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'tp-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'tpcore' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'tpcore' ];
	}


    /**
     * Menu index.
     *
     * @access protected
     * @var $nav_menu_index
     */
    protected $nav_menu_index = 1;

    /**
     * Retrieve the menu index.
     *
     * Used to get index of nav menu.
     *
     * @since 1.3.0
     * @access protected
     *
     * @return string nav index.
     */
    protected function get_nav_menu_index() {
        return $this->nav_menu_index++;
    }

    /**
     * Retrieve the list of available menus.
     *
     * Used to get the list of available menus.
     *
     * @since 1.3.0
     * @access private
     *
     * @return array get WordPress menus list.
     */
    private function get_available_menus() {

        $menus = wp_get_nav_menus();

        $options = [];

        foreach ( $menus as $menu ) {
            $options[ $menu->slug ] = $menu->name;
        }

        return $options;
    }



     protected static function get_profile_names()
     {
         return [
             '500px' => esc_html__('500px', 'tpcore'),
             'apple' => esc_html__('Apple', 'tpcore'),
             'behance' => esc_html__('Behance', 'tpcore'),
             'bitbucket' => esc_html__('BitBucket', 'tpcore'),
             'codepen' => esc_html__('CodePen', 'tpcore'),
             'delicious' => esc_html__('Delicious', 'tpcore'),
             'deviantart' => esc_html__('DeviantArt', 'tpcore'),
             'digg' => esc_html__('Digg', 'tpcore'),
             'dribbble' => esc_html__('Dribbble', 'tpcore'),
             'email' => esc_html__('Email', 'tpcore'),
             'facebook' => esc_html__('Facebook', 'tpcore'),
             'flickr' => esc_html__('Flicker', 'tpcore'),
             'foursquare' => esc_html__('FourSquare', 'tpcore'),
             'github' => esc_html__('Github', 'tpcore'),
             'houzz' => esc_html__('Houzz', 'tpcore'),
             'instagram' => esc_html__('Instagram', 'tpcore'),
             'jsfiddle' => esc_html__('JS Fiddle', 'tpcore'),
             'linkedin' => esc_html__('LinkedIn', 'tpcore'),
             'medium' => esc_html__('Medium', 'tpcore'),
             'pinterest' => esc_html__('Pinterest', 'tpcore'),
             'product-hunt' => esc_html__('Product Hunt', 'tpcore'),
             'reddit' => esc_html__('Reddit', 'tpcore'),
             'slideshare' => esc_html__('Slide Share', 'tpcore'),
             'snapchat' => esc_html__('Snapchat', 'tpcore'),
             'soundcloud' => esc_html__('SoundCloud', 'tpcore'),
             'spotify' => esc_html__('Spotify', 'tpcore'),
             'stack-overflow' => esc_html__('StackOverflow', 'tpcore'),
             'tripadvisor' => esc_html__('TripAdvisor', 'tpcore'),
             'tumblr' => esc_html__('Tumblr', 'tpcore'),
             'twitch' => esc_html__('Twitch', 'tpcore'),
             'twitter' => esc_html__('Twitter', 'tpcore'),
             'vimeo' => esc_html__('Vimeo', 'tpcore'),
             'vk' => esc_html__('VK', 'tpcore'),
             'website' => esc_html__('Website', 'tpcore'),
             'whatsapp' => esc_html__('WhatsApp', 'tpcore'),
             'wordpress' => esc_html__('WordPress', 'tpcore'),
             'xing' => esc_html__('Xing', 'tpcore'),
             'yelp' => esc_html__('Yelp', 'tpcore'),
             'youtube' => esc_html__('YouTube', 'tpcore'),
         ];
     }
     


	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */

    protected function register_controls(){
        $this->register_controls_section();
        $this->style_tab_content();
    } 

	protected function register_controls_section() {

        // layout Panel
        $this->start_controls_section(
            'tp_header_top',
            [
                'label' => esc_html__('Header Info', 'tpcore'),
            ]
        );
        $this->add_control(
            'tp_header_top_switch',
            [
                'label' => esc_html__( 'Header Topbar Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',                
            ]
        );        
        $this->add_control(
            'tp_header_top_lang_switch',
            [
                'label' => esc_html__( 'Header Language Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',                
            ]
        );        
        $this->add_control(
            'tp_header_top_setting_switch',
            [
                'label' => esc_html__( 'Header Setting Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
                
            ]
        );        
        $this->add_control(
            'tp_header_top_currency_switch',
            [
                'label' => esc_html__( 'Header Currency Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',                
            ]
        );        


        $this->add_control(
        'tp_header_top_currency_shortcode',
         [
            'label'       => esc_html__( 'Currency Shortcode', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( '[shofy_currency_shortcode]', 'tpcore' ),
            'placeholder' => esc_html__( 'Enter Your Shortcode', 'tpcore' ),
            'condition' => [
               'tp_header_top_currency_switch' => 'yes',
           ],
           
         ]
        );

        $this->add_control(
            'tp_header_right_switch',
            [
                'label' => esc_html__( 'Header Right Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );        

        $this->add_control(
            'tp_header_search_switch',
            [
                'label' => esc_html__( 'Header Search Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );        

        $this->add_control(
            'tp_header_wishlist_switch',
            [
                'label' => esc_html__( 'Header Wishlist Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );        

        $this->add_control(
            'tp_header_cart_switch',
            [
                'label' => esc_html__( 'Header Cart Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'tp_header_compare_switch',
            [
                'label' => esc_html__( 'Header Compare Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'tp_header_login_switch',
            [
                'label' => esc_html__( 'Header Login Switch', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'no',                
            ]
        );

        $this->add_control(
        'tp_header_login_text',
         [
            'label'       => esc_html__( 'Login Text', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Hello Sign In', 'tpcore' ),
            'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
            'condition' => [
               'tp_header_login_switch' => 'yes'
             ]
         ]
        );

        $this->add_control(
         'enable_bottom_menu',
         [
           'label'        => esc_html__( 'Enable Bottom Menu Switch', 'tpcore' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'tpcore' ),
           'label_off'    => esc_html__( 'Hide', 'tpcore' ),
           'return_value' => 'yes',
           'default'      => 'no',
         ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
         'tp_header_topbar_welcome_sec',
             [
               'label' => esc_html__( 'Welcome Text Controls', 'tpcore' ),
               'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
             ]
        );
        
         $this->add_control(
            'tp_header_topbar_welcome_text',
            [
               'label'       => esc_html__( 'Welcome Text', 'tpcore' ),
               'type'        => \Elementor\Controls_Manager::TEXT,
               'default'     => esc_html__( 'FREE Express Shipping On Orders $570+', 'tpcore' ),
               'placeholder' => esc_html__( 'Add Your text', 'tpcore' ),
            ]
         );

            $this->add_control(
                  'tp_welcome_icon_type',
                  [
                     'label' => esc_html__('Select Icon Type', 'tpcore'),
                     'type' => \Elementor\Controls_Manager::SELECT,
                     'default' => 'image',
                     'options' => [
                        'image' => esc_html__('Image', 'tpcore'),
                        'icon' => esc_html__('Icon', 'tpcore'),
                        'svg' => esc_html__('SVG', 'tpcore'),
                     ],
                  ]
            );
            $this->add_control(
                  'tp_welcome_icon_svg',
                  [
                     'show_label' => false,
                     'type' => Controls_Manager::TEXTAREA,
                     'label_block' => true,
                     'placeholder' => esc_html__('SVG Code Here', 'tpcore'),
                     'condition' => [
                        'tp_welcome_icon_type' => 'svg',
                     ]
                  ]
            );

            $this->add_control(
                  'tp_welcome_icon_image',
                  [
                     'label' => esc_html__('Upload Icon Image', 'tpcore'),
                     'type' => Controls_Manager::MEDIA,
                     'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                     ],
                     'condition' => [
                        'tp_welcome_icon_type' => 'image',
                     ]
                  ]
            );

            if (tp_is_elementor_version('<', '2.6.0')) {
                  $this->add_control(
                     'tp_welcome_icon',
                     [
                        'show_label' => false,
                        'type' => Controls_Manager::ICON,
                        'label_block' => true,
                        'default' => 'fa fa-star',
                        'condition' => [
                              'tp_welcome_icon_type' => 'icon',
                        ]
                     ]
                  );
            } else {
                  $this->add_control(
                     'tp_welcome_selected_icon',
                     [
                        'show_label' => false,
                        'type' => Controls_Manager::ICONS,
                        'fa4compatibility' => 'icon',
                        'label_block' => true,
                        'default' => [
                              'value' => 'fas fa-star',
                              'library' => 'solid',
                        ],
                        'condition' => [
                              'tp_welcome_icon_type' => 'icon',
                        ]
                     ]
                  );
            }
        
        $this->end_controls_section();

         // contact single 
         $this->start_controls_section(
            'tp_header_contact_call_sec',
               [
                  'label' => esc_html__( 'Contact Info', 'tpcore' ),
                  'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
               ]
         );
        
         $this->add_control(
               'tp_contact_single_icon_type',
               [
                  'label' => esc_html__('Select Icon Type', 'tpcore'),
                  'type' => \Elementor\Controls_Manager::SELECT,
                  'default' => 'image',
                  'options' => [
                     'image' => esc_html__('Image', 'tpcore'),
                     'icon' => esc_html__('Icon', 'tpcore'),
                     'svg' => esc_html__('SVG', 'tpcore'),
                  ],
               ]
         );
         $this->add_control(
               'tp_contact_single_icon_svg',
               [
                  'show_label' => false,
                  'type' => Controls_Manager::TEXTAREA,
                  'label_block' => true,
                  'placeholder' => esc_html__('SVG Code Here', 'tpcore'),
                  'condition' => [
                     'tp_contact_single_icon_type' => 'svg',
                  ]
               ]
         );

         $this->add_control(
               'tp_contact_single_icon_image',
               [
                  'label' => esc_html__('Upload Icon Image', 'tpcore'),
                  'type' => Controls_Manager::MEDIA,
                  'default' => [
                     'url' => Utils::get_placeholder_image_src(),
                  ],
                  'condition' => [
                     'tp_contact_single_icon_type' => 'image',
                  ]
               ]
         );

         if (tp_is_elementor_version('<', '2.6.0')) {
               $this->add_control(
                  'tp_contact_single_icon',
                  [
                     'show_label' => false,
                     'type' => Controls_Manager::ICON,
                     'label_block' => true,
                     'default' => 'fa fa-star',
                     'condition' => [
                           'tp_contact_single_icon_type' => 'icon',
                     ]
                  ]
               );
         } else {
               $this->add_control(
                  'tp_contact_single_selected_icon',
                  [
                     'show_label' => false,
                     'type' => Controls_Manager::ICONS,
                     'fa4compatibility' => 'icon',
                     'label_block' => true,
                     'default' => [
                           'value' => 'fas fa-star',
                           'library' => 'solid',
                     ],
                     'condition' => [
                           'tp_contact_single_icon_type' => 'icon',
                     ]
                  ]
               );
         }

         $this->add_control(
            'tp_contact_single_subtitle',
               [
                  'label'   => esc_html__( 'Contact Sub Title', 'tpcore' ),
                  'type'        => \Elementor\Controls_Manager::TEXT,
                  'default'     => esc_html__( 'Hotline:', 'tpcore' ),
                  'label_block' => true,
               ]
            );
         $this->add_control(
            'tp_contact_single_title',
               [
                  'label'   => esc_html__( 'Contact Title', 'tpcore' ),
                  'type'        => \Elementor\Controls_Manager::TEXT,
                  'default'     => esc_html__( '+012 235 4562', 'tpcore' ),
                  'label_block' => true,
               ]
         );
      
         $this->add_control(
            'tp_contact_single_type',
            [
               'label'   => esc_html__( 'Select Type', 'tpcore' ),
               'type' => \Elementor\Controls_Manager::SELECT,
               'options' => [
                  'email'  => esc_html__( 'Email', 'tpcore' ),
                  'phone'  => esc_html__( 'Phone', 'tpcore' ),
                  'map'  => esc_html__( 'Map', 'tpcore' ),
                  'default'  => esc_html__( 'Default', 'tpcore' ),
               ],
               'default' => 'default',
            ]
            );
   
            $this->add_control(
            'tp_contact_single_default_url',
            [
               'label'   => esc_html__( 'Default URL', 'tpcore' ),
               'type'        => \Elementor\Controls_Manager::URL,
               'default'     => [
                  'url'               => '#',
                  'is_external'       => true,
                  'nofollow'          => true,
                  'custom_attributes' => '',
                  ],
                  'placeholder' => esc_html__( 'Your URL', 'tpcore' ),
                  'label_block' => true,
                  'condition' => [
                     'tp_contact_single_type' => 'default'
                  ]
               ]
            );
            
            $this->add_control(
            'tp_contact_single_phone_url',
            [
               'label'   => esc_html__( 'Phone URL', 'tpcore' ),
               'type'        => \Elementor\Controls_Manager::URL,
               'default'     => [
                  'url'               => '#',
                  'is_external'       => true,
                  'nofollow'          => true,
                  'custom_attributes' => '',
                  ],
                  'placeholder' => esc_html__( 'Your URL', 'tpcore' ),
                  'label_block' => true,
                  'condition' => [
                     'tp_contact_single_type' => 'phone'
                  ]
               ]
            );
            $this->add_control(
            'tp_contact_single_mail_url',
            [
               'label'   => esc_html__( 'Email URL', 'tpcore' ),
               'type'        => \Elementor\Controls_Manager::URL,
               'default'     => [
                  'url'               => '#',
                  'is_external'       => true,
                  'nofollow'          => true,
                  'custom_attributes' => '',
                  ],
                  'placeholder' => esc_html__( 'Your URL', 'tpcore' ),
                  'label_block' => true,
                  'condition' => [
                     'tp_contact_single_type' => 'email'
                  ]
               ]
            );

            $this->add_control(
            'tp_contact_single_map_url',
            [
               'label'   => esc_html__( 'Map URL', 'tpcore' ),
               'type'        => \Elementor\Controls_Manager::URL,
               'default'     => [
                  'url'               => '#',
                  'is_external'       => true,
                  'nofollow'          => true,
                  'custom_attributes' => '',
                  ],
                  'placeholder' => esc_html__( 'Your URL', 'tpcore' ),
                  'label_block' => true,
                  'condition' => [
                     'tp_contact_single_type' => 'map'
                  ]
               ]
            );
        $this->end_controls_section();
        // contact single end



		// _tp_image
		$this->start_controls_section(
            '_tp_image',
            [
                'label' => esc_html__('Site Logo', 'tp-core'),
            ]
        );

        $this->add_control(
            'tp_image',
            [
                'label' => esc_html__( 'Choose Image', 'tp-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'tp_image_size',
				'label'   => __( 'Image Size', 'header-footer-elementor' ),
				'default' => 'medium',
			]
		);

        $this->end_controls_section();


		$this->start_controls_section(
            'section_menu',
            [
                'label' => __( 'Menu', 'header-footer-elementor' ),
            ]
        );

        $menus = $this->get_available_menus();

        if ( ! empty( $menus ) ) {
            $this->add_control(
                'menu',
                [
                    'label'        => __( 'Menu', 'header-footer-elementor' ),
                    'type'         => Controls_Manager::SELECT,
                    'options'      => $menus,
                    'default'      => array_keys( $menus )[0],
                    'save_default' => true,
                    /* translators: %s Nav menu URL */
                    'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'header-footer-elementor' ), admin_url( 'nav-menus.php' ) ),
                ]
            );
        } else {
            $this->add_control(
                'menu',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    /* translators: %s Nav menu URL */
                    'raw'             => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'header-footer-elementor' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        $this->add_control(
            'menu_last_item',
            [
                'label'     => __( 'Last Menu Item', 'header-footer-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'none' => __( 'Default', 'header-footer-elementor' ),
                    'cta'  => __( 'Button', 'header-footer-elementor' ),
                ],
                'default'   => 'none',
                'condition' => [
                    'layout!' => 'expandible',
                ],
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
            'category_menu_section',
            [
                'label' => __( 'Category Menu', 'header-footer-elementor' ),
            ]
        );

        $this->add_control(
         'category_menu_switch',
         [
           'label'        => esc_html__( 'Show Category Menu', 'tpcore' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'tpcore' ),
           'label_off'    => esc_html__( 'Hide', 'tpcore' ),
           'return_value' => 'yes',
           'default'      => 'no',
         ]
        );

        $this->add_control(
        'category_menu_text',
         [
            'label'       => esc_html__( 'Category Menu Text', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'All Department', 'tpcore' ),
            'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
         ]
        );
        
        $menus = $this->get_available_menus();

        if ( ! empty( $menus ) ) {
            $this->add_control(
                'category_menu',
                [
                    'label'        => __( 'Menu', 'header-footer-elementor' ),
                    'type'         => Controls_Manager::SELECT,
                    'options'      => $menus,
                    'default'      => array_keys( $menus )[0],
                    'save_default' => true,
                    /* translators: %s Nav menu URL */
                    'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'header-footer-elementor' ), admin_url( 'nav-menus.php' ) ),
                ]
            );
        } else {
            $this->add_control(
                'category_menu',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    /* translators: %s Nav menu URL */
                    'raw'             => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'header-footer-elementor' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        $this->add_control(
            'category_menu_last_item',
            [
                'label'     => __( 'Last Menu Item', 'header-footer-elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'none' => __( 'Default', 'header-footer-elementor' ),
                    'cta'  => __( 'Button', 'header-footer-elementor' ),
                ],
                'default'   => 'none',
                'condition' => [
                    'layout!' => 'expandible',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
         'tp_offcanvas_secs',
             [
               'label' => esc_html__( 'Offcanvas Controls', 'tpcore' ),
               'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
             ]
        );
        
        $this->add_control(
         'tp_offcanvas_category_switch',
         [
           'label'        => esc_html__( 'Enable Category Menu', 'tpcore' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'tpcore' ),
           'label_off'    => esc_html__( 'Hide', 'tpcore' ),
           'return_value' => 'yes',
           'default'      => 'no',
         ]
        );

        $this->add_control(
        'tp_offcanvas_category_text',
         [
            'label'       => esc_html__( 'Category Button Text', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'All Department', 'tpcore' ),
            'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
            'label_block' => true
         ]
        );

        $this->add_control(
         'shofy_offcanvas_style',
         [
           'label'   => esc_html__( 'Offcanvas Style', 'tpcore' ),
           'type' => \Elementor\Controls_Manager::SELECT,
           'options' => [
               'default'  => esc_html__( 'Default Style', 'tpcore' ),
               'dark_brown'  => esc_html__( 'Dark Brown Style', 'tpcore' ),
               'brown'  => esc_html__( 'Brown Style', 'tpcore' ),
               'green'  => esc_html__( 'Green Style', 'tpcore' ),
           ],
           'default' => 'default',
         ]
        );

        $this->add_control(
         'tp_offcanvas_lang_switch',
         [
           'label'        => esc_html__( 'Enable Language?', 'tpcore' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'tpcore' ),
           'label_off'    => esc_html__( 'Hide', 'tpcore' ),
           'return_value' => 'yes',
           'default'      => 'no',
         ]
        );
        $this->add_control(
         'tp_offcanvas_currency_switch',
         [
           'label'        => esc_html__( 'Enable Currency?', 'tpcore' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'tpcore' ),
           'label_off'    => esc_html__( 'Hide', 'tpcore' ),
           'return_value' => 'yes',
           'default'      => 'no',
         ]
        );
        $this->add_control(
        'tp_offcanvas_currency_shortcode',
         [
            'label'       => esc_html__( 'Currency Shortcode', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( '[code]', 'tpcore' ),
            'placeholder' => esc_html__( 'YOur Text', 'tpcore' ),
            'condition' => [
               'tp_offcanvas_currency_switch' => 'yes'
            ]
         ]
        );

        $this->add_control(
               'tp_side_logo',
               [
                  'label' => esc_html__( 'Choose Logo', 'tp-core' ),
                  'type' => \Elementor\Controls_Manager::MEDIA,
                  'default' => [
                     'url' => \Elementor\Utils::get_placeholder_image_src(),
                  ],
               ]
         );
         
         $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
               'name'    => 'tp_side_logo_size',
               'label'   => __( 'Image Size', 'header-footer-elementor' ),
               'default' => 'medium',
            ]
         );


        $this->end_controls_section();

        $this->start_controls_section(
         'tp_tpbtn_button_group',
               [
                  'label' => esc_html__('Offcanvas Button', 'tpcore'),
               ]
         );

         $this->add_control(
               'tp_tpbtn_button_show',
               [
                  'label' => esc_html__( 'Show Button', 'tpcore' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => esc_html__( 'Show', 'tpcore' ),
                  'label_off' => esc_html__( 'Hide', 'tpcore' ),
                  'return_value' => 'yes',
                  'default' => 'no',
               ]
         );

         $this->add_control(
               'tp_tpbtn_text',
               [
                  'label' => esc_html__('Offcanvas Button Text', 'tpcore'),
                  'type' => Controls_Manager::TEXT,
                  'default' => 'Contact Us',
                  'title' => esc_html__('Enter button text', 'tpcore'),
                  'label_block' => true,
                  'condition' => [
                     'tp_tpbtn_button_show' => 'yes'
                  ],
               ]
         );
         $this->add_control(
               'tp_tpbtn_link_type',
               [
                  'label' => esc_html__('Offcanvas Button' . ' Link Type', 'tpcore'),
                  'type' => Controls_Manager::SELECT,
                  'options' => [
                     '1' => 'Custom Link',
                     '2' => 'Internal Page',
                  ],
                  'default' => '1',
                  'label_block' => true,
                  'condition' => [
                     'tp_tpbtn_button_show' => 'yes'
                  ],
               ]
         );
         $this->add_control(
               'tp_tpbtn_link',
               [
                  'label' => esc_html__('Offcanvas Button' . ' link', 'tpcore'),
                  'type' => Controls_Manager::URL,
                  'dynamic' => [
                     'active' => true,
                  ],
                  'placeholder' => esc_html__('https://your-link.com', 'tpcore'),
                  'show_external' => false,
                  'default' => [
                     'url' => '#',
                     'is_external' => false,
                     'nofollow' => false,
                  ],
                  'condition' => [
                     'tp_tpbtn_link_type' => '1',
                     'tp_tpbtn_button_show' => 'yes'
                  ],
                  'label_block' => true,
               ]
         );
         $this->add_control(
               'tp_tpbtn_page_link',
               [
                  'label' => esc_html__('Select ' . 'Offcanvas Button' . ' Page', 'tpcore'),
                  'type' => Controls_Manager::SELECT2,
                  'label_block' => true,
                  'options' => tp_get_all_pages(),
                  'condition' => [
                     'tp_tpbtn_link_type' => '2',
                     'tp_tpbtn_button_show' => 'yes'
                  ]
               ]
         );
         $this->end_controls_section();
	}

    protected function style_tab_content(){
      $this->tp_icon_style('fact_box_icon', 'Welcome - Icon', '.tp-el-wel-icon span');
      $this->tp_basic_style_controls('wel_title', 'Welcome - Text', '.tp-el-wel-title');

      $this->tp_basic_style_controls('header_currency', 'Currency Dropdown - Style', '.tp-el-currency select option');
      $this->tp_link_controls_style('header_lang', 'Language Dropdown - Style', '.tp-el-language ul li a');
      $this->tp_link_controls_style('profile_links', 'Profile - Links', '.tp-el-prolink ul li a');

      $this->tp_input_controls_style('coming_box', 'Search - Box', '.tp-el-search-box');
      $this->tp_input_controls_style('coming_input', 'Search - Input', '.tp-el-search-input input');
      $this->tp_link_controls_style('search_btn', 'Search - Button', '.tp-el-search-input button');


      $this->tp_link_controls_style('action_btn', 'Action - Button', '.tp-el-action-btn');

      $this->tp_link_controls_style('category_btn', 'Category - Button', '.tp-el-category-btn');
    }

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$control_id = 'tpbtn';
        $menus = $this->get_available_menus();

        if ( empty( $menus ) ) {
            return false;
        }

        require_once get_parent_theme_file_path(). '/inc/class-navwalker.php';

        $args = [
            'echo'        => false,
            'menu'        => $settings['menu'],
            'menu_class'  => 'tp-nav-menu',
            'menu_id'     => 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id(),
            'fallback_cb' => 'Shofy_Navwalker_Class::fallback',
            'container'   => '',
            'walker'         => new Shofy_Navwalker_Class,
        ];

        $menu_html = wp_nav_menu( $args );

        $category_args = [
            'echo'        => false,
            'menu'        => $settings['category_menu'],
            'menu_class'  => 'tp-nav-menu',
            'menu_id'     => 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id(),
            'fallback_cb' => 'Shofy_Navwalker_Class::fallback',
            'container'   => '',
            'walker'         => new Shofy_Navwalker_Class,
        ];

        $category_menu_html = wp_nav_menu( $category_args );

        // group image size
        $size = $settings['tp_image_size_size'];
		if ( 'custom' !== $size ) {
			$image_size = $size;
		} else {
        	require_once ELEMENTOR_PATH . 'includes/libraries/bfi-thumb/bfi-thumb.php';
			$image_dimension = $settings['tp_image_size_custom_dimension'];
			$image_size = [
				// Defaults sizes.
				0           => null, // Width.
				1           => null, // Height.

				'bfi_thumb' => true,
				'crop'      => true,
			];
			$has_custom_size = false;
			if ( ! empty( $image_dimension['width'] ) ) {
				$has_custom_size = true;
				$image_size[0]   = $image_dimension['width'];
			}

			if ( ! empty( $image_dimension['height'] ) ) {
				$has_custom_size = true;
				$image_size[1]   = $image_dimension['height'];
			}

			if ( ! $has_custom_size ) {
				$image_size = 'full';
			}
		}

        // side logo image size
        $side_logo_size = $settings['tp_side_logo_size_size'];       

		if ( 'custom' !== $side_logo_size ) {
			$side_logo_image_size = $side_logo_size;
		} else {
        	require_once ELEMENTOR_PATH . 'includes/libraries/bfi-thumb/bfi-thumb.php';
			$side_logo_image_dimension = $settings['tp_side_logo_size_custom_dimension'];
			$side_logo_image_size = [
				// Defaults sizes.
				0           => null, // Width.
				1           => null, // Height.

				'bfi_thumb' => true,
				'crop'      => true,
			];
			$side_logo_has_custom_size = false;
			if ( ! empty( $side_logo_image_dimension['width'] ) ) {
				$side_logo_has_custom_size = true;
				$side_logo_image_size[0]   = $side_logo_image_dimension['width'];
			}

			if ( ! empty( $side_logo_image_dimension['height'] ) ) {
				$side_logo_has_custom_size = true;
				$side_logo_image_size[1]   = $side_logo_image_dimension['height'];
			}

			if ( ! $side_logo_has_custom_size ) {
				$side_logo_image_size = 'full';
			}
		}


	    if ( !empty($settings['tp_image']['url']) ) {
	        $tp_image = !empty($settings['tp_image']['id']) ? wp_get_attachment_image_url( $settings['tp_image']['id'], $image_size, true) : $settings['tp_image']['url'];
	        $tp_image_alt = get_post_meta($settings["tp_image"]["id"], "_wp_attachment_image_alt", true);
	    }	      

	    if ( !empty($settings['tp_side_logo']['url']) ) {
            $tp_side_logo = !empty($settings['tp_side_logo']['id']) ? wp_get_attachment_image_url( $settings['tp_side_logo']['id'], $side_logo_image_size, true) : $settings['tp_side_logo']['url'];
            $tp_side_logo_alt = get_post_meta($settings["tp_side_logo"]["id"], "_wp_attachment_image_alt", true);
      }

     
         if ('2' == $settings['tp_tpbtn_link_type']) {
               $link = get_permalink($settings['tp_tpbtn_page_link']);
               $target = '_self';
               $rel = 'nofollow';
         } else {
               $link = !empty($settings['tp_tpbtn_link']['url']) ? $settings['tp_tpbtn_link']['url'] : '';
               $target = !empty($settings['tp_tpbtn_link']['is_external']) ? '_blank' : '';
               $rel = !empty($settings['tp_tpbtn_link']['nofollow']) ? 'nofollow' : '';
         }
         

         $get_offcanvas_style = $settings['shofy_offcanvas_style'];
      

         if( $get_offcanvas_style == "dark_brown"){
            $offcanvas_style = 'offcanvas__style-darkRed';
         }
         elseif ($get_offcanvas_style == "brown") {
            $offcanvas_style = 'offcanvas__style-brown';
         }
         elseif ($get_offcanvas_style == "green") {
            $offcanvas_style = 'offcanvas__style-green';
         }
         else{
            $offcanvas_style = 'offcanvas__style-primary';
         }

       $menu_col = $settings['tp_header_search_switch'] === 'yes' ? 'col-xl-4 col-lg-3 col-md-8 col-6' : 'col-xl-10 col-lg-10 col-md-8 col-6'; 
       $menu_col_bottom = $settings['category_menu_switch'] === 'yes' ? 'col-xl-6 col-lg-6' : 'col-xl-9 col-lg-9'; 

		?>

      <!-- header area start -->
      <header>
         <div class="tp-header-area p-relative z-index-11">
         <?php if($settings['tp_header_top_switch'] == 'yes') : ?>
            <!-- header top start  -->
            <div class="tp-header-top black-bg p-relative z-index-1 d-none d-md-block">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-md-6">
                        <?php if(!empty($settings['tp_header_topbar_welcome_text'])) : ?>
                        <div class="tp-header-welcome d-flex align-items-center tp-el-wel-icon">
                              <?php if($settings['tp_welcome_icon_type'] == 'icon') : ?>
                                 <?php if (!empty($settings['tp_welcome_icon']) || !empty($settings['tp_welcome_selected_icon']['value'])) : ?>
                                          <span><?php tp_render_icon($settings, 'tp_welcome_icon', 'tp_welcome_selected_icon'); ?></span>
                                 <?php endif; ?>
                              <?php elseif( $settings['tp_welcome_icon_type'] == 'image' ) : ?>
                                 <span>
                                       <?php if (!empty($settings['tp_welcome_icon_image']['url'])): ?>
                                       <img src="<?php echo $settings['tp_welcome_icon_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($settings['tp_welcome_icon_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                       <?php endif; ?>
                                 </span>
                              <?php else : ?>
                                 <span>
                                       <?php if (!empty($settings['tp_welcome_icon_svg'])): ?>
                                       <?php echo $settings['tp_welcome_icon_svg']; ?>
                                       <?php endif; ?>
                                 </span>
                              <?php endif; ?>
                           <p class="tp-el-wel-title"><?php echo esc_html($settings['tp_header_topbar_welcome_text']); ?></p>
                        </div>
                        <?php endif; ?>
                     </div>
                     <div class="col-md-6">
                        <div class="tp-header-top-right d-flex align-items-center justify-content-end">
                           <div class="tp-header-top-menu d-flex align-items-center justify-content-end">

                              <?php if($settings['tp_header_top_lang_switch'] == 'yes'): ?>
                                 <div class="tp-el-language tp-header-top-menu-item ">
                                    <?php shofy_header_lang_defualt(); ?>
                                 </div>
                              <?php endif; ?>
                                    
                              <?php if($settings['tp_header_top_currency_switch'] == 'yes'): ?>
                              <div class="tp-header-top-menu-item tp-header-currency tp-el-currency">
                                    <?php if(!empty($settings['tp_header_top_currency_shortcode'])) : ?>
                                       <?php echo do_shortcode($settings['tp_header_top_currency_shortcode']); ?>

                                    <?php else : ?>
                                    <select>
                                          <option><?php echo esc_html__('USD', 'tpcore'); ?></option>
                                          <option><?php echo esc_html__('YEAN', 'tpcore'); ?></option>
                                          <option><?php echo esc_html__('EURO', 'tpcore'); ?></option>
                                    </select>
                                    <?php endif; ?>
                              </div>
                              <?php endif ; ?>

                              <?php if(class_exists( 'WooCommerce' ) && ($settings['tp_header_top_setting_switch'] == 'yes')) : ?>
                              <div class="tp-header-top-menu-item tp-header-setting tp-el-prolink">
                                 <span class="tp-header-setting-toggle" id="tp-header-setting-toggle"><?php echo esc_html__('Setting', 'tpcore'); ?></span>
                                 <ul>
                                    <li>
                                       <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html__('My Profile', 'tpcore'); ?></a>
                                    </li>

                                    <?php 
                                       if(class_exists( 'WPCleverWoosw' ) && ($settings['tp_header_wishlist_switch'] == 'yes')) : 

                                       $wishlist_data = new \WPCleverWoosw();
      
                                       $key        = $wishlist_data::get_key();
                                       $products   = $wishlist_data::get_ids( $key );
                                       $count      = count( $products );
                                    ?>
                                    <li>
                                       <a href="<?php echo esc_url( $wishlist_data::get_url( $key, true ) ); ?>"><?php echo esc_html__('Wishlist', 'tpcore'); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if($settings['tp_header_cart_switch'] == 'yes') : ?>
                                    <li>
                                       <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php echo esc_html__('Cart', 'tpcore'); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(is_user_logged_in()): ?>
                                    <li>
                                       <a href="<?php echo esc_url(wc_logout_url()); ?>"><?php echo esc_html__('Logout', 'tpcore'); ?></a>
                                    </li>
                                    <?php else : ?>
                                       <li>
                                          <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html__('Login', 'tpcore'); ?></a>
                                       </li>
                                    <?php endif; ?>
                                 </ul>
                              </div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>

            <!-- header main start -->
            <div id="header-sticky" class="tp-header-main tp-header-sticky tp-header-electronics">
               <div class="container">
                  <div class="row align-items-center">
                  <?php if(!empty($tp_image)) :?>
                     <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                        <div class="logo">
                           <a href="<?php print esc_url( home_url( '/' ) );?>">
                              <img src="<?php echo esc_url($tp_image); ?>" alt="<?php echo esc_attr($tp_image_alt); ?>">
                           </a>
                        </div>
                     </div>
                     <?php endif; ?>

                     <?php if ( $settings['tp_header_search_switch'] === 'yes') : ?>
                     <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                        <div class="tp-header-search pl-70">
                           <form name="myform" method="GET"  action="<?php echo esc_url(home_url('/shop')); ?>">
                              <div class="tp-header-search-wrapper tp-el-search-box d-flex align-items-center tp-el-search-input">
                                 <div class="tp-header-search-box">
                                    <input placeholder="<?php echo esc_attr__('Search for Products...', 'tpcore'); ?>" type="text"  name="s" class="searchbox" maxlength="128" value="<?php echo get_search_query(); ?>">
                                 </div>
                                 <?php if (class_exists('WooCommerce')) : ?>
                                 <div class="tp-header-search-category">
                                    <?php 
                                       if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat'])){
                                          $optsetlect=$_REQUEST['product_cat'];
                                       }else{
                                          $optsetlect=0;  
                                       }
                                          $args = array(
                                             'show_option_all' => esc_html__( 'All Items', 'markite' ),
                                             'hierarchical' => 1,
                                             'class' => 'cat',
                                             'echo' => 1,
                                             'value_field' => 'slug',
                                             'selected' => $optsetlect
                                          );
                                          $args['taxonomy'] = 'product_cat';
                                          $args['name'] = 'product_cat';              
                                          $args['class'] = 'cate-dropdown hidden-xs';
                                          wp_dropdown_categories($args);
                                       ?>
                                 </div>
                                 <input type="hidden" value="product" name="post_type" class="tp-woo-cat">
                                 <?php endif; ?>
                                 <div class="tp-header-search-btn">
                                    <button type="submit">
                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M19 19L14.65 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <?php endif; ?>

                     <div class="<?php echo esc_attr($menu_col); ?>">
                        <div class="tp-header-main-right d-flex align-items-center justify-content-end">

                        <?php if ( $settings['tp_header_right_switch'] === 'yes' ) : ?>
                           <div class="tp-header-main-right-inner d-flex align-items-center justify-content-end">

                           <?php if ( ($settings['tp_header_login_switch'] === 'yes') && class_exists( 'WooCommerce' )): ?>
                              <div class="tp-header-login d-none d-lg-block">
                              <?php 
                                 $author_data = get_the_author_meta( 'description', get_query_var( 'author' ) );
                                 $author_bio_avatar_size = 180;
                                 if (is_user_logged_in()): 
                              ?>
                                 <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="d-flex align-items-center">
                                    <div class="tp-header-login-icon">
                                       <span>
                                          <?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', '', [ 'class' => 'media-object img-circle' ] );?>                                       
                                       </span>
                                    </div>

                                    <div class="tp-header-login-content d-none d-xl-block">
                                       <span><?php echo esc_html($settings['tp_header_login_text']); ?></span>
                                       <h5 class="tp-header-login-title">                                         
                                          <?php $current_user = wp_get_current_user();  echo esc_html($current_user->display_name);?>
                                       </h5>
                                    </div>
                                 </a>

                                 <?php else : ?>
                                    <a href="<?php echo wp_logout_url(get_permalink(wc_get_page_id('myaccount'))) ?>" class="d-flex align-items-center">
                                       <div class="tp-header-login-icon">
                                          <span>
                                             <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             </svg>                                       
                                          </span>
                                       </div>
                                       <div class="tp-header-login-content d-none d-xl-block">
                                          <span><?php echo esc_html($settings['tp_header_login_text']); ?></span>
                                          <h5 class="tp-header-login-title"><?php echo esc_html__('Your Account', 'tpcore') ?></h5>
                                       </div>
                                    </a>
                                 <?php endif; ?>
                              </div>
                              <?php endif; ?>
                                                               
                              <?php if ( (($settings['tp_header_compare_switch'] === 'yes') || ($settings['tp_header_wishlist_switch'] === 'yes') || $settings['tp_header_cart_switch'] === 'yes') && class_exists( 'WooCommerce' )): ?>
                              <div class="tp-header-action d-flex align-items-center ml-50">

                                 <?php if(class_exists( 'WPCleverWoosc' ) && $settings['tp_header_compare_switch'] === 'yes') : 
                                 
                                    $total_compared_product = apply_filters('shofy_woo_compare_filter', '');
                                    
                                 ?>
                                 <div class="tp-header-action-item d-none d-lg-block">
                                    
                                    <div class="tp-header-woosc-btn-wrapper">
                                       <button class="woosc-btn"></button>
                                       <button type="button"  class="tp-header-action-btn tp-header-compare-open-btn tp-el-action-btn">
                                          <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg> 
                                          <span class="tp-header-action-badge"><?php echo esc_html($total_compared_product); ?></span>                                                  
                                       </button>
                                    </div>
                                 </div>
                                 
                                 <?php endif; ?>

                                 <?php if(class_exists( 'WPCleverWoosw' ) && ($settings['tp_header_wishlist_switch'] === 'yes')) :
                                       $wishlist_data = new \WPCleverWoosw();
      
                                       $key        = $wishlist_data::get_key();
                                       $products   = $wishlist_data::get_ids( $key );
                                       $count      = count( $products );
                                 ?>
                                 <div class="tp-header-action-item d-none d-lg-block">
                                    <a href="<?php echo esc_url( $wishlist_data::get_url( $key, true ) ); ?>" class="tp-header-action-btn tp-el-action-btn">
                                       <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg> 
                                       <span class="tp-header-action-badge"><?php echo esc_html($count); ?></span>                          
                                    </a>
                                 </div>
                                 <?php endif; ?>

                                 <?php if ( ($settings['tp_header_cart_switch'] === 'yes') && class_exists( 'WooCommerce' ) ): ?>
                                 <div class="tp-header-action-item">
                                    <button type="button" class="tp-header-action-btn cartmini-open-btn tp-el-action-btn">
                                       <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>    
                                       <?php if(!is_null(WC()->cart)) :?>
                                       <span id="tp-cart-item" class="tp-header-action-badge cart__count">
                                          <?php echo esc_html(WC()->cart->cart_contents_count); ?>
                                       </span>                                                                          
                                       <?php endif; ?>      

                                    </button>
                                 </div>
                                 <?php endif; ?>

                              </div>
                              <?php endif; ?>
                           </div>
                           <?php endif; ?>

                           <div class="tp-header-action-item d-lg-none">
                              <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                    <rect x="10" width="20" height="2" fill="currentColor"/>
                                    <rect x="5" y="7" width="25" height="2" fill="currentColor"/>
                                    <rect x="10" y="14" width="20" height="2" fill="currentColor"/>
                                 </svg>
                              </button>
                           </div>

                        </div>
                     </div>

                  </div>
               </div>
            </div>

            <!-- header bottom start -->
            <div class="tp-header-bottom tp-header-bottom-border d-none d-lg-block">
               <div class="container">
                  <div class="tp-mega-menu-wrapper p-relative">
                     <div class="row align-items-center">
                        <?php if($settings['category_menu_switch'] == 'yes') :?>
                        <div class="col-xl-3 col-lg-3">
                           <div class="tp-header-category tp-category-menu tp-header-category-toggle">
                              <button class="tp-category-menu-btn tp-category-menu-toggle tp-el-category-btn">
                                 <span>
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H15C15.5523 0 16 0.447715 16 1C16 1.55228 15.5523 2 15 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H17C17.5523 6 18 6.44772 18 7C18 7.55228 17.5523 8 17 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H11C11.5523 14 12 13.5523 12 13C12 12.4477 11.5523 12 11 12H1Z" fill="currentColor"/>
                                    </svg>
                                 </span>     
                                 <?php echo esc_html($settings['category_menu_text']); ?>                      
                              </button>
                              <nav class="tp-category-menu-content">
                                 <?php echo $category_menu_html; ?>
                              </nav>
                           </div>
                        </div>
                        <?php endif; ?>

                        <div class="<?php echo esc_attr( $menu_col_bottom); ?>">
                           <div class="main-menu menu-style-1">
                              <nav class="tp-main-menu-content">
                                 <?php echo $menu_html; ?>
                              </nav>
                           </div>
                        </div>

                        <?php if(!empty($settings['tp_contact_single_title'])) : ?>
                        <div class="col-xl-3 col-lg-3">
                           <div class="tp-header-contact d-flex align-items-center justify-content-end">
                              <div class="tp-header-contact-icon">
                              <?php if($settings['tp_contact_single_icon_type'] == 'icon') : ?>
                                    <?php if (!empty($settings['tp_contact_single_icon']) || !empty($settings['tp_contact_single_selected_icon']['value'])) : ?>
                                            <span><?php tp_render_icon($settings, 'tp_contact_single_icon', 'tp_contact_single_selected_icon'); ?></span>
                                    <?php endif; ?>
                                <?php elseif( $settings['tp_contact_single_icon_type'] == 'image' ) : ?>
                                    <span>
                                        <?php if (!empty($settings['tp_contact_single_icon_image']['url'])): ?>
                                        <img src="<?php echo $settings['tp_contact_single_icon_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($settings['tp_contact_single_icon_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                        <?php endif; ?>
                                    </span>
                                <?php else : ?>
                                    <span>
                                        <?php if (!empty($settings['tp_contact_single_icon_svg'])): ?>
                                        <?php echo $settings['tp_contact_single_icon_svg']; ?>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                              </div>

                              <?php
                                 $contact_type = $settings['tp_contact_single_type'];

                                 if($contact_type === 'mail'){
                                    $contact_url = 'mailto:'.$settings['tp_contact_single_mail_url']['url'];
                                 }
                                 elseif ($contact_type === 'phone') {
                                    $contact_url = 'tel:'.$settings['tp_contact_single_phone_url']['url'];
                                 }
                                 elseif ($contact_type === 'map') {
                                    $contact_url = $settings['tp_contact_single_map_url']['url'];
                                 }
                                 elseif ($contact_type === 'default') {
                                    $contact_url = $settings['tp_contact_single_default_url']['url'];
                                 }
                                 else{
                                    $contact_url = "#";
                                 }

                              ?>
                              <div class="tp-header-contact-content">
                                 <h5><?php echo esc_html($settings['tp_contact_single_subtitle']);?></h5>
                                 <p><a href="<?php echo esc_url($contact_url); ?>"> <?php echo esc_html($settings['tp_contact_single_title']);?></a></p>
                              </div>
                           </div>
                        </div>
                        <?php endif; ?>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->

      <?php include(TPCORE_ELEMENTS_PATH . '/header-side/header-cart-mini.php'); ?>

      <?php if($settings['enable_bottom_menu'] == 'yes') :?>
      <?php include(TPCORE_ELEMENTS_PATH . '/header-side/bottom-menu.php'); ?>
      <?php endif; ?>

      <div class="offcanvas__area <?php echo esc_attr($offcanvas_style); ?>">
         <?php include(TPCORE_ELEMENTS_PATH . '/header-side/header-side-1.php'); ?>
      </div>

<?php 
	}
}

$widgets_manager->register( new TP_Header_02() );
