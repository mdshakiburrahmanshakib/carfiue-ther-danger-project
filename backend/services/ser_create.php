<?php

include '../extend/header.php';

// header End

include '../../public/fonts/fonts.php';

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add a new Services</h4>
            </div>
            <div class="card-body">
                <form action="service_manage.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Service Title</label>
                    <input name="ser_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">Service Description</label>
                    <textarea name="ser_description" type="text" class="form-control" rows="5"> </textarea>
                    <label for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input name="ser_icon" type="text" readonly class="form-control" id="iconInput" aria-describedby="emailHelp">
                    <div class="card my-2">
                        <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px;">
                            <?php foreach ($fonts as $font): ?>
                                <span class="m-2">
                                    <i onclick="myFun(event)" class="<?= $font ?>"></i>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" name="create_btn" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
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


<!-- Footer Start -->
<?php

include '../extend/footer.php';

?>