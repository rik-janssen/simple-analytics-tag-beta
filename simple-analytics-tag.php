<?php 
/**
* Plugin Name: Super Simple Analytics Tag
* Plugin URI: https://rikjanssen.info/plugins/simple-analytics-tag-for-wordpress/
* Description: Google Analytics and Google Tagmanager made easy. 
* Version: 1.3.2
* Author: Rik Janssen
* Author URI: https://rikjanssen.info/
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
		'<a href="' . esc_url( 'https://www.patreon.com/betadev' ) . '">' . __( 'Patreon', 'betaanalytics' ) . '</a>'
	), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSANY_analytics' ) ) . '">' . __( 'Settings', 'betaanalytics' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcSANY_pl_links' );
?>
