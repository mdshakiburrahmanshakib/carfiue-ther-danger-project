<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';

if( isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $select_query = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $testimonial = mysqli_fetch_assoc($connect);


}

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add a new Testimonial</h4>
            </div>
            <div class="card-body">
                <form action="test_manage.php?edit_id=<?= $testimonial['id'] ?>" method="POST" enctype="multipart/form-data">
                    <picture class="d-block my-4">
                        <img id="port_show_u_img" src="../../public/uploads/testimonial/<?= $testimonial['image'] ?>" alt="" style="width:100%; height: 400px; object-fit:contain">
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Image </label>
                    <input name="edit_image" onchange="document.querySelector('#test_show_img').src = window.URL.createObjectURL(this.files[0]) " type="file" class="form-control" id="hudai" aria-describedby="emailHelp">
                    
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Description</label>
                    <textarea name="edit_description" type="email" class="form-control" rows="5"> <?= $testimonial['description'] ?> </textarea>
                    
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Name</label>
                    <input name="edit_name" type="text" class="form-control" id="hudai" aria-describedby="emailHelp" value="<?= $testimonial['name'] ?>">

                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Title</label>
                    <input name="edit_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $testimonial['title'] ?>">

                    <button type="submit" name="test_edit_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>  



<?php

include '../extend/footer.php';

?>