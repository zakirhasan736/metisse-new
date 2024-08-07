<?php

// tp metabox 
add_filter( 'tp_meta_boxes', 'themepure_metabox' );

function themepure_metabox( $meta_boxes ) {
	
	$prefix     = 'shofy';
	
	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_page_meta_box',
		'title'    => esc_html__( 'TP Page Info', 'shofy' ),
		'post_type'=> 'page',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Show Breadcrumb?', 'shofy' ),
				'id'      => "{$prefix}_check_bredcrumb",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			),		
			array(
				'label'    => esc_html__( 'Show Breadcrumb Image?', 'shofy' ),
				'id'      => "{$prefix}_check_bredcrumb_img",
				'type'    => 'switch',
				'default' => 'on',
				'conditional' => array()
			), 
            array(
				
				'label'    => esc_html__( 'Breadcrumb Background', 'shofy' ),
				'id'      => "{$prefix}_breadcrumb_bg",
				'type'    => 'image',
				'default' => '',
				'conditional' => array(
					"{$prefix}_check_bredcrumb_img", "==", "on"
				)
			),

            array(
				'label'    => esc_html__( 'Enable Secondary Logo', 'shofy' ),
				'id'      => "{$prefix}_en_secondary_logo",
				'type'    => 'switch',
				'default' => 'off',
				'conditional' => array()
			), 
			
            array(
				
				'label'    => esc_html__( 'Footer Payment Image', 'shofy' ),
				'id'      => "{$prefix}_footer_payment",
				'type'    => 'image',
				'default' => '',
				'conditional' => array()
			),

            array(
				'label' => 'Footer BG Color',
				'id'   	=> "{$prefix}_footer_bg_color",
				'type' 	=> 'colorpicker',
				'default' 	  => '',
				'conditional' => array()
			),

            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Header', 'shofy' ),
				'id'      => "{$prefix}_header_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'shofy' ),
					'custom' => esc_html__( 'Custom', 'shofy' ),
					'elementor' => esc_html__( 'Elementor', 'shofy' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Header Style', 'shofy'),
				'id'              => "{$prefix}_header_style",
				'type'            => 'select',
				'options'         => array(
					'header_1' => esc_html__( 'Header 1', 'shofy' ),
					'header_2' => esc_html__( 'Header 2', 'shofy' ),
					'header_3' => esc_html__( 'Header 3', 'shofy' ),
					'header_4' => esc_html__( 'Header 4', 'shofy' ),
					'header_5' => esc_html__( 'Header 5', 'shofy' ),
					'header_6' => esc_html__( 'Header 6', 'shofy' ),
				),
				'placeholder'     => esc_html__( 'Select a header', 'shofy' ),
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "custom"
				),
				'default' => 'header_1',
				'parent' => "{$prefix}_header_tabs"
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Header Template', 'shofy'),
				'id'              => "{$prefix}_header_templates",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'shofy' ),
                'post_type'       => 'tp-header',
				'conditional' => array(
					"{$prefix}_header_tabs", "==", "elementor"
				),
				'default' => '',
				'parent' => "{$prefix}_header_tabs"
			),


            // multiple buttons group field like multiple radio buttons
			array(
				'label'   => esc_html__( 'Footer', 'shofy' ),
				'id'      => "{$prefix}_footer_tabs",
				'desc'    => '',
				'type'    => 'tabs',
				'choices' => array(
					'default' => esc_html__( 'Default', 'shofy' ),
					'custom' => esc_html__( 'Custom', 'shofy' ),
					'elementor' => esc_html__( 'Elementor', 'shofy' ),
				),
				'default' => 'default',
				'conditional' => array()
			), 

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Style', 'shofy'),
				'id'              => "{$prefix}_footer_style",
				'type'            => 'select',
				'options'         => array(
					'footer_1' => esc_html__( 'Footer 1', 'shofy' ),
					'footer_2' => esc_html__( 'Footer 2', 'shofy' ),
					'footer_3' => esc_html__( 'Footer 3', 'shofy' ),
					'footer_4' => esc_html__( 'Footer 4', 'shofy' ),
					'footer_5' => esc_html__( 'Footer 5', 'shofy' ),
					'footer_6' => esc_html__( 'Footer 6', 'shofy' ),
				),
				'placeholder'     => esc_html__( 'Select a footer', 'shofy' ),
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "custom"
				),
				'default' => 'footer_1',
				'parent' => "{$prefix}_footer_tabs"
			),

            // select field dropdown
			array(
				
				'label'           => esc_html__('Select Footer Template', 'shofy'),
				'id'              => "{$prefix}_footer_templates",
				'type'            => 'select_posts',
				'placeholder'     => esc_html__( 'Select a template', 'shofy' ),
                'post_type'       => 'tp-footer',
				'conditional' => array(
					"{$prefix}_footer_tabs", "==", "elementor"
				),
				'default' => '',
				'parent' => "{$prefix}_footer_tabs"
			),
			array(
				
				'label'           => esc_html__('Select Offcanvas Style', 'shofy'),
				'id'              => "{$prefix}_offcanvas_style",
				'type'            => 'select',
				'options'         => array(
					'offcanvas-style-1' => esc_html__( 'Offcanvas 1', 'shofy' ),
					'offcanvas-style-2' => esc_html__( 'Offcanvas 2', 'shofy' ),
				),
				'placeholder'     => esc_html__( 'Select a offcanvas', 'shofy' ),
				'default' => '',
			),
		),
	);

    $meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_gallery_meta',
		'title'    => esc_html__( 'TP Gallery Post', 'shofy' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
            array(
				'label'    => esc_html__( 'Gallery', '' ),
				'id'      => "{$prefix}_post_gallery",
				'type'    => 'gallery',
				'default' => '',
				'conditional' => array(),
			),
		),
		'post_format' => 'gallery'
	);    

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_video_meta',
		'title'    => esc_html__( 'TP Video Post', 'shofy' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Video', 'shofy' ),
				'id'      => "{$prefix}_post_video",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your video url.', 'shofy' ),
			),
		),
		'post_format' => 'video'
	);	

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_post_audio_meta',
		'title'    => esc_html__( 'TP Audio Post', 'shofy' ),
		'post_type'=> 'post',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array( 
			array(
				'label'    => esc_html__( 'Audio', 'shofy' ),
				'id'      => "{$prefix}_post_audio",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your audio url..', 'shofy' ),
			),
		),
		'post_format' => 'audio'
	);

	$meta_boxes[] = array(
		'metabox_id'       => $prefix . '_product_single_feature',
		'title'    => esc_html__( 'Product Single Features', 'shofy' ),
		'post_type'=> 'product',
		'context'  => 'normal',
		'priority' => 'core',
		'fields'   => array(
			array(
    
				'label'           => esc_html__('Product Single Layout', 'shofy'),
				'id'              => "{$prefix}_product_single_layout",
				'type'            => 'select',
				'options'         => array(
					'default' => 'Default View',
					'list' => 'List View',
					'grid' => 'Grid View',
					'vertical' => 'Vertical Tab',
					'carousel' => 'Carousel View',
				),
				'placeholder'     => 'Select an item',
				'conditional' => array(),
				'default' => 'default'
			),

			array(
				'label'    => esc_html__( 'Video', 'shofy' ),
				'id'      => "{$prefix}_product_signle__video",
				'type'    => 'text',
				'default' => '',
				'conditional' => array(),
				'placeholder'     => esc_html__( 'Place your video url.', 'shofy' ),
			), 
			array(
				'label'    => esc_html__( 'Is Product On Trending?', 'shofy' ),
				'id'      => "{$prefix}_product_on_trending",
				'type'    => 'switch',
				'default' => 'off',
			),
			array(
				'label'    => esc_html__( 'Is Product On Hot?', 'shofy' ),
				'id'      => "{$prefix}_product_on_hot",
				'type'    => 'switch',
				'default' => 'off',
			),

			array(
				'label'     => esc_html__('Add Product Feature', 'shofy'),
				'id'        => "{$prefix}_product_single_fea_meta",
				'type'      => 'repeater', // specify the type "repeater" (case sensitive)
				'conditional'   => array(),
				'default'       => array(),
				'fields'        => array(
					array(
						'label' => 'Enter Feature Text',
						'id'   	=> "{$prefix}_product_signle_fea",
						'type' 	=> 'textarea', // specify the type field
						'placeholder' => 'Your feature here...',
						'default' 	  => '',
						'conditional' => array()
					),
				)
			),

			array(
				
				'label'    => esc_html__( 'Product Main Thumbnail', 'shofy' ),
				'id'      => "{$prefix}_get_img_thumbnail",
				'type'    => 'image',
				'default' => ''
			),
		),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$img = wc_placeholder_img_src( 'woocommerce_single' );

		$meta_boxes[] = array(
			'metabox_id'       => $prefix . '_shop_coupon',
			'title'    => esc_html__( 'Add Coupon', 'shofy' ),
			'post_type'=> 'shop_coupon',
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array( 
				array(
					'label'    => esc_html__( 'Upload Coupon Image', 'shofy' ),
					'id'      => "{$prefix}_coupon_thumbnail",
					'type'    => 'image',
					'default' => $img[0],
					'conditional' => array(),
					'placeholder'     => esc_html__( 'Place Your Image', 'shofy' ),
				),
			),
		);
	}
	

	return $meta_boxes;
}