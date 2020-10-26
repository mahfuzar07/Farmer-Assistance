<?php
if (isset($_GET['search']))
{
  $result = $obj->search($_GET['search']);

 //  if (count($result) == 0) {
 //    $error = 'Sorry no result found';
 // }
}

?>


<div class="banner-top" style="margin-top: 10px;">
  <div class="container">
    <h3 style="text-align: center;" > সার্চ ফলাফল : <?php echo $_GET['search']; ?></h3>
    <h4><a href="./"></a><label>/</label> </h4>
    <div class="clearfix"> </div>
  </div>
</div>


    <div class=" tab-content tab-content-t " style="padding-top:20px;">
          <div class="tab-pane active text-style" id="tab1">
            <div class=" con-w3l">

  <?php
    while ($product_info = mysqli_fetch_assoc($result)){
    ?>
              <div class="col-md-3 m-wthree" style="margin-top: 10px;">

                       <div class="col-m">


                  <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">

                    <img src="./auth/farmer/assets/upload/<?php echo $product_info['product_image'];?>"  class="img-responsive" alt="">
                  </a>
                  <div class="mid-1">
                    <div class="women">
                      <h6><a href="#"><?php echo $product_info['product_title'];?> </a><?php echo $product_info['product_quantity']; ?></h6>
                    </div>
                    <div class="mid-2">
                      <p ><label>৳২.00</label><em class="item_price"><?php echo $product_info['product_price']; ?></em></p>
                        <div class="block">
                        <div class="starbox small ghosting"> </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="add">
                       <a href="product.php?id=<?php echo $product_info['product_id'];?>"> <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png"> পণ্য দেখুন   </button> </a>
                   </div>
                  </div>

                </div>

              </div>
            <?php }?>
<div class="clearfix"></div>
             </div>
          </div>
        </div>
      </div>

  </div>
  </div>
  </div>

   <div class="clearfix"></div>
