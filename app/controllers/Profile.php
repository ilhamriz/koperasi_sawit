<?php

class Profile extends Controller
{
  public function index()
  {
    $data['title'] = "Profile";
    $userId = $_SESSION['user']['id'];
    $data['user'] = $this->model('UserModel')->getById($userId);

    $this->view("templates/header", $data);
    $this->view("profile/index", $data);
    $this->view("templates/footer");
  }

  public function update()
  {
    $userId = $_SESSION['user']['id'];
    $email = $_POST['email'];

    // Check if email already used by other user
    $existing = $this->model('UserModel')->emailExists($email, $userId);
    if ($existing) {
      $_SESSION['flash_error'] = "Email already in use by another account.";
      header("Location: " . BASEURL . "/profile");
      exit;
    }

    // Proceed to update
    $data = [
      'id' => $userId,
      'name' => $_POST['name'],
      'email' => $email,
    ];

    $this->model('UserModel')->updateProfile($data);
    $_SESSION['user']['name'] = $data['name'];
    $_SESSION['user']['email'] = $data['email'];

    $_SESSION['flash_success'] = "Profile updated successfully.";
    header("Location: " . BASEURL . "/profile");
    exit;
  }
}
