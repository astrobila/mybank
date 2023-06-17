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

  public static function getUserById($id)
  {
    $db = DB::getInstance();
    $result = $db->query("
      SELECT 
        * 
      FROM 
        users 
      WHERE 
        id = '" . $db->real_escape_string($id) . "' LIMIT 1
    ");

    if ($result->num_rows == 0) {
      return null;
    }
    
    return $result->fetch_assoc();

  }
  
  public static function getUserByEmail($email)
  {
    $db = DB::getInstance();
    $result = $db->query("
      SELECT 
        * 
      FROM 
        users 
      WHERE 
        email = '" . $email . "' LIMIT 1
    ");

    if ($result->num_rows == 0) {
      return null;
    }
    
    return $result->fetch_assoc();

  }
  
  public static function edit($user_id, $data) 
  {
    $db = DB::getInstance();

    $id = $db->real_escape_string($user_id);
    $username = $db->real_escape_string($data['username']);
    $email = $db->real_escape_string($data['email']);
    $password = $db->real_escape_string($data['password']);
    $password = md5($password);


    $result = $db->query("
      UPDATE users SET
        username = '$username', 
        email = '$email', 
        password = '$password' 
      WHERE
        id = $id
    ");

    return [
      'result' => $result,
    ];
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