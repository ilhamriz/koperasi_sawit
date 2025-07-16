<?php

class NotFound extends Controller
{
  public function index()
  {
    $data['title'] = "Error 404";

    $this->view("templates/header", $data);
    $this->view("notfound/index");
    $this->view("templates/footer");
  }
}
