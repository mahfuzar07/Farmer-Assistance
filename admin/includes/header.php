<?
$parent_categories = $obj->get_categories();
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
              <a class="icon" href="#"><i class="fas fa-envelope"></i><span class="badge badge-light align-top"></span><span class="sr-only"></span></a>
          </li>

          <li class="nav-item" style="border-right: 1px solid grey;">
              <a class="icon" href="#"><i class="far fa-file-excel"></i><span class="badge badge-light align-top"></span></a>
          </li>

          <li class="nav-item" style="border-right: 1px solid grey;">
              <a class="icon" href="#"><i class="fas fa-user"></i><span class="badge badge-light align-top"></span></a>
          </li>
           <div class="dropdown">
                <a href="#" id="open-close-toggle" >
                  <img src="../admin/assets/img/download.jpg" width="45px;" height="45px;" style="border: 3px solid #8BC53F; border-radius: 3px; object-fit: cover;">
                </a>
                <div class="dropdown-menu dropdown-menu2 text-right" id="toggle-section">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Dashboard</a>
                  <a class="dropdown-item" href="./login.php">Log Out</a>
                </div>
            </div>
        </ul>
    </div>
  </div>
