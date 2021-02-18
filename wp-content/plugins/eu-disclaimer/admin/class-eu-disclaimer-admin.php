<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://evrardvirginie.fr
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/admin
 * @author     Evrard Virginie <virginie.evrard.contact@gmail.com>
 */

	// Création de la fonction ajouter au menu
	function ajouterAuMenu() {
		$page = 'eu-disclaimer';
		$menu = 'eu-disclaimer';
		$capability = 'edit_pages';
		$slug = 'eu-disclaimer';
		$function = 'disclaimerFonction';
		$icon = '';
		$position = 80;
   
		if (is_admin()) {
			add_menu_page($page, $menu, $capability, $slug, $function, $icon, $position);
		}
	}
	// hook pour réaliser l'action 'admin_menu' <- emplacement / ajouterAuMenu <- fonction à appeler / <- priorité.
	add_action("admin_menu", "ajouterAuMenu", 10);

	// fonction à appeler lorsque l'on clic sur le menu.
	function disclaimerFonction() {
		require_once ('Views/disclaimer-menu.php');
		require_once ('class-eu-disclaimer-admin.php');

	}
	 
	// Création d'un objet "$gerer_table"  
	if (class_exists("Eu_Disclaimer_Activator")) {
		$gerer_table = new Eu_Disclaimer_Activator();
	}
	// On utilise 2 hook, un pour l'installation puis l'autre pour la désinstallation de la table
	if (isset($gerer_table)) {
		register_activation_hook(__FILE__, array($gerer_table, 'activate'));
		register_deactivation_hook(__FILE__, array($gerer_table, 'deactivate'));
	}



	/**
   	 * Active le modal sans utilisation du shortcode. 
     * Utilisation: add_action('nom du hook', 'nom de la fonction');
    */
  	add_action('wp_body_open', 'afficherModalDansBody');
  	function afficherModalDansBody() {
    	echo Eu_Disclaimer_Activator::AfficherDonneModal();
  	}
    

class Eu_Disclaimer_Admin {

	 

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eu_Disclaimer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eu_Disclaimer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eu-disclaimer-admin.css', array(), $this->version, 'all' );
		
		
		}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eu_Disclaimer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eu_Disclaimer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eu-disclaimer-admin.js', array( 'jquery' ), $this->version, false );

		}

}
