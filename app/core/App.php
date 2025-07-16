<?php

class App
{
  protected $controller = "Login";
  protected $method = "index";
  protected $params = [];

  public function __construct()
  {
    session_start();
    $url = $this->parseURL();

    $isLoggedIn = isset($_SESSION['user']);
    $requestedController = isset($url[0]) ? ucfirst($url[0]) : 'Login'; // eg: 'home', 'register' jadi 'Home', 'Register'

    if (!$isLoggedIn) {
      // Jika belum login
      if (strtolower($requestedController) === "register") {
        $this->controller = "Register";
        unset($url[0]);
      } else {
        // Semua akses akan diarahkan ke Login
        $this->controller = "Login";
        if ($requestedController !== "Login") {
          $url = []; // reset url agar method = index
        }
      }
    } else {
      // Sudah login
      if (in_array(strtolower($requestedController), ['login', 'register'])) {
        // Blok akses ke login dan register jika sudah login
        $this->controller = "Dashboard";
        $url = [];
      } elseif (file_exists("app/controllers/" . $requestedController . ".php")) {
        $this->controller = $requestedController;
        unset($url[0]);
      } else {
        // fallback jika controller tidak ditemukan
        $this->controller = "NotFound";
        $url = [];
      }
    }

    require_once "app/controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    // METHOD
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }

    // PARAMS
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // RUN CONTROLLER & METHOD
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    }
  }
}
