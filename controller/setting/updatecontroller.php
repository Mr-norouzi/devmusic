<?php
require_once "../../functions/helpers.php";
require_once "../../functions/pdo.php";

$id=1;
$description=$_POST['description'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];

if(isset($description) && isset($email) && isset($phonenumber) && empty ($description) && empty($email) && empty($phonenumber))
{
    $query = "UPDATE settings SET  `description`=?,`email`=?,`phonenumber`=? WHERE id='$id' ";
    $stm = $conn->prepare($query);
    $stm->execute([$description, $email, $phonenumber]);
    redirect("view/admin/setting/index.php");
}
else
{
     redirect("view/admin/setting/index.php");
}

?>