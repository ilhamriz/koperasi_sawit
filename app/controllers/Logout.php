<?php

class Logout extends Controller
{
  public function handleLogout()
  {
    session_destroy();
    header("Location: " . BASEURL . "/login");
  }
}
