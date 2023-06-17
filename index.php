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
$wishlist_data[] = WishlistModel::getWishlistById($user_id, 0);
$wl_progress = $wishlist_data['progress'];
$wl_price = $wishlist_data['item_price'];
$wl_name = $wishlist_data['item_name'];
$wl_status = $wishlist_data['status'];

?>

<head>
<link href="assets\css\index_styling.css" rel="stylesheet" />
</head>
<body>
    <div class="row">
        <div class="column" style="background-color:#e5e5e5e5;">
            <div class="index-header">
                <h2>Welcome, <?=htmlentities(UserModel::getUserById(UserSession::get_id())['username'])?></h2>
            </div>

            <div class="balance-box", style="top: 20px; height: 120px;">
                <div class="balance-text">
                    <h4>Your Balance</h4>
                    <h3>RP. <?=htmlentities(TransactionsModel::getBalance(UserSession::get_id()))?></h3>
                </div>
            </div>
            <p></p>
            <div class="balance-box" style="top: 15px; height: 280px;">
                <div class="wishlist-text">
                    <h4>Top Wishlist</h4>
                    <h2>1. <?=$wl_name?></h2>
                    <h5>RP. <?=htmlentities(TransactionsModel::getBalance(UserSession::get_id()))?></h5>
                    <a href='wishlist.php'><button>See more</button></a>
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