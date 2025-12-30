<?php
session_start();


require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("view/admin/music/index.php");
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$file = $_FILES['file']['name'];
$cover = $_FILES['cover']['name'];


/* اعتبارسنجی */
if (!$name || !$description) {
    $_SESSION['error'] = "❌ لطفا تمام فیلدهای اجباری را پر کنید";
    redirect("view/admin/music/index2.php");
    exit;
}


// echo "<pre>";
// var_dump($_FILES);
// exit;


// if (!empty($_FILES['cover']['tmp_name'])) {
    $coverName = "music_" . $cover;
    $uploadPath = __DIR__ . "/../../public/music/cover/" . $coverName;
    move_uploaded_file($_FILES['cover']['tmp_name'], $uploadPath);
// }

$fileName = "music_" . $file;
$uploadPath = __DIR__ . "/../../public/music/" . $fileName;
move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath);


$query = "INSERT INTO `music` (`name`, `description`, `file`, `cover`) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $description, $file, $cover]);


redirect("view/admin/music/index.php");
exit;
