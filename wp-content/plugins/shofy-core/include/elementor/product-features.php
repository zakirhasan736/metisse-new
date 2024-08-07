<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Product_Features extends Widget_Base {

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
		return 'product-features';
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
		return __( 'Product Features', 'tpcore' );
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
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'tp_design_style',
            [
                'label' => esc_html__('Select Layout', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tpcore'),
                    'layout-2' => esc_html__('Layout 2', 'tpcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
         'tp_section_title_sec',
             [
               'label' => esc_html__( 'Section Title', 'tpcore' ),
               'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
               'condition' => [
                'tp_design_style' => 'layout-2'
               ]
             ]
        );
        
        $this->add_control(
        'tp_section_title',
         [
            'label'       => esc_html__( 'Title', 'tpcore' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Specification', 'tpcore' ),
            'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
            'label_block' => true,
         ]
        );
        
        $this->end_controls_section();

        // _tp_image
        $this->start_controls_section(
            '_tp_image_section',
            [
                'label' => esc_html__('BG Image', 'tp-core'),
                'condition' => [
                    'tp_design_style' => 'layout-2'
                   ]
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
                'name' => 'tp_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tp_slider_side_sec',
                [
                  'label' => esc_html__( 'Side Text', 'tpcore' ),
                  'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                  'condition' => [
                    'tp_design_style' => 'layout-2'
                   ]
                ]
           );
           
           $this->add_control(
            'tp_slider_side_text_show',
               [
               'label'        => esc_html__( 'Enable Side Text ?', 'tpcore' ),
               'type'         => \Elementor\Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'tpcore' ),
               'label_off'    => esc_html__( 'Hide', 'tpcore' ),
               'return_value' => 'yes',
               'default'      => 'yes',
               ]
           );
   
           $this->add_control(
           'tp_slider_side_text',
               [
                   'label'       => esc_html__( 'Slider Side Text', 'tpcore' ),
                   'type'        => \Elementor\Controls_Manager::TEXT,
                   'default'     => esc_html__( 'headphone', 'tpcore' ),
                   'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
                   'label_block' => true,
               ]
           );
   
           $this->add_control(
               'tp_slider_side_text_transform',
               [
                   'label' => esc_html__( 'Transform', 'tpcore' ),
                   'type' => Controls_Manager::TEXT,
                   'selectors' => [
                       '{{WRAPPER}} .slider__bg-text' => 'transform: {{VALUE}};',
                   ],
                   'label_block' => true,
                   'placeholder' => esc_html__( 'translate(200px) rotate(-90deg)', 'tpcore' ),
               ]
           );
           
   
   
           $this->end_controls_section();

        // Service group
        $this->start_controls_section(
            'tp_features',
            [
                'label' => esc_html__('Features List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_condition',
            [
                'label' => __( 'Field condition', 'tpcore' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'tpcore' ),
                    'style_2' => __( 'Style 2', 'tpcore' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'tp_box_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'tpcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'tpcore'),
                    'icon' => esc_html__('Icon', 'tpcore'),
                    'svg' => esc_html__('SVG', 'tpcore'),
                ],
                'condition' => [
                    'repeater_condition' => ['style_1', 'style_2'],
                ]
            ]
        );
        $repeater->add_control(
            'tp_box_icon_svg',
            [
                'show_label' => false,
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => esc_html__('SVG Code Here', 'tpcore'),
                'condition' => [
                    'tp_box_icon_type' => 'svg',
                    'repeater_condition' => ['style_1', 'style_2'],
                ]
            ]
        );

        $repeater->add_control(
            'tp_box_icon_image',
            [
                'label' => esc_html__('Upload Icon Image', 'tpcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tp_box_icon_type' => 'image',
                ]
            ]
        );

        if (tp_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tp_box_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'tp_box_icon_type' => 'icon',
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'tp_box_selected_icon',
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
                        'tp_box_icon_type' => 'icon',
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tp_features_title', [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tp_features_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );
       
         $repeater->add_control(
            'tp_features_link_switcher',
            [
                'label' => esc_html__( 'Add Features link', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'tpcore' ),
                'label_off' => esc_html__( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'tp_features_link_type',
            [
                'label' => esc_html__( 'Features Link Type', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => [
                    'tp_features_link_switcher' => 'yes'
                ]
            ]
        );
        $repeater->add_control(
            'tp_features_link',
            [
                'label' => esc_html__( 'Features Link link', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'tpcore' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'tp_features_link_type' => '1',
                    'tp_features_link_switcher' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'tp_features_page_link',
            [
                'label' => esc_html__( 'Select Features Link Page', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tp_features_link_type' => '2',
                    'tp_features_link_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'tp_features_list',
            [
                'label' => esc_html__('Features - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tp_features_title' => esc_html__('Business Stratagy', 'tpcore'),
                    ],
                    [
                        'tp_features_title' => esc_html__('Website Development', 'tpcore')
                    ],
                    [
                        'tp_features_title' => esc_html__('Marketing & Reporting', 'tpcore')
                    ]
                ],
                'title_field' => '{{{ tp_features_title }}}',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                // 'default' => 'tp-post-thumb',
            ]
        );
        $this->end_controls_section();

        // colum controls
        $this->tp_columns('col');
	}

    // style_tab_content
    protected function style_tab_content(){
        $this->tp_section_style_controls('services_section', 'Section - Style', '.tp-el-section');
        $this->tp_basic_style_controls('services_title', 'Section - Title', '.tp-el-title');
        
        $this->tp_section_style_controls('services_section_box', 'Box - Style', '.tp-el-box');
        $this->tp_icon_style('section_icon', 'Box - Icon', '.tp-el-box-icon span');
        $this->tp_basic_style_controls('services_box_title', 'Box - Title', '.tp-el-box-title');
        $this->tp_basic_style_controls('services_box_description', 'Box - Description', '.tp-el-box-desc');

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
		?>

		<?php if ( $settings['tp_design_style']  == 'layout-2' ) : 
            $this->add_render_attribute('title_args', 'class', 'section__title-6 tp-el-title');    

            if ( !empty($settings['tp_image']['url']) ) {
                $tp_image = !empty($settings['tp_image']['id']) ? wp_get_attachment_image_url( $settings['tp_image']['id'], $settings['tp_image_size_size']) : $settings['tp_image']['url'];
                $tp_image_alt = get_post_meta($settings["tp_image"]["id"], "_wp_attachment_image_alt", true);
            }
        ?>

                <div class="slider__item-11 d-flex align-items-center p-relative is-pink tp-el-section">

                    <?php if(($settings['tp_slider_side_text_show'] == 'yes')) :?>
                    <div class="slider__bg-text">
                        <h3 class="tp-el-bg-text"><?php echo tp_kses($settings['tp_slider_side_text']); ?></h3>
                    </div>
                    <?php endif; ?>

                     <div class="container">
                        <div class="row align-items-center">
                           <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-sm-10">
                              <div class="product__features-wrapper p-relative z-index-1">
                                <?php if(!empty($settings['tp_section_title'])) : ?>
                                <h3 class="product-section-title tp-el-title"><?php echo esc_html($settings['tp_section_title']); ?></h3>
                                <?php endif; ?>

                                 <div class="product__features-item-wrapper">
                                    <div class="row justify-content-between">
                                        <?php foreach ($settings['tp_features_list'] as $key => $item) : 
                                            
                                            // Link
                                            if ('2' == $item['tp_features_link_type']) {
                                                $link = get_permalink($item['tp_features_page_link']);
                                                $target = '_self';
                                                $rel = 'nofollow';
                                            } else {
                                                $link = !empty($item['tp_features_link']['url']) ? $item['tp_features_link']['url'] : '';
                                                $target = !empty($item['tp_features_link']['is_external']) ? '_blank' : '';
                                                $rel = !empty($item['tp_features_link']['nofollow']) ? 'nofollow' : '';
                                            }
                                        ?>
                                       <div class="col-xl-<?php echo esc_attr($settings['tp_col_for_desktop']); ?> col-lg-<?php echo esc_attr($settings['tp_col_for_laptop']); ?> col-md-<?php echo esc_attr($settings['tp_col_for_tablet']); ?> col-<?php echo esc_attr($settings['tp_col_for_mobile']); ?>">
                                          <div class="product__features-item mb-35 tp-el-box">
                                            <div class="product__features-icon tp-el-box-icon">
                                                <?php if($item['tp_box_icon_type'] == 'icon') : ?>
                                                    <?php if (!empty($item['tp_box_icon']) || !empty($item['tp_box_selected_icon']['value'])) : ?>
                                                            <span><?php tp_render_icon($item, 'tp_box_icon', 'tp_box_selected_icon'); ?></span>
                                                    <?php endif; ?>
                                                <?php elseif( $item['tp_box_icon_type'] == 'image' ) : ?>
                                                    <span>
                                                        <?php if (!empty($item['tp_box_icon_image']['url'])): ?>
                                                        <img src="<?php echo $item['tp_box_icon_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tp_box_icon_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                                        <?php endif; ?>
                                                    </span>
                                                <?php else : ?>
                                                    <span>
                                                        <?php if (!empty($item['tp_box_icon_svg'])): ?>
                                                        <?php echo $item['tp_box_icon_svg']; ?>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                             </div>
                                             <div class="product__features-content">
                                                <?php if (!empty($item['tp_features_title' ])): ?>
                                                <h3 class="product__features-title tp-el-box-title">
                                                    <?php if ($item['tp_features_link_switcher'] == 'yes') : ?>
                                                    <a href="<?php echo esc_url($link); ?>"><?php echo tp_kses($item['tp_features_title' ]); ?></a>
                                                    <?php else : ?>
                                                        <?php echo tp_kses($item['tp_features_title' ]); ?>
                                                    <?php endif; ?>
                                                </h3>
                                                <?php endif; ?>

                                                <?php if (!empty($item['tp_features_description' ])): ?>
                                                <p class="tp-el-box-desc"><?php echo tp_kses($item['tp_features_description']); ?></p>
                                                <?php endif; ?>

                                             </div>
                                          </div>
                                       </div>
                                       <?php endforeach; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4 col-sm-2">
                              <div class="product__features-thumb text-end">
                                 <img src="<?php echo esc_url($tp_image) ?>" alt="<?php echo esc_attr($tp_image_alt); ?>">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


		<?php else: 
            $bloginfo = get_bloginfo( 'name' );
            $this->add_render_attribute('title_args', 'class', 'section__title-7 tp-el-title');    
        ?>

         <section class="features__area pt-80 pb-20 tp-el-section">
            <div class="container">
               <div class="row">
                    <?php foreach ($settings['tp_features_list'] as $key => $item) :
                        // Link
                        if ('2' == $item['tp_features_link_type']) {
                            $link = get_permalink($item['tp_features_page_link']);
                            $target = '_self';
                            $rel = 'nofollow';
                        } else {
                            $link = !empty($item['tp_features_link']['url']) ? $item['tp_features_link']['url'] : '';
                            $target = !empty($item['tp_features_link']['is_external']) ? '_blank' : '';
                            $rel = !empty($item['tp_features_link']['nofollow']) ? 'nofollow' : '';
                        }
        
                    ?>
                  <div  class="col-xl-<?php echo esc_attr($settings['tp_col_for_desktop']); ?> col-lg-<?php echo esc_attr($settings['tp_col_for_laptop']); ?> col-md-<?php echo esc_attr($settings['tp_col_for_tablet']); ?> col-<?php echo esc_attr($settings['tp_col_for_mobile']); ?>">
                     <div class="features__item-13 d-flex align-items-start mb-40 tp-el-box">
                        <div class="features__icon-13 tp-el-box-icon">
                            <?php if($item['tp_box_icon_type'] == 'icon') : ?>
                                <?php if (!empty($item['tp_box_icon']) || !empty($item['tp_box_selected_icon']['value'])) : ?>
                                        <span><?php tp_render_icon($item, 'tp_box_icon', 'tp_box_selected_icon'); ?></span>
                                <?php endif; ?>
                            <?php elseif( $item['tp_box_icon_type'] == 'image' ) : ?>
                                <span>
                                    <?php if (!empty($item['tp_box_icon_image']['url'])): ?>
                                    <img src="<?php echo $item['tp_box_icon_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tp_box_icon_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                </span>
                            <?php else : ?>
                                <span>
                                    <?php if (!empty($item['tp_box_icon_svg'])): ?>
                                    <?php echo $item['tp_box_icon_svg']; ?>
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="features__content-13">

                           <?php if (!empty($item['tp_features_title' ])): ?>
                            <h3 class="features__title-13 tp-el-box-title">
                                <?php if ($item['tp_features_link_switcher'] == 'yes') : ?>
                                <a href="<?php echo esc_url($link); ?>"><?php echo tp_kses($item['tp_features_title' ]); ?></a>
                                <?php else : ?>
                                    <?php echo tp_kses($item['tp_features_title' ]); ?>
                                <?php endif; ?>
                            </h3>
                            <?php endif; ?>

                            <?php if (!empty($item['tp_features_description' ])): ?>
                            <p class="tp-el-box-desc"><?php echo tp_kses($item['tp_features_description']); ?></p>
                            <?php endif; ?>

                        </div>
                     </div>
                  </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </section>
         <!-- features area end -->


        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TP_Product_Features() );
