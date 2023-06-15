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

.container-register {
    height: 100%;
    width: 100%;
}

.form-wrap{
    background: #70C86E;
    height: 10%;
    width: 50%;
    top: 50%;
    left: 50%;
    transform: translate(50%, 10px);
    border-radius: 5px;
}

.regist-text{
    margin-top: 5%;
    margin-bottom: 5px;
}

.form-register {
  max-width: 330px;
  padding: 15px;
}

.registerbtn {
    background-color: #ffff;
    color: black;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
    opacity: 0.9;
    border-radius: 10px;
}

.form-register .form-floating:focus-within {
  z-index: 2;
}

.form-register input[type="text"] {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-register input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  
.form-register input[type="password2"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
';

function register_form(){
    if (!isset($_POST['register'])) {
        return [
            'status' => 1,
            'message' => [],
          ];
    }else{

        // error code & messages
        $err = 0;
        $err_message = [];

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];


        // if ($username == " "){
        //     echo "Username empty string";
        // } else{
        //     print_r($username);
        // }
            
        // checking empty/null input; errcode = 2
        if ($username == '') {
            $err = 2;
            $err_message['username'] = 'username must be filled';
        }

        if ($email == '') {
            $err = 2;
            $err_message['email'] = 'email must be filled';
        }

        if ($password == '') {
            $err = 2;
            $err_message['password'] = 'password must be filled';
        }

        if ($password2 == '') {
            $err = 2;
            $err_message['password2'] = 'password confirmation must be filled';
        }

        // Validating input errcode = -1
        $used_email = UserModel::getUserByEmail($email);
        if (!is_null($used_email)) {
            $err = -1;
            $err_message['email'] = 'an account with this email already exists.';
            // echo "<script type='text/javascript'>alert('Email is used.'); location='register.php';</script>";
        }

        if (strlen($password) < 8) {
            $err = 2;
            $err_message['password'] = 'password can\'t be less than 8 characters';
        }

        if ($password2 != $password) {
            $err = 2;
            $err_message['password'] = 'password confirmation must be the same with password';
        }

        // print_r($err);
        if ($err == 0) {
            $data = ['username' => $username, 'email' => $email, 'password' => $password2];
            UserModel::addUser($data);
            return [
                'status' => 3,
                'message' => 'Successfully Registered.',
            ];
        }

        return [
            'status' => $err,
            'message' => $err_message
        ];
    }
}


$result = register_form();

print_r($result['status']) ;
if ($result['status'] == 3) {
    Helpers::redirect('login.php');
    die();
}
// else if ($result['status'] == 8){
//     print_r($result['message']['password2']);
//     // Helpers::redirect('register.php');
// }else{
//     echo "other err code";
//     print_r($result['status']);
// }


include './layouts/inc.header.tag.php';
include './layouts/inc.content.begin.php';
?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <main class="form-register w-100 m-auto"> -->

    <div class="form-wrap">
        <form action="register.php" method="post" class="text-center">
            <!-- <h1 class="h3 mb-3 fw-normal">Register</h1> -->
            <div class="regist-text">
                    <h4>Register</h4>
            </div>
            <br>

            <div class="container-register">
                <div class="wrap-register">
                    <div class="form-floating">
                        <input type="text" class="form-control <?=isset($result['message']['email'])?'is-invalid':''?>" name="email" placeholder="Email" value="<?=htmlentities(URL::getPost('email'))?>">
                        <label for="floatingInput">Email</label>
                        <?php if (isset($result['message']['email'])) { ?>
                        <div class="invalid-tooltip">
                        <?=$result['message']['email']?>
                        </div>
                        <?php } ?>
                    </div>

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
                    <div class="form-floating">
                        <input type="password" class="form-control <?=isset($result['message']['password2'])?'is-invalid':''?>" name="password2" placeholder="Confirm password">
                        <label for="floatingPassword">Confirm Password</label>
                        <?php if (isset($result['message']['password2'])) { ?>
                        <div class="invalid-tooltip">
                        <?=$result['message']['password2']?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="text-center p-t-12">
                        <p>Already have an account? <a class="txt2" href="login.php">Sign in</a></p>
                    </div>
                    <div class="form-group">
                        <div class="register-btn">
                            <button type="submit" class="registerbtn" name="register">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    

<!-- </main> -->
<?php

include './layouts/inc.content.end.php';
include './layouts/inc.footer.tag.php';