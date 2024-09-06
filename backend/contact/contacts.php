<?php

include '../extend/header.php';

include '../../config/database.php';

// Header 

$contact_query = "SELECT * FROM contacts";
$contacts = mysqli_query($db,$contact_query);
$contact = mysqli_fetch_assoc($contacts);


?>
                                                                <!-- All Alert Messeages -->
<!-- New Contacts Add Seccesss MSG -->
<?php if(isset($_SESSION['new_cont_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['new_cont_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['new_cont_success']) ?>
<!-- New Contacts Add Seccesss MSG End -->      
 

<!-- contact Status Active Success MSG -->
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
<!-- contact Status Active Success MSG End -->


<!-- contact Status deactive Success MSG -->
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
<!-- contact Status deactive Success MSG End -->


<!-- contacts Edit Success MSG -->
<?php if(isset($_SESSION['contact_edit_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['contact_edit_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['contact_edit_suc']) ?>
<!-- contacts Edit Success MSG  END -->
                                                                <!-- All Alert Messeages End -->




<!-- contact Pages body Start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Contacts List</h4>
                <a href="create_cont.php" class="btn btn-primary"><i class="material-icons">add</i>Create a new contact</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php  if(empty($contact)): ?>
                    <tr>
                        <td colspan="7" class="text-center text-danger">Empty!!</td>
                    </tr>
                <?php  else: ?>
                <?php 
                    $num = 1;
                    foreach($contacts as $contact): ?>
                    <tr>
                        <th scope="row">
                            <?= $num++ ?>
                        </th>
                        <td>
                        <?= $contact['city'] ?>
                        </td>
                        <td>
                        <?= $contact['address'] ?>
                        </td>
                        <td>
                        <?= $contact['phone'] ?>
                        </td>
                        <td>
                        <?= $contact['email'] ?>
                        </td>
                        <td>
                        <a href="cont_manage.php?status_id=<?= $contact['id'] ?>" class="<?= ($contact['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $contact['status'] ?></a>
                        </td>
                        <td>
                            <div class="d-flex justify-content-around align-items-center"> 
                                <a href="cont_edit.php?edit_id=<?= $contact['id'] ?>" class="text-primary fa-2x">
                                    <i class="fa fa-chain"></i>
                                </a>
                                <a href="cont_manage.php?delete_id=<?= $contact['id'] ?>" class="text-danger fa-2x">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>
<!-- contact Pages body Start -->

<!-- Footer -->
<?php

include '../extend/footer.php';

?>