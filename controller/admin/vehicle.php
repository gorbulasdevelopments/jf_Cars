<?php

class Vehicle extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
		$this->logged = Session::get('loggedIn');
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
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
            if(isset($_POST['vehicleRegistration'])) {
                $this->model->addVehicle();
            } else {   
                $this->viewFile = "admin/addVehicle";
                $this->render();
            }
        }
    }

    public function removeVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_array = explode('/', $uri);
            $vehicleRegistration = end($uri_array);
            $this->model->removeVehicle($vehicleRegistration);
        }

    }

    public function updateVehicle() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            if(isset($_POST['vehicleRegistration'])) {
                $this->model->updateVehicle();
            } else {

                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
                $uri_array = explode('/', $uri);
                
                $vehicleRegistration = end($uri_array);
                
                echo "<pre>";
                $this->view->vehicleResult = $this->model->getVehicleDetails($vehicleRegistration);
                echo "</pre>";

                $this->view->vehicleImages = $this->model->getVehicleImages($vehicleRegistration);
    
                $this->viewFile = "admin/editVehicle";
                $this->render();
            }
            
            
            
        }

    }
	
	public function addImage() {
		if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $this->model->addVehicleImage();
        }
    }
    
    public function removeImage() {
		if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
           // print_r($_POST);

            if(isset($_POST['deleteConfirm']) && $_POST['deleteConfirm'] == 1) {
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
                $uri_array = explode('/', $uri);
                    
                $imageSalt = end($uri_array);
                $response = $this->model->removeImage($imageSalt);

                echo $response;


            }

            //$this->model->removeVehicleImage();
        }
	}




    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }

}
