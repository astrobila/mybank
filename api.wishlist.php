<?php

include 'inc.config.php';

$data = WishlistModel::getAll(UserSession::get_id());

echo json_encode([
  'status' => 1,
  'data' => $data,
]);