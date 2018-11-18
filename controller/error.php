<?php

class Errors extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	public function render() {
		$this->view->render('error/index');
	}
	
	public function PageNotFound($url) {
		
		$this->view->errorMessage = "This controller <b>$url</b> does not exist";
		$this->render();
	}
	
	public function MethodNotFound($method) {
		$this->view->errorMessage = "This method <b>$method</b> does not exist";
		$this->render();
	}

	public function functionError($function, $message) {
		$this->view->errorFunction = $function;
		$this->view->errorMessage = $message;
		$this->render();
	}

}

