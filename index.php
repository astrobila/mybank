<?php 

$pageTitle = 'Index';

include 'inc.config.php';
include 'layouts/inc.header.tag.php';
include 'layouts/inc.navbar.php';
include 'layouts/inc.content.begin.php';

Helpers::noLoginRedirect('login.php');

?>

<?php

include 'layouts/inc.content.end.php';
include 'layouts/inc.footer.tag.php';