<?php

class Register extends Controller
{
  public function index()
  {
    $data['title'] = "Register";
    // $data['nama'] = $this->model("User_model")->getUser();

    $this->view("templates/header", $data);
    $this->view("register/index", $data);
    $this->view("templates/footer");
  }

  public function handleRegister()
  {
    if ($this->model("UserModel")->findByEmail($_POST['email']) > 0) {
      echo "<script>alert('Email already registered');history.back();</script>";
      exit;
    }

    if ($this->model("RegisterModel")->register($_POST) > 0) {
      header("Location: " . BASEURL . "/login");
      exit;
    }
  }
}
