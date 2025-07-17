<?php

class Flasher extends Controller
{
  public static function setFlash($message, $type = 'success')
  {
    $_SESSION['flash'] = [
      'message' => $message,
      'type' => $type
    ];
  }
}
