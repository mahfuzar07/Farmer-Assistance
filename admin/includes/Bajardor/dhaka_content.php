 <?php
if (isset($_POST['btn'])) {
    $return = $obj->add_dhaka($_POST);
      }

  ?>

 <div class="user " >
      <ul class="nav ">
        <p>Dhaka</p>
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

      <div class="cont " style="height:1000px;">
        <div class="alladmin">
            <p class="green2">Add Market Price</p>
            <div class="row justify-content-center">
              <div class="col-lg-6 ">
                  <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >
                    <div class="mt-4">
                       <input class="input" type="text" name="alu" placeholder="ALU">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="begun" placeholder="Chal">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="tomato" placeholder="Tomato">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="chal" placeholder="beef">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="gom" placeholder="matton">
                    <div class="mt-4">
                      <div class="mt-4">
                         <input class="input" type="text" name="dim" placeholder="matton">
                      <div class="mt-4">
                       <input class="input" type="text" name="beff" placeholder="gom">
                    <div class="mt-4">
                       <input class="input" type="text" name="matton" placeholder="ada">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="tel" placeholder="rousn">
                     </div>
                    <div class="mt-4">
                       <input class="input" type="text" name="ada" placeholder="tel">
                     </div>
                     <div class="mt-4">
                        <input class="input" type="text" name="rosun" placeholder="tel">
                      </div>
                      <div class="mt-4">
                         <input class="input" type="text" name="tometo" placeholder="tel">
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
