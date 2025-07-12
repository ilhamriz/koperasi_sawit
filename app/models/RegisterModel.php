<?php

class RegisterModel
{
  private $table = "users";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function register($data)
  {
    $hashed = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO $this->table (name, email, password, role) VALUES (:name, :email, :password, 2)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $hashed);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
