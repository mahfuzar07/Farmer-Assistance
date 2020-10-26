<?php
$result = $obj-> get_all_question();
?>

<?php

if (isset($_POST['btn'])) {
$return = $obj->qestion_answer($_POST);
}
?>

<?php
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

        ?>

<div class="user " >
  <ul class="nav ">
    <p></p>
  </ul>
  <div class="cont">
    <div class="alladmin admin3 ">
      <p class="green">Pending Question</p>
      <div class="row bor">
        <?php while($data=mysqli_fetch_assoc($result))
        {
        ?>
        <div class="col-lg-8">
          <div class="media">

            <div class="media-body">
              <h4>NAME:<?php echo $data['name']; ?></h4>
              <p>EMAIL: <?php echo $data['email']; ?></p>
              <p>QUESTION :<?php echo $data['agri_question']; ?> </p>
              <form class="" method="post">
                <input type="hidden" name="qestion_id" value="<?php echo $data['id'];?>">
                <div class="mt-4">
                  <textarea rows="4" name="answer" cols="50"></textarea>
                </div>
                <div class="mt-4 text-center">
                  <button class="btn-primary" name="btn" value="submit">publish</button>
                </form>


              </div>
            </div>

          </div>

      </div>

              <?php } ?>
              

    </div>
    <div class="text-right" style="padding: 20px 0;">
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>

            </div>
  </div>
