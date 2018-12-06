<?php

class Bootstrap {

    function __construct() {
        $this->originalURL = $_GET['url'];
    }

    public function init() {
        $url = explode('/', rtrim($this->originalURL, '/'));
        //echo "<table border=1><tr><td>Route</td><td>Method</td><td>Callback</td><td>Found</td></tr>";
        
        Router::error('', 'controller\error@index');  
        Router::any('', 'controller\index@index');
        
        Router::any('/showroom', 'controller\showroom@index');
        Router::any('/showroom/search', 'controller\showroom@search');
		Router::any('/showroom/getVehicleMakes', 'controller\showroom@getVehicleMakes');
        Router::any('/showroom/filterResults', 'controller\showroom@filterResults');
        Router::any('/showroom/vehicleEnquiry', 'controller\showroom@vehicleEnquiry');

        Router::any('/showroom/(:any)', 'controller\showroom@getMakes');
        Router::any('/showroom/(:any)/(:any)', 'controller\showroom@getModels');
        Router::any('/showroom/(:any)/(:any)/(:any)', 'controller\showroom@getRegistration');

        //Router::any('showroom/(:any)/(:any)/(:any)', 'controller\showroom@getRegistration');
        
        
        Router::any('/finance', 'controller\finance@index');
        
        Router::any('/warranty', 'controller\warranty@index');

        Router::any('/about', 'controller\about@index');

        Router::any('/contact', 'controller\contact@index');

		Router::any('/media', 'controller\media@index');
		Router::any('/media/media.jpg', 'controller\media@index');

		Router::any('/admin', 'controller\admin\index@index');
		Router::any('/admin/login', 'controller\admin\login@index');
		Router::any('/admin/login/run', 'controller\admin\login@run');
        Router::any('/admin/logout', 'controller\admin\logout@index');
        

		Router::any('/admin/vehicles', 'controller\admin\vehicle@listVehicles');
		Router::any('/admin/vehicles/addVehicle', 'controller\admin\vehicle@addVehicle');
		Router::any('/admin/vehicles/updateVehicle', 'controller\admin\vehicle@updateVehicle');
		Router::any('/admin/vehicles/updateVehicle/(:any)', 'controller\admin\vehicle@updateVehicle');
		Router::any('/admin/vehicles/updateVehicleImages', 'controller\admin\vehicle@updateVehicleImages');
        Router::any('/admin/vehicles/removeVehicle/(:any)', 'controller\admin\vehicle@removeVehicle');
        Router::any('/admin/vehicles/addVehicleImage/(:any)', 'controller\admin\vehicle@addImage');
        Router::any('/admin/vehicles/removeVehicleImage/(:any)', 'controller\admin\vehicle@removeImage');
        Router::any('/admin/vehicles/getVehicleData', 'controller\admin\vehicle@getVehicleData');
        Router::any('/admin/vehicles/getVehicleDataResult', 'controller\admin\vehicle@getVehicleDataResult');
        Router::any('/admin/vehicles/getVehicleSpecAndOptions', 'controller\admin\vehicle@getVehicleSpecAndOptions');
        Router::any('/admin/vehicles/getVehicleMOTHistory', 'controller\admin\vehicle@getVehicleMOTHistory');

        


        Router::any('/admin/sales', 'controller\admin\sale@getSales');
		Router::any('/admin/sales/addSale', 'controller\admin\sale@addSale');
		Router::any('/admin/sales/updateSale', 'controller\admin\sale@updateSale');
		Router::any('/admin/sales/updateSale/(:any)', 'controller\admin\sale@updateSale');
        Router::any('/admin/sales/removeSale/(:any)', 'controller\admin\sale@removeSale');
        Router::any('/admin/sales/shareSale/(:any)', 'controller\admin\sale@shareSale');
        

        Router::any('/admin/vehicles/(:any)', 'controller\admin@editVehicle');
        

		//Router::any('admin/addVehicle', 'controller\admin@addVehicle');
		
		
		
		
		/*Router::any('/ofr/venue', 'controller\venue@index');
		Router::any('/ofr/venue/(:any)', 'controller\venue@viewVenue');
		Router::any('/ofr/venue/(:any)/swim_(:num)', 'controller\venue@viewSwim');
		Router::any('/ofr/venue/(:any)/swim_(:num)_(:num)', 'controller\venue@viewSwimImage');
		Router::any('/ofr/about', 'controller\about@index');
		Router::any('/ofr/test/(:any)/foo', 'controller\foo@getFoo');*/
		
		
		
		//echo "</table>";
		
		router::dispatch();
		/*
		Router::any('', 'Controllers\Blog@index');
		Router::any('c(:num)-(:any).html', 'Controllers\Blog@category');
		Router::any('p(:num)-(:any).html', 'Controllers\Blog@post');
		//Admin Login Routes
		Router::any('admin', 'Controllers\Admin\Admin@index');
		Router::any('admin/login', 'Controllers\Admin\Auth@login');
		Router::any('admin/logout', 'Controllers\Admin\Auth@logout');
		//Admin Categories Routes
		Router::any('admin/categories', 'Controllers\Admin\Categories@index');
		Router::any('admin/categories/(:num)', 'Controllers\Admin\Categories@sub_categories');
		Router::any('admin/categories/add', 'Controllers\Admin\Categories@add');
		Router::any('admin/categories/edit/(:num)', 'Controllers\Admin\Categories@edit');
		//Admin Posts Routes
		Router::any('admin/posts', 'Controllers\Admin\Posts@index');
		Router::any('admin/posts/(:num)', 'Controllers\Admin\Posts@sub_categories');
		Router::any('admin/posts/add', 'Controllers\Admin\Posts@add');
		Router::any('admin/posts/edit/(:num)', 'Controllers\Admin\Posts@edit');
		//Admin Members Routes
		Router::any('admin/members', 'Controllers\Admin\Members@index');
		Router::any('admin/members/add', 'Controllers\Admin\Members@add');
		Router::any('admin/members/edit/(:num)', 'Controllers\Admin\Members@edit');
		//Admin SEO Routes
		Router::any('admin/seo/robots', 'Controllers\Admin\Seo@robots');
			*/	
		
        /*if(is_null($url[0]) || $url[0] == "" || empty($url) || !isset($this->originalURL)) {
            $controllerName = "index";
        } else {
            $controllerName = $url[0];
        }
        
        $file = 'controller/' . $controllerName . '.php';
        if(file_exists($file)) {
            require 'controller/' . $controllerName . '.php';
        } else {
            require 'controller/error.php';
            $controller = new Errors();
            $controller->PageNotFound($url[0]);
            return false;
        }

        //Create controller
        $controller = new $controllerName;
        $controller->loadModel($controllerName);

        if(isset($url[2])) {
            if(method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                require 'controller/error.php';
                $controller = new Errors();
                $controller->MethodNotFound($url[1]);
                return false;
            }
            return false;
        } elseif(isset($url[1])) {
            if(method_exists($controller, $url[1])) {
                $controller->{$url[1]}();
            } else {
                require 'controller/error.php';
                $controller = new Errors();
                $controller->MethodNotFound($url[1]);
                return false;
            }  
        } else {
            $controller->init();
        }
        
          
        $controller->render();*/
    }
}
