<?php
include "./class/admin_function.class.php";
$obj = new Admin;

if (isset($_REQUEST)) {
  if ($_REQUEST['parent_id']) {
    $data = $obj->get_categories_by_parent($_REQUEST['parent_id']);
    $json = json_encode(mysqli_fetch_all($data,MYSQLI_ASSOC),false);
    echo $json;
  }
}
?>
