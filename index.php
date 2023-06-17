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
        <div class="column">
            <div class="recent-transaction-box">
                <div class="box-text">
                    <h4>Recent Transactions</h4>
                </div>
                <div class="transaction-col">
                    <h2>Tes</h2>
                    <tbody>
                        <?php foreach ($data['data'] as $idx => $row) { ?>        
                        <tr>
                        <td><p><?=htmlentities($row['title'])?></p> <p><?=htmlentities($row['amount'])?></p>
                        </td>
                        <td><?=htmlentities(date('F j, Y H:i', strtotime($row['date_time_modified'])))?></td>
                        <td></td>
                        </tr>
                        <?php } ?>        
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</body>
    




<?php

include 'layouts/inc.content.end.php';
include 'layouts/inc.footer.tag.php';