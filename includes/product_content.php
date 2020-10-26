<?php
// $data = $obj->get_admin_info($_GET['id']);

if (isset($_GET['id'])) {
if (is_numeric($_GET['id'])) {
$result = $obj->get_product_by_id($_GET['id']);
$download = $obj->set_download($result['uid']); //this is for download counting purpose

$data=$obj->get_product_category_id($result['parent_category']);
//echo $download;
}else{
header("Locaion: ./");
}
}else{
header("Locaion: ./");
}



 if (isset($_POST['btn'])){

   $count = $obj->set_download_count($result['uid']);
   echo $count;

     }else {
           // echo 'problem';
     }




?>

<div class="banner-top" style="margin-top:20px;">
  <div class="container">
    <h3 >পণ্য সম্পর্কিত </h3>
    <h4><a href="index.html">হোম </a><label>/</label></h4>
    <div class="clearfix"> </div>
  </div>
</div>
    <div class="single">
      <div class="container">
            <div class="single-top-main">
        <div class="col-md-5 single-top">
        <div class="single-w3agile">

<div id="picture-frame">
      <img src="./auth/farmer/assets/upload/<?php echo $result['product_image']; ?>" data-src=""  alt="" class="img-responsive"/>
    </div>
    <script src="js/jquery.zoomtoo.js"></script>
  								<script>
  			$(function() {
  				$("#picture-frame").zoomToo({
  					magnify: 1
  				});
  			});
  		</script>


      </div>
      </div>
      <div class="col-md-7 single-top-left ">
                <div class="single-right">
        <h3>  <span class="glyphicon glyphicon-info-sign"></span> <?php echo $result['product_title'];?> </h3>


         <div class="pr-single">
          <p class="reduced "><del> <span class="glyphicon glyphicon-gift"></span> </del>মূল্য::<?php echo $result['product_price']; ?></p>
           <p class="reduced "><del><span class="glyphicon glyphicon-certificate"></del>পরিমাণ:  <?php echo $result['product_quantity']; ?> কেজি </p>
        </div>
        <div class="block block-w3">
          <div class="starbox small ghosting"> </div>
        </div>
        <p class="in-pa">  </p>

        <ul class="social-top">
          <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
        </ul>
          <div class="add add-3">
                      <a  href="profile.php?uid=<?php echo $result['uid']; ?>"> <button    class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">পণ্যের জন্য যোগাযোগ করুন </button></a>
                    </div>



      <div class="clearfix"> </div>
      </div>


      </div>
       <div class="clearfix"> </div>
     </div>


  </div>
</div>
    <!---->
