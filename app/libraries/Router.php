<?php

//namespace App\Routing;


require_once 'Request.php';
require_once 'Response.php';


class Router
{
	const router_root_dir = '/frm/app';
	public $routes = array();

	public function get($regex, $action)
	{
		$this->addRoute('GET', $regex, $action);
	}

	public function post($regex, $action)
	{
		$this->addRoute('POST', $regex, $action);
	}

	public function request_method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function parse_path_url($router_root_dir = false)
	{
		//path to be ex : admin/login
		if ($_SERVER['REQUEST_URI']) {
			$uri = $_SERVER['REQUEST_URI'];
			if ($router_root_dir) {
				$uri = str_replace(self::router_root_dir, '', $uri);
			}
			$uri = trim($uri, '/');
			//var_dump($uri);
			return $uri;
		}
	}
	//add route
	public function addRoute($method, $regex, $action)
	{
		$regex = trim($regex, '/');
		$this->routes[] = [
			'method' => $method,
			'regex' => $regex,
			'action' => $action
		];
	}

	//    export all routes
	public function getRoutes()
	{
		return $this->routes;
	}

	public function get_request_data($http_method, $request)
	{
		if ($http_method == 'GET') {
			if (!empty($request->get_get_data())) {
				parse_str($request->get_get_data(), $get_array);
				return $get_array;
			}
			return null;
		}
		if ($http_method == 'POST') {
			if (!empty($request->get_post_data())) {
				return $request->get_post_data();
			}
			return null;
		}
	}



	public function run()
	{
		
		foreach ($this->routes as $route) {
			$route_regex = $route['regex'];

			$beautiful_route_regex = preg_replace('/{.*?}/', ':str', $route['regex']);
			$pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($beautiful_route_regex)) . "$@D";

			if (preg_match($pattern, $this->parse_path_url(), $matches) &&  $this->request_method() == $route['method']) {
				$action = explode('@', $route['action']);
				$controller = ucfirst($action[0]);
				$controller_method = $action[1];
				//$params = array_slice($matches, 1) ? array_slice($matches, 1) : null;
				if (file_exists('../app/controllers/' . $controller . '.php')) {
					require_once '../app/controllers/' . $controller . '.php';
					if (class_exists($controller) && method_exists($controller, $controller_method)) {
						$obj = new $controller();
						$request = new Request();
						$response = new Response();
						$params = $this->get_request_data($route['method'], $request);
						
						if ($route['method'] == 'GET') {
							$obj->$controller_method($request, $response, $params);
						}
						if ($route['method'] == 'POST') {
							//$params= [1,2,3];
							$obj->$controller_method($request, $response, $params);
						}
					}
				}
			}
		}
	}
}
