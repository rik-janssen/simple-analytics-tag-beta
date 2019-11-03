<?php 
/* ---------------------------------------- */
/* adding the stylesheet to WP-admin */

function bcSANY_css_admin() {
  wp_enqueue_style('beta-analytics-admin', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'bcSANY_css_admin');



/* ---------------------------------------- */
/* the WP-admin page with the settings */

function bcSANY_function_for_analytics(){
	
	// this is the page itself that you will find under the wp-admin
	// settings > Offline button
	include plugin_dir_path( __DIR__ ).'template/wp-admin-form.php';
	
}


/* ---------------------------------------- */
/* Add form data to the database after	    */
/* sanitising the input.	                */ 

function bcSANY_settings_register() {
	
	// this corresponds to some information added at the top of the form
	$setting_name = 'bcSANY_analyticssettings';
	
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
    register_setting( $setting_name, 'bcSANY_google_tags', $args_text ); // textarea
    register_setting( $setting_name, 'bcSANY_google_embed', $args_int ); // radio

	
	
}

add_action( 'admin_init', 'bcSANY_settings_register' );


/* ---------------------------------------- */
/* ---------------------------------------- */
/* input forms and functions                */



/* ---------------------------------------- */
/* This one is a check button for the wpadm */

function bcSANY_check_input($arg, $label=''){
	if ($arg['selected']==''){
		$arg['selected']=0;
	}
?>
<div class="bcSANY_check_wrapper">
	<label>
		<input type="checkbox" 
			   name="bcSANY_<?php echo $arg['name']; ?>" 
			   value="<?php echo $arg['val']; ?>"
			   <?php 
				if($arg['selected']==$arg['val']){ echo "checked"; } ?> />
		<span></span>
		<?php if ($label!=''){ echo "<label>".__($label,'betaanalytics')."</label>"; } ?>
	</label>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is a select dropdown            */

function bcSANY_select_box($arg){

?>
<div class="bcSANY_select_wrapper">
	<select name="bcSANY_<?php echo $arg['name']; ?>">
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['op_value']==$arg['selected']){$checkme=' selected';}else{$checkme='';}
			?><option value="<?php echo $value['op_value']; ?>"<?php echo $checkme; ?>><?php echo $value['op_name'];; ?></option><?php
		} ?>
	</select>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is a radio list                 */

function bcSANY_radio_input($arg){
?>
<div class="bcSANY_radio_wrapper">
	<label for="bcSANY_<?php echo $arg['name']; ?>">
        <ul>
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['var']==$arg['selected']){$checkme=' checked';}else{$checkme='';}
			?><li><label>
              <input type="radio" 
                     value="<?php echo $value['var']; ?>"
                     name="bcSANY_<?php echo $arg['name']; ?>" 
                     <?php echo $checkme; ?>><?php echo $value['var_name']; ?></label></li><?php
		} ?>
        </ul>
	</label>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is an input field               */

function bcSANY_input_field($arg){
?>
<div class="bcSANY_input_wrapper">
	<input type="text"
		   name="bcSANY_<?php echo $arg['name']; ?>"
		   value="<?php echo $arg['selected']; ?>"
		   class="regular-text"
		   />
</div>
<?php	
}


/* ---------------------------------------- */
/* This one is a textarea field             */

function bcSANY_textarea_field($arg){
?>
<div class="bcSANY_textarea_wrapper">
	<textarea name="bcSANY_<?php echo $arg['name']; ?>" 
			  class="large-text code"
			  rows="10"
			  cols="50"><?php echo $arg['selected']; ?></textarea>
</div>
<?php	
}

// the more complex image select field
add_action ( 'admin_enqueue_scripts', function () {
    if (is_admin ())
        wp_enqueue_media ();
} );


/* ---------------------------------------- */
/* This one is an image select field        */

function bcSANY_imageselect_field($arg){
	
	$imgid =(isset( $arg[ 'selected' ] )) ? $arg[ 'selected' ] : "";
	$img    = wp_get_attachment_image_src($imgid, 'thumbnail');

	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		var $ = jQuery;
		if ($('.<?php echo 'bcSANY_'.$arg['name']; ?>').length > 0) {
			if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
				$('.<?php echo 'bcSANY_'.$arg['name']; ?>').on('click', function(e) {
					e.preventDefault();
					var button = $(this);
					var id = button.prev();
					wp.media.editor.send.attachment = function(props, attachment) {
						id.val(attachment.id);
					};
					wp.media.editor.open(button);
					return false;
				});
			}
		}
	});
	</script>
	<div class="bcSANY_select_wrapper">
	<?php 
	if($img != "") { ?>
	<div class="bcSANY_thumbnail">
		<img src="<?= $img[0]; ?>" width="80px" />
		<p><?php _e('The currently selected image.','betaanalytics'); ?></p>
	</div>
	<p><?php _e('Select a new image or paste a image ID to replace the one above:','betaanalytics'); ?></p>

	<?php }else{ ?>
	<p><?php _e('Select an image or paste an image ID:','betaanalytics'); ?></p>	
	<?php }	?>
	<input type="text" 
		   value="<?php echo $arg['selected']; ?>" 
		   class="regular-text process_custom_images" 
		   id="process_custom_images" 
		   name="<?php echo 'bcSANY_'.$arg['name']; ?>" 
		   max="" 
		   min="1" 
		   step="1" />
	<button class="<?php echo 'bcSANY_'.$arg['name']; ?> button"><?php _e('Media library','betaanalytics'); ?></button>
	</div>
	<?php
}

?>