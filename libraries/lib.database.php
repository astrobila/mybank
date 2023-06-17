<?php

class DB {
  
  private static $instance = null;
  private static $dbconn = null;

  private function __construct() {
    global $DBConfig;
    
    self::$dbconn = new mysqli($DBConfig['servername'], $DBConfig['username'], $DBConfig['password'], $DBConfig['dbname']);
    //self::$dbconn = new mysqli('localhost', $DBConfig['username'], "", $DBConfig['dbname']);    
  }

  public static function getInstance() {

    if (self::$instance == null) {
      self::$instance = new DB();
    }

    return self::$dbconn;
  }

}