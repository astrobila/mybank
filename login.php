<?php

$pageTitle = 'Sign in';

include 'inc.config.php';

$mainCSSStyle = '
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="text"] {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
';

function form_submit() {
  if (URL::getRequestMethod() != 'post') {
    return [
      'status' => 1,
      'message' => [],
    ];
  }

  $username = URL::getPost('username');
  $password = URL::getPost('password');

  $err = 0;
  $errMessage = [];

  if (trim($username) == '') {
    $err = 1;
    $errMessage['username'] = 'Masukkan username';
  }

  if (trim($password) == '') {
    $err = 1;
    $errMessage['password'] = 'Masukkan password';
  }

  if ($err) {
    return [
      'status' => $err,
      'message' => $errMessage,
    ];
  }

  $user = UserModel::getUserByUsername($username);

  if (is_null($user)) {
    $err = 1;
    $errMessage['username'] = 'Username tidak terdaftar';
  }

  if ($err == 0) {
    if ($user['password'] != md5($password)) {
      $err = 1;
      $errMessage['password'] = 'Password salah';
    } else {
      UserSession::set_session($user);
      return [
        'status' => 2,
        'message' => 'Login berhasil',
      ];
    }
  }

  return [
    'status' => $err,
    'message' => $errMessage,
  ];

}

$result = form_submit();

if ($result['status'] == 2) {
  Helpers::redirect('index.php');
  die();
}


include './layouts/inc.header.tag.php';
include './layouts/inc.content.begin.php';
?>
<main class="form-signin w-100 m-auto">

<form action="signin.php" method="post" class="text-center">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <div class="form-floating">
    <input type="text" class="form-control <?=isset($result['message']['username'])?'is-invalid':''?>" name="username" placeholder="Username" value="<?=htmlentities(URL::getPost('username'))?>">
    <label for="floatingInput">Username</label>
    <?php if (isset($result['message']['username'])) { ?>
    <div class="invalid-tooltip">
      <?=$result['message']['username']?>
    </div>
    <?php } ?>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control <?=isset($result['message']['password'])?'is-invalid':''?>" name="password" placeholder="Password">
    <label for="floatingPassword">Password</label>
    <?php if (isset($result['message']['password'])) { ?>
    <div class="invalid-tooltip">
      <?=$result['message']['password']?>
    </div>
    <?php } ?>
  </div>

  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
</form>

</main>
<?php

include './layouts/inc.content.end.php';
include './layouts/inc.footer.tag.php';