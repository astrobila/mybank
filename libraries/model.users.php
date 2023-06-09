<?php

class UserModel {
  public static function getUserByUsername($username)
  {
    $db = DB::getInstance();
    $result = $db->query("
      SELECT 
        * 
      FROM 
        users 
      WHERE 
        username = '" . $db->real_escape_string($username) . "' LIMIT 1
    ");

    if ($result->num_rows == 0) {
      return null;
    }
    
    return $result->fetch_assoc();

  }

  public static function login()
  {

  }

  public static function edit($user_id) {

  }
}