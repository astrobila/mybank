<?php

include 'inc.config.php';

UserSession::unset_session();

echo json_encode([
  'status' => 1,
  'data' => 'Logout successful',
]);