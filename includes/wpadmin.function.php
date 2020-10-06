<?php 

/* ---------------------------------------- */
/* the WP-admin page with the settings */

function bcSSAT_function_for_analytics(){
	
	// run a custom hook
	do_action('bcSSAT_top_admin');
	
	// this is the page itself that you will find under the wp-admin
	// settings > Offline button
	include plugin_dir_path( __DIR__ ).'templates/wp-admin-form.php';
	
}


/* ---------------------------------------- */
/* Add form data to the database after	    */
/* sanitising the input.	                */ 

function bcSSAT_settings_register() {
	
	// this corresponds to some information added at the top of the form
	$setting_name = 'bcSSAT_analyticssettings';
	
	// sanitize settings
    $args_html = array(
            'type' => 'string', 
            'sanitize_callback' => 'wp_kses_post',
            'default' => NULL,
            );	
	
    $args_int = 'intval';
	
    $args_text = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
	
	// adding the information to the database as options
    register_setting( $setting_name, 'bcSSAT_google_tags', $args_text ); // textarea
    register_setting( $setting_name, 'bcSSAT_google_embed', $args_int ); // radio

    register_setting( $setting_name, 'bcSSAT_share_email', $args_text ); // radio
    register_setting( $setting_name, 'bcSSAT_newsletter', $args_int ); // radio


	
	
}

add_action( 'admin_init', 'bcSSAT_settings_register' );


/* ---------------------------------------- */
/* ---------------------------------------- */
/* input forms and functions                */



/* ---------------------------------------- */
/* This one is a check button for the wpadm */

function bcSSAT_check_input($arg, $label=''){
	if ($arg['selected']==''){
		$arg['selected']=0;
	}
?>
<div class="bcSSAT_check_wrapper">
	<label>
		<input type="checkbox" 
			   name="bcSSAT_<?php echo esc_html($arg['name']); ?>" 
			   value="<?php echo esc_html($arg['val']); ?>"
			   <?php 
				if($arg['selected']==$arg['val']	){ echo "checked"; } ?> />
		<span></span>
		<?php if ($label!=''){ echo "<label>".__($label,'betaanalytics')."</label>"; } ?>
	</label>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is a select dropdown            */

function bcSSAT_select_box($arg){

?>
<div class="bcSSAT_select_wrapper">
	<select name="bcSSAT_<?php echo esc_html($arg['name']); ?>">
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['op_value']==$arg['selected']){$checkme=' selected';}else{$checkme='';}
			?><option value="<?php echo esc_html($value['op_value']); ?>"<?php echo $checkme; ?>><?php echo esc_html($value['op_name']); ?></option><?php
		} ?>
	</select>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is a radio list                 */

function bcSSAT_radio_input($arg){
?>
<div class="bcSSAT_radio_wrapper">
	<label for="bcSSAT_<?php echo esc_html($arg['name']); ?>">
        <ul>
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['var']==$arg['selected']){$checkme=' checked';}else{$checkme='';}
			?><li><label>
              <input type="radio" 
                     value="<?php echo esc_html($value['var']); ?>"
                     name="bcSSAT_<?php echo esc_html($arg['name']); ?>" 
                     <?php echo $checkme; ?>><?php echo $value['var_name']; ?></label></li><?php
		} ?>
        </ul>
	</label>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is an input field               */

function bcSSAT_input_field($arg){
?>
<div class="bcSSAT_input_wrapper">
	<input type="text"
		   name="bcSSAT_<?php echo esc_html($arg['name']); ?>"
		   value="<?php echo esc_html($arg['selected']); ?>"
		   class="regular-text"
		   />
</div>
<?php	
}

