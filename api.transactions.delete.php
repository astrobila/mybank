<?php

include 'inc.config.php';

$data_id = URL::getPost('id', 0, 'int');

TransactionsModel::delete($data_id);

echo json_encode([
  'status' => 1,
  'data' => 'Transaction deleted successfully',
]);