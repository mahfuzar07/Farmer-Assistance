<?php
ob_start();
session_start();

    include_once 'authectication/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }

  include "./class/consaltent_function.class.php";
$obj = new Consaltent;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FARMER ASSISTENCE</title>
    <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<style>
.sidenav2 {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav2 a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav2 a:hover {
    color: #f1f1f1;
}

.sidenav2 .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav2 {padding-top: 15px;}
  .sidenav2 a {font-size: 18px;}
}
</style>
</head>
<body>

       </head>
<body>
<?php
        include "includes/sidebar.php";
        ?>


 <?php
            include "includes/header.php";
            ?>




   <?php
        if (isset($site)) {
            switch ($site) {
                case 'main':
                    include "./includes/main_content.php";
                    break;



                case 'check-question':
                    include "./includes/check_question_content.php";
                    break;
                case 'give-answer':
                    include "./includes/post_answer_content.php";
                    break;


                case 'answer-question':
                    include "./includes/answer_question_content.php";
                    break;



                default:
                    include "./includes/main_content.php";
                    break;
            }
        } else {
            include "./includes/main_content.php";
        }
        ?>

            </div>
        </div>



   <script>
 $('#open-close-toggle').on("click", function(){
    var $arrows = $(this).find("i");
    $('#toggle-section').slideToggle(function(){
        $arrows.toggle();
    });
});
</script>




<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>





    <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="nav1.js"></script>
    <script src="assets/js/modernizr-custom.js"></script>

</body>
</html>
