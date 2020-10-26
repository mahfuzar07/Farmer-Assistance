
<?php if (isset($_POST['btn'])) {
    $return = $obj->add_parentcategory($_POST);

}
?>


 <div class="user " >
      <ul class="nav container">
        <p>ক্যাটেগরি যোগ করুন </p>

      </ul>

       <?php if (isset($return)) { ?>
                    <h2 style="text-align:center;">
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

      <div class="cont container">
        <div class="alladmin">
            <p class="green2"> নতুন  ক্যাটেগরি যোগ করুন </p>
            <div class="row justify-content-center">
              <div class="col-lg-6 ">
                  <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >
                    <div class="mt-4">
                       <input class="input" type="text" name="name" placeholder="ক্যাটেগরি নাম">
                     </div>

                <!--     <div class="form-group form-check mt-3">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Show in Homepage
                      </label>
                    </div> -->
                    <div class="mt-4 text-center">
                      <button class="bttn" name="btn" value="submit" > যোগ করুন</button>
                    </div>
                  </form>
              </div>
            </div>
        </div>
      </div>


  </div>
</div>
