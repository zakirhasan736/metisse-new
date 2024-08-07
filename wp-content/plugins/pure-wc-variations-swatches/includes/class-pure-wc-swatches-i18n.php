<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://themepure.net
 * @since      1.1.1
 *
 * @package    Tp_Wvs
 * @subpackage Tp_Wvs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1.1
 * @package    Tp_Wvs
 * @subpackage Tp_Wvs/includes
 * @author     ThemePure <themepure@gmail.com>
 */
class Tp_Wvs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.1.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pure-wc-swatches',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
