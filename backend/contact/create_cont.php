<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add a new Contact</h4>
            </div>
            <div class="card-body">
                <form action="cont_manage.php" method="POST" enctype="multipart/form-data">

                    <label for="exampleInputEmail1" class="form-label my-2">City</label>
                    <input name="city" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label my-2">Address</label>
                    <input name="address" type="text" class="form-control" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label my-2">Phone</label>
                    <input name="phone" type="text" class="form-control" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label my-2">Email</label>
                    <input name="email" type="text" class="form-control" aria-describedby="emailHelp">


                    <button type="submit" name="contact_create_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>  



<?php

include '../extend/footer.php';

?>