<?php
require_once "../layouts/header.php";
$artists = $conn->query("SELECT * FROM `artists`")->fetchAll();
?>

<div class="container">
    <h2>Artists</h2>
    <a href="../../../controller/artists/insertartists.php" class="btn btn-primary mb-3">Add Artist</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist) { ?>
                <tr>
                    <td><?= $artist['id'] ?></td>
                    <td>
                        <?php if (!empty($artist['img'])) { ?>
                            <img src="../../../public/artists/<?= $artist['img'] ?>" width="40" height="40" class="rounded">
                        <?php }
                        ?>
                    </td>
                    <td><?= $artist['name'] ?></td>
                    <td><?= $artist['description'] ?></td>

                    <td>
                    <a href="<?= url_get('view/Admin/artists/update.php', $artist['id']) ?>" class="text-warning">Edit</a>


                        <a href="../../../controller/artists/deleteartists.php?id=<?= $artist['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</a>
                    </td>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>