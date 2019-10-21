<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}else{

	delete_option( 'bcSANY_google_tags' );
	delete_option( 'bcSANY_google_embed' );


}
?>