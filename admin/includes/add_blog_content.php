 <?php
if (isset($_POST['btn'])) {
    $return = $obj->add_blog($_POST);
      }

  ?>

 <div class="user " >
      <ul class="nav ">
        <p>Blog</p>
        <li class="nav-item">
          <!-- <a class="nav-link active" href="./">Update Profile  </a> -->
        </li>

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

      <div class="cont ">
        <div class="alladmin">
            <p class="green2">Add Agri Tips</p>
            <div class="row justify-content-center">
              <div class="col-lg-6 ">
                  <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >
                    <div class="mt-4">
                       <input class="input" type="text" name="title" placeholder="Title">
                     </div>
                     <div class="mt-4">
                       <textarea rows="4" name="description" cols="50"></textarea>
                     </div>

                    <div class="mt-4 text-center">
                      <button class="bttn" name="btn" value="submit">publish</button>

                    </div>
                  </form>
              </div>
            </div>
        </div>
      </div>


  </div>
</div>
