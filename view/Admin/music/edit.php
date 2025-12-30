<?php
require_once "../../../functions/helpers.php";
require_once "../../../functions/pdo.php";

$id = $_GET['id'];

$musics = $conn->query("SELECT * FROM `music` WHERE id= '$id'")->fetch();
// var_dump($musics);
// exit;
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Add Artist</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: #fff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2b6cb0;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="card">
        <?php ?>
        <h2>بروزرسانی</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="error">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="<?= url("controller/music/update.php") ?>" method="post" enctype="multipart/form-data">

            <label>نام موسیقی</label>
            <input type="text" name="name" value="<?= $musics['name'] ?>" required>

            <label>توضیحات</label>
            <textarea name="description" required><?= $musics['description'] ?></textarea>

            <label>متن موسیقی </label>
            <textarea name="lyrics" required><?= $musics['lyrics'] ?></textarea>

            <label>فایل موسیقی </label>
            <input type="file" name="file" accept="audio/*">

            <label>تصویر کاور</label>
            <input type="file" name="cover" accept="img/*">

            <button type="submit">ذخیره</button>

            <!-- <audio src="" controls></audio> -->
        </form>
    </div>
</body>

</html>

<?php
// var_dump($id);
// var_dump($musics);
?>