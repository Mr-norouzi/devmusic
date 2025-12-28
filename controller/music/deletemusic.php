<?php 
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";
$id=$_GET['id'];

if ($id!='' && isset($id) && $id>0) {
    $query="DELETE FROM `music` WHERE id='$id' ";
    $stm=$conn->prepare($query);
    $stm->execute();
    redirect("view/admin/music/index.php");
}else{
    redirect("view/admin/music/index.php");
}
?>