<?php
require_once "../../functions/helpers.php";
require_once "../../functions/pdo.php";
$id = $_GET['id'] ?? '';
if (checkmethod()) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    // $coverName = $_POST['coverName'];
    $location = __DIR__ . "/../../public/music/";
    if (isset($_FILES['cover']['name'])) {
        $cover = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], "$location" . $_FILES['cover']['name']);
        $query = "UPDATE `music` SET  `name`=?,`description`=?,`cover`=? WHERE `id`='$id' ";
        $stm = $conn->prepare($query);
        $stm->execute([$name, $cover, $description]);
        redirect("view/admin/music/index.php");
    } else {
        $query = "UPDATE `music` SET  `name`=?,`description`=?,cover=? WHERE `id`='$id' ";
        $stm = $conn->prepare($query);
        $stm->execute([$name, $description, $coverName]);
        redirect("view/books/index.php");
    }
} else {
    redirect("view/books/index.php");
}
