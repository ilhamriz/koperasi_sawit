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
}
