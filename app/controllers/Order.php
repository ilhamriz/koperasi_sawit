<?php

require_once "Flasher.php";

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

  public function detail($id, $userIdByAdmin = null)
  {
    $data['title'] = "Request Order";
    $userId = $userIdByAdmin ?? $_SESSION['user']['id'];
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

  public function delete($id, $userIdByAdmin = null)
  {
    $userId = $userIdByAdmin ?? $_SESSION['user']['id'];

    $order = $this->model('OrderModel')->getByIdAndUser($id, $userId);

    if (!$order || $order['status'] !== 'pending') {
      echo "Cannot delete this order.";
      exit;
    }

    // delete order & order_items
    $this->model('OrderModel')->delete($id);

    $backURL = $userIdByAdmin ? "/order/review" : "/order";
    header("Location: " . BASEURL . $backURL);
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

  public function handleStatus($status, $id)
  {
    if ($_SESSION['user']['role'] != 1) {
      header("Location: " . BASEURL . "/dashboard");
      exit;
    }

    $orderItems = $this->model('OrderModel')->getOrderItems($id);

    // Reduce stock if status is "accepted"
    if ($status === 'accepted') {
      foreach ($orderItems as $item) {
        $product = $this->model('ProductModel')->getById($item['product_id']);

        if ($item['quantity'] > $product['total']) {
          Flasher::setFlash("Not enough stock for product '{$product['name']}'", 'error');
          header('Location: ' . BASEURL . '/order/review');
          exit;
        }
      }

      // Reduce product total stock
      foreach ($orderItems as $item) {
        $this->model('ProductModel')->reduceStock($item['product_id'], $item['quantity']);
      }

      $message = "Order accepted and stock updated";
    } elseif ($status === 'pending') {
      foreach ($orderItems as $item) {
        $this->model('ProductModel')->revertStock($item['product_id'], $item['quantity']);
      }
      $message = "Order updated";
    } else {
      $message = "Order rejected";
    }

    // STATUS => 'pending', 'accepted', 'rejected'
    $this->model('OrderModel')->updateStatus($id, $status);

    Flasher::setFlash($message);
    header("Location: " . BASEURL . "/order/review");
    exit;
  }
}
