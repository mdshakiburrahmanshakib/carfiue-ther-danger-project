<?php

include '../extend/header.php';



?>
<!-- Header End -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>
</div>


<div class="row">
    <!-- Username Update -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Username Update</h4>
                <!-- Success MSG -->
                <?php if(isset($_SESSION['up_seccess'])): ?>
                    <div class="alert alert-success alert-style-light" role="alert" style="margin-top: 20px;">
                        <?=$_SESSION['up_seccess'] ?>
                    </div>
                <?php endif; unset($_SESSION['up_seccess']); ?>
                <!-- Success MSG -->
            </div>
            <form action="settings_manage.php" method="POST">
                <div class="card-body">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input name="up_name" type="text" class="form-control <?php if(isset($_SESSION['up_name_error'])){ echo "is-invalid"; } ?>" id="exampleInputName" aria-describedby="emailHelp">
                        <!-- Up Email Error Start -->
                        <?php if(isset($_SESSION['up_name_error'])){ ?>
                            <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['up_name_error']; ?> </div>
                        <?php } unset($_SESSION['up_name_error']); ?>
                        <!-- Up Email Error END -->
                    </div>
                </div>
                <div class="d-grid gap-2" style="margin-left: 30px; margin-right: 30px; margin-bottom: 30px;">
                    <button name="up_name_btn" class="btn btn-primary" type="submit">update</button>
                </div>
            </form>
        </div>
    </div> 
     <!-- Username Update -->

     <!-- email update -->
     <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Email Update</h4>
                <!-- Success MSG -->
                <?php if(isset($_SESSION['up_email_seccess'])): ?>
                    <div class="alert alert-success alert-style-light" role="alert" style="margin-top: 20px;">
                        <?=$_SESSION['up_email_seccess'] ?>
                    </div>
                <?php endif; unset($_SESSION['up_email_seccess']); ?>
                <!-- Success MSG -->
            </div>
            <form action="settings_manage.php" method="POST">
            <div class="card-body">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">email address</label>
                        <input name="up_email" type="text" class="form-control <?php if(isset($_SESSION['up_email_error'])){ echo "is-invalid"; } ?>" id="exampleInputName" aria-describedby="emailHelp">
                        <!-- Up Email Error Start -->
                        <?php if(isset($_SESSION['up_email_error'])){ ?>
                            <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['up_email_error']; ?> </div>
                        <?php } unset($_SESSION['up_email_error']); ?>
                        <!-- Up Email Error END -->
                    </div>
                </div>
                    <div class="d-grid gap-2" style="margin-left: 30px; margin-right: 30px; margin-bottom: 30px;">
                        <button name="up_email_btn" class="btn btn-primary" type="submit">update</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Email Update End -->
   

<!-- Password Update -->
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Password Update</h4>
                <!-- Success MSG -->
                <?php if(isset($_SESSION['password_up_sec'])): ?>
                    <div class="alert alert-success alert-style-light" role="alert" style="margin-top: 20px;">
                        <?=$_SESSION['password_up_sec'] ?>
                    </div>
                <?php endif; unset($_SESSION['password_up_sec']); ?>
                <!-- Success MSG -->

                <!-- UnSuccess MSG -->
                <?php if(isset($_SESSION['password_error'])): ?>
                    <div class="alert alert-danger alert-style-light" role="alert" style="margin-top: 20px;">
                        <?=$_SESSION['password_error'] ?>
                    </div>
                <?php endif; unset($_SESSION['password_error']); ?>
                <!-- UnSuccess MSG -->
            </div>
            <div class="card-body">
                <form action="settings_manage.php" method="POST">
                    <div class="card-body">
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Old password</label>
                            <input name="up_old_password" type="password" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">New password</label>
                            <input name="up_new_password" type="password" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                          
                        </div>
                        <div class="example-content">
                            <label for="exampleInputEmail1" class="form-label">Confirm new password</label>
                            <input name="up_c_new_password" type="password" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                            
                        </div>
                    </div>
                    <div class="d-grid gap-2" style="margin-left: 30px; margin-right: 30px; margin-bottom: 30px;">
                        <button name="up_password_btn" class="btn btn-primary" type="submit">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Password Update End -->



    <!-- Image Update -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Image Update</h4>
                <!-- Success MSG -->
                <?php if(isset($_SESSION['up_img_seccess'])): ?>
                    <div class="alert alert-success alert-style-light" role="alert" style="margin-top: 20px;">
                        <?=$_SESSION['up_img_seccess'] ?>
                    </div>
                <?php endif; unset($_SESSION['up_img_seccess']); ?>
                <!-- Success MSG -->
            </div>
            <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                        <input name="up_img" type="file" class="form-control <?php if(isset($_SESSION['up_img_error'])){ echo "is-invalid"; } ?>" id="exampleInputName" aria-describedby="emailHelp">
                        <!-- Up Image Error Start -->
                        <?php if(isset($_SESSION['up_img_error'])){ ?>
                            <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['up_img_error']; ?> </div>
                        <?php } unset($_SESSION['up_img_error']); ?>
                        <!-- Up Image Error END -->
                    </div>
                </div>
                <div class="d-grid gap-2" style="margin-left: 30px; margin-right: 30px; margin-bottom: 30px;">
                    <button name="up_img_btn" class="btn btn-primary" type="submit">update</button>
                </div>
            </form>
        </div>
    </div> 
</div>
<!-- Image Update END -->

    


<!-- Footer Start -->
<?php

include '../extend/footer.php';

?>