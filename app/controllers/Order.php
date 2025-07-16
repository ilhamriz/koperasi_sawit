<?php

class Order extends Controller
{
  public function index()
  {
    $data['title'] = "Order";
    $userId = $_SESSION['user']['id'];
    $data['orders'] = $this->model('OrderModel')->getByUserId($userId);

    $this->view("templates/header", $data);
    $this->view("order/index", $data);
    $this->view("templates/footer");
  }

  public function create()
  {
    $data['title'] = "Request Order";
    $data['products'] = $this->model('ProductModel')->getAll();

    $this->view("templates/header", $data);
    $this->view("order/create", $data);
    $this->view("templates/footer");
  }

  public function handleCreate()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $userId = $_SESSION['user']['id'];
      $borrowDate = $_POST['borrow_date'];
      $returnDate = $_POST['return_date'];
      $items = $_POST['items']; // [product_id => quantity, ...]

      // 1. Create the order
      $orderId = $this->model('OrderModel')->create([
        'user_id' => $userId,
        'borrow_date' => $borrowDate,
        'return_date' => $returnDate,
      ]);

      // 2. Insert order items
      foreach ($items as $productId => $qty) {
        if ($qty > 0) {
          $this->model('OrderItemModel')->create([
            'order_id' => $orderId,
            'product_id' => $productId,
            'quantity' => $qty
          ]);
        }
      }

      header("Location: " . BASEURL . "/order/detail/" . $orderId);
      exit;
    } else {
      echo "<script>alert('Forbidden');history.back();</script>";
    }
  }

  public function detail($id)
  {
    $data['title'] = "Request Order";
    $userId = $_SESSION['user']['id'];
    $data['order'] = $this->model('OrderModel')->getByIdAndUser($id, $userId);
    $data['items'] = $this->model('OrderItemModel')->getByOrderId($id);

    if (!$data['order']) {
      echo "Order not found or you don't have access.";
      exit;
    }

    $this->view("templates/header", $data);
    $this->view("order/detail", $data);
    $this->view("templates/footer");
  }

  public function delete($id)
  {
    $userId = $_SESSION['user']['id'];

    $order = $this->model('OrderModel')->getByIdAndUser($id, $userId);

    if (!$order || $order['status'] !== 'pending') {
      echo "Cannot delete this order.";
      exit;
    }

    // delete order & order_items
    $this->model('OrderModel')->delete($id);

    header("Location: " . BASEURL . "/order");
    exit;
  }

  public function review($status = null)
  {
    if ($_SESSION['user']['role'] != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }

    $data['title'] = "Review";
    $data['status'] = $status;
    $data['orders'] = $this->model('OrderModel')->getAllFiltered($status);

    $this->view("templates/header", $data);
    $this->view("order/review", $data);
    $this->view("templates/footer");
  }

  public function approve($id)
  {
    if ($_SESSION['user']['role'] != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }

    $this->model('OrderModel')->updateStatus($id, 'accepted');
    header("Location: " . BASEURL . "/order/review");
    exit;
  }

  public function reject($id)
  {
    if ($_SESSION['user']['role'] != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }

    $this->model('OrderModel')->updateStatus($id, 'rejected');
    header("Location: " . BASEURL . "/order/review");
    exit;
  }

  public function undo($id)
  {
    if ($_SESSION['user']['role'] != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }

    $this->model('OrderModel')->updateStatus($id, 'pending');
    header("Location: " . BASEURL . "/order/review");
    exit;
  }
}
