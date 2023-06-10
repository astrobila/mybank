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

  public static function edit($user_id) 
  {

  }

  public static function addUser($data) {
    $db = DB::getInstance();

    $username = $db->real_escape_string($data['username']);
    $email = $db->real_escape_string($data['email']);
    $password = $db->real_escape_string($data['password']);
    $password = md5($password);


    $result = $db->query("
      INSERT INTO users
        (username, email, password)
      VALUES 
        ('$username', '$email', '$password');
    ");

    return [
      'insert_id' => $db->insert_id,
      'result' => $result,
    ];
  }
}