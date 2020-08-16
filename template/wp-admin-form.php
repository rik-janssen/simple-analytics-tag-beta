<div class="wrap">
		
    <h1>Analytics Tag</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcSANY_analyticssettings' ); ?>
        <?php do_settings_sections( 'bcSANY_analyticssettings' ); ?>
        
        
        <table class="bcSANY_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("The Google Analytics or Google Tagmanager ID", 'betaanalytics'); ?>
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


<?php 
/* ------------------------ */
/* THE FOOTER.              */
$u = wp_get_current_user();

?>
<div class="bcALG_footer">

    <div class="bcALG_mailinglist">
        <form action="https://oneweekendwebsite.us20.list-manage.com/subscribe/post?u=72e22e9c5e66e05351f6c92af&amp;id=87b9e508b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h2>Get an email when new plugins or important updates arrive <span>and run an efficient Wordpress site!</span></h2>
            <p>Just subscribe to my mailinglist and be informed. Don't worry, I don't like spam either but if you'd like some usefull nuggets of information in your inbox, I'd reccommend you join the list. I'm not biased at all. I know. Right?</p><br />
            <ul class="bcALG_mailingform">
                <li>
                    
			
					<input type="text" value="<?php echo ucfirst($u->data->user_nicename); ?>" name="FNAME" class="" id="mce-FNAME" required>
					<label for="mce-FNAME">First Name</label>
                </li>
                <li>
                    
                    
					
					<input type="text" value="<?php echo $u->data->user_email; ?>" name="EMAIL" class="required email" id="mce-EMAIL" required/>
					<label for="mce-EMAIL">Email Address</label>
                </li>
                <li>
					<input type="submit" value="Join!" name="subscribe" id="mc-embedded-subscribe" />
                </li>
				

    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72e22e9c5e66e05351f6c92af_87b9e508b0" tabindex="-1" value=""></div>


            </ul>
        </form>
    </div>


	<div class="bcALG_logobar">
    <a href="https://rikjanssen.info"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
    <p class="bcALG_url"><span>By:</span> <a href="https://rikjanssen.info" target="_blank">rikjanssen.info</a></p>
	</div>
</div>
