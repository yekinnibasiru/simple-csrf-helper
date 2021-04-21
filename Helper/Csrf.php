<?php

class Csrf {

    /*
     * Author's Name: Yekinni Basiru
     * Language: PHP
     * Project Name: Simple Csrf Helper Class
     */


    private $token_expiry=7200; // Expires in two hours 2*60*60
    private $field_name='csrf_token'; // Value of name attribute for input tag
    private $token_key='$tui*&_-lpnwj%';// This is a super cool secret

    
    public function __construct(){
        $this->Init(); //Checks if there is csrf token and if the token has not expired
    }

    public function setExpiry($expiry){ //Set expiry in parameter in seconds 1 hour=1 * 60 * 60 and pass it in
        $this->token_expiry=$expiry;
    }

    public function setTokenName($tokenname){ // Set Token input field name
        $this->field_name=$tokenname;
    }

    public function setTokenKey($key){ // Set super random secret key make sure you set this
        $this->token_key=$key;
    }

    public function isValidRequest(){ // Checks the validity of the request 
        if(!hash_equals($_POST[$this->field_name],$_SESSION['csrf']['token']) || $_SESSION['csrf']['expiry'] < time()){
            die("Request cannot be processed");
        }
    }

    public function tokenField(){ // Print the hidden input tag field with csrf token value
        $token=$this->field_name;
        $token_value=$_SESSION['csrf']['token'];
        $html="<input type='hidden' name='$token' value='$token_value'>";
        echo $html;
    }

    private function Init(){ // Instantiate and set the csrf load
        if(array_key_exists('csrf',$_SESSION)){
            if(empty($_SESSION['csrf']['token']) || $_SESSION['csrf']['expiry'] < time()){
                $this->generateToken();
            }
        }
        else {
            $this->generateToken();
        }
    }

    private function generateToken(){// Generate a random token unique per session_id() and time()
        $token=hash_hmac('sha256',session_id().time(),$this->token_key);
        $token=substr($token,0,32);
        $_SESSION['csrf']=array(
            'token' => $token ,
            'expiry' => time() + $this->token_expiry
        );
    }


}



?>