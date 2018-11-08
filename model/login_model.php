<?php

class Login_Model extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function run() {
				
		$query = $this->db->prepare("SELECT id from users where login = :login AND password = :password");
		$query->execute(array(
			":login" => $_POST['login'],
			":password" => md5($_POST['password'])
		));
		
		//$data = $query->fetchAll();
		
		$count = $query->rowCount();
		if($count > 0) {
			Session::init();
			Session::set('loggedIn', true);
			echo "Before: " . Session::get("username") . "<br />";
			Session::set('username', $_POST['login']);
			echo "After: " . Session::get("username") . "<br />";
			//header('location: /mvc2/dashboard');
		} else {
			header('location: /mvc2/login');
		}
		
		
		print_r($data);
	}
}