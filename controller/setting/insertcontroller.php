<?php
require_once "../../view/Admin/layouts/header.php";

$logo= $_FILES['logo']['name'];
$location = __DIR__ . "/../../public/setting/";
move_uploaded_file($_FILES['logo']['tmp_name'] , "$location".$_FILES['logo']['name']);
    $query="INSERT INTO `settings` (`logo`) VALUES (? )";
    $stm=$conn->prepare($query);
    $stm->execute([$logo]);
     redirect("view/admin/setting/index.php");

?>