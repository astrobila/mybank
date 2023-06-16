<?php

$pageTitle = 'Wishlist';

include 'inc.config.php';
include 'layouts/inc.header.tag.php';
include 'layouts/inc.navbar.php';
include 'layouts/inc.content.begin.php';

$page = URL::get('page', 0, 'int');

$data = WishlistModel::getAll(UserSession::get_id(), $page, 10);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
  <div class="d-flex justify-content-between">
    <div><h2>Wishlist</h2></div>
    <div><a class="float-end btn btn-primary" href="wishlist.add.php">Add Transactions</a></div>
  </div>
  <hr />
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">modified at</th>
          <th scope="col">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['data'] as $idx => $row) { ?>        
        <tr>
          <th scope="row"><?=$idx + $data['start_offset'] + 1?></th>
          <td><?=htmlentities($row['item_name'])?></td>
          <td><?=htmlentities(date('F j, Y H:i', strtotime($row['date_time_created'])))?></td>
          <td>
            <a class="btn btn-warning btn-sm" href="notes.edit.php?id=<?=$row['id']?>">
              <span data-feather="edit" class="align-text-bottom"></span> 
              Ubah
            </a>
          </td>
        </tr>
        <?php } ?>        
      </tbody>
    </table>
  </div>
  <nav aria-label="Page navigation">
    <ul class="pagination pagination-sm">
      <li class="page-item">
        <a class="page-link" href="notes.php?page=<?=$data['page'] - 1?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($i = 1; $i <= $data['max_page']; $i++) { ?>
      <li class="page-item <?=$data['page'] == $i ? 'active' : ''?>" aria-current="page"><a class="page-link" href="notes.php?page=<?=$i?>"><?=$i?></a></li>
      <?php } ?>
      <li class="page-item">
        <a class="page-link" href="notes.php?page=<?=$data['page'] + 1?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</main>
<?php

include 'layouts/inc.content.end.php';
include 'layouts/inc.footer.tag.php';