<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://themepure.net
 * @since      1.1.3
 *
 * @package    Tp_Wvs
 * @subpackage Tp_Wvs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tp_Wvs
 * @subpackage Tp_Wvs/admin
 * @author     ThemePure <themepure@gmail.com>
 */

require_once(plugin_dir_path(__DIR__) .'includes/class-pure-wc-swatches-helper.php');

class Tp_Wvs_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1.3
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1.3
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Current taxonomy id
	 *
	 * @var string
	 * @since  1.1.3
	 */
	public $taxonomy;

	/**
	 * Keep default values of all settings.
	 *
	 * @var array
	 * @since  1.1.3
	 */
	public $defaults = [
		'tpwvs_general' => [
			'tooltip'      			=> true,
			'tooltip_position' 	  	=> 'top',
			'tooltip_background' 	=> '#000',
			'tooltip_font_color' 	=> '#fff',
			'swatch_style' 	  		=> 'square',
			'swatch_size' 	  		=> '26'
		],
		'tpwvs_shop'   => [
			'enable_swatches'      	=> true,
			'swatch_position'		=> 'after_title',
			'swatch_alignments'		=> 'left',
			'swatch_label'			=> false,
		],
		'tpwvs_style'  => [
			'tooltip_background' => '#000000',
			'tooltip_font_color' => '#ffffff',
			'tooltip_font_size'  => 12,
			'tooltip_image'      => false,
			'border_color'       => '#000000',
			'label_font_size'    => '',
			'filters'            => false,
		],
	];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1.3
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->taxonomy = isset( $_REQUEST['taxonomy'] ) ? sanitize_title( $_REQUEST['taxonomy'] ) : '';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.1.3
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tp_Wvs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tp_Wvs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if( isset($_GET['page']) && $_GET['page'] == 'pure-wc-variation-swatches'){
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pure-wc-swatches-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'react-style', plugin_dir_url( __DIR__ ) . 'build/index.css' );
			wp_enqueue_style( 'wp-components' );
		}

	}


	/**
	 * Get option value from database and retruns value merged with default values
	 *
	 * @param string $option option name to get value from.
	 * @return array
	 * @since  1.1.3
	 */
	public function get_option( $option ) {
		$db_values = get_option( $option, [] );
		return wp_parse_args( $db_values, $this->defaults[ $option ] );
	}

	/**
	 * Ajax handler for submit action on settings page.
	 * Updates settings data in database.
	 *
	 * @return void
	 * @since  1.1.3
	 */
	public function tpwvs_update_settings() {
		//check_ajax_referer( 'tpwvs_update_settings', 'security' );
		$keys = [];
		if ( ! empty( $_POST[ 'tpwvs_general' ] ) ) {
			$keys[] = 'tpwvs_general';
		}

		if ( ! empty( $_POST[ 'tpwvs_shop' ] ) ) {
			$keys[] = 'tpwvs_shop';
		}

		if ( ! empty( $_POST[ 'tpwvs_style' ] ) ) {
			$keys[] = 'tpwvs_style';
		}

		if ( empty( $keys ) ) {
			wp_send_json_error( [ 'message' => __( 'No valid setting keys found.', 'pure-wc-swatches' ) ] );
		}

		$succeded = 0;
		foreach ( $keys as $key ) {
			if ( $this->update_settings( $key, $_POST[ $key ] ) ) {
				$succeded++;
			}
		}

		if ( count( $keys ) === $succeded ) {
			wp_send_json_success( [ 'message' => __( 'Settings saved successfully.', 'pure-wc-swatches' ) ] );
		}

		wp_send_json_error( [ 'message' => __( 'Failed to save settings.', 'pure-wc-swatches' ) ] );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.1.3
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tp_Wvs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tp_Wvs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_media();
		$_screen = get_current_screen();

		if(isset($_screen->taxonomy) && isset($_screen->post_type) && 'product' == $_screen->post_type){
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
	
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pure-wc-swatches-admin.js', array( 'jquery' ), $this->version, false );
			wp_localize_script(
				$this->plugin_name,
				'tpwvs_swatches_term_meta',
				[
					'image_upload_text' => [
						'title'        => __(
							'Select a image to upload',
							'pure-wc-swatches'
						),
						'button_title' => __(
							'Use this image',
							'pure-wc-swatches'
						),
					],
				]
			);
		}

		if( (isset($_GET['page']) && $_GET['page'] == 'pure-wc-variation-swatches') ){

			wp_enqueue_script( 'react-script', plugin_dir_url( __DIR__ ) . 'build/index.js', array( 'wp-element', 'wp-components' ), '1.1.3', true );
			wp_localize_script('react-script', 'tpwvs_admin_settings', array(
				'menu_url' => $this->admin_react_base_url(),
				'api_url'  => admin_url( 'admin-ajax.php' ),
				'update_nonce'      => wp_create_nonce( 'tpwvs_update_settings' ),
				'tpwvs_general'		=> $this->get_option('tpwvs_general'),
				'tpwvs_shop'		=> $this->get_option('tpwvs_shop'),
			));
		}
		
	}

	/**
	 * Admin Settings Menus Page
	 */
	public function admin_settings_menu(){
		add_menu_page(
			__('Pure Swatches', 'pure-wc-swatches'),
			__('Pure Swatches', 'pure-wc-swatches'),
			'manage_options',
			$this->plugin_name,
			array($this, 'admin_settings_template'),
			'dashicons-admin-settings',
			8
		);
	}

	/**
	 * 
	 * Admin Settings Template
	 */

	public function admin_settings_template(){
		require_once plugin_dir_path(__FILE__) . 'app/app.php';
	}


	/**
	 * 
	 * React Base URL
	 */

	public function admin_react_base_url(){
		$home_url = sanitize_url($_SERVER['HTTP_HOST']);
		if(is_ssl()){
			$home_url = esc_url("https://{$home_url}"); 
		}else{
			$home_url = esc_url("http://{$home_url}"); 
		}

		$react_base_url = str_replace($home_url, '', menu_page_url($this->plugin_name, false));
		return esc_url($react_base_url);
	}

	/**
	 * Adding taxonomy type as swatches
	 *
	 * @param array $fields default array with option 'select'.
	 * @return array
	 * @since  1.1.3
	 */
	public function add_swatch_types( $fields ) {
		if ( ! function_exists( 'get_current_screen' ) ) {
			return $fields;
		}

		$current_screen = get_current_screen();

		if ( isset( $current_screen->base ) && 'product_page_product_attributes' === $current_screen->base ) {
			$fields = wp_parse_args(
				$fields,
				[
					'select' => esc_html__( 'Select', 'pure-wc-swatches' ),
					'color'  => esc_html__( 'Color', 'pure-wc-swatches' ),
					'image'  => esc_html__( 'Image', 'pure-wc-swatches' ),
				]
			);
		}
		return $fields;
	}

	/**
	 * Term meta markup for add form
	 *
	 * @param object $term current term object.
	 * @return void
	 * @since  1.1.3
	 */
	public function add_form_fields( $term ) {
		$type         = TP_Wvs_Helper::get_attr_type_by_name( $this->taxonomy );
		$fields_array = $this->term_meta_fields( $type );
		if ( ! empty( $fields_array ) ) {
			?>
			<div class="form-field <?php echo esc_attr( $fields_array['id'] ); ?>">
				<label for="<?php echo esc_attr( $fields_array['id'] ); ?>"><?php echo esc_html( $fields_array['label'] ); ?></label>
				<?php $this->term_meta_fields_markup( $fields_array, $term ); ?>
				<p class="description"><?php echo esc_attr( $fields_array['desc'] ); ?></p>
			</div>
			<?php
		}
	}

	/**
	 * Saves term meta on add/edit term
	 *
	 * @param int $term_id cureent term id.
	 * @return void
	 * @since  1.1.3
	 */
	public function save_term_fields( $term_id ) {
		$meta_key = '';
		$value    = '';
		if ( isset( $_REQUEST['tpwvs_color'] ) ) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$meta_key = 'tpwvs_color';
			$value    = sanitize_text_field( $_REQUEST['tpwvs_color'] ); //phpcs:ignore WordPress.Security.NonceVerification.Recommended
		} elseif ( isset( $_REQUEST['tpwvs_image'] ) ) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$meta_key = 'tpwvs_image';
			$value    = esc_url_raw( $_REQUEST['tpwvs_image'] ); //phpcs:ignore WordPress.Security.NonceVerification.Recommended
		} else{
			$meta_key = 'tpwvs_select';
			$value    = sanitize_text_field( $_REQUEST['tpwvs_select'] ); //phpcs:ignore WordPress.Security.NonceVerification.Recommended
		}

		update_term_meta( $term_id, $meta_key, $value );
	}

	/**
	 * Adds new column to taxonomy table
	 *
	 * @param array $columns Taxonomy header column.
	 * @return array
	 * @since  1.1.3
	 */
	public function add_attribute_column( $columns ) {
		global $taxnow;
		if ( $this->taxonomy !== $taxnow ) {
			return $columns;
		}

		$attr_type = TP_Wvs_Helper::get_attr_type_by_name( $this->taxonomy );
		if ( ! in_array( $attr_type, [ 'color', 'image', 'select' ], true ) ) {
			return $columns;
		}

		$new_columns = [];
		if ( isset( $columns['cb'] ) ) {
			$new_columns['cb'] = $columns['cb'];
			unset( $columns['cb'] );
		}
		$new_columns['preview'] = esc_html__( 'Preview', 'pure-wc-swatches' );

		return wp_parse_args( $columns, $new_columns );
	}

	/**
	 * Term type markup
	 *
	 * @param string $columns term columns.
	 * @param string $column current term column.
	 * @param id     $term_id current term id.
	 * @return mixed
	 * @since  1.1.3
	 */
	public function add_preview_markup( $columns, $column, $term_id ) {
		global $taxnow;

		if ( $this->taxonomy !== $taxnow || 'preview' !== $column ) {
			return $columns;
		}

		$attr_type = TP_Wvs_Helper::get_attr_type_by_name( $this->taxonomy );
	
		if ( ! in_array( $attr_type, [ 'color', 'image', 'select' ], true ) ) {
			return $columns;
		}

		switch ( $attr_type ) {
			case 'color':
				$color = get_term_meta( $term_id, 'tpwvs_color', true );
				if(empty($color)){
					print( 'No Color');
				}else{
					printf( '<div class="tpwvs-preview" style="background-color:%s;width:30px;height:30px;"></div>', esc_attr( $color ) );
				}
				
				break;

			case 'image':
				$image     = get_term_meta( $term_id, 'tpwvs_image', true );
				$image_url = ! empty( $image ) ? $image : wc_placeholder_img_src();
				$image_url = str_replace( ' ', '%20', $image_url );
				printf( '<img class="tpwvs-preview" src="%s" width="44px" height="44px">', esc_url( $image_url ) );
				break;
			default:
				$label  = !empty(get_term_meta( $term_id, 'tpwvs_select', true ))? get_term_meta( $term_id, 'tpwvs_select', true ) : 'No Label';
				printf( '<span>%1$s</span>', esc_html( $label ) );
				break;
		}
	}

	/**
	 * Term meta fields array
	 *
	 * @param string $type term meta type.
	 * @return array
	 * @since  1.1.3
	 */
	public function term_meta_fields( $type ) {
		if ( empty( $type ) ) {
			return [];
		}

		$fields = [
			'color' => [
				'label' => __( 'Color', 'pure-wc-swatches' ),
				'desc'  => __( 'Choose a color', 'pure-wc-swatches' ),
				'id'    => 'tpwvs_product_attribute_color',
				'type'  => 'color',
			],
			'image' => [
				'label' => __( 'Image', 'pure-wc-swatches' ),
				'desc'  => __( 'Choose an image', 'pure-wc-swatches' ),
				'id'    => 'tpwvs_product_attribute_image',
				'type'  => 'image',
			],
			'select' => [
				'label' => __( 'Tooltip Label', 'pure-wc-swatches' ),
				'desc'  => __( 'A label that will show as tooltip', 'pure-wc-swatches' ),
				'id'    => 'tpwvs_product_attribute_select',
				'type'  => 'select',
			],

		];

		return isset( $fields[ $type ] ) ? $fields[ $type ] : [];
	}

	/**
	 * Returns html markup for selected term meta type
	 *
	 * @param array  $field term meta type data array.
	 * @param object $term current term data.
	 * @return void
	 * @since  1.1.3
	 */
	public function term_meta_fields_markup( $field, $term ) {
		if ( ! is_array( $field ) ) {
			return;
		}

		$value = '';
		if ( is_object( $term ) && ! empty( $term->term_id ) ) {
			$value = get_term_meta( $term->term_id, 'tpwvs_' . $field['type'], true );
		}

		switch ( $field['type'] ) {
			case 'image':
				$value = ! empty( $value ) ? $value : '';
				?>
				<div class="meta-image-field-wrapper">
					<img class="tpwvs-image-preview" height="60px" width="60px" src="<?php echo esc_url( $value ); ?>" alt="<?php esc_attr_e( 'Variation swatches image preview', 'pure-wc-swatches' ); ?>" style="<?php echo ( empty( $value ) ? 'display:none' : '' ); ?>" />
					<div class="button-wrapper">
						<input type="hidden" class="<?php echo esc_attr( $field['id'] ); ?>" name="tpwvs_image" value="<?php echo esc_attr( $value ); ?>" />
						<button type="button" class="tpwvs_upload_image_button button button-primary button-small"><?php esc_html_e( 'Upload image', 'pure-wc-swatches' ); ?></button>
						<button type="button" style="<?php echo ( empty( $value ) ? 'display:none' : '' ); ?>" class="tpwvs_remove_image_button button button-small"><?php esc_html_e( 'Remove image', 'pure-wc-swatches' ); ?></button>
					</div>
				</div>
				<?php
				break;
			case 'color':
				$value = ! empty( $value ) ? $value : '';
				?>
				<input id="tpwvs_color" class="tpwvs_color" type="text" name="tpwvs_color" value="<?php echo esc_attr( $value ); ?>" />
				<?php
				break;
			default:
				$value = ! empty( $value ) ? $value : '';
				?>
				<input id="tpwvs_select" class="tpwvs_select" type="text" name="tpwvs_select" value="<?php echo esc_attr( $value ); ?>" />
				<?php
				break;
		}
	}


	/**
	 * Term meta markup for edit form
	 *
	 * @param object $term current term object.
	 * @return void
	 * @since  1.1.3
	 */
	public function edit_form_fields( $term ) {
		$type         = TP_Wvs_Helper::get_attr_type_by_name( $this->taxonomy );
		$fields_array = $this->term_meta_fields( $type );
		if ( ! empty( $fields_array ) ) {
			?>
			<tr class="form-field">
				<th>
					<label for="<?php echo esc_attr( $fields_array['id'] ); ?>"><?php echo esc_html( $fields_array['label'] ); ?></label>
				</th>
				<td>
					<?php $this->term_meta_fields_markup( $fields_array, $term ); ?>
					<p class="description"><?php echo esc_html( $fields_array['desc'] ); ?></p>
				</td>
			</tr>
			<?php
		}
	}

	/**
	 * Update dettings data in database
	 *
	 * @param string $key options key.
	 * @param string $data user input to be saved in database.
	 * @return boolean
	 * @since  1.1.3
	 */
	public function update_settings( $key, $data ) {
		$data = ! empty( $data) ? json_decode( stripslashes( $data ), true ) : array(); // phpcs:ignore
		$default_data = $this->get_option( $key );
		if ( $data === $default_data ) {
			return true;
		}
		$data = wp_parse_args( $data, $default_data );
		return update_option( $key, $data );
	}

	/**
	 * Get all the settings from DB
	 */

	public function get_settings(){
		$defaults = $this->defaults;
		$settings = array();
		foreach( $defaults as $key => $data ){
			$settings[$key] = $this->get_option($key);
		}

		return $settings;
	}

}
