<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Finance extends Controller {

    function __construct() {
        parent::__construct();

		$this->view->navTitle = "finance";
		$this->view->pageTitle = "Finance - JF Car Sales";
		$this->view->pageDescription = "Latest stock of used cars for sale at JF Car Sales in Kings Lynn, Norfolk.";
		$this->view->canocial = URL . "/";
    }
    
    public function index() {
        $this->render();
    }

    public function render() {
        $this->model->init();
        $this->view->category = "finance";
        
        $this->view->render('finance/index');
    }

}
