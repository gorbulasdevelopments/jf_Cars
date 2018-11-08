<?php

class View {
	
	function __construct() {
		//echo "This is the view <br />";
	}
	
	public function render($name) {
		require 'view/header.php';
		require 'view/' . $name . '.php';
		require 'view/footer.php';
	}
	
	public function render_noEncap($name) {
		require 'view/' . $name . '.php';
	}
	
}