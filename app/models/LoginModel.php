<?php

class LoginModel
{
  private $table = "users";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
}
