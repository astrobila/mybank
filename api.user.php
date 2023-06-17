<?php

include 'inc.config.php';

$data = UserModel::getUserById(UserSession::get_id());

echo json_encode([
  'status' => 1,
  'data' => $data,
]);