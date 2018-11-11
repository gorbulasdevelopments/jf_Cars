<?php

class Warranty extends Controller {

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
	}
    
    public function index() {
		$this->result = $this->model->getAllSales();
		$this->view->filterResults = $this->filterResultsToArray($this->result);
		$this->view->pageTitle = "Warranty Information - JF Car Sales";
		$this->view->pageDescription = "Latest stock of used cars for sale at JF Car Sales in Kings Lynn, Norfolk.";
		$this->view->canocial = URL . "/warranty";
        $this->viewFile = "warranty/index";
		$this->render();
	}
	
	public function render() {
        $this->view->render($this->viewFile);
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

}
