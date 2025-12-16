<?php
include_once "../layouts/header.php";
?>
<!-- sidebar -->
<?php
include_once "../layouts/sidebar.php";

$settings=$conn->query("SELECT * FROM `settings`")->fetch();
?>
<!-- end sidebar -->

<!-- content -->
<div class="col-12 col-md-9 col-lg-10 p-4" id="content">
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white">
            تنظمیات سایت
        </div>
        <div class="card-body">
            <form method="post" action="http://localhost/devmusic/controller/setting/updatecontroller.php" class="row g-3" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label class="form-label">توضیحات </label>
                            <input type="text" value="<?=  $settings['description'] ?>" name="description" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">email</label>
                            <input type="text" value="<?=  $settings['email'] ?>" name="email" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">phonenumber</label>
                            <input type="text" value="<?=  $settings['phonenumber'] ?>" name="phonenumber" class="form-control" required="">
                        </div>
                       
                        <div class="col-md-6">
                            <label class="form-label">logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" selected="">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" id="saveAddBook" value="update">
                        </div>

                    </form>
        </div>
    </div>
</div>
<!-- end content -->


<?php

include_once "../layouts/footer.php";