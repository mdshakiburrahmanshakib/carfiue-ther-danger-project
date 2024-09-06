<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';

if( isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $select_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $portfolio = mysqli_fetch_assoc($connect);


}

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Portfolio Update</h4>
            </div>
            <div class="card-body">
                <form action="port_manage.php?edit_id=<?= $portfolio['id'] ?>" method="POST" enctype="multipart/form-data">
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Title</label>
                    <input name="edit_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $portfolio['title'] ?>">  <!-- Title -->
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Sub title</label>
                    <input name="edit_subtitle" type="text" class="form-control" id="hudai" aria-describedby="emailHelp" value="<?= $portfolio['subtitle'] ?>">     <!-- SubTitle -->
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Description</label> <!-- Description -->
                    <textarea name="edit_description" type="email" class="form-control" rows="5"> 
                    <?= $portfolio['description'] ?>
                    </textarea>
                    <picture class="d-block my-4">
                        <img id="port_show_u_img" src="../../public/uploads/portfolio/<?= $portfolio['image'] ?>" alt="" style="width:100%; height: 400px; object-fit:contain">
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Image</label>     <!-- Image -->
                    <input onchange="document.querySelector('#port_show_u_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="edit_image">

                    <button type="submit" name="port_edit_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php

include '../extend/footer.php';

?>