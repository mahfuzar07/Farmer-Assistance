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
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <title>BFA || Signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/auth/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/auth/style.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
      <div class="container">
         <h3 class="py-3 ml-md-5"><span style="color: #A4D268;">BFA</span><span>MARKET</span></h3>
        <div class="signup-form col-md-4 offset-md-4 mt-5">
            <h1 class="tittle mb-3" style="color: #A4D268; text-align: center;">Sign Up</h1>
        <form action="" method="post" name="reg">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control"  name="fullname" placeholder="Name">
                    </div>
                   <div class="form-group">
                    <input type="username" class="form-control"  name="uname" " placeholder="User name">
                  </div>

                  <div class="form-group">
                    <input type="email" class="form-control"  value="" name="uemail"  placeholder="Email">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="password" class="form-control" value="" name="upass" placeholder=" Password">
                    </div>
                    
                  <!-- <div class="form-row">
                    <div class="form-group col-md-8">
                      <select id="inputState" class="form-control">
                        <option>Select Your City...</option>
                        <option>Dhaka</option>
                        <option>Mymensing</option>
                        <option>khulna</option>
                        <option>Sherpur</option>
                        <option>Chittagong</option>
                        <option>Sylhet</option>
                      </select>
                    </div> -->
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control"  value="" name="confirmpassword" placeholder="password">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="form-check ml-5">
                      <input class="form-check-input" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck" style="color: #A4D268;">I agree to terms and condition</label>
                    </div>
                  </div> -->
                  
                  <button type="submit"style="background-color:#A4D268;" value="Register"  class="btn btn-block btn-dark mb-3 border-0" name="submit" onclick="return(submitreg());"  >Submit</button>
                 
                </form>
                <h4 class="m-0" style="color: #A4D268">or</h4>  
            <ul class="ml-0">
                <li ><a style="color: #3b5998;" href="http://www.facebook.com/page.bfa"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a style="color: #db4437" href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a style="color: #f46f30;" href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a style="color:#1da1f2;" href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a style="color: #007bb5;" href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> 
                <li><a style="color: #ff0000;" href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li> 
            </ul>         
        </div>
      </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script type="text/javascript" src="assets/auth/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/auth/js/script.js"></script>
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