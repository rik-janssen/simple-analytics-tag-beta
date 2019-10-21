<?php


/* ---------------------------------------- */
/* Setting up the navigation */

function bcSANY_admin_menu_jan_siteoffline() {
    
    // add the sub menu page for the plugin
	// https://codex.wordpress.org/Adding_Administration_Menus
    add_submenu_page( 
        'options-general.php', 
        'The Janitor', 
        'The Janitor', 
        'manage_options', 
        'bcSANY_janitor', 
        'bcSANY_function_for_jan'  // this should correspond with the function name
    ); 
}

add_action( 'admin_menu', 'bcSANY_admin_menu_jan_siteoffline' );





?>
