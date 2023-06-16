<?php 

$pageTitle = 'Index';

include 'inc.config.php';
include 'layouts/inc.header.tag.php';
include 'layouts/inc.navbar.php';
include 'layouts/inc.content.begin.php';

Helpers::noLoginRedirect('login.php');

?>

<head>
<link href="assets\css\index_styling.css" rel="stylesheet" />
</head>
<body>
    <div class="row">
        <div class="column" style="background-color:#e5e5e5e5;">
            <div class="index-header">
                <h2>Welcome, <?=htmlentities(UserSession::get_id())?></h2>
            </div>

            <div class="balance-box", style="top: 115px;">
                <div class="balance-text">
                    <h4>Your Balance</h4>
                    <h3>RP. <?=htmlentities(TransactionsModel::getBalance(UserSession::get_id()))?></h3>
                </div>
            </div>
            <p></p>
            <div class="balance-box" style="top: 240px">
                <div class="wishlist-text">
                    <h4>Top Wishlist</h4>
                    <h3>RP. <?=htmlentities(TransactionsModel::getBalance(UserSession::get_id()))?></h3>
                </div>
            </div>
            
        </div>
        <div class="column" style="background-color:#e5e5e5e5;">
            <h2>Column 2</h2>
            <p>Some text..</p>
        </div>
    </div>
</body>
    




<?php

include 'layouts/inc.content.end.php';
include 'layouts/inc.footer.tag.php';