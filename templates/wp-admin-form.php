<div class="wrap">
		
    <h1>Analytics Tag</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcSSAT_analyticssettings' ); ?>
        <?php do_settings_sections( 'bcSSAT_analyticssettings' ); ?>
        
        
        <table class="bcSSAT_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("The Google Analytics or Google Tagmanager ID", 'betaanalytics'); ?>
                </th>
                 <td>
                    <?php 
                    $input_vars = array( 'name'=>'google_tags',
                                         'selected'=>get_option('bcSSAT_google_tags')
                                       );

                    bcSSAT_input_field($input_vars); ?>
                     <p><?php _e('You can paste the Google Analytics (UA) or Google Tag Manager (GTM) ID here. Not sure how to get those? Check out this guide how to obtain the ID for <a href="https://support.google.com/analytics/answer/1008080?hl=en" target="_blank">Google Analytics</a> or <a href="https://support.google.com/tagmanager/answer/6103696?hl=en" target="_blank">Google Tagmanager</a>.','betaanalytics'); ?></p>
                </td>
            </tr> 
            <?php if(bcSSAT_tag_type()=='GTM'){ ?>
            <tr valign="top">
                <th scope="row">
                    <?php _e("Ways of code placement", 'betajanitor'); ?>
                </th>
                 <td>
                     <p><strong><?php _e('For Google Tagmanager Only!','betaanalytics'); ?></strong></p>
                     <p><?php _e('The custom function is recommended for use in home-built templates only! Otherwise leave this as-is.','betaanalytics'); ?></p>
                    <?php 
                    if(get_option('bcSSAT_google_embed')==''){
                        $get_the_embed_id = 0;
                    }else{
                        $get_the_embed_id = get_option('bcSSAT_google_embed');   
                    }
                    $input_vars = array( 'name'=>'google_embed',
                                         'options'=>array(
                                                        array('var'=>'0','var_name'=>'<strong>For newer themes: </strong>Add the Google Tagmanager tag to the wp_body_open hook. If you have your custom template you meight want to add the wp_body_open(); function just below the body tag. (recommended)'),
                                                        array('var'=>'1', 'var_name'=>'<strong>The DIY solution: </strong>Place the function below in your header.php below the body tag. This works better but be careful using this on templates from other developers that will be updated from time to time. Your changes can be lost after an update. Enabling this option will remove the function from the footer hook so you can add it yourself.'),
                                                        array('var'=>'2', 'var_name'=>'<strong>For older themes:</strong> place the GTM function in the footer hook. This is less efficient but still works.')
                                                    ),
                                         'selected'=>$get_the_embed_id
                                       );

                    bcSSAT_radio_input($input_vars); ?>
                     
                    <?php if (get_option('bcSSAT_google_embed')==1){ ?>
                    <br />
                    <p><?php _e('Put this function right below the body element in the header.php file.','betaanalytics'); ?></p>
                    <input type="text"
                           value="bcSSAT_tm_body();" 
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

            <tr valign="top">
                <th scope="row">
                    <?php _e("Share your email address with me", 'betaanalytics'); ?>
                </th>
                 <td>
                    <?php 
                    if(get_option('bcSSAT_share_email')==''){
                        $bcSSAT_share_email = '';
                    }else{
                        $bcSSAT_share_email = get_option('bcSSAT_share_email');   
                    }

                    $input_vars = array( 'name'=>'share_email',
                                         'selected'=>$bcSSAT_share_email
                                       );

                    bcSSAT_input_field($input_vars); ?>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Sign up for the newsletter", 'betaanalytics'); ?>
                </th>
                 <td>
                    <?php 
                    $input_vars = array( 'name'=>'newsletter',
                                         'selected'=>get_option('bcSSAT_newsletter'),
                                         'val'=>1
                                       );

                    bcSSAT_check_input($input_vars); ?>
                     <p><?php _e('A couple of times a year I send out a newsletter with new projects, cool new WordPress tips and tricks and more. You can also reply to emails so we can get into conversation on how to make this plugin better. No spam, I promise!','betaanalytics'); ?></p>
                </td>
            </tr> 
		</table>
	
        <?php submit_button(); ?>
     </form>
</div>