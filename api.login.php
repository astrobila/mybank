<?php

include 'inc.config.php';

$username = trim(URL::getPost('username', ''));
$password = trim(URL::getPost('password', ''));

if ($username == '' || $password == '') {
  echo json_encode([
    'status' => 2,
    'data' => 'Please enter username or password',
  ]);
  die();
}

$user = UserModel::getUserByUsername($username);

if (is_null($user)) {
  echo json_encode([
    'status' => 3,
    'data' => 'User not found',
  ]);
  die();
}

if ($user['password'] != md5($password)) {
  echo json_encode([
    'status' => 4,
    'data' => 'Invalid password22',
  ]);
  die();
}

UserSession::set_session($user);
//UserModel::login($username);

echo json_encode([
  'status' => 1,
  'data' => 'Login successful',
]);