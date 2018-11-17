<?php

class Logout extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
    }


    public function index() {
		Session::destroy();
		header("location: " . URL . "/admin/login");
	}
}

