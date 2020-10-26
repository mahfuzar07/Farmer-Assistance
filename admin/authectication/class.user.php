<?php
	include "db_config.php";
	class User{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}

		/*** for registration process ***/


	       public function reg_user($name,$username,$password,
	       	$email,$city,$phone){
			//echo "k";

			$password = md5($password);

			//checking if the username or email is available in db
			$query = "SELECT * FROM 	front_users	 WHERE uname='$username' OR uemail='$email'";

			$result = $this->db->query($query) or die($this->db->error);

			$count_row = $result->num_rows;

			//if the username is not in db then insert to the table

			if($count_row == 0){
				$query = "INSERT INTO 	users  SET uname='$username', upass='$password', fullname='$name', uemail='$email', city='$city', phone_number='$phone'";

				$result = $this->db->query($query) or die($this->db->error);

				return true;
			}
			else{


			    echo"
					<script>
					alert ('Registration Failed- Username Already In Use !!!');
					window.location.href='registration.php';
					</script>
					" ;



			    return false;





			}


			}



		public function check_login($emailusername, $password){
        $password = md5($password);

		$query = "SELECT uid from 	front_users	 WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";

		$result = $this->db->query($query) or die($this->db->error);


		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;

		if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['uid'] = $user_data['uid'];
							 $_SESSION['uname'] = $user_data['uname'];
	            return true;
	        }

		else{return false;}


	}


	public function get_fullname($uid){
		$query = "SELECT fullname FROM 	front_users	 WHERE uid = $uid";

		$result = $this->db->query($query) or die($this->db->error);

		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $user_data['fullname'];

	}

	/*** starting the session ***/
	public function get_session(){
	    return $_SESSION['login'];
	    }

	public function user_logout() {
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
	    }









}
