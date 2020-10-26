<?php
$result = $obj->get_all_users();
if (isset($_GET['action']) && isset($_GET['uid'])) {
    if ($_GET['action'] == "delete") {
        if (!empty($_GET['uid']) && is_numeric($_GET['uid'])) {
            $obj->delete_farmer($_GET['uid']);
        } else {
            header("Location: ./");
        }
    }
}
// if(isset($_GET['msg']))
// {
//     $return = $_GET['msg'];
// }
?>


 <div class="user adminuser" >
      <ul class="nav">
        <p>Farmer  List</p>
      
      </ul>

      <div class="cont">
        <div class="alladmin admin2">
            <p class="blue">ALL CREATORS</p>
            <?php while($farmer=mysqli_fetch_assoc($result))
            {

        ?>

            <div class="row bor">

             <div class="col-lg-10">

                <div class="media">
                  <img src="../auth/farmer/assets/upload/<?php echo $farmer['profile_pic'];?>" class="align-self-start">
                  <div class="media-body">
                    <h4> Name:<?php echo $farmer['uname']; ?></h4>
                    <p>Phone:<?php echo $farmer['phone_number']; ?></p>
                    <p>City:<?php echo $farmer['city']; ?></p>
                    <p></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 text-center">
                <div class="mt">
                  <a href="?action=delete&uid=<?php echo $farmer['uid']; ?>" class="Remove">Remove</a>
                </div>
                </div>
            </div>
            <?php } ?>

  </div>


</div>
