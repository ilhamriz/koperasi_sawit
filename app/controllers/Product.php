<?php

class Product extends Controller
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
    $data['title'] = "Product";
    $data['products'] = $this->model("ProductModel")->getAll();

    $this->view("templates/header", $data);
    $this->view("product/index", $data);
    $this->view("templates/footer");
  }

  public function create()
  {
    $data['title'] = "Create Product";

    $this->view("templates/header", $data);
    $this->view("product/create", $data);
    $this->view("templates/footer");
  }

  public function handleCreate()
  {
    $imageName = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $tmp = $_FILES['image']['tmp_name'];
      $original = $_FILES['image']['name'];
      $ext = pathinfo($original, PATHINFO_EXTENSION);
      $imageName = uniqid() . "." . $ext;
      move_uploaded_file($tmp, "../public/img/uploads/" . $imageName);
    }

    $data = [
      'name' => $_POST['name'],
      'total' => $_POST['total'],
      'image' => $imageName
    ];

    if ($this->model('ProductModel')->insert($data) > 0) {
      header("Location: " . BASEURL . "/product");
      exit;
    }
  }

  public function update($id)
  {
    $data['title'] = "Update Product";
    $data['product'] = $this->model('ProductModel')->getById($id);

    $this->view("templates/header", $data);
    $this->view("product/update", $data);
    $this->view("templates/footer");
  }

  public function handleUpdate($id)
  {
    $product = $this->model('ProductModel')->getById($id);
    $imageName = $product['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      // Upload new image
      $tmp = $_FILES['image']['tmp_name'];
      $original = $_FILES['image']['name'];
      $ext = pathinfo($original, PATHINFO_EXTENSION);
      $imageName = uniqid() . "." . $ext;
      move_uploaded_file($tmp, "../public/img/uploads/" . $imageName);
    }

    $data = [
      'id' => $id,
      'name' => $_POST['name'],
      'total' => $_POST['total'],
      'image' => $imageName
    ];

    $this->model('ProductModel')->update($data);
    header("Location: " . BASEURL . "/product");
    exit;
  }

  public function delete($id)
  {
    $this->model('ProductModel')->delete($id);
    header("Location: " . BASEURL . "/product");
    exit;
  }
}
