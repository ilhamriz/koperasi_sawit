<?php

class EmployeeModel
{
  private $table = "users";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllEmployee()
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE role=2");
    return $this->db->resultSet();
  }

  public function getEmployeeById($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
    $this->db->bind('id', $id);

    // TODO: HANDLE JIKA COBA BY URL, TAPI ID TIDAK DITEMUKAN
    return $this->db->single();
  }
}
