<?php

include '../config/database.php';

session_start();

if(isset($_POST['reg_btn'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $flag = false;

    // All Regex 
    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower = '/^(?=.*?[a-z])/';
    $password_regex_numerical = '/^(?=.*?[0-9])/';
    $password_regex_length = '/^.{8,}/';
    $password_regex_special_char = '/^(?=.*?[#?!@$%^&*-])/';
    // All Regex 

//   Name Validation Start
    if(!$name){
        $flag = true;
        $_SESSION['name_error'] = "Please enter your name";
        header('location: register.php');
    }else if(!preg_match($name_regex,$name)){
        $flag = true;
        $_SESSION['name_error'] = "Please enter a valid name";
        header('location: register.php');
    }else{
        $_SESSION['name_value'] = $name;
        header('location: register.php');
    }
//   Name Validation End



// Email Validation Start
    if(!$email){
        $flag = true;
        $_SESSION['email_error'] = "Please enter your email";
        header('location: register.php');
    }else if(!preg_match($email_regex,$email)){
        $flag = true;
        $_SESSION['email_error'] = "Please enter a valid email";
        header('location: register.php');
    }else{
        $_SESSION['email_value'] = $email;
        header('location: register.php');
    }
// Email Validation End



// Password Validation Start
    if(!$password){
        $flag = true;
        $_SESSION['password_error'] = "Please enter your password";
        header('location: register.php');
    }else if(!preg_match($password_regex_upper,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter an upper case";
        header('location: register.php');
    }else if(!preg_match($password_regex_lower,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter an lower case";
        header('location: register.php');
    }else if(!preg_match($password_regex_numerical,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter a numerical character";
        header('location: register.php');
    }else if(!preg_match($password_regex_length,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter atlest 8 character";
        header('location: register.php');
    }else if(!preg_match($password_regex_special_char,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter a special character";
        header('location: register.php');
    }
// Password Validation End


// Confirm Password Validation Start
    if(!$c_password){
        $flag = true;
        $_SESSION['c_password_error'] = "Please enter your confirm password";
        header('location: register.php');
    }else if($c_password != $password){
        $flag = true;
        $_SESSION['c_password_error'] = "Cridential doesn't match";
        header('location: register.php');
    }
// Confirm Password Validation End


// Database Connection 
    if($flag == false){
        $encrypt = sha1($password);
        $querry = "INSERT INTO users(name,email,password) VALUES('$name','$email','$encrypt')";
        $connect = mysqli_query($db,$querry);

        $_SESSION['reg_seccess'] = "Your registration has been successfull";
        header('location: login.php');

    }
// Database Connection 

}
// Register Page end

// Login Page Start

if(isset($_POST['log_btn'])){
    
    $email = $_POST['log_email'];
    $password = $_POST['log_password'];
    $flag = false;


    // LOGIN All Regex 
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower = '/^(?=.*?[a-z])/';
    $password_regex_numerical = '/^(?=.*?[0-9])/';
    $password_regex_length = '/^.{8,}/';
    $password_regex_special_char = '/^(?=.*?[#?!@$%^&*-])/';
    // LOGIN All Regex 


    // LOGIN Email Validation Start
    if(!$email){
        $flag = true;
        $_SESSION['log_email_error'] = "Please Enter you Email";
        header('location: login.php');
    }else if(!preg_match($email_regex,$email)){
        $flag = true;
        $_SESSION['log_email_error'] = "Please enter a valid email";
        header('location: login.php');
    }
    // LOGIN Email Validation End


    // LOGIN Password Validation Start
    if(!$password){
        $flag = true;
        $_SESSION['log_password_error'] = "Please Enter you password";
        header('location: login.php');
    }else if(!preg_match($password_regex_upper,$password)){
        $flag = true;
        $_SESSION['log_password_error'] = "Please enter an upper case";
        header('location: login.php');
    }else if(!preg_match($password_regex_lower,$password)){
        $flag = true;
        $_SESSION['log_password_error'] = "Please enter an lower case";
        header('location: login.php');
    }else if(!preg_match($password_regex_numerical,$password)){
        $flag = true;
        $_SESSION['log_password_error'] = "Please enter a numerical character";
        header('location: login.php');
    }else if(!preg_match($password_regex_length,$password)){
        $flag = true;
        $_SESSION['log_password_error'] = "Please enter atlest 8 character";
        header('location: login.php');
    }else if(!preg_match($password_regex_special_char,$password)){
        $flag = true;
        $_SESSION['log_password_error'] = "Please enter a special character";
        header('location: login.php');
    }
    // LOGIN Password Validation End


    // LOGIN Database Connection
    $encrypt = sha1($password);
    $log_querry = "SELECT COUNT(*) AS validate FROM users WHERE email='$email' AND password='$encrypt'";
    $connect = mysqli_query($db,$log_querry);
    $result = mysqli_fetch_assoc($connect);
    // LOGIN Database Connection


    if($result['validate'] == 1){ 

        $data_querry = "SELECT * FROM users WHERE email='$email'";
        $connect = mysqli_query($db,$data_querry);
        $author = mysqli_fetch_assoc($connect);
        
        $_SESSION['author_id'] = $author['id'];
        $_SESSION['author_name'] = $author['name'];
        $_SESSION['temp_name'] = $author['name'];
        $_SESSION['author_email'] = $author['email'];
        $_SESSION['author_password'] = $author['passsword'];


        header('location: ../backend/home/home.php');
        
    }else{
        $_SESSION['login_unseccess'] = "Creadiantian dosen't match";
        header('location: login.php');
    }

}else{
    header('location: login.php');
}

// Login Page End





?>