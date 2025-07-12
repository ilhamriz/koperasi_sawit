<?php

class Login extends Controller
{
  public function index()
  {
    $data['title'] = "Login";
    // $data['nama'] = $this->model("User_model")->getUser();

    $this->view("templates/header", $data);
    $this->view("login/index", $data);
    $this->view("templates/footer");
  }

  public function handleLogin()
  {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = $this->model("UserModel")->findByEmail($email);

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: " . BASEURL . "/dashboard");
        exit;
      } else {
        echo "<script>alert('Wrong password');history.back();</script>";
      }
    } else {
      echo "<script>alert('User not found');history.back();</script>";
    }
  }
}
