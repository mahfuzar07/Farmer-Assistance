<?php

// error_reporting(0);
/**
 * Author: Minhazul Abedin
 */
class Admin {

    public $db_connect;

    function __construct() {
          $this->db_connect = mysqli_connect("localhost", "root", "", "agriculture") or die("Database Conenction Error");
    }


    function get_all_product() {
        $sql = "SELECT * FROM product WHERE status=0 ORDER BY timestamp DESC LIMIT 10";
        if ($result = mysqli_query($this->db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
        }
    }



    function get_all_users() {
        $sql = "SELECT * FROM front_users";
        if ($result = mysqli_query($this->db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
        }
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

    function get_comment()
        {
            $sql = "SELECT * FROM comment" ;
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

    function published_product($data) {
      $sql = "UPDATE product SET status= 1 WHERE product_id='$data[product_id]'";
            if ($data = mysqli_query($this->db_connect, $sql)) {
                $msg = "Catgory Added Sucessfully";
                return $msg;
            } else {
                die("Query Error - ") . mysqli_error($this->db_connect);
            }
        }

    function add_dhaka($data) {
            $sql = "INSERT INTO dhaka (alu,begun,tomato,chal,gom,dim,beff,matton,tel,ada,rosun,tometo) VALUES ('$data[alu]','$data[begun]','$data[tomato]','$data[chal]','$data[gom]','$data[dim]','$data[beff]','$data[matton]',
              '$data[tel]', '$data[ada]','$data[rosun]','$data[tometo]')";

            if ($data = mysqli_query($this->db_connect, $sql)) {
                $msg = "Catgory Added Sucessfully";
                return $msg;
            } else {
                die("Query Error - ") . mysqli_error($this->db_connect);
            }
        }





    function add_blog($data) {
            $sql = "INSERT INTO agri_blog (title,description) VALUES ('$data[title]','$data[description]')";

            if ($data = mysqli_query($this->db_connect, $sql)) {
                $msg = "Agri blog Added Sucessfully";
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


        function get_product_by_id($id) {
               $sql = "SELECT * FROM product WHERE product_id='$product_id'";
               if ($data = mysqli_query($this->db_connect, $sql)) {
                   return $data;
               } else {
                   return mysqli_error($this->db_connect);
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
                                alert ('Category Successfully Saved');
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

        function delete_farmer($id) {
            $sql = "DELETE FROM front_users WHERE uid='$id'";
            if ($result = mysqli_query($this->db_connect, $sql)) {
                $msg = "farmer deleted Sucessfully";
                header("Location:./farmer.php");
            } else {
                die("Query Error - ") . mysqli_error($this->db_connect);
            }
        }

                function delete_product($id) {
                    $sql = "DELETE FROM product WHERE product_id='$id'";
                    if ($result = mysqli_query($this->db_connect, $sql)) {
                        $msg = "product deleted Sucessfully";
                        header("Location:./check-product.php");
                    } else {
                        die("Query Error - ") . mysqli_error($this->db_connect);
                    }
                }

// add product
    function add_product($data) {
        $directory = "../farmer/assets/upload/";
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


                            $sql = "INSERT INTO product (product_title,product_price,product_quantity,product_image,product_file,parent_category,category,creator_id) VALUES ('$data[title]','$data[price]','$data[quantity]','$image_name','$product_file','$data[parent_category]','$data[sub_category]','$data[admin_id]')";

                            if (mysqli_query($this->db_connect, $sql)) {
                               // $msg = "Product Saved Sucessfully";
                                   echo"
                                <script>
                                 alert ('Product Successfully Saved');
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

            $directory = "../farmer/assets/upload/file/".$filename;

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
