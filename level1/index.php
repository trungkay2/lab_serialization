<?php
highlight_file(__FILE__);
class User
{
    public $name;
    public $email;
    public $address;

    function __construct($name, $email, $address){
        // $name = str_replace(array('/','\\','.'), '', $name);
        $this->name = $name;
        $this->backupFile = "/backup/users/" . $name;
        $this->email = $email;
        $this->address = $address;
    }
    
    function __wakeup(){
        $this->backupUser();
    }

    function backupUser(){
        $file = fopen($this->backupFile, "w");
        fwrite($file, $this->name . " " . $this->email . " " . $this->address);
        fclose($file);
    }
}

unserialize($_GET['data']);
?>