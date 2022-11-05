<?php

//namespace App\Routing;

class Request {

  // The array of cookies.
  public $cookies;
  // The array of data passed through a form.
  public $post_data;
  // The array of data passed through a get method
  public $get_data;
  // The array of request headers.
  public $headers;
  // The IP address of the user.
  public $ip;
  // The HTTP request method.
  public $http_method;
  // The URI.
  public $path;
  // The protocol name and version.
  public $http_protocol;

  public $url;

  // Create a new Request instance.
  public function __construct() {
    $this->cookies = $_COOKIE;
    $this->post_data = $_POST;
	  $this->get_data = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
    $this->headers = apache_request_headers();
    $this->ip = $_SERVER['REMOTE_ADDR'];
    $this->http_method = $_SERVER['REQUEST_METHOD'];
    $this->path = $_SERVER['REQUEST_URI'];
    $this->http_protocol = $_SERVER['SERVER_PROTOCOL'];
  }
    // Get a cookie value by its name.
  public function cookie($name) {
    if (isset($this->cookies[$name])) {
      return $this->cookies[$name];
    }
    return null;
  }

  public function request_url_path() {
    return str_replace($this->router_root_path, '', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

  }
  // Get a form datum by its name.
  public function get_post_data_value($name) {
    if (isset($this->post_data[$name])) {
      return $this->post_data[$name];
    }
    return null;
  }

  public function get_post_data() {
    if (isset($this->post_data)) {
      return $this->post_data;
    }
    return null;
  }
	// Get a form datum by its name.
	public function get_get_data_value($name) {
		if (isset($this->get_data[$name])) {
			return $this->get_data[$name];
		}
		return null;
		}

	public function get_get_data() {
		if (isset($this->get_data)) {
			return $this->get_data;
		}
		return null;
		}
  // Get a header value by its name.
  public function header($name) {
    if (isset($this->headers[$name])) {
      return $this->headers[$name];
    }
    return null;
  }
  // Get the IP address.
  public function ip() {
    return $this->ip;
  }

  // Get the request method.
  public function get_http_method() {
    return $this->http_method;
  }
  // Get the request URI.
  public function path() {
    return $this->path;
  }
  // Get the name and version of the protocol.
  public function get_http_protocol() {
    return $this->http_protocol;
  }
}