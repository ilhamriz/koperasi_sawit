<?php

class Dashboard extends Controller
{
  public function index()
  {
    $data['title'] = "Dashboard";

    $user = $_SESSION['user'];
    $role = $user['role'];
    $data['user'] = $user;

    $this->view("templates/header", $data);
    if ($role == 1) {
      $this->view("dashboard/admin", $data);
    } else {
      $this->view("dashboard/guest", $data);
    }
    $this->view("templates/footer");
  }
}
