<?php

include 'inc.config.php';

$action = trim(URL::get('action', ''));

switch ($action) {

  case 'status':
    echo json_encode([
      'status' => UserSession::isLoggedIn()?1:0,
      'data' => UserSession::get_session(),
    ]);
    break;
  
  default:
    echo json_encode([
      'id' => session_id(),
    ]);

}