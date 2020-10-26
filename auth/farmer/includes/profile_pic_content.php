<?php
  if (isset($_POST['btn'])) {
      $return = $obj->add_profile_pic($_POST);
  }
 ?>

<div class="user " >
     <ul class="nav ">
       <p>Projects</p>

       <li class="nav-item">
         <a class="nav-link  active" href="profile_pic.php">Add profile pic </a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="setting.php">||Update Profile</a>
       </li>
     </ul>
     <?php if (isset($return)) { ?>
                   <h2 style="text-algin:centar">
                       <?php
                       if (is_array($return)) {
                           foreach ($return as $value) {
                               echo $value;
                           }
                       } else {
                           echo $return;
                       }
                       ?>
                   </h2>
               <?php } ?>

     <div class="cont ">
       <div class="alladmin">
           <p class="green2">ADD Profile pic</p>
           <div class="row justify-content-center">
             <div class="col-lg-6 ">
                 <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >

                   <div class="mt-4" style=" height: 45px;">
          <p ><b>Upload Profile Image</b>(400*400)</P>
                   <input  name="profile_image" type="file"  accept="image/*" required></input>
                   </div>
                   <br>
                   <div class="mt-4">
                      <input type="hidden" name="admin_id" value="<?php echo $_SESSION['uid'];?>">
                    </div>


                   <br>
                   <div class="mt-4 text-center">
                     <button class="bttn" name="btn" value="submit">publish</button>

                   </div>
                 </form>
             </div>
           </div>
       </div>
     </div>


 </div>
</div>
