

<?php

if (isset($_REQUEST['uid'])) {
	$result = $obj->get_user_product($_REQUEST['uid']);

	$product_info = $result['product_info'];
	$userinfo = $result['user_info'];
}
?>




<div class="banner-top" style="margin-top:20px;">
  <div class="container">
    <h3 > যোগাযোগ করুন  পণ্যের মালিকের সাথে </h3>
    <div class="clearfix"> </div>
  </div>
</div>


<!-- <div class="product"style="background-color:#77FF33;"> -->
		<div class="container" style="margin-left:300px" >
         <div class=" con-w3l agileinf">
							<div class="col-md-3 pro-1">
								<div class="col-m" style="border-radius: 50px 5px;width:500px;border: 60px solid #006400;" >
								<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
										<img  style="height:300px;width:270px; border-radius: 40%;border:5px solid #006400;" src="./auth//farmer/assets/upload/<?php echo $userinfo['profile_pic']; ?>" class="img-responsive" alt="">
									</a>

									<div class="mid-1" style="margin-left:50px;">
										<div class="women">
                 <h6><span class="glyphicon glyphicon-user	"></span> নাম :<a href="#"><?php echo $userinfo['fullname']; ?> </h6>
								 	</div>
										<div class="mid-2">
											<h6> <i class="fa fa-phone" aria-hidden="true"></i> ফোন : <a href="#"><?php echo $userinfo['phone_number']; ?> </h6>
											</br>
												<h6><span class="glyphicon glyphicon-map-marker"></span> শহর  : <a href="#"><?php echo $userinfo['city']; ?> </h6>

											<div class="clearfix"></div>
										</div>

 								</div>
 								<div class="clearfix"> </div>
 							</div>
 						</div>
 					</div>
 				</div>
