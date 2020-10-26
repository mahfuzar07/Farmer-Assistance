

<?php

$result=$obj->get_all_blog();
 ?>
<!--banner-->
<div class="banner-top" style="margin-top:20px;">
<div class="container">
 <h3 >এগ্রি টিপস ও ব্লগ </h3>
 <h4><a href="index.html">Home</a><label>/</label>এগ্রি টিপস</h4>
 <div class="clearfix"> </div>
</div>
</div>
<div class="terms">
				<div class="container">

					<div class="spec ">
					<h3> এগ্রি টিপস ও ব্লগ </h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
					<div class="ter-wthree">
            <?php
            while ($data = mysqli_fetch_assoc($result)){
            ?>

</br>
						<h6 style="text-align:center;padding:10px;"><span class="glyphicon glyphicon-th
"></span> <?php echo $data['title'];?></h6>
          </br>
						 <h8> <?php echo $data['description'];?><h8>
                <?php }?>
					</div>
        </div>
      </div>
