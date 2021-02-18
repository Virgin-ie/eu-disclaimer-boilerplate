<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://evrardvirginie.fr
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 * @author     Evrard Virginie <virginie.evrard.contact@gmail.com>
 */
class Eu_Disclaimer_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'eu-disclaimer',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
