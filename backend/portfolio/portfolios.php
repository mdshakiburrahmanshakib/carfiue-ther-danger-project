<?php

include '../extend/header.php';
// Header 

$portfolio_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db,$portfolio_query);
$portfolio = mysqli_fetch_assoc($portfolios);


?>


<!-- New Portfolio Add Seccesss MSG -->
<?php if(isset($_SESSION['port_add_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_add_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_add_success']) ?>
<!-- New Portfolio Add Seccesss MSG End -->



<!-- Portfolios Delete Success MSG -->
<?php if(isset($_SESSION['port_del_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_del_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_del_suc']) ?>
<!-- Portfolios Delete Success MSG End -->



<!-- Portfolios Edit Success MSG -->
<?php if(isset($_SESSION['port_up_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_up_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_up_success']) ?>
<!-- Portfolios Edit Success MSG End -->



<!-- Portfolios Status Active/Deactive MSG -->
<?php if(isset($_SESSION['port_active_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_active_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_active_suc']) ?>
<!-- Portfolios Status Active/Deactive MSG End-->


<!-- Portfolios Status Active/Deactive -->
<?php if(isset($_SESSION['port_deactive_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_deactive_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_deactive_suc']) ?>
<!-- Portfolios Status Active/Deactive End-->





<!-- Portfolios body Start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Portfolio List</h4>
                <a href="create_port.php" class="btn btn-primary"><i class="material-icons">add</i>Create a new Portfolio</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
        <?php  if(empty($portfolio)): ?>
            <tr>
                <td colspan="5" class="text-center text-danger">Empty!!</td>
            </tr>
            <?php  else: ?>
            <?php 
                $num = 1;
                foreach($portfolios as $portfolio): ?>
                <tr>
                    <th scope="row">
                        <?= $num++ ?>
                    </th>
                    <td>
                        <img style="width: 60px; height: 60px; border-radius:50%; " src="../../public/uploads/portfolio/<?= $portfolio['image'] ?>">
                    </td>
                    <td>
                    <?= $portfolio['title'] ?>
                    </td>
                    <td>
                    <a href="port_manage.php?status_id=<?= $portfolio['id'] ?>" class="<?= ($portfolio['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $portfolio['status'] ?></a>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="port_edit.php?edit_id=<?= $portfolio['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-chain"></i>
                            </a>
                            <a href="port_manage.php?delete_id=<?= $portfolio['id'] ?>" class="text-danger fa-2x">
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
<!-- Portfolios body End -->


<!-- Footer -->
<?php

include '../extend/footer.php';

?>