<?php

include '../extend/header.php'; 
include '../../config/database.php'; 




if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $getQuery = "SELECT * FROM contacts WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $contact = mysqli_fetch_assoc($connect);
}


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>contact Edit</h4>
            </div>
            <div class="card-body">
                <form action="cont_manage.php?edit_id=<?= $contact['id'] ?>" method="POST" enctype="multipart/form-data">

                    <label for="exampleInputEmail1" class="form-label my-2">City</label>
                    <input name="city" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $contact['city'] ?>">

                    <label for="exampleInputEmail1" class="form-label my-2">Address</label>
                    <input name="address" type="text" class="form-control" aria-describedby="emailHelp" value="<?= $contact['address'] ?>">

                    <label for="exampleInputEmail1" class="form-label my-2">Phone</label>
                    <input name="phone" type="text" class="form-control" aria-describedby="emailHelp" value="<?= $contact['phone'] ?>">

                    <label for="exampleInputEmail1" class="form-label my-2">Email</label>
                    <input name="email" type="text" class="form-control" aria-describedby="emailHelp" value="<?= $contact['email'] ?>">


                    <button type="submit" name="contact_edit_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

include '../extend/footer.php';

?>