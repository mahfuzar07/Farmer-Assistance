
<?php

if (isset($_GET['id'])) {
  if (is_numeric($_GET['id'])) {
  $result= $obj->get_question_by_id($_GET['id']);
  }
}

?>



 <div class="user " >
      <ul class="nav ">
        <p>Blog</p>
        <li class="nav-item">
          <!-- <a class="nav-link active" href="./">Update Profile  </a> -->
        </li>

      </ul>
      

      <div class="cont ">
        <div class="alladmin">
            <p class="green2">Add Agri Tips</p>
            <div class="row justify-content-center">
              <div class="col-lg-6 ">
                  <form class="loginfrom mx-auto" action="" method="post" enctype="multipart/form-data" >
                    <div class="mt-4">
                      
                       <input class="input" type="text" name="question_id" value="<?php echo $result['id']; ?>"  placeholder="Title">
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
