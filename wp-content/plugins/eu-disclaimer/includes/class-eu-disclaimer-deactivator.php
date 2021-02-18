<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://evrardvirginie.fr
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 * @author     Evrard Virginie <virginie.evrard.contact@gmail.com>
 */
class Eu_Disclaimer_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	// Suppression de la table
	public static function deactivate() {

		// $wpdb sert à récuperer l'objet contenant les informations relatives à la base de données
		global $wpdb;
		$table_disclaimer = $wpdb->prefix . "disclaimer_options";
		$sql = "DROP TABLE $table_disclaimer";
		$wpdb->query($sql);
	}

}


