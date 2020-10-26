
<?php

$result = $obj->get_user_product($_REQUEST['uid']);

?>

 <div class="user " >
       <ul class="nav ">
        <p>Product</p>


      </ul>
<form action="" method="post">
      <div class="cont">
        <div class="alladmin admin3 ">
            <p class="blue">PENDING Product</p>

            <?php
            while ($value = mysqli_fetch_assoc($result)){
            ?>


            <div class="row bor">
              <div class="col-lg-6">
                <div class="media">
                                  <img src="../auth/farmer/assets/upload/<?php echo  $value['product_image'];?>" class="align-self-start" name="product_image"  /></img>
                  <div class="media-body">
                    <h4 name"creator_id" >CREATOR <?php echo $_SESSION['uid'];?> </h4>
                    <p  name="product_title">TITLE:<?php echo  $value['product_title']; ?> </p>
                    <p name='parent_category'>CATEGORY: <?php echo  $value['parent_category']; ?></p>
                    <p>TYPE: FREE</p>
                  </div>
                </div>
              </div>
              <?php }?>

              <div class="col-lg-6 text-center">
                <div class="mt3">


                    <button class="Approved" name="btn" value="submit" >Approved

                </div>
              </div>

            </div>
                  </from>


            <div class="text-right" style="padding: 20px 0;">
              <a href="#" class="previous"><i class="fas fa-angle-left "></i> Previous</a>
              <a href="#" class="next">Next <i class="fas fa-angle-right"></i></a>
            </div>
          </div>
        </div>
  </div>


</div>
