<?php

class Errors extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	public function render() {
		$this->view->render('error/index');
	}
	
	public function PageNotFound($url) {
		$this->view->errorMessage = "This page <b>$url</b> does not exist";
		$this->render();
	}
	
	public function MethodNotFound($method) {
		$this->view->errorMessage = "This method <b>$method</b> does not exist";
		$this->render();
	}

	public function functionError($function, $message) {
		$this->view->errorMessage = "The function <b>$function</b> failed due to: <b>$message</b>";
		$this->render();
	}

}

