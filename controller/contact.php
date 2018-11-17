<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contact extends Controller {

    function __construct() {
        parent::__construct();

		$this->view->navTitle = "contact";
		$this->view->pageTitle = "Contact Us - JF Car Sales";
		$this->view->pageDescription = "Latest stock of used cars for sale at JF Car Sales in Kings Lynn, Norfolk.";
		$this->view->canocial = URL . "/";
    }
    
    public function index() {
        $this->render();
    }

    public function render() {
        $this->model->init();
        $this->view->category = "contact";
        
        $this->view->render('contact/index');
    }

}
