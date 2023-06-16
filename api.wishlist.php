<?php

include 'inc.config.php';

$data = WishlistModel::getAllForMobile(UserSession::get_id());

echo json_encode([
  'status' => 1,
  'data' => $data,
]);