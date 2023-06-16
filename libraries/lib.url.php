<?php

class URL {

  public static function validate($value, $default_value, $validation_type = '') {
    $val = $value;

    switch ($validation_type) {
      case 'int':
        $val = filter_var($value, FILTER_VALIDATE_INT) ? $value : $default_value; 
        break;
      case 'float':
        $val = filter_var($value, FILTER_VALIDATE_FLOAT) ? $value : $default_value; 
        break;    
      case 'email':
        $val = filter_var($value, FILTER_VALIDATE_EMAIL) ? $value : $default_value; 
        break;    
    }

    return $val;
  }

  public static function getPost($name, $default = '', $validation_type = '') {
    $val = isset($_POST[$name]) ? $_POST[$name] : $default;
    $val = self::validate($val, $default, $validation_type);
    return $val;
  }

  public static function get($name, $default = '', $validation_type = '') {
    $val = isset($_GET[$name]) ? $_GET[$name] : $default;
    $val = self::validate($val, $default, $validation_type);
    return $val;
  }

  public static function getRequestMethod() {
    return isset($_SERVER['REQUEST_METHOD'])?strtolower($_SERVER['REQUEST_METHOD']):'';
  }

}