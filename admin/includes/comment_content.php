<?php
$data = $obj->get_comment();

?>


 <div class="user adminuser" >
      <ul class="nav">
        <p></p>

      </ul>

      <div class="cont">
        <div class="alladmin admin2">
            <p class="blue">User Comment List</p>
            <?php while($comment=mysqli_fetch_assoc($data))
            {

        ?>

            <div class="row bor">

             <div class="col-lg-10">

                <div class="media">
                  <div class="media-body">
                    <h3> Name: <?php echo $comment['name']; ?></h3>
                    <h4>Email: <?php echo $comment['email']; ?></h4>
                    <h4>Message: <?php echo $comment['message']; ?></h4>

                  </div>
                </div>
              </div>
              <div class="col-lg-2 text-center">
                <div class="mt">
                </div>
                </div>
            </div>
            <?php } ?>

  </div>


</div>
