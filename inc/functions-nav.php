<?php


/* ---------------------------------------- */
/* Setting up the navigation */

function bcSANY_admin_menu_analytics_siteoffline() {
    
    // add the sub menu page for the plugin
	// https://codex.wordpress.org/Adding_Administration_Menus
    add_submenu_page( 
        'options-general.php', 
        'Analytics Tag', 
        'Analytics Tag', 
        'manage_options', 
        'bcSANY_analytics', 
        'bcSANY_function_for_analytics'  // this should correspond with the function name
    ); 
}
add_action( 'admin_menu', 'bcSANY_admin_menu_analytics_siteoffline' );





?>
