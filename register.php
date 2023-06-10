<?php

$pageTitle = 'Sign Up';

include 'inc.config.php';

// to include helpers file
require __DIR__ . '/../libraries/lib.helpers.php';

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
    
}

.register-page{
    background: #70C86E;
    position:absolute;
    top:0px;
    right:0px;
    bottom:0px;
    left:0px;
}

// .container-register {
//     height: 100%;
//     width: 100%;
// }

.register-btn{
    justify-content: center;
    align-items: center;
    padding-left: 42%;
}

.wrap-register{
    max-width: 50%;
    padding: 15px;
    margin: auto;
    background-color: #f5f5f5;
}

.regist-text{
    text-align: center;
}
  
p{
    color: #70C86E;
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

if (is_post_request()) {

}

include './layouts/inc.header.tag.php';
include './layouts/inc.content.begin.php';
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<body>
    <div class="register-page">
        <div class="container-register">
            <div class="wrap-register">
                <div class="regist-text">
                    <h4><strong>Registration</h4>
                </div>

                <form class="form-horizontal" action="register.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="username">Username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox">Remember me</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="regist-text">
                        <p>Or</p>
                    </div>
                    <div class="form-group">
                        <div class="register-btn">
                            <button type="submit" class="btn btn-default">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>