<?php
if (isset($_GET['search']))
{
  $result = $obj->search($_GET['search']);

  //if (count($result) == 0) {
  //  $error = 'Sorry no result found';
//  }
}

?>


<section class="Yellow">
    <div class=" container">
      <p>Search Result : <?php echo $_GET['search']; ?></p>
    </div>
  </section>
    <section class="mt-4 container">
        <div class="row homeproduct">
            <div class="col-lg-12 ">
                <h4 class="text-center"> <h4>
            </div>
        </div>
    </section>


<section class="mt-4 mb-5 container">
        <div class="items index">
            <div class="">
           <div class="row mt-4">

                      <?php
    while ($product_info = mysqli_fetch_assoc($result)){
    ?>

                    <div class=" card">

                        <a class="a" href="#">F</a>
                      <img src="./users/assets/upload/<?php echo $product_info['product_image'];?>"  class="image" /></img>

                        <a href="product.php?id=<?php echo $product_info['product_id'];?>"><div class="layer">
                            <p class="free">Free</p>
                            <p class="p"> <?php echo $product_info['product_title'];?> </p>
                       </div></a>
                    </div>
                      <?php }?>
                </div>

            </div></div></section>
