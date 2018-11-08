<?php

class Vehicle extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
		$this->logged = Session::get('loggedIn');
    }
    
    public function index() {
		if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
   
        }
    }

    public function listVehicles() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
            $this->view->vehicleResult = $this->model->getAllVehicles();
            
            $this->viewFile = "admin/listVehicles";
            $this->render();
        }
    }

    public function addVehicle() {

    }

    public function updateVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $this->model->updateVehicleDetails();
        }

    }
	

	

    public function removeVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            
            
            
        }

    }


    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }

}
