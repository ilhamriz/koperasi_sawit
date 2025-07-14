<?php

class UserModel
{
  private $nama = "Ilham";
  private $table = "users";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUser()
  {
    return $this->nama;
  }

  public function findByEmail($email)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE email=:email");
    $this->db->bind('email', $email);
    return $this->db->single();
  }

  public function getById($id)
  {
    $this->db->query("SELECT id, name, email FROM users WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function updateProfile($data)
  {
    $this->db->query("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->execute();
  }

  public function emailExists($email, $excludeUserId)
  {
    $this->db->query("SELECT id FROM users WHERE email = :email AND id != :exclude_id");
    $this->db->bind(':email', $email);
    $this->db->bind(':exclude_id', $excludeUserId);
    return $this->db->single(); // returns user row if exists
  }
}
