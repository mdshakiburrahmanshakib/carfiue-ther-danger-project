<?php

include '../extend/header.php';
// Header 

$service_query = "SELECT * FROM services";
$services = mysqli_query($db,$service_query);
$service = mysqli_fetch_assoc($connect);

?>
                                                                <!-- All Alert Messeages -->
                                                                
<!-- Service Status Active Success MSG -->
<?php if(isset($_SESSION['status_active_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['status_active_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['status_active_suc']) ?>
<!-- Service Status Active Success MSG End -->


<!-- Service Status deactive Success MSG -->
<?php if(isset($_SESSION['status_deactive_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['status_deactive_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['status_deactive_suc']) ?>
<!-- Service Status deactive Success MSG End -->




<!-- Services Edit Success MSG -->
<?php if(isset($_SESSION['service_edit_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_edit_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_edit_suc']) ?>
<!-- Services Edit Success MSG  END -->



<!-- Services Delete Success MSG -->
<?php if(isset($_SESSION['service_delete_sec'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_delete_sec'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_delete_sec']) ?>
<!-- Services Delete Success MSG END -->
                                                                <!-- All Alert Messeages End -->


<!-- Service Pages body Start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Services List</h4>
                <a href="ser_create.php" class="btn btn-primary"><i class="material-icons">add</i>Create a new service</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num = 1;
                foreach($services as $service): 
                ?>
                <tr>
                    <th scope="row">
                        <?= $num++ ?>
                    </th>
                    <td>
                        <i class="fa-2x <?= $service['icon'] ?>"></i>
                    </td>
                    <td>
                        <?= $service['title'] ?>
                    </td>
                    <td>
                        <?= $service['description'] ?>
                    </td>
                    <td>    <!-- Status -->
                        <a href="service_manage.php?status_id=<?= $service['id'] ?>" class="<?= ($service['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $service['status'] ?></a>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="ser_edit.php?edit_id=<?= $service['id'] ?>" class="text-primary fa-2x">  <!-- Edit -->
                                <i class="fa fa-chain"></i>
                            </a>
                            <a href="service_manage.php?delete_id=<?= $service['id'] ?>" class="text-danger fa-2x">  <!-- Delete -->
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Pages body Start -->

<!-- Footer -->
<?php

include '../extend/footer.php';

?>