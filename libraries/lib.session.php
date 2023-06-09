<?php

session_start();

class Session {

  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }
  
  public static function unset($key) {
    unset($_SESSION[$key]);
  }
  
  public static function is_exists($key) {
    return isset($_SESSION[$key]);
  }
  
  public static function get($key, $default = false) {
    if (self::is_exists($key)) return $_SESSION[$key];
    return $default;
  }
  
  public static function flash($key, $default = false) {
    $foo = self::get($key);
    self::unset($key);
    return $foo;
  }

}

