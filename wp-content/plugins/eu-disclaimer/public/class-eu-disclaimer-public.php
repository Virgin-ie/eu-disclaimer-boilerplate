<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://evrardvirginie.fr
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/public
 * @author     Evrard Virginie <virginie.evrard.contact@gmail.com>
 */
class Eu_Disclaimer_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		// Ajout du css à l'activation du plugin
		add_action('wp_head', 'ajouter_css', 1);

			if(!is_admin()):
			  wp_register_style('eu-disclaimer-public', plugins_url ('css/eu-disclaimer-public.css', __FILE__), null, null, false);
			  wp_enqueue_style('eu-disclaimer-public');
			  wp_register_style('modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', null, null, false);
			  wp_enqueue_style('modal');
			endif;
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		  // Ajout du JS à l'activation du plugin    
		 add_action('init', 'inserer_js_dans_footer');

			  if (!is_admin()):
				wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js', null, null, true);
				wp_enqueue_script('jQuery');
				wp_register_script('jQuery_modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', null, null, true);
				wp_enqueue_script('jQuery_modal');
				wp_register_script('jQuery_eu', plugins_url ('js/eu-disclaimer-public.js', __FILE__), array('jQuery'), '1.1', true);
				wp_enqueue_script('jQuery_eu');
			  endif;
		
	}

}
