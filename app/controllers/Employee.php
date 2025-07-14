<?php

class Employee extends Controller
{
  public function __construct()
  {
    $role = $_SESSION['user']['role'];
    if ($role != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }
  }

  public function index()
  {
    $data['title'] = "Employee";
    $data['list_employee'] = $this->model("EmployeeModel")->getAllEmployee();

    $this->view("templates/header", $data);
    $this->view("employee/index", $data);
    $this->view("templates/footer");
  }

  public function detail($id)
  {
    $data['title'] = "Detail Employee";
    $data['emp'] = $this->model("EmployeeModel")->getEmployeeById($id);

    $this->view("templates/header", $data);
    $this->view("employee/detail", $data);
    $this->view("templates/footer");
  }
}
