<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add a new Portfolio</h4>
            </div>
            <div class="card-body">
                <form action="port_manage.php" method="POST" enctype="multipart/form-data">
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Title</label>
                    <input name="port_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Sub title</label>
                    <input name="port_subtitle" type="text" class="form-control" id="hudai" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Description</label>
                    <textarea name="port_description" type="email" class="form-control" rows="5"> </textarea>
                    <picture class="d-block my-4">
                        <img id="port_show_img" src="../../public/uploads/default/default.png" alt="" style="width:100%; height: 300px; object-fit:contain; " >
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Image </label>
                    <input name="port_image" onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0]) " type="file" class="form-control" id="hudai" aria-describedby="emailHelp">

                    <button type="submit" name="port_create_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>  



<?php

include '../extend/footer.php';

?>