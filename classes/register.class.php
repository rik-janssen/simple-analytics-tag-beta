<?php
// this can be wrapped into a plugin


class RJinfoWave{

    // The url you wish to send the POST request to
    protected $url = 'https://api.rikjanssen.info/wave/v1/';
    protected $softid = 'SSAT';
    protected $interval = 86400; // check tomorrow
    protected $token;
    protected $siteName;
    protected $siteUrl;
    protected $output;

    // Check what data is available and fill in the blanks
    public function __construct(){

        $this->siteUrl = get_bloginfo('url');
        
    }

    public function toggle($do='ACTIVATE'){

        // allowed inputs
        $hs = array(
            'ACTIVATE',
            'DEACTIVATE',
            'DELETE'
        );

        if(!in_array($do, $hs)){ return; }
        
        // The data you want to send
        $fields = [
            'POST'     => 'EDIT', // WAVE (sign up or update), DELETE (delete all request) or UNINSTALL (set SOFTID to 0)
            'DO'       => $do,
            'URL'      => $this->siteUrl,
            'TOKEN'    => get_option('bc'.$this->softid.'_token'),
            'SOFTID'   => $this->softid,
            
        ];


        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $this->url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $this->output = curl_exec($ch);

    }

    public function wave(){

        // check if its time for a wave and run the sequence
        if($this->getTime()!=1){
            $this->waveAtAPI();
            $this->jsonDecode();
            $this->saveOptions();
            $this->resetTime();
        }

    }

    protected function waveAtAPI(){

        if(get_option('bcSSAT_newsletter')==1){
            $f['email_newsletter'] = 1;
        }else{
            $f['email_newsletter'] = 0;
        }

        if(get_option('bcSSAT_share_email')!=''){
            $f['email'] = get_option('bcSSAT_share_email');
        }else{
            $f['email'] = 'none';
        }

        // The data you want to send
        $fields = [
            'POST'     => 'WAVE', // WAVE (sign up or update), DELETE (delete all request) or UNINSTALL (set SOFTID to 0)
            'URL'      => $this->siteUrl,
            'SOFTID'   => $this->softid,
            'email'    => $f['email'],
            'email_newsletter' => $f['email_newsletter']
        ];

        //url-ify the data for the POST
        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $this->url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $this->output = curl_exec($ch);

    }

    protected function jsonDecode(){

        if($this->output==''){ return; }
        $this->output = json_decode($this->output);
        
    }

    protected function saveOptions(){

        if($this->output==''){ return; }
        $o = $this->output;

        // sanitize the array first
        foreach($o as $k=>$v){

            $k = sanitize_text_field($k);
            $v = sanitize_text_field($v);

            update_option('bc'.$this->softid.'_'.$k,$v);

        }
        

    }

    protected function resetTime(){
        
        // reset the time!
        set_transient('bc'.$this->softid.'_api_call',1,$this->interval);
                
    }

    protected function getTime(){
        
        // reset the time!
        return get_transient('bc'.$this->softid.'_api_call');
                
    }

    public function show(){

        return $this->output;

    }

}