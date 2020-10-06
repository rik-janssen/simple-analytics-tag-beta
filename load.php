<?php

// Basic (interface and workings) functions
include_once( 'includes/nav.function.php' ); // the wp-admin navigation
include_once( 'includes/wpadmin.function.php' ); // the wp-admin navigation
include_once( 'includes/analytics.function.php' ); // the meat of the plugin

// Register the API works
include_once( 'classes/register.class.php'); // the meat of the plugin

// Check for connection from time to time
add_action('admin_init','bcSSAT_waveplugin');

function bcSSAT_waveplugin(){
    $r = new RJinfoWave();
    $r->wave();
}
