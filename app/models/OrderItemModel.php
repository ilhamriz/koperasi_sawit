<?php

class OrderItemModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function create($data)
  {
    $this->db->query("INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
    $this->db->bind(':order_id', $data['order_id']);
    $this->db->bind(':product_id', $data['product_id']);
    $this->db->bind(':quantity', $data['quantity']);
    $this->db->execute();
  }

  public function getByOrderId($orderId)
  {
    $this->db->query("
      SELECT oi.quantity, p.name 
      FROM order_items oi
      JOIN products p ON oi.product_id = p.id
      WHERE oi.order_id = :order_id
    ");
    $this->db->bind(':order_id', $orderId);
    return $this->db->resultSet();
  }
}
