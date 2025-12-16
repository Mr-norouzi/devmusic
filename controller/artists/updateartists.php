<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'];
// if ($id!=" ") {
//     redirect("view/admin/artists/index.php");
// }

$artist = $conn->prepare("SELECT * FROM artists WHERE id = ?");
$artist->execute([$id]);
$artist = $artist->fetch();
if (!$artist) redirect("view/admin/artists/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // تصویر قبلی
    $img = $artist['img'];

    // اگر تصویر جدید انتخاب شد
    if (!empty($_FILES['img']['name'])) {
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../../public/artists/" . $img);
    }

    $stmt = $conn->prepare("UPDATE artists SET name=?, description=?, img=? WHERE id=?");
    $stmt->execute([$name, $description, $img, $id]);

    redirect("view/admin/artists/index.php");
}
