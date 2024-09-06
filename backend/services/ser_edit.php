<?php

include '../extend/header.php';

include '../../public/fonts/fonts.php';


if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $getQuery = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $service = mysqli_fetch_assoc($connect);
}


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Service Add - <?= $service['title'] ?></h4>
            </div>
            <div class="card-body">
                <form action="service_manage.php?ser_edit_btn=<?= $service['id'] ?>" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Service Title</label>
                    <input name="edit_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $service['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Service Description</label>
                    <textarea name="edit_description" type="email" class="form-control" rows="5"> <?= $service['description'] ?> </textarea>
                    <label for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input name="edit_icon" type="text" readonly class="form-control" id="iconInput" aria-describedby="emailHelp" value="<?= $service['icon'] ?>">
                    <div class="card my-2">
                        <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px;">
                            <?php foreach ($fonts as $font): ?>
                                <span class="m-2">
                                    <i onclick="myFun(event)" class="<?= $font ?>"></i>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" name="ser_edit_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $input = document.querySelector('#iconInput');

    function myFun(e) {
        $input.value = e.target.classList.value;
    }
</script>

<?php

include '../extend/footer.php';

?>