<?php

include 'inc.config.php';

if (URL::getRequestMethod() != 'post') {
  echo json_encode([
    'status' => 0,
    'data' => '',
  ]);
  die();
}

$title = trim(URL::getPost('title'));
$content = trim(URL::getPost('description'));
$account = trim(URL::getPost('account'));

$err = 0;
$errMessage = [];

if ($title == '') $title = "Untitled Transaction";

if ($account == '') $err = 1;

if ($err) {
  echo json_encode([
    'status' => 0,
    'data' => '',
  ]);
  die();
}

$result = TransactionsModel::add([
  'title' => $title,
  'user_id' => UserSession::get_id(),
  'content' => $content,
]);

if ($result['result'] !== true) {
  echo json_encode([
    'status' => 0,
    'data' => '',
  ]);
  die();
}

echo json_encode([
  'status' => 1,
  'data' => 'Transaction saved successfully',
]);
