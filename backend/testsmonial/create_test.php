<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add a new Testimonial</h4>
            </div>
            <div class="card-body">
                <form action="test_manage.php" method="POST" enctype="multipart/form-data">
                    <picture class="d-block my-4">
                        <img id="test_show_img" src="../../public/uploads/default/default.png" alt="" style="width:100%; height: 300px; object-fit:contain; " >
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Image </label>
                    <input name="test_image" onchange="document.querySelector('#test_show_img').src = window.URL.createObjectURL(this.files[0]) " type="file" class="form-control" id="hudai" aria-describedby="emailHelp">
                    
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Description</label>
                    <textarea name="test_description" type="email" class="form-control" rows="5"> </textarea>
                    
                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Name</label>
                    <input name="test_name" type="text" class="form-control" id="hudai" aria-describedby="emailHelp">

                    <label for="exampleInputEmail1" class="form-label my-2">Testimonial Title</label>
                    <input name="test_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <button type="submit" name="test_create_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>  



<?php

include '../extend/footer.php';

?>