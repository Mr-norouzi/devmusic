<?php
session_start();

require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("view/admin/music/create.php");
    exit;
}

$name = $_POST['name'] ?? null;
$description = $_POST['description'] ?? null;
$coverName = null;

/* اعتبارسنجی */
if (!$name || !$description) {
    $_SESSION['error'] = "❌ لطفا تمام فیلدهای اجباری را پر کنید";
    redirect("view/admin/music/create.php");
    exit;
}

/* آپلود تصویر */
if (!empty($_FILES['cover']['tmp_name'])) {

    $coverName = "music_" . $_FILES['cover']['name'];
    $uploadPath = __DIR__ . "/../../public/music/" . $coverName;

    move_uploaded_file($_FILES['cover']['tmp_name'], $uploadPath);
}

/* ذخیره در دیتابیس */
$query = "INSERT INTO `music` (name, description, cover) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $description, $coverName]);

redirect("view/admin/music/index.php");
exit;
