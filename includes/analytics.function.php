<?php 

/* ---------------------------------------- */
/* The Tracking tag for GA and TM header    */

function bcSSAT_tracking_head(){
    
     $the_google_id = substr(get_option( 'bcSSAT_google_tags' ), 0,16);
    
    if(bcSSAT_tag_type()=='UA'){
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_html($the_google_id); ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '<?php echo esc_html($the_google_id); ?>');
        </script>
        <?php
        
    }elseif(bcSSAT_tag_type()=='GTM'){
        ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_html($the_google_id); ?>');</script>
        <!-- End Google Tag Manager -->
        <?php
    }
}

add_action( 'wp_head', 'bcSSAT_tracking_head' , 5);


/* ---------------------------------------- */
/* The TM body function, for new themes     */

function bcSSAT_tracking_body(){
    
    $the_google_id = substr(get_option( 'bcSSAT_google_tags' ), 0,16);
    $setting_gtm_diy = substr(get_option( 'bcSSAT_google_embed' ), 0,1);
    if($setting_gtm_diy==0){
        if(bcSSAT_tag_type()=='GTM'){
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_html($the_google_id); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
    }
    
}

add_action( 'wp_body_open', 'bcSSAT_tracking_body' , 1);


/* ---------------------------------------- */
/* The TM body function, for old themes     */

function bcSSAT_tracking_footer(){
    
    $the_google_id = substr(get_option( 'bcSSAT_google_tags' ), 0,16);
    $setting_gtm_diy = substr(get_option( 'bcSSAT_google_embed' ), 0,1);
    if($setting_gtm_diy==2){
        if(bcSSAT_tag_type()=='GTM'){
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_html($the_google_id); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
    }
    
}

add_action( 'wp_footer', 'bcSSAT_tracking_footer' , 1);


/* ---------------------------------------- */
/* The TM body function, for custom and old */

function bcSSAT_tm_body(){
    
    $the_google_id = substr(get_option( 'bcSSAT_google_tags' ), 0,16);
    $setting_gtm_diy = substr(get_option( 'bcSSAT_google_embed' ), 0,1);

    /* this is the DIY function */
    if($setting_gtm_diy==1){
         if(bcSSAT_tag_type()=='GTM'){
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_html($the_google_id); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
        
    }
    
}


/* ---------------------------------------- */
/* Get the full type code                   */

function bcSSAT_tag_type(){
    
    $the_google_tag = substr(get_option( 'bcSSAT_google_tags' ), 0,2);
    
    if($the_google_tag=='GT'){$the_google_tag='GTM';}
    
    return $the_google_tag;
    
}

?>