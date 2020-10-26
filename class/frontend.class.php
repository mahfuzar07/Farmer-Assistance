<?php


class Frontend {

 public $db_connect;

    function __construct() {
             $this->db_connect = mysqli_connect("localhost", "root", "", "agriculture");
    }


    function get_pageview(){

    $sql = "UPDATE view SET visitor = visitor+1 WHERE id = 1";
    mysqli_query($this-> db_connect, $sql);
        }


    function get_homepage_product() {
        $sql = "SELECT * FROM product WHERE status = 1 ORDER BY timestamp DESC LIMIT 25";
        if ($result = mysqli_query($this-> db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
        }
    }


    function get_all_blog() {
        $sql = "SELECT * FROM agri_blog";
        if ($result = mysqli_query($this-> db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
        }
    }



    function get_user_product($id) {
        $sql1 = "SELECT * FROM product WHERE creator_id = $id";
        $sql2 = "SELECT * FROM front_users WHERE uid = $id";
        if ($result1 = mysqli_query($this-> db_connect, $sql1)) {
            $return_result['product_info'] = $this->mysqli_fetch_all($result1, MYSQLI_ASSOC);
            if ($result2 = mysqli_query($this-> db_connect, $sql2)) {
              $return_result['user_info'] = mysqli_fetch_assoc($result2);
            }
            return $return_result;
        } else {
           die("Query Problem");
        }
    }

    function get_parent_category_product($id) {
        $sql = "SELECT * FROM product WHERE parent_category = $id ORDER BY timestamp DESC LIMIT 25";
        if ($result = mysqli_query($this->db_connect, $sql)) {
            return $result;
        } else {
            die("Query Problem");
        }
    }

    function check_product_by_id($id) {
        $sql = "SELECT * FROM product WHERE product_id = $id";
        if ($result = mysqli_query($this-> db_connect, $sql)) {
            $count = mysqli_num_rows($result);
            return $count;
        } else {
            die("Query Problem");
        }
    }


  //setting download calculation

  function set_download($creator){

       $a = $creator;
       $sql = "INSERT INTO download(creator_id) VALUES ('$a')";
       $result = mysqli_query($this-> db_connect, $sql);

       return 'done';


  }





    function get_product_by_id($id) {
        if ($this-> check_product_by_id($id) == 1) {
            $sql = "SELECT p.*,u.* FROM product as p, front_users as u WHERE p.product_id = $id AND u.uid = p.creator_id";
            if ($return = mysqli_query($this->db_connect, $sql)) {
                $result = mysqli_fetch_assoc($return);
                return $result;
            } else {
                die(mysqli_error($this-> db_connect));
                // die("Query Problem");
            }
        } else {
            header("Location: ./");
        }

        function get_all_users() {
            $sql = "SELECT * FROM users";
            if ($data = mysqli_query($this-> db_connect, $sql)) {
                return $data;
            } else {
                die("Query Error - ").mysqli_error($this-> db_connect);
            }
        }

        function get_admin_info($data) {
            $sql = "SELECT * FROM users WHERE  uid = $id";
            if ($data = mysqli_query($this-> db_connect, $sql)) {
                return $data;
            } else {
                die("Query Error - ").mysqli_error($this->db_connect);
            }
        }
    }
    public
    function get_fullname($uid) {
        $sql = "SELECT fullname FROM  front_users  WHERE uid = $uid";

        if ($return = mysqli_query($this-> db_connect, $sql)) {
            $data = mysqli_fetch_assoc($return);
            return $data;
        } else {
            die("Query Problem");
        }

    }

      function get_category_by_id($id) {
        $sql = "SELECT * FROM  parent_category WHERE id = $id";
        if ($return = mysqli_query($this-> db_connect, $sql)) {
            $data = mysqli_fetch_assoc($return);
            return $data;
        } else {
            die("Query Problem".mysqli_error($this->db_connect));
        }

    }

    function get_categories() {
        $sql = "SELECT * FROM parent_category";
        if ($data = mysqli_query($this-> db_connect, $sql)) {

            return $data;
        } else {
            die("Query Problem");
        }
    }


    function add_question($data) {
            $sql = "INSERT INTO question (name,email,agri_question) VALUES ('$data[name]','$data[email]','$data[agri_question]')";

            if ($data = mysqli_query($this->db_connect, $sql)) {
                $msg = "Agri question Added Sucessfully";
                return $msg;
            } else {
                die("Query Error - ") . mysqli_error($this->db_connect);
            }
        }

  function get_product_category_id($id){
    $sql="SELECT * FROM product WHERE parent_category= $id ORDER BY product_id DESC LIMIT 5" ;
    if ($data=mysqli_query($this->db_connect,$sql)) {
      return $data;
    }else {
        die("Query Problem-". mysqli_error($this->db_connect));
    }
  }
    function get_all_question_ans()
 {
    $sql="SELECT * FROM question";
        if ($data = mysqli_query($this->db_connect, $sql)) {
            return $data;
        } else {
            die("Query Problem");
        }
    }

    function pagination() {
        $sql = "SELECT* FROM blog";
        $result = mysql_query($this->db_connect, $sql);
        $total_rows = mysqli_num_rows($result);
        $total_page = ceil($total_rows / $total_page);

    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]).
            '...';
        }
        return $text;
    }

    function add_comment($request) {
        $sql = "INSERT INTO   comment (name,email,message) VALUES('$request[name]','$request[email]','$request[message]')";
        if ($sql = mysqli_query($this-> db_connect, $sql)) {
          $msg = "Comment Added Sucessfully";
          return $msg;
        } else {
            die("Query Problem");
        }
    }

    function search($value) {
        $sql = "SELECT * FROM product WHERE product_title LIKE '%$value%'";
        if ($data = mysqli_query($this-> db_connect, $sql)) {
            return $data;
        } else {
            die("Query Problem");
        }
    }



    private function mysqli_fetch_all(mysqli_result $result) {
        $data = [];
        while ($data[] = $result->fetch_assoc()) {}
        return $data;
    }
}




?>
