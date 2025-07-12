<?php

class NotFound extends Controller
{
  public function index()
  {
    $data['title'] = "404 Page";
    // $data['nama'] = $this->model("User_model")->getUser();

    $this->view("templates/header", $data);
    $this->view("notfound/index", $data);
    $this->view("templates/footer");
  }
}
