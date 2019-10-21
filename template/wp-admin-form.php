<div class="wrap">
		
    <h1>Analytics Tag</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcSANY_analyticssettings' ); ?>
        <?php do_settings_sections( 'bcSANY_analyticssettings' ); ?>
        
        
        <table class="bcSANY_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("The Google Analytics or Google Tagmanager ID", 'betajanitor'); ?>
                </th>
                 <td>
                    <?php 
                    $input_vars = array( 'name'=>'google_tags',
                                         'selected'=>get_option('bcSANY_google_tags')
                                       );

                    bcSANY_input_field($input_vars); ?>
                     <p><?php _e('You can paste the Google Analytics or Google Tag Manager ID here. Not sure how to get those? Check out this guide how to obtain the ID.','betaanalytics'); ?></p>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Ways of code placement", 'betajanitor'); ?>
                </th>
                 <td>
                     <p><strong><?php _e('For Google Tagmanager Only!','betaanalytics'); ?></strong></p>
                     <p><?php _e('The custom function is recommended for use in home-built templates only! Otherwise leave this as-is.','betaanalytics'); ?></p>
                    <?php 
                    if(get_option('bcSANY_google_embed')==''){
                        $get_the_embed_id = 0;
                    }else{
                        $get_the_embed_id = get_option('bcSANY_google_embed');   
                    }
                    $input_vars = array( 'name'=>'google_embed',
                                         'options'=>array(
                                                        array('var'=>'0','var_name'=>'Add the Google Tagmanager tag to the footer hook. This is less efficient but still works. (recommended)'),
                                                        array('var'=>'1', 'var_name'=>'Place the function below in your header.php below the body tag. This works better but be careful using this on templates from other developers that will be updated from time to time. Your changes can be lost after an update. Enabling this option will remove the function from the footer hook so you can add it yourself.')
                                                    ),
                                         'selected'=>$get_the_embed_id
                                       );

                    bcSANY_radio_input($input_vars); ?>
                     
                    <?php if (get_option('bcSANY_google_embed')==1){ ?>
                    <br />
                    <p><?php _e('Put this function right below the body element in the header.php file.','betaanalytics'); ?></p>
                    <input type="text"
                           value="if(function_exists(bcSANY_tm_body())){bcSANY_tm_body();}" 
                           class="regular-text code"/>
                    <?php } ?>
                </td>
            </tr> 
		</table>
	
        <?php submit_button(); ?>
     </form>
		
	<h3>Todo</h3>
	<ul>
		<li>Add GTM or UA code</li>
		<li>Select: add automatic GTM in footer or place own function below BODY</li>
		
	</ul>
</div>


<div class="bcSANY_janitor_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcSANY_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
