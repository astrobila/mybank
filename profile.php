<?php

$pageTitle = 'Profile';

include 'inc.config.php';
include './layouts/inc.header.tag.php';
include './layouts/inc.navbar.php';

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
  <head>
    <title>Profil Pengguna - Edit</title>
      <style>
          .container {
              width: 800px;
              margin: 0 auto;
              padding: 20px;
              border: 1px solid #ccc;
          }

          .profile-img {
              width: 150px;
              height: 150px;
              border-radius: 50%;
              object-fit: cover;
              margin-right: 20px;
          }

          .profile-info {
              margin-top: 20px;
          }

          .profile-info p {
              margin: 5px 0;
          }

          .profile-info label {
              font-weight: bold;
          }

          .edit-form {
              margin-top: 20px;
          }

          .edit-form input {
              width: 100%;
              padding: 5px;
              margin-bottom: 10px;
          }

          .edit-form button {
              padding: 10px 20px;
              background-color: #4CAF50;
              color: white;
              border: none;
              cursor: pointer;
          }
      </style>
  </head>
  <body>
      <?php

      $user_id = UserSession::get_id();
      $foto = "assets/images/illyan.png"; 

    //   user data
    $data = UserModel::getUserById($user_id);
    $nama = $data['username'];
    $email = $data['email'];

    // edit user data
    UserModel::edit($user_id, $data)

      // Tampilan profil
      ?>
      <div class="container" style="background-color:white;">
          <h1><?=htmlentities(UserModel::getUserById(UserSession::get_id())['username'])?></h1>
          <img class="profile-img" src="<?php echo $foto; ?>" alt="Foto Profil">
          <div class="profile-info">
              <p><label>Nama:</label> <?=$nama; ?></p>
              <p><label>Email:</label> <?=$email; ?></p>
          </div>
          <div class="edit-form">
              <h2>Edit Informasi</h2>

              <form action="process_edit.php" method="POST">
                  <label for="nama">Nama:</label>
                  <input type="text" name="new_uname" id="nama" placeholder="Nama" value="<?= $nama; ?>">

                  <label for="email">Email:</label>
                  <input type="email" name="new_email" id="email" placeholder="Email" value="<?= $email; ?>">

                  <label for="Password">Password:</label>
                  <input type="text" name="old-password" placeholder="old password" >
                  <input type="text" name="new-password" placeholder="new password" >

                  <button type="submit">Simpan</button>
              </form>
          </div>
      </div>
  </body>
</main>
<?php

include './layouts/inc.content.end.php';
include './layouts/inc.footer.tag.php';