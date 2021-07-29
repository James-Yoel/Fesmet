<?php
session_start();
include_once("../include/config.php");
if(isset($_POST['submit'])){
    $pass = mysqli_real_escape_string($db, strip_tags($_POST['password']));
    $matchPass =  mysqli_real_escape_string($db, strip_tags($_POST['matchPassword']));
    if($pass != $matchPass){
        $_SESSION['errorMessage'] = "Confirm Password didn't match !";
        header('location: signUp.php');
        exit();
    }
    $email = mysqli_real_escape_string($db, strip_tags($_POST['email']));
    $firstName = mysqli_real_escape_string($db, strip_tags($_POST['firstName']));
    $lastName = mysqli_real_escape_string($db, strip_tags($_POST['lastName']));
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $salt = substr($email, 0, 3);
    $passSalt = md5($pass.$salt);

    $profile = "profilePlaceholder.jpg";
    $cover = "coverPlaceholder.jpg";

    $result = $db->query("INSERT INTO user(firstName, lastName, email, tanggalLahir, jenisKelamin, pass, profilePicture, coverPicture) VALUES('$firstName', '$lastName', '$email', '$tanggalLahir', '$jenisKelamin', '$passSalt', '$profile', '$cover')");
    $_SESSION['email'] = $email;
    header('location: ../profile/home.php');
    exit();
}
else{
    header('location: signUp.php');
    exit();
}
?>