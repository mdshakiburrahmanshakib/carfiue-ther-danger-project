<?php

include '../extend/header.php';
// Header 

$test_querry = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db,$test_querry);
$testimonial = mysqli_fetch_assoc($testimonials);

?>
                                                                <!-- All Alert Messeages -->
<!-- New Testimonial Add Seccesss MSG -->
<?php if(isset($_SESSION['test_add_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['test_add_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['test_add_success']) ?>
<!-- New Testimonial Add Seccesss MSG End -->               
 

<!-- Testimonials Status Active/Deactive MSG -->
<?php if(isset($_SESSION['test_active_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['test_active_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['test_active_suc']) ?>
<!-- Testimonials Status Active/Deactive MSG End-->


<!-- Testimonials Status Active/Deactive -->
<?php if(isset($_SESSION['test_deactive_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['test_deactive_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['test_deactive_suc']) ?>
<!-- Testimonials Status Active/Deactive End-->


<!-- testimonial Delete Success MSG -->
<?php if(isset($_SESSION['test_del_suc'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['test_del_suc'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['test_del_suc']) ?>
<!-- testimonial Delete Success MSG End -->


<!-- Portfolios Edit Success MSG -->
<?php if(isset($_SESSION['test_up_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['test_up_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['test_up_success']) ?>
<!-- Portfolios Edit Success MSG End -->
                                                                <!-- All Alert Messeages End -->


<!-- Testimonials Pages body Start -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Testimonial List</h4>
                <a href="create_test.php" class="btn btn-primary"><i class="material-icons">add</i>Create a new testimonial</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(empty($testimonial)): ?>
                    <tr>
                        <tr>
                            <td colspan="6" class="text-center text-danger">Empty!!</td>
                        </tr>
                        <?php  else: ?>
                    <?php   
                        $num = 1;
                        foreach($testimonials as $testimonial): ?>
                        <tr>
                            <th scope="row">
                                <?= $num++ ?>
                            </th>
                            <td>
                                <img style="width: 60px; height: 60px; border-radius:50%; " src="../../public/uploads/testimonial/<?= $testimonial['image'] ?>">
                            </td>
                            <td>
                            <?= $testimonial['name'] ?>
                            </td>
                            <td>
                            <?= $testimonial['title'] ?>
                            </td>
                            <td>
                            <a href="test_manage.php?status_id=<?= $testimonial['id'] ?>" class="<?= ($testimonial['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $testimonial['status'] ?></a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around align-items-center"> 
                                    <a href="edit_test.php?edit_id=<?= $testimonial['id'] ?>" class="text-primary fa-2x">
                                        <i class="fa fa-chain"></i>
                                    </a>
                                    <a href="test_manage.php?delete_id=<?= $testimonial['id'] ?>" class="text-danger fa-2x">
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
<!-- Testimonials Pages body Start -->

<!-- Footer -->
<?php

include '../extend/footer.php';

?>