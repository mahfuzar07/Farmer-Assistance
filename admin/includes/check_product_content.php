
<?php
$result = $obj-> get_all_product();

if (isset($_GET['action']) && isset($_GET['product_id'])) {
    if ($_GET['action'] == "delete") {
        if (!empty($_GET['product_id']) && is_numeric($_GET['product_id'])) {
            $obj->delete_product($_GET['product_id']);
        } else {
            header("Location: ./");
        }
    }
}
// if(isset($_GET['msg']))
// {
//     $return = $_GET['msg'];
// }
?>
<?php
  if (isset($_POST['btn'])) {
      $data=$obj->published_product($_POST);
      header("location:check-product.php");

  }
 ?>

 <div class="user " >
       <ul class="nav ">
        <p>Product</p>


      </ul>
       <?php if (isset($return)) { ?>
                    <h2 style="text-align:center">
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
                
<form action="" method="post">
      <div class="cont">
        <div class="alladmin admin3 ">
            <p class="blue">PENDING Product</p>
<?php while($product_info=mysqli_fetch_assoc($result))



 {

 ?>

            <div class="row bor">
              <div class="col-lg-6">
                <div class="media">
                                  <img src="../auth/farmer/assets/upload/<?php echo $product_info['product_image'];?>" class="align-self-start" name="product_image"  /></img>
                  <div class="media-body">
                    <h4 name"creator_id" >CREATOR <?php echo $_SESSION['uid'];?> </h4>
                    <p  name="product_title">TITLE:<?php echo $product_info['product_title']; ?> </p>
                    <p name='parent_category'>CATEGORY: <?php echo $product_info['parent_category']; ?></p>
                    <p>TYPE: FREE</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 text-center">
                <div class="mt3">
                  <a href="?action=delete&product_id=<?php echo $product_info['product_id']; ?>" class="Reject">Reject</a>


                  <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>">
                    <button class="Approved" name="btn" value="submit" >Approved

                </div>
              </div>

            </div>
                  </from>
<?php } ?>

            <div class="text-right" style="padding: 20px 0;">
              <a href="#" class="previous"><i class="fas fa-angle-left "></i> Previous</a>
              <a href="#" class="next">Next <i class="fas fa-angle-right"></i></a>
            </div>
          </div>
        </div>
  </div>


</div>
