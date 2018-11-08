<?php
class Controller {
	
	function __construct() {
		//echo "Main Contoller <br />";
		$this->view = new View();

	}
	
	public function loadModel($modelFile, $modelName) {
		$path = 'model/' . $modelFile . '_model.php';


		if(file_exists($path)) {
			require $path;
			
			$modelName = $modelName . '_Model';
			$this->model = new $modelName();
		}
	}
	
}