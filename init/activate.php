<?php
// if uninstall.php is not called by WordPress, die
function bcSSAT_deactivate(){

	// call to API to signal uninstall

	$r = new RJinfoWave();
	$r->toggle('DEACTIVATE');
	
	delete_option( 'bcSSAT_google_tags' );
	delete_option( 'bcSSAT_google_embed' );
	delete_option( 'bcSSAT_share_email' );
	delete_option( 'bcSSAT_newsletter' );
	delete_option( 'bcSSAT_status' );
	delete_option( 'bcSSAT_timestamp' );
	delete_option( 'bcSSAT_token' );
	delete_transient( 'bcSSAT_api_call' );


}




function bcSSAT_activate(){

	// call to API to signal install
	$r = new RJinfoWave();
	$r->wave();

}
