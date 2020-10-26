<?php

if (isset($_REQUEST['uid'])) {
	$result = $obj->get_user_product($_REQUEST['uid']);


	$userinfo = $result['user_info'];
}
?>

<div class="main">
  <div class="container-fluid">
     <div class="row justify-content-end " style="background: #fff;" >
        <ul class="nav searchnav">
          <div class="buttonInside text-right ">
            <input class="inp" placeholder="">
            <button class="search" type="submit"><i class="fas fa-search"></i></button>
          </div>

          <li class="nav-item" style="border-right: 1px solid grey;">
              <a class="icon" href="#"><i class="fas fa-envelope"></i><span class="badge badge-light align-top"></span><span class="sr-only">unread messages</span></a>
          </li>

          <li class="nav-item" style="border-right: 1px solid grey;">
              <a class="icon" href="#"><i class="far fa-file-excel"></i><span class="badge badge-light align-top"></span></a>
          </li>

          <li class="nav-item" style="border-right: 1px solid grey;">
              <a class="icon" href="#"><i class="fas fa-user"></i><span class="badge badge-light align-top"></span></a>
          </li>
           <div class="dropdown">
                <a href="#" id="open-close-toggle" >
                  <img src="../consaltent/assets/img/download.jpg" width="45px;" height="45px;" style="border: 3px solid #8BC53F; border-radius: 3px; object-fit: cover;">
                </a>
                <div class="dropdown-menu dropdown-menu2 text-right" id="toggle-section">
                  <a class="dropdown-item" href="#"></a>
                  <a class="dropdown-item" href="#">Dashboard</a>
                  <a class="dropdown-item" href="./">Log Out</a>
                </div>
            </div>
        </ul>
    </div>
  </div>
