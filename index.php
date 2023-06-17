<?php 

$pageTitle = 'Index';

include 'inc.config.php';
include 'layouts/inc.header.tag.php';
include 'layouts/inc.navbar.php';
include 'layouts/inc.content.begin.php';

Helpers::noLoginRedirect('login.php');

// user data
$user_id = UserSession::get_id();

// wishlist data
$wishlist_data = WishlistModel::getWishlistById($user_id, 0);
$wl_progress = $wishlist_data['progress'];
$wl_price = $wishlist_data['item_price'];
$wl_name = $wishlist_data['item_name'];
$wl_status = $wishlist_data['status'];


// Recent Transactions
$page = URL::get('page', 0, 'int');

$data = TransactionsModel::getAll($user_id, $page, 10);
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets\css\index_styling.css" rel="stylesheet" />
</head>
<body>
    <!-- <div class="row"> -->
        <div class="column">
            <div class="index-header">
                <h2>Welcome, <?=htmlentities(UserSession::get_id())?></h2>
            </div>

            <div class="balance-box", style="top: 20px; height: 120px;">
                <div class="box-text">
                    <h4>Your Balance</h4>
                    <h3>RP. <?=htmlentities(TransactionsModel::getBalance(UserSession::get_id()))?></h3>
                </div>
            </div>
            <p></p>
            <div class="balance-box" style="top: 15px; height: 230px;">
                <div class="box-text">
                    <h4>Top Wishlist</h4>
                    <h3>1. <?=$wl_name?></h3>
                    <h5 style="padding-left: 25px;">RP. <?=$wl_progress?> / RP. <?=$wl_price?></h5>
                    <a href='wishlist.php'>See more</a>
                </div>
            </div> 
            <!-- htmlentities(WishlistModel::getWishlistById(1, 0)) -->
            
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