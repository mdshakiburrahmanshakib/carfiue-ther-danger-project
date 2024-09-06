<?php

include '../../config/database.php';


include '../extend/header.php';


$users_querry = "SELECT * FROM users";
$users = mysqli_query($db,$users_querry);



?>

<!-- Header End -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
</div>


<?php if(isset( $_SESSION['temp_name'])): ?>
    <div class="alert alert-success alert-style-light" role="alert">
        <span class="alert-title">Welcome Chief, <?= $_SESSION['author_name'] ?></span>
        <span class="alert-title" style="margin-left: 10px;">Your email is - <?= $_SESSION['author_email'] ?></span>
    </div>
<?php endif; unset($_SESSION['temp_name']); ?>



<div class="row">
    <div class="col">
        <div class="card">
        <div class="example-content">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                $serial = 1; 
                foreach($users as $user):
                if($user['id'] == $_SESSION['author_id']){
                    continue;
                }
                ?> 
                    <tr>
                        <th scope="row"><?= $serial ++ ?></th>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['password'] ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<!-- Footer Start -->

<?php

include '../extend/footer.php';

?>
