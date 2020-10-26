<?php

// error_reporting(0);
/**
 * Author: Minhazul Abedin
 */

class Consaltent {

    public $db_connect;


    function __construct() {
          $this->db_connect = mysqli_connect("localhost", "root", "", "agriculture") or die("Database Conenction Error");
    }


function qestion_answer($data) {
     $sql = "UPDATE question SET answer='$data[answer]'
                             WHERE id='$data[qestion_id]'";
        if ($data = mysqli_query($this->db_connect, $sql)) {
            $msg = "Catgory Added Sucessfully";
            return $msg;
        } else {
            die("Query Error - ") . mysqli_error($this->db_connect);
        }
    }


    function get_question_by_id($id) {
        $sql = "SELECT * FROM question WHERE id=$id";
         if ($result=mysqli_query($this->db_connect,$sql)) {
          return $result;
    }else {
            die("Query Problem".mysqli_error($this->db_connect));
        }
    }

    function pagination() {
        $no_of_records_per_page = 2;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM question";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM question LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
    }


    function get_all_question() {
        $sql = "SELECT * FROM question ";
        if ($result = mysqli_query($this->db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
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
