<?php
class User{
    public $username;
    public $password;
    public $is_admin;
    function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->is_admin = false;
    }
    function __toString(){
        return $this->username.$this->is_admin;
    }
    function isAdmin(){
        if($this->username === 'admin' && $this->is_admin){
            return true;
        }else{
            return false;
        }
    }
}

?>