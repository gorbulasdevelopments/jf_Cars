<?php

class Router {
	
	public static $routes = array();
    public static $methods = array();
    public static $callbacks = array();
	
	 // Set route patterns
    public static $patterns = array(
        ':any' => '[^/]+',
        ':num' => '[0-9]+',
        ':all' => '.*'
    );
	
	public static function __callstatic($method, $params) {	
		$uri = dirname($_SERVER['PHP_SELF']).'/'.$params[0];

		//echo $uri;
		
		//echo "<tr><td>$method</td><td>'$params[0]'</td><td>$params[1]</td>";
        array_push(self::$routes, $params[0]);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $params[1]);
		//echo "Route requested for <b>'$params[0]'</b> to go to $params[1] <br />";
		
		 
 
		 
	}
	
	public static function dispatch() {
        
       // echo "dispatch Called <br />";

       // print_r(self::$routes);

		$searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);
		
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		
		$uri = rtrim($uri, ' /');
		//echo $uri . "<br />";
		
		self::$routes = str_replace('//', '/', self::$routes);
		
		//print_r(self::$routes);
		
		//Check if route is defined without a regex
		if (in_array($uri, self::$routes)) {
            $route_pos = array_keys(self::$routes, $uri);
			foreach ($route_pos as $route) {
				//echo self::$callbacks[$route] . "<br />";
				//echo $method . ' - ' . self::$methods[$route];
                if (self::$methods[$route] == $method || self::$methods[$route] == 'ANY') {
                    $found_route = true;

                    //if route is not an object
                    if (!is_object(self::$callbacks[$route])) {
                        //call object controller and method
                        self::invokeObject(self::$callbacks[$route]);
						return;
                    } 
                }
            }
		 } else {
			 
			// check if defined with regex
            $pos = 0;

            // foreach routes
            foreach (self::$routes as $route) {
                $route = str_replace('//', '/', $route);

                if (strpos($route, ':') !== false) {
                    $route = str_replace($searches, $replaces, $route);
                }

                if (preg_match('#^' . $route . '$#', $uri, $matched)) {
                    if (self::$methods[$pos] == $method || self::$methods[$pos] == 'ANY') {
                        $found_route = true;

                        //remove $matched[0] as [1] is the first parameter.
                        array_shift($matched);

                        if (!is_object(self::$callbacks[$pos])) {
                            //call object controller and method
                            self::invokeObject(self::$callbacks[$pos], $matched);
                            return;
                        } else {
                            //call closure
                            call_user_func_array(self::$callbacks[$pos], $matched);
                            return;
                        }
                    }
                }
                $pos++;
            }
            // end foreach
			 
			 
			//No match with regex
            self::routeNotFound($uri);
            return;
         }
    }
	
	public static function invokeObject($callback, $matched = null, $msg = null)
    {
        //echo "invoke called for $callback";

        $callback = str_replace('controller\\', '', $callback);

        $segments = preg_split('/@/', $callback, -1, PREG_SPLIT_NO_EMPTY);



        $methodName = end($segments);
        array_pop($segments);

        $controllerName = end($segments);

        $controllerFile = strtolower("controller/" . str_replace('\\', '/', $controllerName) . ".php");

        $controller = explode("\\", $controllerName);

        $controller = end($controller);

        $modelFile = str_replace('\\', '/', $controllerName);

        $modelName = $controller;

        
        //echo "<br />" . $controllerFile . " - " . $controllerName . " - " . $methodName . "<br />";

		if(file_exists($controllerFile)) {
            //echo "require " . $controllerFile . "<br />";
            require $controllerFile;

            //Create controller

            $controllerObject = new $controller;
            $controllerObject->loadModel($modelFile, $modelName);

            if(method_exists($controllerObject, $methodName)) {
                $controllerObject->{$methodName}();
            } else {
                self::methodNotFound($methodName);
            }
        } else {
            self::routeNotFound($controller);
        }
    
    }

    public static function routeNotFound($url) {
        //require 'controller/error.php';
        $controller = new Errors();
        $controller->PageNotFound($url);
        return false;
    }

    public static function methodNotFound($method) {
        //require 'controller/error.php';
        $controller = new Errors();
        $controller->MethodNotFound($method);
        return false;

    }
}