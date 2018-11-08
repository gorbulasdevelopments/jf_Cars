<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

require 'lib/Controller.php';
require 'lib/Router.php';
require 'lib/View.php';
require 'lib/Model.php';
require 'lib/Database.php';
require 'lib/Session.php';
require 'controller/error.php';
require 'config/paths.php';
//require 'config/database.php';

Session::init();
  
$file = 'lib/Bootstrap.php';

if(file_exists($file)) {
	require 'lib/Bootstrap.php';
	$bootstrap = new Bootstrap();
    $bootstrap->init();
} else {
	throw new Exception("Cannot load bootstrap");
}
	




?>
