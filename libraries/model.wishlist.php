<?php

class WishlistModel {

  public static function getAll($user_id, $page = 0, $max_rows = 10) 
  {
    $db = DB::getInstance();

    $user_id = filter_var($user_id, FILTER_VALIDATE_INT) ? $user_id : 0;
    $count = $db->query('SELECT COUNT(*) FROM wishlist')->fetch_assoc()['COUNT(*)'];
    
    $max_page = ceil($count / $max_rows);
    $max_page = $max_page < 1 ? 1 : $max_page;
    $page = $page < 1 ? 1 : $page;
    $page = $page > $max_page ? $max_page : $page;
    $start_offset = ($page - 1) * $max_rows;

    $result = $db->query("
    SELECT 
      *
    FROM 
      wishlist 
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

  public static function getWishlistByStatus($user_id, $status) 
  {

  }

  public static function addProgress() 
  {

  }

  public static function changeStatus () {

  }

  public static function add () {

  }

  public static function edit () {

  }

  public static function delete () {
    
  }

}