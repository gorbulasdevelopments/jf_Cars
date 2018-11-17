<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
    }


    public function index() {
        $this->viewFile = "admin/login";
        $this->render();
    }

    
    public function run() {
        $this->model->run();
    }

    public function render() {
        //$this->model->init();
        //$this->view->category = "home";
        //$this->view->result = $this->model->result;
        
        $this->view->render($this->viewFile);
    }
}

