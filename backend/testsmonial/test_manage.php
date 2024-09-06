<?php

include "../../config/database.php";

session_start();


// New Testimonial Add 
if(isset($_POST['test_create_btn'])){

    $id = $_SESSION['author_id'];
    $test_image = $_FILES['test_image']['name'];
    $test_description = $_POST['test_description'];
    $test_name = $_POST['test_name'];
    $test_title = $_POST['test_title'];
    $explode = explode('.',$test_image);
    $extention = end($explode);
    $tmp_name = $_FILES['test_image']['tmp_name'];

    if($test_image && $test_description && $test_name && $test_title){
        $newname = $id . '-' . $test_name . '-' . date('d-m-Y') . '-' . rand(0,999) . '-' . $extention;

        $localpath = '../../public/uploads/testimonial/' . $newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            $insert_query = "INSERT INTO testimonials (image,description,name,title) VALUES ('$newname','$test_description','$test_name','$test_title')";

            mysqli_query($db,$insert_query);

            $_SESSION['test_add_success'] = "New testimonial Added Successfully.";
            header("location: testimonials.php");
        }
    }
}
// New Testimonial Add  End


// New Testimonial Status  Active/Deactive
if(isset($_GET['status_id'])){

    $id = $_GET['status_id'];
    $statusquery = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($db,$statusquery);
    $testimonial = mysqli_fetch_assoc($connect);

    if($testimonial['status']  == 'deactive'){
        $update_query = "UPDATE testimonials SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['test_active_suc'] = "testimonial Status Actived Successfully"; 
        header('location: testimonials.php');
    }else{
        $update_query = "UPDATE testimonials SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['test_deactive_suc'] = "testimonial Status Deactived Successfully"; 
        header('location: testimonials.php');
    }

}
// New Testimonial Status  Active/Deactive End


// testimonial Delete
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $test_query = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($db,$test_query);
    $test = mysqli_fetch_assoc($connect);

    if($test['image']){
        $oldname = $test['image'];
        $existspath = '../../public/uploads/testimonial/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }
    }

    $delete_query = "DELETE FROM testimonials WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['test_del_suc'] = "testimonial Successfully Deleted ";

    header('location: testimonials.php');
}
// testimonial Delete End


// testimonial Edit
if(isset($_POST['test_edit_btn'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $edit_image = $_FILES['edit_image']['name'];
        $edit_description = $_POST['edit_description'];
        $edit_name = $_POST['edit_name'];
        $edit_title = $_POST['edit_title'];

        if($edit_image){
            $image_tmp = $_FILES['edit_image']['tmp_name'];

            $explode = explode('.',$edit_image);
            $extension = end($explode);
            $new_name = $id . '_' . $edit_title . '_'.  date('Y') . rand(0,9999) . '.' . $extension;
            $localpath = '../../public/uploads/testimonial/' . $new_name;
            $old_img_query = "SELECT * FROM testimonials WHERE id='$id'";
            $connect = mysqli_query($db,$old_img_query);
            $testimonial = mysqli_fetch_assoc($connect);

            if($testimonial['image']){
                $oldpath = '../../public/uploads/testimonial/'. $testimonial['image'];
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }

            if(move_uploaded_file($edit_image_tmp,$localpath)){
                $update_query = "UPDATE testimonials SET image='$new_name', description='$edit_description', name='$edit_name' title='$edit_title' WHERE id='$id'";
                mysqli_query($db,$update_query);
                $_SESSION['test_up_success'] = "testimonial Successfully Updated";
    
                header('location: testimonials.php');
            }

        }else{
            $update_query = "UPDATE testimonials SET description='$edit_description', name='$edit_name', title='$edit_title' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['test_up_success'] = "testimonial Successfully Updated";

            header('location: testimonials.php');
        }
    }
}
// testimonial Edit End


?>