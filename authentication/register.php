<?php

session_start();

if (isset($_SESSION['author_id'])) {
    header("location: ../backend/home/home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../public/assets/css/main.min.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../public/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="login.php">Sign In</a></p>

            <form action="manage.php" method="POST">
                <div class="auth-credentials m-b-xxl">
                    <label for="signUpUsername" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control m-b-md <?php if(isset($_SESSION['name_error'])){ echo "is-invalid"; } ?>" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name" value="<?php if(isset($_SESSION['name_value'])){ echo $_SESSION['name_value'];} unset($_SESSION['name_value']); ?>">


                    <!-- Name Error Start -->
                    <?php if(isset($_SESSION['name_error'])){ ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['name_error']; ?> </div>
                    <?php } unset($_SESSION['name_error']); ?>
                    <!-- Name Error END -->


                    <label for="signUpEmail" class="form-label">Email address</label>
                    <input name="email" type="text" class="form-control m-b-md <?php if(isset($_SESSION['email_error'])){ echo "is-invalid"; } ?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" value="<?php if(isset($_SESSION['email_value'])){ echo $_SESSION['email_value'];} unset($_SESSION['email_value']); ?>">

                    <!-- Email Error Start -->
                        <?php if(isset($_SESSION['email_error'])){ ?>
                            <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['email_error']; ?> </div>
                        <?php } unset($_SESSION['email_error']); ?>
                    <!-- Email Error END -->

                    <label for="signUpPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?php if(isset($_SESSION['password_error'])){ echo "is-invalid"; } ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

                    <!-- Password Error Start -->
                    <?php if(isset($_SESSION['password_error'])){ ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['password_error']; ?> </div>
                    <?php } unset($_SESSION['password_error']); ?>
                    <!-- Password Error END -->

                    <!-- Password Toggle -->
                    <div style="margin-top:15px; margin-bottom:10px;">
                        <input type="checkbox" onclick="showPassword()">  Show Password
                    </div>
                    <!-- Password Toggle -->

                    <label for="signUpPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control <?php if(isset($_SESSION['c_password_error'])){ echo "is-invalid"; } ?>" id="c_signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

                    <!-- C_Password Error Start -->
                    <?php if(isset($_SESSION['c_password_error'])){ ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"> <?php echo $_SESSION['c_password_error']; ?> </div>
                    <?php } unset($_SESSION['c_password_error']); ?>
                    <!-- c_Password Error END -->

                    <!-- C_Password Toggle -->
                    <div style="margin-top:15px; margin-bottom:5px;">
                        <input type="checkbox" onclick="c_showPassword()">  Show Password
                    </div>
                    <!-- C_Password Toggle -->

                </div>

                

                <div class="auth-submit">
                    <button name="reg_btn" class="btn btn-primary">Sign Up</button>
                </div>
            </form>

            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../public/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../public/assets/plugins/pace/pace.min.js"></script>
    <script src="../public/assets/js/main.min.js"></script>
    <script src="../public/assets/js/custom.js"></script>
    <script src="../public/assets/js/toggle.js"></script>


</body>
</html>