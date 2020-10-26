<?php
session_start();
include_once 'authectication/class.user.php';
$user = new User();

if (isset($_POST['submit'])) {
		extract($_POST);
	    $login = $user->check_login($emailusername, $password);

	}
?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BFAMARKET</title>
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="animate.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  ::-webkit-input-placeholder {
    font-size: 15px!important;
    color: #969696!important;
}
:-moz-placeholder {
    color: #969696!important;
    font-size: 15px!important;
}
::-moz-placeholder {
    color: #969696!important;
    font-size: 15px!important;
}
:-ms-input-placeholder {
    color: #969696!important;
    font-size: 15px!important;
}

</style>
<body>
      <section class="container">
  <div class="row justify-content-center" >
    <div class="col-lg-6 " style="position: relative; height: 100%;">
      <form action="" method="post" name="login" class="loginfrom text-center">
      <a href="/index.php" ><img src="img/logo.png" width="250px;"></a>
        <div class="one mt-4">
          <i class="fas fa-user custom-fa" aria-hidden="true"></i>
          <input type="uname" name="emailusername"  placeholder="username">
      </div><br>
      <div class="one">
          <i class="fas fa-lock custom-fa" aria-hidden="true"></i>
          <input type="password"   name="password" placeholder="Password">
   </div><br>
          <button type="submit" class="bttn" name="submit" onclick="return(submitlogin());">Sign in</button>
             <br>
             <div class="row text">
                <div class="col-lg-6 col-6 text-left" style="margin-top: 5px;">
            <a  href="#" style="color: #8BC53F; ">Forgot password?</a>
            </div>
                <div class="col-lg-6 col-6 text-right" style="margin-top: 5px;">

            <p><a href="registration.php">No account?</a><span><a style="color: #8BC53F;" href="registration.php" >Sign up</a></p>
          </div>
         </div>
        </form>
          </div>
  </div>
</section>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="nav1.js"></script>
<script src="js/modernizr-custom.js"></script>
</body>
</html>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.emailusername.value == "") {
          alert("Enter email or username.");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password.");
          return false;
        }
      }
    </script>


  </body>
