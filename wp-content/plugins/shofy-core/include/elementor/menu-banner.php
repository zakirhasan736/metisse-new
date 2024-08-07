<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_Menu_Banner extends Widget_Base {

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
		return 'tp-menu-banner';
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
		return __( 'Mega Menu Banner', 'tpcore' );
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

    protected function register_controls_section(){

        $this->start_controls_section(
            '_tp_image_section',
            [
                'label' => esc_html__('BG Image', 'tp-core'),
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

        $this->add_control(
        'tp_services_link_title',
            [
                'label'       => esc_html__( 'Button Title', 'tpcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'View Product', 'tpcore' ),
                'placeholder' => esc_html__( 'Your Text', 'tpcore' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tp_services_link_type',
            [
                'label' => esc_html__( 'Link Type', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
            ]
        );
        $this->add_control(
            'tp_services_link',
            [
                'label' => esc_html__( 'Link', 'tpcore' ),
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
                    'tp_services_link_type' => '1',
                ]
            ]
        );
        $this->add_control(
            'tp_services_page_link',
            [
                'label' => esc_html__( 'Select Link Page', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tp_services_link_type' => '2',
                ]
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

    }

    protected function style_tab_content(){
        $this->tp_icon_style('fact_box_icon', 'Title', '.tp-el-box-title a');
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

            if ( !empty($settings['tp_image']['url']) ) {
                $tp_image = !empty($settings['tp_image']['id']) ? wp_get_attachment_image_url( $settings['tp_image']['id'], $settings['tp_image_size_size']) : $settings['tp_image']['url'];
                $tp_image_alt = get_post_meta($settings["tp_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ('2' == $settings['tp_services_link_type']) {
                $link = get_permalink($settings['tp_services_page_link']);
                $target = '_self';
                $rel = 'nofollow';
            } else {
                $link = !empty($settings['tp_services_link']['url']) ? $settings['tp_services_link']['url'] : '';
                $target = !empty($settings['tp_services_link']['is_external']) ? '_blank' : '';
                $rel = !empty($settings['tp_services_link']['nofollow']) ? 'nofollow' : '';
            }
		?>

            <div class="shop-mega-menu-img">
                <img src="<?php echo esc_url($tp_image);?>" alt="<?php echo esc_attr($tp_image_alt); ?>">

                <div class="shop-mega-menu-btn tp-el-box-title">
                    <a target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>" href="<?php echo esc_url($link); ?>" class="tp-menu-showcase-btn tp-menu-showcase-btn-2">Phones</a>
                </div>

            </div>

        <?php 
	}
}

$widgets_manager->register( new TP_Menu_Banner() );