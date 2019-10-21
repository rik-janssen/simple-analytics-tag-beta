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
                     <p><?php _e('You can paste the Google Analytics (UA) or Google Tag Manager (GTM) ID here. Not sure how to get those? Check out this guide how to obtain the ID for <a href="https://support.google.com/analytics/answer/1008080?hl=en" target="_blank">Google Analytics</a> or <a href="https://support.google.com/tagmanager/answer/6103696?hl=en" target="_blank">Google Tagmanager</a>.','betaanalytics'); ?></p>
                </td>
            </tr> 
            <?php if(bcSANY_tag_type()=='GTM'){ ?>
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
                                                        array('var'=>'0','var_name'=>'<strong>For newer themes: </strong>Add the Google Tagmanager tag to the wp_body_open hook. If you have your custom template you meight want to add the wp_body_open(); function just below the body tag. (recommended)'),
                                                        array('var'=>'1', 'var_name'=>'<strong>The DIY solution: </strong>Place the function below in your header.php below the body tag. This works better but be careful using this on templates from other developers that will be updated from time to time. Your changes can be lost after an update. Enabling this option will remove the function from the footer hook so you can add it yourself.'),
                                                        array('var'=>'2', 'var_name'=>'<strong>For older themes:</strong> place the GTM function in the footer hook. This is less efficient but still works.')
                                                    ),
                                         'selected'=>$get_the_embed_id
                                       );

                    bcSANY_radio_input($input_vars); ?>
                     
                    <?php if (get_option('bcSANY_google_embed')==1){ ?>
                    <br />
                    <p><?php _e('Put this function right below the body element in the header.php file.','betaanalytics'); ?></p>
                    <input type="text"
                           value="bcSANY_tm_body();" 
                           class="regular-text code"/>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
					    <tr valign="top">
                <th scope="row">
                    <?php _e("Show this plugin some love", 'betaanalytics'); ?>
                </th>
                 <td>
					<a href="https://wordpress.org/plugins/simple-analytics-tag-beta/" target="_blank"><?php _e('Write a review and rate this plugin.','betaanalytics'); ?></a>
                </td>
            </tr> 
		</table>
	
        <?php submit_button(); ?>
     </form>
</div>


<div class="bcSANY_janitor_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcSANY_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
