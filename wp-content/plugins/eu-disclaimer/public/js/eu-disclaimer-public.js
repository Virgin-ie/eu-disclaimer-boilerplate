(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 // Creer un cookie
	function creerUnCookie(nomCookie, valeurCookie, dureeJours) {
    	//Si le nombre de jours est spécifié
    	if(dureeJours) {
        	var date = new Date();
        	// Converti le nombre de jours spécifiés en millisecondes
        	date.setTime(date.getTime()+(dureeJours * 24*60*60*1000));
        	var expire = "; expire="+date.toGMTString();
    	}
    	// Si aucune valeur de jour n'est spécifié
    	else
        	var expire = "";
        	document.cookie = nomCookie + "=" + valeurCookie + expire + "; path=/";
	}

	// Fonction pour lire le cookie
	function lireUnCookie(nomCookie) {
		// Ajoute le signe égale virgule au nom pour la recherche dans le tableau contenant tous les cookies
		var nomFormate = nomCookie + "=";
		// Tableau contenant tous les cookies
		var tableauCookies = document.cookie.split(';');
	
		// Recherche dans le tableaau le cookie en question
		for(var i=0; i < tableauCookies.length; i++) {
			var cookieTrouve = tableauCookies[i];
			// Tant que l'on trouve un espace on le supprime
			while (cookieTrouve.charAt(0) == ' ') {
				cookieTrouve = cookieTrouve.substring(1, cookieTrouve.length);
			}
			if(cookieTrouve.indexOf(nomFormate) == 0) {
				return cookieTrouve.substring(nomFormate.length, cookieTrouve.length);
			}
		}
		// On retrouve une valeur null dans le cas où aucun cookie n'est trouvé
		return null;
	}

	// Création d'une fonction que l'on va associer au bouton Oui de notre modal 
	document.getElementById("actionDisclaimer").addEventListener("click", accepterLeDisclaimer);
	function accepterLeDisclaimer() {
		creerUnCookie('eu-disclaimer-vapobar', "ejD86j7ZXF3x", 1);
		var cookie = lireUnCookie('eu-disclaimer-vapobar');
		
	}

	// Si le cookie n'a pas la bonne valeur, alors on affiche le modal
	jQuery(document).ready(function($) {
    	if(lireUnCookie('eu-disclaimer-vapobar') != "ejD86j7ZXF3x") {
        	$("#monModal").modal({
            	escapeClose: false,
            	clickClose: false,
            	showClose: false
        	});
    	}
	});
})( jQuery );
