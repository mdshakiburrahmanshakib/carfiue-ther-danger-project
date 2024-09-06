<?php

include '../../config/database.php';

session_start();

$id = $_SESSION['author_id'];

if(isset($_POST['up_name_btn'])){

    $up_name = $_POST['up_name'];
    $flag = false;

    $up_name_regex = '/^(?! $)[a-zA-Z ]*$/';

    if(!$up_name){
        $flag = true;
        $_SESSION['up_name_error'] = "Please enter the name";
        header('location: settings.php');
    }else if(!preg_match($up_name_regex,$up_name)){
        $flag = true;
        $_SESSION['up_name_error'] = "Please enter a valid name";
        header('location: settings.php');
    }

    if(!$flag){
        $up_querry = "UPDATE users SET name='$up_name' WHERE id='$id'";
        mysqli_query($db,$up_querry);
        $_SESSION['author_name'] = $up_name;
        $_SESSION['up_name_seccess'] = "Name Update Successfully";
        header('location: settings.php');

    }

}
// Name Update End


// Email Update 
if(isset($_POST['up_email_btn'])){

    $up_email = $_POST['up_email'];
    $flag = false;

    $up_email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';

    if(!$up_email){
        $flag = true;
        $_SESSION['up_email_error'] = "Please enter the email";
        header('location: settings.php');
    }else if(!preg_match($up_email_regex,$up_email)){
        $flag = true;
        $_SESSION['up_email_error'] = "Please enter a valid email";
        header('location: settings.php');
    }

    if(!$flag){
        $up_querry = "UPDATE users SET email='$up_email' WHERE id='$id'";
        mysqli_query($db,$up_querry);
        $_SESSION['author_email'] = $up_email;
        $_SESSION['up_email_seccess'] = "Email Update Successfully";
        header('location: settings.php');

    }

}
// Email Update End


// Password Update
if(isset($_POST['up_password_btn'])){

    $up_old_password = $_POST['up_old_password'];
    $up_new_password = $_POST['up_new_password'];
    $up_c_new_password = $_POST['up_c_new_password'];


    if($up_old_password && $up_new_password && $up_c_new_password){
        $encrypt = sha1($up_old_password);
        $id = $_SESSION['author_id'];
        $match_query = "SELECT COUNT(*) AS 'match' FROM users WHERE id='$id' AND password='$encrypt'";
        $connect = mysqli_query($db,$match_query);

        $match = mysqli_fetch_assoc($connect)['match'];

        if($match == 1){
            if($up_new_password == $up_c_new_password){
                $new_encrypt = sha1($up_new_password);
                $up_query = "UPDATE users SET password='$new_encrypt' WHERE id='$id'";
                mysqli_query($db,$up_query);
                $_SESSION['password_up_sec'] = "Password Update Successfull";
                header("location: settings.php");
            }else{
                $_SESSION['password_error'] = "New Password & Comfirm Password Doesn't Match";
                header("location: settings.php");
            }
        }else{
            $_SESSION['password_error'] = "Password Doesn't Password";
            header("location: settings.php");

        }
    }else{
        $_SESSION['password_error'] = "Please Enter Password";
        header("location: settings.php");

    }
}
// Password Update End


// Image Update
if(isset($_POST['up_img_btn'])){
    
    $up_img = $_FILES['up_img']['name'];
    $tmp_path = $_FILES['up_img']['tmp_name'];
    
    
    if($up_img){
        $explode = explode('.',$up_img);
        $extention = end($explode);
        $name = $_SESSION['author_name'];
        $new_name = $id . "-" . $name . "-" . date("d-m-Y-h-i-sa") . "." . $extention;
        $local_path = "../../public/uploads/profile/" . $new_name;

        if(move_uploaded_file($tmp_path,$local_path)){
            $up_querry = "UPDATE users SET image='$new_name' WHERE id='$id'";
            mysqli_query($db,$up_querry);
            $_SESSION['up_img_seccess'] = "Image Update Successfully";
            header('location: settings.php');
        }
        
    }else{
        $_SESSION['up_img_error'] = "Please select an image";
        header('location: settings.php');
    }


}
// Image Update End

?>