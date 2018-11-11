<?php

class Sale extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
		$this->logged = Session::get('loggedIn');
    }

    public function getSales() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
            $this->view->sales = $this->model->getAllSales();
            $this->viewFile = "admin/getSales";
            $this->render();
        }
    }

    public function addSale() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else {
            if(isset($_POST['vehicleRegistration'])) {
                $addSale = $this->model->addSale();
                if($addSale == 1) {
                    header("Location: " . URL . "/admin/sales/");
                } else {
                    $error = new Errors();
                    $error->functionError("addSale", $addSale);
                }
            } else {   
				$this->view->vehicles = $this->model->getVehiclesForSale();
				$this->viewFile = "admin/addSale";
                $this->render();
            }
        }
    }

    public function removeSale() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_array = explode('/', $uri);
            $vehicleRegistration = end($uri_array);
            $removeSale = $this->model->removeSale($vehicleRegistration);
            if($removeSale == 1) {
                header("Location: " . URL . "/admin/sales/");
            } else {
                $error = new Errors();
                $error->functionError("removeSale", $removeSale);
            }
        }
    }

    public function updateSale() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            if(isset($_POST['SOMETHING'])) {
                $response = $this->model->updateSale($vehicleRegistration);
                if($response) {
                    header("Location: " . URL . "/admin/sales/viewSale/" . $vehicleRegistration);
                } else {
                    header("Location: " . URL . "/error/" . $response);
                }
            } else {
                $this->viewFile = "admin/updateSale";
                $this->render();
            } 
        }
    }

    public function shareSale() {
        if(!$this->logged) {
			Session::destroy();
			header("location: " . URL . "/admin/login");
		} else { 
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_array = explode('/', $uri);
            $vehicleRegistration = end($uri_array);
            $shareSale = $this->model->shareSale($vehicleRegistration);
            if($shareSale == 1) {
                header("Location: " . URL . "/admin/sales/");
            } else {
                require "controller/error.php";
                $error = new Errors();
                $error->functionError("shareSale", $shareSale);
            }
        }
    }



    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }

}
