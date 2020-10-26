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
          $register = $user->reg_user($fullname, $uname, $upass, $uemail,$city,$phone_number);
          if ($register)
           {
              // Registrati
            // Registration Success

            	echo"
					<script>
					alert ('Registration successful');
					window.location.href='index.php';
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

        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <title>FAI || Signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="assets/auth/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/auth/style.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
      <div class="container">
        <img src="assets/img/logo (2).png" style="width:200px;hieght:100px;margin-left: 420px;"/>
        <div class="signup-form col-md-4 offset-md-4 mt-5">
            <h1 class="tittle mb-3" style="color: #A4D268; text-align: center;">Sign Up</h1>
        <form action="" method="post" name="reg">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <input type="text" class="form-control"  name="fullname" placeholder="নাম ">
                    </div>
            <div class="form-group col-md-12">
         <input type="username" class="form-control"  name="uname" " placeholder="ইউজার নাম ">
                  </div>

                <div class="form-group col-md-12">
                    <input type="email" class="form-control"  value="" name="uemail"  placeholder="ইমেল ">
                  </div>
                    <div class="form-group col-md-12">

                      <input type="password" class="form-control" value="" name="upass" placeholder="পাসওয়ার্ড  ">
                    </div>

                      <div class="form-group col-md-12" name="city">
                      <select id="inputState" class="form-control" name="city">
                        <option>সিলেক্ট করুন ...</option>
                        <option>ঢাকা </option>
                        <option>বগুড়া </option>
                        <option>রাজশাহি </option>
                        <option>মিরপুর </option>

                      </select>
                    </div>

                    <div class="form-group col-md-12">
                      <input type="text" class="form-control"  value="" name="phone_number" placeholder="ফোন নাম্বার">
                    </div>
                  </div>


                  <button type="submit"style="background-color:#A4D268;" value="Register"  class="btn btn-block btn-dark mb-3 border-0" name="submit" onclick="return(submitreg());"  >Submit</button>

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
        else if (form.city.value == "") {
          alert("Enter city.");
          return false;
        }
        else if (form.phone_number.value == "") {
          alert("Enter Phone number.");
          return false;
        }

      }

    </script>
  </body>

  </html>
