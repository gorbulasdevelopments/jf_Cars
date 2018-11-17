<?php

class login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function run() {

        echo "<pre>";
        print_r($_POST);
        echo "'" . md5($_POST['password']) . "'";   
        echo "</pre>";

        $query = $this->db->prepare("SELECT user_id from users_table where user_username = :username AND user_password = :password");
		$query->execute(array(
			":username" => $_POST['login'],
			":password" => md5($_POST['password'])
		));
		
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        print_r($data);
		
		$count = $query->rowCount();
		if($count > 0) {
			Session::init();
            Session::set('loggedIn', true);
            Session::set('username', $_POST['login']);
            echo Session::get('loggedIn');
			header('location: ' . URL . '/admin');
		} else {
			//header('location: ' . URL . '/admin/login');
		}
    }
}
 