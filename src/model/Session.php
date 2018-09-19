<?php
//require_once("../util/MyInit.php");

class Session{
	
	public function __construct(){
		$this->init_session();
	}
	public function init_session(){
		if( !isset($_SESSION) ){
			session_start();
		}
	}
	public function __toString(){
		return get_class($this);
	}
	//check session
	public function session_exist( $session_name ){
		if( isset($_SESSION[$session_name]) ){
			return true;
		}
		else{
			return false;
		}
	}
	//remove session
	public function remove_session( $session_name = '' ){
		if( !empty($session_name) ){
			unset( $_SESSION[$session_name] );
		}
		else{
			unset($_SESSION);
			//session_unset();
			//session_destroy();
		}
	}
	//get session data
	public function get_session_data( $session_name ){
		return $_SESSION[$session_name];
	}
	//set session data
	public function set_session_data( $session_name , $data ){
		$_SESSION[$session_name] = $data;
	}
	
}

$session = new Session();

?>