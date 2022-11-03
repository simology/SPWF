<?php

namespace Routing;

class Response extends Router{
	public function __construct()
	{

	}
  // The response body.
  public $body;
  // Cookie files to set up.
  public $cookies = [];
  // The response headers.
  public $headers = [];
  // The response status code.
  public $statusCode = 200;
  // Send an error response.
  public function onError($statusCode) {
    $this->statusCode($statusCode);
    $this->body("Error {$statusCode}");
    $this->send();
  }
  // Send the response.
  public function send(){
    http_response_code($this->statusCode);
    foreach ($this->headers as $name => $value) {
      header("{$name}: {$value}");
    }
    foreach ($this->cookies as $cookie) {
      header("Set-Cookie: {$cookie}");
    }
    echo $this->body;
    exit;
  }
  // Set a response body.
  public function body($body) {
    $this->body = $body;
    return $this;
  }
  // Set a new cookie file.
  public function cookie($name, $value) {
    $cookie = "{$name}={$value}";
    array_push($this->cookies, $cookie);
    return $this;
  }
  // Set a response header.
  public function header($name, $value) {
    $this->headers[$name] = $value;
    return $this;
  }
  // Set a response status code.
  public function statusCode($statusCode) {
    $this->statusCode = $statusCode;
    return $this;
  }
}