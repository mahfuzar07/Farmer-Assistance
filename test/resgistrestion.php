<?php
include_once 'authectication/class.user.php';
$user = new User();
// Checking for user logged in or not
    /*if (!$user->get_session())
    {
       header("location:index.php");
    }*/
if (isset($_POST['submit'])){
        extract($_POST);
        $pass = $_POST['upass'];
        $conpass =  $_POST ['confirmpassword'];


        if($conpass == $pass){

        $register = $user->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) {
            // Registration Success

            	echo"
					<script>
					alert ('Registration successful');
					window.location.href='login.php';
					</script>
					";
        } else {
            // Registration Failed
            	echo"
					<script>
					alert ('Registration Failed  Data is not Correct!');
					window.location.href='registration.php';
					</script>
					";
        }

        } else {


            	echo"
					<script>
					alert ('Password and confirm Password is not Match !');
					window.location.href='registration.php';
					</script>
					";
        }
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
    <div class="col-lg-6" style="position: relative; height: 100%">
           <form action="" method="post" name="reg"  class="signupfrom text-center">
           <a href="/index.php"> <img src="img/logo.png" width="250px;"></a>
            <div class="row  mt-4">
            <div class="col-lg-6 col-md-6 col-sm-6">

  <input type="text" name="fullname" placeholder="Name" required>
                    </div>
               <div class="col-lg-6 col-md-6 col-sm-6 ex">
                    <input type="username"   name="uname"  placeholder="User name" required>
                  </div>
            </div>
       <div class="one mt-3">
                    <input type="email"  value="" name="uemail"  placeholder="Email" required>
                  </div>
                      <div class="row mt-3">
                           <div class="col-lg-6 col-md-6 col-sm-6">
                      <input type="password" value="" name="upass" placeholder="Password" required>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 ex">
               <input type="password" name="confirmpassword"  placeholder="Confirm Password" required>
            </div>

                 </div>
                   <div class="col-lg-12 text-center mt-3 mb-3">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="gridCheck" required>
                      <label class="custom-control-label" for="gridCheck" style="font-size: 14px;" style="color: #8CC63F;"><a href="term.php">I agree to terms and condition</a></label>
                    </div>
                  </div>

                  <button type="submit" value="Register"  class="bttn" name="submit" onclick="return(submitreg());"  >Submit</button>

                </form>

        </div>
      </div>
</section>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>
    <script>
      function submitreg() {
        var form = document.reg;
        if (form.name.value == "") {
          alert("Enter name.");
          return false;
        } else if (form.uname.value == "") {
          alert("Enter username.");
          return false;
        } else if (form.upass.value == "") {
          alert("Enter password.");
          return false;
        } else if (form.uemail.value == "") {
          alert("Enter email.");
          return false;
        }

      }

    </script>
  </body>

  </html>
