<?php

include "../../config/database.php";

session_start();


// New contact Create 
if(isset($_POST['contact_create_btn'])){
    
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    if($city && $address && $phone && $email){
        $contact_query = "INSERT INTO contacts (city,address,phone,email) VALUES ('$city','$address','$phone','$email')";
        mysqli_query($db,$contact_query);
        $_SESSION['new_cont_success'] = "New Contact created successfully"; 
        header('location: contacts.php');
    }

}
// New contact Create End


// contact Status Active/Deactive
if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $get_querrry = "SELECT * FROM contacts WHERE id='$id'";
    $connect = mysqli_query($db,$get_querrry);
    $contact = mysqli_fetch_assoc($connect);


    if($contact['status'] == 'deactive'){
        $sts_query = "UPDATE contacts SET status='active' WHERE id='$id'";
        mysqli_query($db,$sts_query);
        $_SESSION['status_active_suc'] = "contact Status Successfully Actived"; 
        header('location: contacts.php');
    }else{
        $sts_query = "UPDATE contacts SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$sts_query);
        $_SESSION['status_deactive_suc'] = "contact Status Successfully deactived"; 
        header('location: contacts.php');
    }
}
// contact Status Active/Deactive End


// contact Edit
if(isset($_POST['contact_edit_btn'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
    
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
    
        if($city && $address && $phone && $email){
            $edit_querry = "UPDATE contacts SET city='$city',address='$address',phone='$phone',email='$email' WHERE id='$id'";
            mysqli_query($db,$edit_querry);
            $_SESSION['contact_edit_suc'] = "contact Updated Successfully"; 
            header('location: contacts.php');
        }
    
    }
}
// contact Edit End


?>