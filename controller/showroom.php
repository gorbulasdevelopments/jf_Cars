<?php

class Showroom extends Controller {

    function __construct() {
        parent::__construct();
		$this->view->make = 'any';
		$this->view->model = 'any';
		$this->view->fuel = 'any';
		$this->view->transmission = 'any';
		$this->view->engine = 'any';
		$this->view->doors = 'any';
		$this->view->age = 'any';
		$this->view->mileage = 'any';

		
		$this->view->navTitle = "showroom";
		$this->view->pageTitle = "Car Showroom - JF Car Sales";
		$this->view->pageDescription = "Latest stock of used cars for sale at JF Car Sales in Kings Lynn, Norfolk.";
		$this->view->canocial = URL . "/showroom";

		
    }
    
    public function index() {
		$this->result = $this->model->getAllSales();
        $this->view->result = $this->result;
		$this->view->vehicleImages = $this->model->getAllImages();
		$this->view->filterResults = $this->filterResultsToArray($this->result);
		$this->view->localJavascript = "/view/showroom/functions_index.js";
        $this->viewFile = "showroom/index";
		$this->render();
	}
	
	public function getMakes() {
		echo "Get Makes";
	}

	public function getModels() {
		echo "Get Models";
	}
	
	public function getRegistration() {
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		$uri_array = explode('/', $uri);
		
		$vehicleRegistration = end($uri_array);
		$vehicleModel = prev($uri_array);
		$vehicleMake = prev($uri_array);
		
		$this->view->result = $this->model->getRegistration($vehicleMake, $vehicleModel, $vehicleRegistration);
		
		$this->view->filterResults = $this->filterResultsToArray($this->model->getAllSales());

		$this->view->vehicleImages = $this->model->getVehicleImages($vehicleRegistration);

		$this->view->localJavascript = "/view/showroom/functions_viewRegistration.js";

        $this->viewFile = "showroom/viewRegistration";
        $this->render();
	}
	
	public function search() {
				
		$query = array();
		
		if(isset($_GET['make']) && $_GET['make'] != 'any') {
			array_push($query, "vehicle_make = '" . strtoupper($_GET['make']) . "'");
			$this->view->make = strtoupper($_GET['make']);
		} 
		
		if(isset($_GET['model']) && $_GET['model'] != 'any') { 
			array_push($query, "vehicle_model LIKE '%" . strtoupper($_GET['model']) . "%'");
			$this->view->model = strtoupper($_GET['model']);
		}
		
		if(isset($_GET['fuel']) && $_GET['fuel'] != 'any') { 
			array_push($query, "vehicle_fuel = '" . strtoupper($_GET['fuel']) . "'");
			$this->view->fuel = strtoupper($_GET['fuel']);
		}
		
		if(isset($_GET['transmission']) && $_GET['transmission'] != 'any') { 
			array_push($query, "vehicle_transmission = '" . strtoupper($_GET['transmission']) . "'");
			$this->view->transmission = strtoupper($_GET['transmission']);
		}
		
		if(isset($_GET['engine']) && $_GET['engine'] != 'any') { 
			array_push($query, "vehicle_engine_size = " . $_GET['engine'] . "");
			$this->view->engine = $_GET['engine'];
		}
		
		if(isset($_GET['doors']) && $_GET['doors'] != 'any') {
			$this->view->doors = $_GET['doors'];
			array_push($query, "vehicle_doors = " . $_GET['doors'] . "");
		}
		
		if(isset($_GET['age']) && $_GET['age'] != 'any') { 
			array_push($query, "vehicle_year >= " . (date("Y") - $_GET['age']) . "");
			$this->view->age = $_GET['age'];
		}
		
		if(isset($_GET['mileage']) && $_GET['mileage'] != 'any') { 
			array_push($query, "vehicle_mileage <= " . $_GET['mileage'] . "");
			$this->view->mileage = $_GET['mileage'];
		}
		
		$statement = "";
		
		foreach($query as $value) {
			$statement = $statement . $value;
			if ($value === end($query)) {
				$statement = $statement . ";";
			} else {
				$statement = $statement . " AND ";
			}
		}

		if($statement == "") {
			$this->result = $this->model->search();
		} else {
			$this->result = $this->model->search($statement);
		}

		$this->view->result = $this->result;
		$this->view->filterResults = $this->filterResultsToArray($this->result);
		
		

        $this->viewFile = "showroom/search";
        $this->render();
	}

	public function getVehicleMakes() {
		$result = $this->model->getAllMakes();

		$make_array = array();

		foreach($result as $record) {
			$make_array[] = array("id" => $record['vehicle_make'], "name" => $record['vehicle_make']);
		}
		echo json_encode($make_array);		
	}
		
	public function filterResults() {
		$sourceObject = $_POST['source'];
		
		$filters = json_decode($_POST['filter']);
		
		$query = array();
		
		foreach($filters as $record) {
			if($record->value != 'any') {
				switch($record->name) {
					case 'make':
						array_push($query, "vehicle_make = '" . strtoupper($record->value) . "'");
						break;
					
					case 'model':
						array_push($query, "vehicle_model LIKE '%" . strtoupper($record->value) . "%'");
						break;
					
					case 'fuel':
						array_push($query, "vehicle_fuel = '" . strtoupper($record->value) . "'");
						break;
						
					case 'transmission':
						array_push($query, "vehicle_transmission = '" . strtoupper($record->value) . "'");
						break;
						
					case 'engine':
						array_push($query, "vehicle_engine_size = " . $record->value . "");
						break;
						
					case 'doors':
						array_push($query, "vehicle_doors = " . $record->value . "");
						break;
						
					case 'age':
						array_push($query, "vehicle_year >= " . (date("Y") - $record->value) . "");
						break;
						
					case 'mileage':
						array_push($query, "vehicle_mileage <= " . $record->value . "");
						break;
				}
			}
		}
		
		$statement = "";
		
		foreach($query as $value) {
			$statement = $statement . $value;
			if ($value === end($query)) {
				$statement = $statement . ";";
			} else {
				$statement = $statement . " AND ";
			}
		}

		if($statement == "") {
			$this->result = $this->model->search();
		} else {
			$this->result = $this->model->search($statement);
		}
		
		$filterResults = $this->filterResultsToArray($this->result);
		
		echo json_encode($filterResults, true);
	}
	
	private function filterResultsToArray($result) {
		$filterResults = array(
			'make' => array(),
			'model' => array(),
			'fuel' => array(),
			'transmission' => array(),
			'engine' => array(),
			'doors' => array(),
			'age' => array(),
			'mileage' => array(),
		);

		foreach($result as $record) {
			
			if(!in_array($record['vehicle_make'], $filterResults["make"])) {
				array_push($filterResults["make"], $record['vehicle_make']);
			}
			
			if(!in_array($record['vehicle_model'], $filterResults["model"])) {
				array_push($filterResults["model"], $record['vehicle_model']);
			}
			
			if(!in_array($record['vehicle_fuel'], $filterResults["fuel"])) {
				array_push($filterResults["fuel"], $record['vehicle_fuel']);
			}
			
			if(!in_array($record['vehicle_transmission'], $filterResults["transmission"])) {
				array_push($filterResults["transmission"], $record['vehicle_transmission']);
			}
			
			if(!in_array($record['vehicle_engine_size'], $filterResults["engine"])) {
				array_push($filterResults["engine"], $record['vehicle_engine_size']);
			}
			
			if(!in_array($record['vehicle_doors'], $filterResults["doors"])) {
				array_push($filterResults["doors"], $record['vehicle_doors']);
			}
			
			if(!in_array((date("Y") - $record['vehicle_year']), $filterResults["age"])) {
				array_push($filterResults["age"], (date("Y") - $record['vehicle_year']));
			}
			
			if(!in_array($record['vehicle_mileage'], $filterResults["mileage"])) {
				array_push($filterResults["mileage"], $record['vehicle_mileage']);
			}

		}

		return $filterResults;
	}

	public function vehicleEnquiry() {
		parse_str($_POST['data'], $data);

		if(isset($data['enquiryType'])) {
			$vehicleEnquiry = $this->model->vehicleEnquiry($data);
			if($vehicleEnquiry) {
				echo "<div class=\"spacer\" />";
				echo "<h2>Your enquiry has been sent</h2>";
            } else {
				echo "<div class=\"spacer\" />";
				echo "<h2>Your enquiry could not be sent, the webmaster has been informed</h2>";

				$headers= "MIME-Version: 1.0\r\nContent-Type: text/html;\r\ncharset: utf-8;\r\nFrom: JF Contact Enquiry Error<sully_2306@gorbulas.co.uk>\r\n";

				mail("sully_2306@gorbulas.co.uk", "Enquiry Form Error", "Enquiry message could not be sent", $headers);
            }
		}
	}
		
	
    public function render() {
        $this->view->render($this->viewFile);
    }

}
