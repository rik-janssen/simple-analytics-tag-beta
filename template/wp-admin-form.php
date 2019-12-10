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

$bcALG_my_plugins = array(
    array(
        'slug'=>'super-simple-site-offline-beta',
        'name'=>'Super Simple Site Offline',
        'features'=>'https://betacore.tech/plugins/super-simple-site-offline-for-wordpress/',
        'content'=>'Site offline plugins are made awesome again with this piece of code. While most site offline plugins are bulky, intrusive and annoying this one is as light as a feather and has no paid options. The nav item is neatly tucked away within the settings menu so it feels like it is part of WordPress.' ),
    array(
        'slug'=>'simple-analytics-tag-beta',
        'name'=>'Simple Analytics Tag',
        'features'=>'https://betacore.tech/plugins/simple-analytics-tag-for-wordpress/',
        'content'=>'Simple Analytics Tag helps you get up and running quick. This plugin has a non-intrusive interface and fits very well within the Wordpress Settings menu. Just paste in the ID from Google Tagmanager or Google Analytics and you are good to go.' ),
    array(
        'slug'=>'super-simple-age-gate-beta',
        'name'=>'Super Simple Age Gate',
        'features'=>'https://betacore.tech/plugins/super-simple-age-gate-for-wordpress/',
        'content'=>"Do you have to filter out younger visitors? With this super simple age gate you'll fix those age restrictions quickly. Ment for webshops and other types of websites that has to have a curtain where people below your set age can't peek behind.." ),
    array(
        'slug'=>'age-checkbox-for-woocommerce',
        'name'=>'Age Checkbox for Woocommerce',
        'features'=>'https://betacore.tech/plugins/age-checkbox-for-woocommerce/',
        'content'=>"Complementary to the Super Simple Age Gate this adds an additional checkbox to the checkout form so customers have to confirm that they are age 18 (you can modify the age) or up." )

);

// get the slug of this plugin
$get_slug = explode('/', plugin_basename( __FILE__ ));
?>
<div class="bcALG_footer">

<div class="bcALG_mailinglist">
<form action="https://oneweekendwebsite.us20.list-manage.com/subscribe/post?u=72e22e9c5e66e05351f6c92af&amp;id=87b9e508b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<h2>Are you running Wordpress inefficient? <span>Betacore is developing plugins to fix that!</span></h2>
<p>Get an email when new plugins arrive! The only thing you'll have to do is subscribe to the mailing list now!</p>
<ul class="bcALG_mailingform">
    <li>
        

        <input type="text" value="" name="FNAME" class="" id="mce-FNAME" required>
        <label for="mce-FNAME">First Name</label>
    </li>
    <li>
        
        
        
        <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" required/>
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
<br />
<h2>Making Wordpress more awesome <span>with useful plugins like these...</span></h2>

<ul class="bcALG_plugins">
<?php foreach($bcALG_my_plugins as $bc_id => $bc_value){ 
if($get_slug[0] != $bc_value['slug']){
?>
<li>
    <img src="<?php echo plugin_dir_url( __DIR__ ).'img/'.$bc_value['slug'].'.png'; ?>" title="<?php echo $bc_value['name']; ?> by Beta" class="bcALG_icon" />
    <h3><a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" target="_blank"><?php echo $bc_value['name']; ?></a></h3>
    <p><?php echo $bc_value['content']; ?></p>
    <a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" class="button" target="_blank"><?php _e('Plugin page'); ?></a>
    <?php if (isset($bc_value['features'])){ ?>
    <a href="<?php echo $bc_value['features']; ?>" class="button" target="_blank"><?php _e('Features'); ?></a>
    <?php } ?>
    <a href="<?php bloginfo('wpurl'); ?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=<?php echo $bc_value['slug']; ?>&TB_iframe=false" class="button button-primary" target="_blank"><?php _e('Install'); ?></a>
</li>

<?php }} ?>
</ul>


<div class="bcALG_logobar">
<a href="https://beta-media.com/super-simple-site-gate-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
<p class="bcALG_url"><span>By:</span> <a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
</div>