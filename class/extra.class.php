<?php

// error_reporting(0);
/**
 * Author: Minhazul Abedin
 */
class Admin {

    public $db_connect;
       public $uname;

    function __construct() {
          $this->db_connect = mysqli_connect("localhost", "bfacom_bfa75", "hXMs7PHoCy9f", "bfacom_bfa_market");
}





  function login_admin($email, $password) {
        $password = md5($password);
        $sql = "SELECT * FROM admin_user WHERE admin_email = '$email' AND admin_password = '$password'";

        if ($result = mysqli_query($this->db_connect, $sql)) {
            if (mysqli_num_rows($result) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

function get_categories()
    {
        $sql = "SELECT s.*,p.* FROM category as s, parent_category as p WHERE s.parent_id = p.id";
        if($data = mysqli_query($this->db_connect, $sql)){

            return $data;
        }else{
                die("Query Problem");
            }
    }
function get_categories_by_parent($id)
    {
        $sql = "SELECT * FROM category WHERE parent_id = $id";
        if($data = mysqli_query($this->db_connect, $sql)){

            return $data;
        }else{
                die("Query Problem");
            }
    }
function get_parentcategories()
    {
        $sql = "SELECT * FROM parent_category" ;
        if($data = mysqli_query($this->db_connect, $sql)){

            return $data;
        }else{
                die("Query Problem");
            }
    }



function add_category($data) {
        $sql = "INSERT INTO category (category_name,category_tag,parent_id) VALUES ('$data[name]','$data[tag]','$data[parent_id]')";

        if ($data = mysqli_query($this->db_connect, $sql)) {
            $msg = "Catgory Added Sucessfully";
            return $msg;
        } else {
            die("Query Error - ") . mysqli_error($this->db_connect);
        }
    }
    function add_parentcategory($data) {
        $sql = "INSERT INTO parent_category (parent_category_name) VALUES ('$data[name]')";

        if ($data = mysqli_query($this->db_connect, $sql)) {
                echo"
       <script>
        alert ('Category Successfully Saved');
        window.location.href='home.php';
        </script>


         ";

            return null;
        } else {
            die("Query Error - ") . mysqli_error($this->db_connect);
        }
    }


  function add_profile_pic($data) {
            $directory = "../users/assets/upload/";
            if (!dir($directory)) {
                die("Directory Not Found");
            }

            $path = $_FILES['profile_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $image_name = uniqid() . "." . $ext;
            $target_file = $directory . "/" . $image_name;

            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $_FILES['profile_image']['size'];
            $is_image = getimagesize($_FILES['profile_image']['tmp_name']);

            if ($is_image) {
                if (file_exists($target_file)) {
                    return 'This file Already exists';
                    exit();
                } else {
                    if ($file_size > 5242880) {
                        return 'File Size is Too Large.Please select a size within 5mb';
                        exit();
                    } else {
                        if ($file_type != 'jpg' && $file_type != 'png') {
                            die("File type is not vaild");
                        } else {

                            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                            $sql = "UPDATE front_users SET profile_pic='$image_name'
                             WHERE uid='$data[admin_id]'";

                                if (mysqli_query($this->db_connect, $sql)) {
                                  echo"
                               <script>
                                alert ('Profile Pic Successfully Saved');
                                window.location.href='home.php';
                                </script>


                                 ";

                                    return null;
                                } else {
                                    return mysqli_error($this->db_connect);
                                }
                            } else {
                                die("Profile Image Upload Error");
                            }
                        }
                    }
                }
            } else {
                echo 'This is not a image';
            }
        }




    function add_product($data) {

        $id = $data[admin_id];
        $directory = "../users/assets/upload/";
        if (!dir($directory)) {
            die("Directory Not Found");
        }

        $path = $_FILES['product_image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $image_name = uniqid() . "." . $ext;
        $target_file = $directory . "/" . $image_name;

        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $is_image = getimagesize($_FILES['product_image']['tmp_name']);

        if ($is_image) {
            if (file_exists($target_file)) {
                return 'This file Already exists';
                exit();
            } else {
                if ($file_size >  5242880 ) {
                    return 'File Size is Too Large.Please select a size within 5mb';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png') {
                        die("File type is not vaild");
                    } else {

                        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file) && ($product_file = $this->uploadFile($data))) {


                              $sql1 = "SELECT 'uname' FROM 'front_users' WHERE uid = $data[admin_id]'";
                              $check2 =mysqli_query($db_connect,$sql1);
                              $row = mysqli_fetch_assoc($check2);


                                    //$fullname = $row['fullname'];
                            $sql = "INSERT INTO review (product_title,product_tag,product_image,product_file,parent_category,category,creator_id,uname,fullname) VALUES ('$data[title]','$data[tag]','$image_name','$product_file','$data[parent_category]','$data[sub_category]','$data[admin_id]','$row[uname]','asd')";

                            if (mysqli_query($this->db_connect, $sql)) {
                               // $msg = "Product Saved Sucessfully";
                                   echo"
                                <script>
                                 alert ('Product Submitted For Review');
                                 window.location.href='home.php';
                                 </script>


                                  ";

                                return null;


                                // header("locaion:./admin/add_product.php");

                            } else {
                                return mysqli_error($this->db_connect);
                            }



                        } else {
                            die("Product Image/File Upload Error");
                        }
                    }
                }
            }
        } else {
            echo 'This is not a image';

        }


    }

    private function uploadFile($file)
    {
        if($_FILES["product_file"]["name"]) {
            $filename = $_FILES["product_file"]["name"];
            $source = $_FILES["product_file"]["tmp_name"];
            $type = $_FILES["product_file"]["type"];

            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                    $okay = true;
                    break;
                }
            }

            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if(!$continue) {
                return false;
            }

            $directory = "../users/assets/upload/file/".$filename;

            if(move_uploaded_file($source, $directory)) {
                $message = $filename;
            } else {
                $message = false;
            }

            return $message;
        }

        return false;
    }

}


function get_all_product() {
        $sql = "SELECT * FROM product";
        if ($data = mysqli_query($this->db_connect, $sql)) {
            return $data;
        } else {
            die("Query Error - ") . mysqli_error($this->db_connect);
        }
    }










    // function get_admin_info() {
    //     $sql = "SELECT * FROM admin_user WHERE user_name='admin'";
    //     if ($data = mysqli_query($this->db_connect, $sql)) {
    //         return $data;
    //     } else {
    //         die("Query Error - ") . mysqli_error($this->db_connect);
    //     }
    // }





?>


<?php

$parent_categories = $obj->get_categories();
?>

 <div class="navigation2  ec-nav sticky-top fixed-top">
   <div class="container">
     <div class="row  justify-content-between">
       <div class="col-lg-2 col-md-2 col-sm-12">
         <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" width="160px;"></a>
       </div>
       <!--dropdown work need to be done --->
       <div class="buttonInside text-center ">
         <div class="dropdown angle" style=" padding-top: 7px; padding-right: 5px; cursor: pointer;">
             <a  id="open-close-toggle" >
               <i class="fas fa-angle-down pl-1"></i>
               <i class="fas fa-angle-up hidden pl-1"></i>
             </a>
             <div class="dropdown-menu dropdown-menu1" id="toggle-section">
                 <a class="dropdown-item" href="#"></a>

                 <a  class=" <?php echo isset($pcat)?'':'active'; ?>">
                   <a class="dropdown-item" href="?">New Arrivals</a>
                 </li>
                 <?php while ($parent_category = mysqli_fetch_assoc($parent_categories)) { ?>
                 <a class="dropdown-item <?php echo isset($pcat)? ($pcat == $parent_category['id'])? 'active':'' :''; ?>">
                   <a class="dropdown-item" href="?pcat=<?php echo $parent_category['id']; ?>"><?php echo $parent_category['parent_category_name']; ?></a>

               <?php } ?>
             </div>
           </div>
            <input class="inp" placeholder="Find your resource">
             <a href="search.php">  <button class="search" type="submit"><i class="fas fa-search"></i></button></a>
           </div>

       <div class="col-lg-3 col-md-4 col-sm-12" >
         <ul class="nav justify-content-end position">
           <form class=" form-inline  " action="/action_page.php">
         <a href="/users/registration.php"><button class="Signup" type="button" >Join</button></a>
         <a href="/users/login.php">	<button class="Login " type="button" >Log In</button></a>
           </form>
         </ul>
       </div>
     </div>
   </div>
 </div>
