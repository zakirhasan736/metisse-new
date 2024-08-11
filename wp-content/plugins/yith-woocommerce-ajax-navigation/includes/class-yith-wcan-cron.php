<?php
/**
 * Cron Handler
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH\AjaxProductFilter\Classes
 * @version 4.0.0
 */

if ( ! defined( 'YITH_WCAN' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'YITH_WCAN_Cron' ) ) {
	/**
	 * This class handles cron for filter plugin
	 *
	 * @since 4.0.0
	 */
	class YITH_WCAN_Cron {
		/**
		 * Array of events to schedule
		 *
		 * @var array
		 */
		protected $crons = array();

		/**
		 * Single instance of the class
		 *
		 * @var \YITH_WCAN_Cron
		 * @since 3.0.0
		 */
		protected static $instance;

		/**
		 * Constructor
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'schedule' ) );
		}

		/**
		 * Returns registered crons
		 *
		 * @return array Array of registered crons ans callbacks
		 */
		public function get_crons() {
			if ( empty( $this->crons ) ) {
				$this->crons = array(
					'yith_wcan_delete_expired_transients' => array(
						'schedule' => 'daily',
						'callback' => array( 'YITH_WCAN_Cache_Helper', 'clean' ),
					),
				);
			}

			/**
			 * APPLY_FILTERS: yith_wcan_crons
			 *
			 * Filters array of crons available for the plugin.
			 *
			 * @param array $crons Array of existing crons.
			 *
			 * @return array
			 */
			return apply_filters( 'yith_wcan_crons', $this->crons );
		}

		/**
		 * Schedule events not scheduled yet; register callbacks for each event
		 *
		 * @return void
		 */
		public function schedule() {
			$crons = $this->get_crons();

			if ( ! empty( $crons ) ) {
				foreach ( $crons as $hook => $data ) {

					add_action( $hook, $data['callback'] );

					if ( ! wp_next_scheduled( $hook ) ) {
						wp_schedule_event( time() + MINUTE_IN_SECONDS, $data['schedule'], $hook );
					}
				}
			}
		}

		/**
		 * Returns single instance of the class
		 *
		 * @return \YITH_WCAN_Cron
		 * @since 3.0.0
		 */
		public static function instance() {
			$class = static::class;

			if ( class_exists( "{$class}_Extended" ) ) {
				return YITH_WCAN_Cron_Extended::instance();
			}

			if ( is_null( static::$instance ) ) {
				static::$instance = new static();
			}

			return static::$instance;
		}
	}
}

/**
 * Unique access to instance of YITH_WCAN_Cron class
 *
 * @return \YITH_WCAN_Cron
 * @since 3.0.0
 */
function YITH_WCAN_Cron() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	return YITH_WCAN_Cron::instance();
}
