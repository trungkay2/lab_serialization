<?php
highlight_file(__FILE__);
class Example
{
    public $hook;

    function __construct($hook){
        // $name = str_replace(array('/','\\','.'), '', $name);
        $this->hook = $hook;
        
    }
    
    function __wakeup(){
        if (isset($this->hook)) echo shell_exec($this->hook);
    }

}

unserialize($_GET['data']);
?>