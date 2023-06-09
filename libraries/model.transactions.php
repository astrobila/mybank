<?php

class TransactionsModel {
  public static function getAll($user_id, $page = 0, $max_rows = 10) 
  {
    $db = DB::getInstance();

    $user_id = filter_var($user_id, FILTER_VALIDATE_INT) ? $user_id : 0;
    $count = $db->query('SELECT COUNT(*) FROM transactions')->fetch_assoc()['COUNT(*)'];
    
    $max_page = ceil($count / $max_rows);
    $max_page = $max_page < 1 ? 1 : $max_page;
    $page = $page < 1 ? 1 : $page;
    $page = $page > $max_page ? $max_page : $page;
    $start_offset = ($page - 1) * $max_rows;

    $result = $db->query("
    SELECT 
      *
    FROM 
      transactions 
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

  public static function getTransactionByAccount($user_id, $account)
  {
    # code...

  }

  public static function getBalance($user_id)
  {
    $balance = 0;
    $sumCredit = 0;
    $sumDebit = 0;
    $sumSavings = 0;
    $db = DB::getInstance();

    #Ambil credit dan sum
    $result = $db->query("
      SELECT 
        amount 
      FROM 
        transactions 
      WHERE 
        user_id = '" . $user_id . "' AND account = 1
    ");

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sumCredit = $sumCredit + $row['amount'];
      }
    }

    #Ambil debit dan sum
    $result = $db->query("
      SELECT 
        amount
      FROM 
        transactions 
      WHERE 
        user_id = '" . $user_id . "' AND account = 2
    ");

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sumDebit = $sumDebit + $row['amount'];
      }
    }

    #Ambil savings dan sum
    $result = $db->query("
      SELECT 
        amount 
      FROM 
        transactions 
      WHERE 
        user_id = '" . $user_id . "' AND account = 3
    ");

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sumSavings = $sumSavings + $row['amount'];
      }
    }

    #Balance = credit - debit - savings
    $balance = $sumCredit - $sumDebit - $sumSavings;

    return $balance;

  }

  public static function add () {

  }
  
  public static function edit () {

  }
  
  public static function delete () {
    
  }
}