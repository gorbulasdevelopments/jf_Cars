<?php

class Index extends Controller {

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
            $this->view->salesResult = $this->model->getAllSales();

            $this->view->vehicleResult = $this->model->getallVehicles();
            
            $this->viewFile = "admin/index";
            $this->render();
        }
    }

    public function login() {
        $this->viewFile = "admin/login";
        $this->render();
    }

    public function logout() {
		Session::destroy();
		header("location: " . URL . "/admin/login");
	}

    public function run() {
        $this->model->run();
    }

    public function listVehicles() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
            $this->view->vehicleResult = $this->model->getallVehicles();
            
            $this->viewFile = "admin/listVehicles";
            $this->render();
        }
    }

    public function editVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            echo "edit Vehicle";
            
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            $uri_array = explode('/', $uri);
            
            $vehicleRegistration = end($uri_array);
            
            echo "<pre>";
            $this->view->vehicleResult = $this->model->getVehicleDetails($vehicleRegistration);
            echo "</pre>";

            $this->viewFile = "admin/editVehicle";
            $this->render();
        }
    }

    public function updateVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $this->model->updateVehicle();
            
            
        }

    }
	
	public function shareVehicle() {
		if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
			$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            $uri_array = explode('/', $uri);
            
            $vehicleRegistration = end($uri_array);
		
            $this->model->shareVehicle($vehicleRegistration);
        }
	}

    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }

}
