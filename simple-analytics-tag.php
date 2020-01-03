<?php 
/**
* Plugin Name: Simple Analytics Tag
* Plugin URI: https://betacore.tech/plugins/simple-analytics-tag-for-wordpress/
* Description: Google Analytics and Google Tagmanager made simple. Works with Wordpress 5.3 Kirk.
* Version: 1.3
* Rik Janssen (Beta)
* Author URI: https://betacore.tech/
* Text Domain: betaanalytics
* Domain Path: /lang
**/

//betaanalytics

/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-wp-admin.php'); // the wp-admin navigation
include_once('inc/functions-analytics.php'); // the meat of the plugin


/* make the plugin page row better */

function bcSANY_pl_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://www.paypal.com/donate/?token=y9x2_N0_18pSbdHE9l9jivsqB3aTKgWQ3qGgxg_t6VUUmSU6B2H1hUcANUBzhX5xV0qg2G&country.x=NL&locale.x=NL' ) . '">' . __( 'Donate', 'betaanalytics' ) . '</a>'
    ), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSANY_analytics' ) ) . '">' . __( 'Settings', 'betaanalytics' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcSANY_pl_links' );
?>
