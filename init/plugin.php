<?php


global $bcSSAT_basename;

/* make the plugin page row better */

function bcSSAT_pl_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://www.patreon.com/wpaudit' ) . '">' . __( 'Patreon', 'betaanalytics' ) . '</a>'
	), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSSAT_analytics' ) ) . '">' . __( 'Settings', 'betaanalytics' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . $bcSSAT_basename, 'bcSSAT_pl_links' );
