<?php
require_once "../../../functions/helpers.php";
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>add music</title>
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
        <h2>add music</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="error">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="<?= url("controller/music/addmusic.php") ?>" method="post" enctype="multipart/form-data">

            <label>نام موسیقی</label>
            <input type="text" name="name" required>

            <label>توضیحات </label>
            <input type="text" name="description" required>

             <label>متن موسیقی </label>
            <input type="text" name="lirycs" required>

            <label>تصویر کاور</label>
            <input type="file" name="cover" accept="image/*">

            <label>فایل موسیقی</label>
            <input type="file" name="music file" accept="audio/*">

            <button type="submit">ذخیره</button>
        </form>
    </div>
</body>

</html>