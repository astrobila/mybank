<?php

class WishlistModel {

  public static function getAll($user_id, $page = 0, $max_rows = 10) 
  {
    $db = DB::getInstance();

    $user_id = filter_var($user_id, FILTER_VALIDATE_INT) ? $user_id : 0;
    $count = $db->query('SELECT COUNT(*) FROM wishlists')->fetch_assoc()['COUNT(*)'];
    
    $max_page = ceil($count / $max_rows);
    $max_page = $max_page < 1 ? 1 : $max_page;
    $page = $page < 1 ? 1 : $page;
    $page = $page > $max_page ? $max_page : $page;
    $start_offset = ($page - 1) * $max_rows;

    $result = $db->query("
    SELECT 
      *
    FROM 
      wishlists 
    WHERE
      user_id = $user_id        
    ORDER BY
      date_time_created DESC
    LIMIT 
      $start_offset, $max_rows
  ");

  $rows = [];

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  }
  
  return [
    'all_count' => $count,
    'max_page' => $max_page,

    'count' => $result->num_rows,
    'page' => $page,
    
    'start_offset' => $start_offset,

    'data' => $rows,
  ];    
  }
  
  public static function getAllForMobile($user_id) 
  {
    $db = DB::getInstance();

    $user_id = filter_var($user_id, FILTER_VALIDATE_INT) ? $user_id : 0;
    $count = $db->query('SELECT COUNT(*) FROM wishlists')->fetch_assoc()['COUNT(*)'];


   $result = $db->query("
      SELECT 
        *
      FROM 
        wishlists 
      WHERE
        user_id = $user_id        
      ORDER BY
        date_time_created DESC
    ");

    $rows = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    
    return [
      'count' => $count,
      'data' => $rows,
    ];    
  }

  public static function getWishlistByStatus($user_id, $status) 
  {

  }

  public static function addProgress($wishlist_id, $progress) 
  {
    $db = DB::getInstance();
    $update_progress = 0;

    $result = $db->query("
    SELECT 
      title, progress
    FROM 
      wishlists 
    WHERE
      id = $wishlist_id
    LIMIT
      1        
    "); 
    
    $row = $result->fetch_assoc();
    $update_progress = $row['progress']+$progress;
    $transaction_title = "Savings for ".$row['title'];

    $result = $db->query("
    UPDATE wishlists SET
      progress = $progress 
    WHERE
      id = $wishlist_id;
    ");

    $result = $db->query("
    UPDATE wishlists SET
      progress = $progress 
    WHERE
      id = $wishlist_id;
    ");

    $result = $db->query("
      INSERT INTO transactions
        (title, amount, account,ref_id)
      VALUES
        ($transaction_title,$update_progress,3,$wishlist_id)
    ");
  }

  public static function reduceProgress($wishlist_id, $progress) 
  {
    $db = DB::getInstance();
    $update_progress = 0;

    $result = $db->query("
    SELECT 
      title, progress
    FROM 
      wishlists 
    WHERE
      id = $wishlist_id
    LIMIT
      1        
    "); 
    
    $row = $result->fetch_assoc();
    $update_progress = $row['progress']-$progress;
    $transaction_title = "Taken from ".$row['title'];

    $result = $db->query("
    UPDATE wishlists SET
      progress = $update_progress 
    WHERE
      id = $wishlist_id;
    ");

    $result = $db->query("
    UPDATE wishlists SET
      progress = $progress 
    WHERE
      id = $wishlist_id;
    ");

    $result = $db->query("
      INSERT INTO transactions
        (title, amount, account,ref_id)
      VALUES
        (".$transaction_title.",$update_progress,1,$wishlist_id)
    ");
  }

  public static function cancel ($wishlist_id) {
    $db = DB::getInstance();

    $result = $db->query("
    INSERT INTO transactions
      (user_id, title, description, account, amount, receipt)
    VALUES
      ()
    ");


    $result = $db->query("
    UPDATE wishlists SET
      status = 3
      progress = 0
    WHERE
      id = $wishlist_id;
    ");
  }

  public static function done ($wishlist_id) {
    $db = DB::getInstance();

    $result = $db->query("
    UPDATE wishlists SET
      status = 2 
    WHERE
      id = $wishlist_id;
    ");

    return [
      'result' => $result,
    ];    
  }
  public static function add ($data) {
    $db = DB::getInstance();

    $result = $db->query("
    INSERT INTO transactions
    (user_id, title, description, account, amount, receipt)
    VALUES
    ()
    ");

    return [
      'result' => $result,
    ];   
  }

  public static function edit ($id, $data) {
    $db = DB::getInstance();

    $result = $db->query("
    UPDATE
      wishlists
    SET
    WHERE
    ");

    return [
      'result' => $result,
    ];   
  }

  public static function delete ($id) {
    $db = DB::getInstance();

    $id = $db->real_escape_string($id);
    
    self::cancel($id);

    $result = $db->query("
      DELETE FROM 
        wishlists 
      WHERE 
        id = $id
    ");

    return [
      'result' => $result,
    ];
    
  }

}