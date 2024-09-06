<?php

include '../../config/database.php';
session_start();


// New Service Create 
if(isset($_POST['create_btn'])){
    $ser_title = $_POST['ser_title'];
    $ser_description = $_POST['ser_description'];
    $ser_icon = $_POST['ser_icon'];


    if($ser_title && $ser_description && $ser_icon){
        $ser_query = "INSERT INTO services (title,description,icon) VALUES ('$ser_title','$ser_description','$ser_icon')";
        mysqli_query($db,$ser_query);
        $_SESSION['new_ser_success'] = "New Service created successfully complete"; 
        header('location: services.php');
    }

}
// New Service Create End



// Service Status Active/Deactive
if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $get_querrry = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$get_querrry);
    $service = mysqli_fetch_assoc($connect);


    if($service['status'] == 'deactive'){
        $sts_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db,$sts_query);
        $_SESSION['status_active_suc'] = "Service Status Successfully Actived"; 
        header('location: services.php');
    }else{
        $sts_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$sts_query);
        $_SESSION['status_deactive_suc'] = "Service Status Successfully deactived"; 
        header('location: services.php');
    }
}
// Service Status Active/Deactive End


// Service Edit
if(isset($_POST['ser_edit_btn'])){
    if(isset($_GET['ser_edit_btn'])){
        $id = $_GET['ser_edit_btn'];
    
        $edit_title = $_POST['edit_title'];
        $edit_description = $_POST['edit_description'];
        $edit_icon = $_POST['edit_icon'];
    
        if($edit_title && $edit_description && $edit_icon){
            $edit_querry = "UPDATE services SET title='$edit_title',description='$edit_description',icon='$edit_icon' WHERE id='$id'";
            mysqli_query($db,$edit_querry);
            $_SESSION['service_edit_suc'] = "Service Updated Successfully"; 
            header('location: services.php');
        }
    
    }
}
// Service Edit End


// Delete Services 
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['service_delete_sec'] = "Service Deleted Successfully"; 
    header('location: services.php');
}
// Delete Services End




?>