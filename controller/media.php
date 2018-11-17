<?php

class Media extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
		
		$this->render();
    }

    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render_noEncap('media/index');
    }
}
