<?php 
/**
* Plugin Name: Super Simple Analytics Tag
* Plugin URI: https://rikjanssen.info/plugins/simple-analytics-tag-for-wordpress/
* Description: Placing Google Analytics and Google Tagmanager tags on your website made easy. 
* Version: 1.4.1
* Author: Rik Janssen
* Author URI: https://rikjanssen.info/
* Text Domain: betaanalytics
* Domain Path: /lang
**/


global $bcSSAT_basename;
$bcSSAT_basename = plugin_basename( __FILE__ );

include('load.php'); 
include('init/plugin.php'); 
include('init/activate.php'); 

register_deactivation_hook( __FILE__, 'bcSSAT_deactivate' );
register_activation_hook( __FILE__, 'bcSSAT_activate' );
