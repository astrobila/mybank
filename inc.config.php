<?php

$configCompanyName = 'moneyhive';
$configCompanyURL  = 'https://moneyhive.com/';


$DBConfig['servername'] = 'mariadb';
$DBConfig['username']   = 'root';
$DBConfig['password']   = 'root';
$DBConfig['dbname']     = 'moneyhive';

if (is_file(__DIR__ . '/inc.config.dev.php')) {
  require_once __DIR__ . '/inc.config.dev.php';
}

require_once __DIR__ . '/libraries/lib.database.php';
require_once __DIR__ . '/libraries/lib.url.php';
require_once __DIR__ . '/libraries/lib.session.php';
require_once __DIR__ . '/libraries/lib.helpers.php';
require_once __DIR__ . '/libraries/lib.usersession.php';

require_once 'libraries/model.transactions.php';
require_once 'libraries/model.users.php';
require_once 'libraries/model.wishlist.php';
