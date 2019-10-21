<div class="wrap">
		
    <h1>The WP-admin Janitor</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcSANY_offlinesettings' ); ?>
        <?php do_settings_sections( 'bcSANY_offlinesettings' ); ?>
        
        
        <table class="bcSANY_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Disable the posts", 'betajanitor'); ?>
                </th>
                 <td>
                    <?php 
                    $check_vars = array( 'name'=>'disable_posts',
                                         'val'=>'1',
                                         'selected'=>get_option('bcSANY_disable_posts')
                                       );

                    bcSANY_check_input($check_vars, 'Disable the posts from the WP-admin menu.'); ?>
                </td>
            </tr> 
		</table>
	
        <?php submit_button(); ?>
     </form>
		
	<h3>Todo</h3>
	<ul>
		<li>Change top icon for own logo</li>
		<li>Change login icon for own logo</li>
		<li>Clean up widgets (one by one)</li>
        <li>Enable the oldscool links</li>
        <li>Disable the posts</li>
        <li>Disable the comments site wide</li>
        <li>The option to email an update every monday (updates, php version etc)</li>
		<li>Keep this plugin for administrators only (level check)</li>
		<li>New widget: popular posts</li>
		<li>New widget: plugins, themes and other things that need updates and health status</li>
        <li>New widget: custom widget for contact details</li>
        <li>Tab: offline -> install plugin from there if needed, forward tab when installed</li>
        <li>Tab: clean analytics (new) -> install plugin from there if needed, forward tab when installed</li>
        <li>branding.php -> add a branding file so we can upload this for commpanion and then use it on multiple sites</li>
	</ul>
</div>


<div class="bcSANY_janitor_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcSANY_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
