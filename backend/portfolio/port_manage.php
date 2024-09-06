<?php

include "../../config/database.php";

session_start();


// New Portfolio Add 
if(isset($_POST['port_create_btn'])){

    $id = $_SESSION['author_id'];
    $port_title = $_POST['port_title'];
    $port_subtitle = $_POST['port_subtitle'];
    $port_description = $_POST['port_description'];
    $port_image = $_FILES['port_image']['name'];
    $explode = explode('.',$port_image);
    $extention = end($explode);
    $tmp_name = $_FILES['port_image']['tmp_name'];

    if($port_title && $port_subtitle && $port_description && $port_image){
        $newname = $id . '-' . $port_title . '-' . date('d-m-Y') . '-' . rand(0,999) . '-' . $extention;

        $localpath = '../../public/uploads/portfolio/' . $newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            $insert_query = "INSERT INTO portfolios (title,subtitle,description,image) VALUES ('$port_title','$port_subtitle','$port_description','$newname')";

            mysqli_query($db,$insert_query);

            $_SESSION['port_add_success'] = "New Portfolio Added Successfully.";
            header("location: portfolios.php");
        }
    }
}
// New Portfolio  End

// Poerfolio Edit
if(isset($_POST['port_edit_btn'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $edit_title = $_POST['edit_title'];
        $edit_subtitle = $_POST['edit_subtitle'];
        $edit_description = $_POST['edit_description'];
        $edit_image = $_FILES['edit_image']['name'];

        if($edit_image){
            $image_tmp = $_FILES['edit_image']['tmp_name'];

            $explode = explode('.',$edit_image);
            $extension = end($explode);
            $new_name = $id . '_' . $edit_title . '_'.  date('Y') . rand(0,9999) . '.' . $extension;
            $localpath = '../../public/uploads/portfolio/' . $new_name;
            $old_img_query = "SELECT * FROM portfolios WHERE id='$id'";
            $connect = mysqli_query($db,$old_img_query);
            $portfolio = mysqli_fetch_assoc($connect);

            if($portfolio['image']){
                $oldpath = '../../public/uploads/portfolio/'. $portfolio['image'];
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }

            if(move_uploaded_file($edit_image_tmp,$localpath)){
                $update_query = "UPDATE portfolios SET title='$edit_title',subtitle='$edit_subtitle',description='$edit_description',image='$new_name' WHERE id='$id'";
                mysqli_query($db,$update_query);
                $_SESSION['port_up_success'] = "Portfolio Successfully Updated";
    
                header('location: portfolios.php');
            }

        }else{
            $update_query = "UPDATE portfolios SET title='$edit_title',subtitle='$edit_subtitle',description='$edit_description' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['port_up_success'] = "Portfolio Successfully Updated";

            header('location: portfolios.php');
        }
    }
}
// Poerfolio Edit End


// New Portfolio Status  Active/Deactive
if(isset($_GET['status_id'])){

    $id = $_GET['status_id'];
    $statusquery = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$statusquery);
    $portfolio = mysqli_fetch_assoc($connect);

    if($portfolio['status']  == 'deactive'){
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['port_active_suc'] = "Portfolio Status Actived Successfully"; 
        header('location: portfolios.php');
    }else{
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['port_deactive_suc'] = "Portfolio Status Deactived Successfully"; 
        header('location: portfolios.php');
    }

}
// New Portfolio Status  Active/Deactive End


// Portfolio Delete
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);

    if($port['image']){
        $oldname = $port['image'];
        $existspath = '../../public/uploads/portfolio/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }
    }

    $delete_query = "DELETE FROM portfolios WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['port_del_suc'] = "Portfolio Successfully Deleted ";

    header('location: portfolios.php');
}
// Portfolio Delete End


?>