 <?php
if (isset($_POST['btn'])) {
    $return = $obj->add_product($_POST);
      }
  $parent_catgories=$obj->get_parentcategories();

  ?>

 <div class="user " >
      <ul class="nav ">
        <p> এখান  থেকে পণ্য যোগ করুন </p>


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
            <p class="green2">নতুন পণ্য যোগ করুন </p>
            <div class="row justify-content-center">
              <div class="col-lg-6 ">
                  <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >
                    <div class="mt-4">
                       <input class="input" type="text" name="title" placeholder="নাম ">
                     </div>
                    <div class="form-group mt-4">
                        <select class="form-control" id="parent_category" name="parent_category">
                           <option class="option" > ক্যাটাগরি </option>
                          <?php while($parent_category = mysqli_fetch_assoc($parent_catgories)){?>
                            <option value="<?php echo $parent_category['id'];?>"><?php echo $parent_category['parent_category_name'];?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group mt-4">
                      <select class="form-control" id="sub_category" name="sub_category">
                        <option>Choose Sub Category</option>

                      </select>
                    </div> -->
                    <div class="mt-4">
                      <input class="input" type="text" name="price" placeholder="দাম ">
                    </div>
                         <div class="mt-4">
                      <input class="input" type="text" name="quantity" placeholder="পরিমান ">
                    </div>
                    <div class="mt-4" style=" height: 45px;">
           <p ><b>  পণ্যের  ছবি দিন </b>(400*400)</P>
                    <input  name="product_image" type="file"  accept="image/*" required></input>
                    </div>
                    <br>

                    <div class="mt-4">
                       <input type="hidden" name="admin_id" value="<?php echo $_SESSION['uid'];?>">
                     </div>
                     <div class="mt-4">
                        <input type="hidden" name="status" value="0">
                      </div>



                    <br>
                    <div class="mt-4 text-center">
                      <button class="bttn" name="btn" value="submit"> পণ্য যোগ সম্পন্ন করুন </button>

                    </div>
                  </form>
              </div>
            </div>
        </div>
      </div>


  </div>
</div>
<script>
$('#parent_category').change(function() {
    var parent_id = $(this).val();
    var sub_category = $('#sub_category');
    sub_category.html('<option disabled>Choose Sub Category</otion>');
    $.get('./ajax.php?parent_id='+parent_id)
        .done(function(response){
          var data = JSON.parse(response);
           $.each(data, function(i,e){
             sub_category.append(`
                <option>${e.category_name}</option>
               `);
           });
        }).fail(function(response){
          console.log(response);
        });
});
</script>
