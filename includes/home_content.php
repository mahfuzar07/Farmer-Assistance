<?php
    if (isset($_REQUEST['pcat'])) {
      $result = $obj->get_parent_category_product($_REQUEST['pcat']);
      $pcat = $_REQUEST['pcat'];
    }else{
      $result = $obj->get_homepage_product();
      $pcat = NULL;
    }
    $parent_categories = $obj->get_categories();
?>
<!---->
<div data-vide-bg="assets/video/images.png">
    <div class="container">
        <div class="banner-info">
            <!-- <img src="assets/images/ab.jpg"> -->
            <div class="search-form">
                <form action="./search.php" method="get" >
                    <input type="text" name="search" placeholder="পণ্য ও তথ্য খুজুন" value="<?php echo isset($_GET['search'])? $_GET['search']: '';?>">
                    <input type="submit" name="submit" value=" " >
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.vide.min.js"></script>
<!--content-->
<div class="content-top ">
    <div class="container">
        <div class="spec ">
            <h3>আমাদের পণ্য</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="tab-head ">
            <nav class="nav-sidebar">
                <ul class="nav tabs ">
                    <?php while ($parent_category = mysqli_fetch_assoc($parent_categories)) { ?>
                    <li class="<?php echo isset($pcat)? ($pcat == $parent_category['id'])? 'active':'' :''; ?>">
                        <a href="category_wise.php?pcat=<?php echo $parent_category['id']; ?>">
                            <?php echo $parent_category['parent_category_name']; ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>

            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style">
                    <div class="con-w3l">
                        <?php
                            while ($product_info = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-md-3 m-wthree single-product-box">
                            <div class="col-m">
                                <a href="product.php?id=<?php echo $product_info['product_id'];?>" class="offer-img">
                                    <img src="./auth/farmer/assets/upload/<?php echo $product_info['product_image'];?>"  class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span></span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6> <span class="glyphicon glyphicon-certificate"></span> পণ্য নাম : <a href="#"><?php echo $product_info['product_title'];?> </a></h6>
                                    </div>
                                    <p>
                                        <span class="glyphicon glyphicon-shopping-cart"></span> পরিমান:  <?php echo $product_info['product_quantity']; ?> কেজ
                                    </p>
                                    <div class="mid-2">
                                        <p>
                                            <i class="glyphicon glyphicon-share-alt"></i></span>  ৳. <?php echo $product_info['product_price']; ?>
                                        </p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                    </div>
                                    <div class="add">
                                        <a href="product.php?id=<?php echo $product_info['product_id'];?>">
                                                <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">পণ্য দেখুন   </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
