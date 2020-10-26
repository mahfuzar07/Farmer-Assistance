<?php

session_start();
include_once 'authectication/class.user.php';
$user = new User();

if (isset($_POST['submit'])) {
		extract($_POST);
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {

	        // Registration Success
	       header("location:home.php");
	    } else {

	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}

?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <title>FAI|Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/auth/css/bootstrap.min.css">
  <link rel="stylesheet" type="/text/css" href="assets/auth/style.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
      <div class="container">
				<img src="assets/img/logo (2).png" style="width:200px;hieght:100px;margin-left: 420px;"/>

    <div class="login-form col-md-4 offset-md-4 mt-5">
      <form action="" method="post" name="login">

        <h1 class="tittle mb-3" style="color: #A4D268; text-align: center;">Log In</h1>
          <input type="uname" name="emailusername" class="form-control mb-3" placeholder="Email">

          <input type="password"  class="form-control mb-3" name="password" placeholder="Password">

          <button type="submit" class="btn btn-success btn-block" name="submit" onclick="return(submitlogin());">Sign in</button>
          <div class="py-3 mb-0">
            <a class="form-link" href="#" style="color: #A4D268">Forgot password?</a>
            <span class="ml-5">No account?<a class="" href="registration.php" style="color: #A4D268">Sign up</a></span>
          </div>

        </form>
        </div>
      </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script type="text/javascript" src="assets/auth/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/auth/js/script.js"></script>
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
