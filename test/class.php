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
	       	$email){
			//echo "k";

			$password = md5($password);

			//checking if the username or email is available in db
			$query = "SELECT * FROM 	front_users	 WHERE uname='$username' OR uemail='$email'";

			$result = $this->db->query($query) or die($this->db->error);

			$count_row = $result->num_rows;

			//if the username is not in db then insert to the table

			if($count_row == 0){
				$query = "INSERT INTO 	front_users	 SET uname='$username', upass='$password', fullname='$name', uemail='$email'";

				$result = $this->db->query($query) or die($this->db->error);

				return true;
			}
			else{


			    echo"
					<script>
					alert ('Registration Failed- Username Already In Use !!!');
					window.location.href='registration.php';
					</script>
					";



			    return false;





			}


			}


	/*** for login process ***/
		public function check_login($emailusername, $password){
        $password = md5($password);

		$query = "SELECT uid from 	front_users	 WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";



		$result = $this->db->query($query) or die($this->db->error);


		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;

		if ($count_row == 1) {



		    $query2 = "SELECT*from	front_users	 WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";

		    $result2 = $this->db->query($query2) or die ($this->db->error);
		    $check_data = $result2->fetch_array(MYSQLI_ASSOC);
		      if($check_data['admin'] == '0'){

	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['uid'] = $user_data['uid'];
	            $_SESSION['uname'] = $user_data['uname'];    //this user name will use everywhere

	              echo"
			   <script>
			   alert ('You are Successfully Logged In');
			   window.location.href='http://web.bfacommunity.com/creators/home.php';
			  </script>


			   ";

	            return true;
	        }else {


	             $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['uid'] = $user_data['uid'];
	            $_SESSION['uname'] = $user_data['uname'];    //this user name will use everywhere

	              echo"
			   <script>
			   alert ('You are Successfully Logged In');
			   window.location.href='home.php';
			  </script>


			   ";

	            return true;



	        }
		}
		else{
		    return false;


		}


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
						 <a href="search.php"><button class="search" type="submit"><i class="fas fa-search"></i></button></a>
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
