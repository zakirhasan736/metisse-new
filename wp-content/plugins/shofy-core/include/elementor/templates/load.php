<?php
namespace TP_ELEMENTOR\Templates;

use \TP_ELEMENTOR\Templates\TP_Api;
use \TP_ELEMENTOR\Templates\TP_Templates as TP_init;
use \Elementor\Core\Common\Modules\Ajax\Module as Ajax;
use \Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {exit;}

class TP_Load{
    
    private static $instance = null;
   
    protected static $library_data = null;
   
    public function load(){
        add_action( 'elementor/editor/footer', [ $this, 'load_template_views' ], 999);
        add_action( 'elementor/ajax/register_actions', [ $this, 'register_ajax_actions' ] );
    }

    public function load_template_views() {
        include TP_init::dir() . 'templates.php';
    }
   
    public static function get_library() {
        if ( is_null( self::$library_data ) ) {
            self::$library_data = new TP_Api();
        }
        return self::$library_data;
    }
 
    public function register_ajax_actions( Ajax $ajax ) {
        $ajax->register_ajax_action( 'get_tpcore_library_data', function( $data ) {
            if ( ! current_user_can( 'edit_posts' ) ) {
                throw new \Exception( 'Access Denied' );
            }
            if ( ! empty( $data['editor_post_id'] ) ) {
                $editor_post_id = absint( $data['editor_post_id'] );
                if ( ! get_post( $editor_post_id ) ) {
                    throw new \Exception( __( 'Post not found.', 'droit-addons' ) );
                }
                Plugin::$instance->db->switch_to_post( $editor_post_id );
            }
            return self::get_library_data( $data );
        } );
    }

    public static function get_library_data( array $args ) {
        $library_data = self::get_library();
        if ( ! empty( $args['sync'] ) ) {
            $library_data::get_library_data( true );
        }
        return [
            'templates' => $library_data->get_items(),
            'tags'      => $library_data->get_tags(),
            'type_tags' => $library_data->get_type_tags(),
        ];
    }

    public static function instance(){
        if( is_null(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    }
}