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
				
				
				$input = isset($_POST['vehicleExtras'])?$_POST['vehicleExtras']:"";

				$vehicleData = $_POST;
				
				//I dont check for empty() incase your app allows a 0 as ID.
				if (strlen($input)==0) {
				  echo 'no input';
				  exit;
				}

				$ids = explode("\n", str_replace("\r", "", $input));
				
				$vehicleData['vehicleExtras'] = array_filter($ids);

                $this->model->addVehicle($vehicleData);
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
                $this->view->vehicleResult = $this->model->getVehicleDetails($vehicleRegistration);
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
            if(isset($_POST['deleteConfirm']) && $_POST['deleteConfirm'] == 1) {
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri_array = explode('/', $uri);
                $imageSalt = end($uri_array);
                $response = $this->model->removeImage($imageSalt);
            } else {
                header("location: " . URL . "/admin/vehicles");
            }  
        }
    }
    
    public function updateVehicleImages() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            if(isset($_POST['vehicleID'])) {
                $this->model->updateVehicleImages();
            } else {
                header("location: " . URL . "/admin/vehicles");
            }            
        }
    }


    public function getVehicleData() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            if(isset($_POST['vehicleRegistration'])) {
                $this->model->addVehicle();
            } else {   
                $this->viewFile = "admin/getVehicleData";
                $this->render();
            }
        }
    }

    public function getVehicleDataResult() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {   
            $this->model->getVehicleData();
        }
    }

    public function getVehicleSpecAndOptions() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {   
            $this->model->getVehicleSpecAndOptions();
        }
    }

    public function getVehicleMOTHistory() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {   
            $this->model->getVehicleMOTHistory();
        }
    }



    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }

}
