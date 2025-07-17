<?php

class ProductModel
{
  private $table = "products";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll()
  {
    $this->db->query("SELECT * FROM products ORDER BY updated_at DESC");
    return $this->db->resultSet();
  }

  public function getById($id)
  {
    $this->db->query("SELECT * FROM products WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function insert($data)
  {
    $this->db->query("INSERT INTO products (name, total, image) VALUES (:name, :total, :image)");
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':total', $data['total']);
    $this->db->bind(':image', $data['image']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function update($data)
  {
    $this->db->query("UPDATE products SET name = :name, total = :total, image = :image WHERE id = :id");
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':total', $data['total']);
    $this->db->bind(':image', $data['image']);
    $this->db->execute();
  }

  public function delete($id)
  {
    $this->db->query("DELETE FROM products WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
  }

  public function reduceStock($productId, $qty)
  {
    $this->db->query("UPDATE products SET total = total - :qty WHERE id = :id");
    $this->db->bind(':id', $productId);
    $this->db->bind(':qty', $qty);
    $this->db->execute();
  }

  public function revertStock($productId, $qty)
  {
    $this->db->query("UPDATE products SET total = total + :qty WHERE id = :id");
    $this->db->bind(':id', $productId);
    $this->db->bind(':qty', $qty);
    $this->db->execute();
  }
}
