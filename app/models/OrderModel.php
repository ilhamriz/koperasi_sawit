<?php

class OrderModel
{
  private $table = "orders";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getByUserId($userId)
  {
    $this->db->query("
      SELECT o.*, 
        GROUP_CONCAT(p.name, ':', oi.quantity SEPARATOR ', ') AS items
      FROM orders o
      LEFT JOIN order_items oi ON o.id = oi.order_id
      LEFT JOIN products p ON oi.product_id = p.id
      WHERE o.user_id = :user_id
      GROUP BY o.id
      ORDER BY o.created_at DESC
    ");
    $this->db->bind(':user_id', $userId);
    return $this->db->resultSet();
  }


  public function create($data)
  {
    $this->db->query("INSERT INTO orders (user_id, borrow_date, return_date) VALUES (:user_id, :borrow_date, :return_date)");
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':borrow_date', $data['borrow_date']);
    $this->db->bind(':return_date', $data['return_date']);
    $this->db->execute();

    return $this->db->lastInsertId();
  }

  public function getByIdAndUser($orderId, $userId)
  {
    $this->db->query("SELECT * FROM orders WHERE id = :id AND user_id = :user_id");
    $this->db->bind(':id', $orderId);
    $this->db->bind(':user_id', $userId);
    return $this->db->single();
  }

  public function delete($id)
  {
    // Delete order_items first (foreign key)
    $this->db->query("DELETE FROM order_items WHERE order_id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();

    // Then delete the order
    $this->db->query("DELETE FROM orders WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
  }

  public function getAll()
  {
    $this->db->query("
    SELECT o.*, u.name AS user_name,
      GROUP_CONCAT(p.name, ':', oi.quantity SEPARATOR ', ') AS items
    FROM orders o
    JOIN users u ON o.user_id = u.id
    LEFT JOIN order_items oi ON o.id = oi.order_id
    LEFT JOIN products p ON oi.product_id = p.id
    GROUP BY o.id
    ORDER BY o.created_at DESC
  ");
    return $this->db->resultSet();
  }

  public function getAllFiltered($status = null)
  {
    $query = "
    SELECT o.*, u.name AS user_name,
      GROUP_CONCAT(p.name, ':', oi.quantity SEPARATOR ', ') AS items
    FROM orders o
    JOIN users u ON o.user_id = u.id
    LEFT JOIN order_items oi ON o.id = oi.order_id
    LEFT JOIN products p ON oi.product_id = p.id
  ";

    if ($status && in_array($status, ['pending', 'accepted', 'rejected', 'cancelled'])) {
      $query .= " WHERE o.status = :status";
    }

    $query .= " GROUP BY o.id ORDER BY o.created_at DESC";

    $this->db->query($query);

    if ($status && in_array($status, ['pending', 'accepted', 'rejected', 'cancelled'])) {
      $this->db->bind(':status', $status);
    }

    return $this->db->resultSet();
  }


  public function updateStatus($id, $status)
  {
    $this->db->query("UPDATE orders SET status = :status WHERE id = :id");
    $this->db->bind(':status', $status);
    $this->db->bind(':id', $id);
    $this->db->execute();
  }
}
