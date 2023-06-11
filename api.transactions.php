<?php

include 'inc.config.php';

$data = TransactionsModel::getAll(UserSession::get_id());

echo json_encode([
  'status' => 1,
  'data' => $data,
]);