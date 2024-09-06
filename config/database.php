<?php

// serverName, databaseUserName, databasePassword, databaseName

$db = mysqli_connect('localhost','root','','carfiue');

if(!$db){
    header('location: ../error/error.php');
}

?>