<?php
class usuario{
	var $id;
	var $name;
	var $lastname;
    var $cedula;
    var $username;
    var $password;
    var $estado;

	function set_id($id){
		$this->id=$id;
	}

	function get_id(){
		return $this->id;
	}

	function set_name($name){
		$this->name=$name;
	}

	function get_name(){
		return $this->name;
	}

	function set_last($last){
		$this->lastname=$last;
	}

	function get_last(){
		return $this->lastname;
	}
    
    function set_cedula($cedula){
		$this->cedula=$cedula;
	}

	function get_cedula(){
		return $this->cedula;
	}
    
    function set_username($username){
		$this->username=$username;
	}

	function get_username(){
		return $this->username;
	}
    
    function set_password($password){
		$this->password=$password;
	}

	function get_password(){
		return $this->password;
	}
    
        
    function set_estado($estado){
		$this->estado=$estado;
	}

	function get_estado(){
		return $this->estado;
	}
    
}
